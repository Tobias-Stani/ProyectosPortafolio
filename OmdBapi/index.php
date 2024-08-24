<?php

// Clase para manejar la interacción con la API de OMDB
class OMDBApiClient
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function fetchMovieData(string $title): ?array
    {
        $url = "https://www.omdbapi.com/?t=" . urlencode($title) . "&apikey=" . $this->apiKey;
        return $this->fetchData($url);
    }

    public function fetchSeasonData(string $title, int $season): ?array
    {
        $url = "https://www.omdbapi.com/?t=" . urlencode($title) . "&Season=" . $season . "&apikey=" . $this->apiKey;
        return $this->fetchData($url);
    }

    private function fetchData(string $url): ?array
    {
        $result = file_get_contents($url);
        if ($result === false) {
            return null; // Manejar error apropiadamente
        }
        $data = json_decode($result, true);
        return $data === null ? null : $data;
    }

    public function getRandomEpisode(string $title): ?array
    {
        $seasonData = $this->fetchSeasonData($title, 1);
        if ($seasonData === null || !isset($seasonData['totalSeasons'])) {
            return null; // Manejar error apropiadamente
        }

        $randomSeason = rand(1, (int) $seasonData['totalSeasons']);
        $seasonData = $this->fetchSeasonData($title, $randomSeason);

        if ($seasonData === null || !isset($seasonData['Episodes'])) {
            return null; // Manejar error apropiadamente
        }

        $randomEpisodeIndex = rand(0, count($seasonData['Episodes']) - 1);
        $randomEpisode = $seasonData['Episodes'][$randomEpisodeIndex];

        return [
            'season' => $randomSeason,
            'episode' => $randomEpisode['Episode'],
            'title' => $randomEpisode['Title'],
            'released' => $randomEpisode['Released'],
            'imdbRating' => $randomEpisode['imdbRating'],
        ];
    }
}

// Clase para representar una película y manejar su presentación
class Movie
{
    private string $title;
    private string $year;
    private string $director;
    private string $genre;
    private string $actors;
    private string $plot;
    private string $poster;
    private string $rating;

    public function __construct(array $data)
    {
        $this->title = $data['Title'] ?? '';
        $this->year = $data['Year'] ?? '';
        $this->director = $data['Director'] ?? '';
        $this->genre = $data['Genre'] ?? '';
        $this->actors = $data['Actors'] ?? '';
        $this->plot = $data['Plot'] ?? '';
        $this->poster = $data['Poster'] ?? '';
        $this->rating = $data['imdbRating'] ?? '';
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getActors(): string
    {
        return $this->actors;
    }

    public function getPlot(): string
    {
        return $this->plot;
    }

    public function getPoster(): string
    {
        return $this->poster;
    }

    public function getRating(): string
    {
        return $this->rating;
    }
}

// Procesar el formulario de búsqueda y mostrar resultados
$apiKey = "f551eb65";
$client = new OMDBApiClient($apiKey);
$movie = null;
$episode = null;
$errorMessage = null;

if (isset($_GET['title'])) {
    $title = trim($_GET['title']);
    if (!empty($title)) {
        $data = $client->fetchMovieData($title);
        if ($data && $data['Response'] === "True") {
            $movie = new Movie($data);
            if (strtolower($data['Type']) === 'series') {
                $episode = $client->getRandomEpisode($title);
            }
        } else {
            $errorMessage = "No se encontraron datos para la película o serie \"$title\".";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Película o Serie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 3rem;
            max-width: 600px;
            width: 90%;
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .poster img {
            border-radius: 16px;
            margin-bottom: 1rem;
            max-width: 100%;
        }
        .details h1 {
            margin: 0.5rem 0;
        }
        .details p {
            margin: 0.5rem 0;
        }
        .search-form {
            margin-bottom: 1rem;
        }
        .rating {
            font-weight: bold;
            color: #f39c12;
        }
        .episode-details {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="get" class="search-form">
            <h4 for="title">Ingrese el título de la serie:</h4>
            <input type="text" id="title" name="title" required>
            <button type="submit">Buscar</button>
        </form>

        <?php if ($movie): ?>
            <div class='poster'>
                <img src="<?= htmlspecialchars($movie->getPoster()) ?>" alt="<?= htmlspecialchars($movie->getTitle()) ?>">
            </div>
            <div class='details'>
                <h1><?= htmlspecialchars($movie->getTitle()) ?> (<?= htmlspecialchars($movie->getYear()) ?>)</h1>
                <p><strong>Director:</strong> <?= htmlspecialchars($movie->getDirector()) ?></p>
                <p><strong>Género:</strong> <?= htmlspecialchars($movie->getGenre()) ?></p>
                <p><strong>Actores:</strong> <?= htmlspecialchars($movie->getActors()) ?></p>
                <p><strong>Sinopsis:</strong> <?= htmlspecialchars($movie->getPlot()) ?></p>
                <p class='rating'><strong>IMDB Rating:</strong> <?= htmlspecialchars($movie->getRating()) ?></p>
            </div>
            <?php if ($episode): ?>
                <div class='episode-details'>
                    <h2>Episodio Aleatorio:</h2>
                    <p><strong>Título:</strong> <?= htmlspecialchars($episode['title']) ?></p>
                    <p><strong>Temporada:</strong> <?= htmlspecialchars($episode['season']) ?></p>
                    <p><strong>Episodio:</strong> <?= htmlspecialchars($episode['episode']) ?></p>
                    <p><strong>Fecha de emisión:</strong> <?= htmlspecialchars($episode['released']) ?></p>
                    <p class='rating'><strong>IMDB Rating:</strong> <?= htmlspecialchars($episode['imdbRating']) ?></p>
                </div>
            <?php endif; ?>
        <?php elseif ($errorMessage): ?>
            <p><?= htmlspecialchars($errorMessage) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
