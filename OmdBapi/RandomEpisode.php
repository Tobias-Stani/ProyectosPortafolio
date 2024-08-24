<?php

class OMDBApiClient
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
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
            return null;
        }
        $data = json_decode($result, true);
        return $data === null ? null : $data;
    }

    public function getRandomEpisode(string $title): ?array
    {
        $seasonData = $this->fetchSeasonData($title, 1);
        if ($seasonData === null || !isset($seasonData['totalSeasons'])) {
            return null;
        }

        $randomSeason = rand(1, (int) $seasonData['totalSeasons']);
        $seasonData = $this->fetchSeasonData($title, $randomSeason);

        if ($seasonData === null || !isset($seasonData['Episodes'])) {
            return null;
        }

        $randomEpisodeIndex = rand(0, count($seasonData['Episodes']) - 1);
        $randomEpisode = $seasonData['Episodes'][$randomEpisodeIndex];

        // Ejemplo ficticio de cómo podrías manejar la imagen del episodio
        // Asegúrate de que la API realmente devuelva esta información
        $randomEpisode['Image'] = "https://example.com/path/to/episode-image.jpg"; // URL de imagen ficticia

        return [
            'season' => $randomSeason,
            'episode' => $randomEpisode['Episode'],
            'title' => $randomEpisode['Title'],
            'released' => $randomEpisode['Released'],
            'imdbRating' => $randomEpisode['imdbRating'],
            'image' => $randomEpisode['Image'] ?? '', // Imagen del episodio
        ];
    }
}

$apiKey = "f551eb65"; // Reemplaza con tu API Key de OMDB
$client = new OMDBApiClient($apiKey);
$episode = null;

if (isset($_POST['getEpisode'])) {
    $episode = $client->getRandomEpisode("The Office");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Episode of The Office</title>
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
        .episode-details {
            margin-top: 2rem;
        }
        .rating {
            font-weight: bold;
            color: #f39c12;
        }
        .episode-image img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <button type="submit" name="getEpisode">Obtener Episodio Aleatorio de The Office</button>
        </form>

        <?php if ($episode): ?>
            <div class='episode-details'>
                <h2>Episodio Aleatorio:</h2>
                <?php if (!empty($episode['image'])): ?>
                <?php endif; ?>
                <p><strong>Título:</strong> <?= htmlspecialchars($episode['title']) ?></p>
                <p><strong>Temporada:</strong> <?= htmlspecialchars($episode['season']) ?></p>
                <p><strong>Episodio:</strong> <?= htmlspecialchars($episode['episode']) ?></p>
                <p><strong>Fecha de emisión:</strong> <?= htmlspecialchars($episode['released']) ?></p>
                <p class='rating'><strong>IMDB Rating:</strong> <?= htmlspecialchars($episode['imdbRating']) ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?

class TMDbApiClient
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function fetchSeasonData(string $title, int $season): ?array
    {
        // Primero obtén el ID de la serie usando el título
        $seriesData = $this->fetchSeriesData($title);
        if ($seriesData === null) {
            return null;
        }

        $seriesId = $seriesData['id'];
        $url = "https://api.themoviedb.org/3/tv/$seriesId/season/$season?api_key=" . $this->apiKey;
        return $this->fetchData($url);
    }

    private function fetchSeriesData(string $title): ?array
    {
        $url = "https://api.themoviedb.org/3/search/tv?query=" . urlencode($title) . "&api_key=" . $this->apiKey;
        return $this->fetchData($url);
    }

    private function fetchData(string $url): ?array
    {
        $result = file_get_contents($url);
        if ($result === false) {
            return null;
        }
        $data = json_decode($result, true);
        return $data === null ? null : $data;
    }
}

