<?php
// URL de la Bored API para obtener una actividad aleatoria
$url = "https://bored-api.appbrewery.com/random";

// Hacer la solicitud GET
$response = file_get_contents($url);

// Decodificar el JSON recibido
$activity = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggest another activity</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .activity {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="activity">
            <?php
            // Mostrar la actividad sugerida
            echo " si estas aburrido proba con esto: " . $activity['activity'] . "!";
            ?>
        </div>
        <form method="post">
            <button type="submit" class="button">suggest an activity</button>
        </form>
    </div>
</body>
</html>
