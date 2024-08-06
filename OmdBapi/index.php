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
        $url = "http://www.omdbapi.com/?t=" . urlencode($title) . "&apikey=" . $this->apiKey;
        $result = file_get_contents($url);
        if ($result === false) {
            return null; // Manejar error apropiadamente
        }
        $data = json_decode($result, true);
        if ($data === null) {
            return null; // Manejar error apropiadamente
        }
        return $data;
    }
}

// Clase para representar una película y manejar su presentación
class Movie
{
    private string $title;
    private string $year;
    private string $poster;
    private string $plot;
    private string $actors;
    private string $genre;
    private string $rating;
    private string $director;

    public function __construct(array $data)
    {
        $this->title = $data['Title'];
        $this->year = $data['Year'];
        $this->poster = $data['Poster'];
        $this->plot = $data['Plot'];
        $this->actors = $data['Actors'];
        $this->genre = $data['Genre'];
        $this->rating = $data['imdbRating'];
        $this->director = $data['Director'];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function getPoster(): string
    {
        return $this->poster;
    }

    public function getPlot(): string
    {
        return $this->plot;
    }

    public function getActors(): string
    {
        return $this->actors;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function getDirector(): string
    {
        return $this->director;
    }
}

// Procesar el formulario de búsqueda y mostrar resultados
$apiKey = "f551eb65";
$client = new OMDBApiClient($apiKey);
$movie = null;
$errorMessage = null;

if (isset($_GET['title'])) {
    $title = trim($_GET['title']);
    if (!empty($title)) {
        $data = $client->fetchMovieData($title);
        if ($data && $data['Response'] === "True") {
            $movie = new Movie($data);
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
    </style>
</head>
<body>
    <div class="container">
        <form method="get" class="search-form">
            <h4 for="title">Ingrese el título de la película o serie:</h4>
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
            <div class='clear'></div>
        <?php elseif ($errorMessage): ?>
            <p><?= htmlspecialchars($errorMessage) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
