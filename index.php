<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Proyectos</title>
    <!-- Pico CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.1/css/pico.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 2rem;
            box-sizing: border-box;
        }

        .profile-container {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            text-align: left;
            max-width: 800px;
            width: 100%;
            margin-bottom: 2rem;
        }

        .profile-img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 1rem;
            padding-bottom: 2rem;
        }

        .profile-info {
            margin-top: 0;
            margin-bottom: 0;
        }

        .profile-info h1 {
            margin: 0;
        }

        .profile-info h4 {
            margin: 0;
        }

        .profile-info p {
            margin-top: 0.5rem;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            margin: 0 0 0.5rem;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            margin: 0 0 1rem;
            color: #666;
        }

        .btn {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            color: #fff;
            background-color: #007bff;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
            margin-bottom: 3rem;
        }

        /* Timeline Styles */
        .timeline {
            border-left: 3px solid #007bff;
            margin: 0;
            padding: 0;
            list-style: none;
            max-width: 800px;
            width: 100%;
        }

        .timeline-item {
            margin: 0;
            padding: 0 0 1rem 1.5rem;
            position: relative;
        }

        .timeline-item::before {
            content: "";
            width: 15px;
            height: 15px;
            background-color: #007bff;
            border-radius: 50%;
            position: absolute;
            left: -9px;
            top: 0;
        }

        .timeline-item h3 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .timeline-item p {
            margin: 0.5rem 0;
            color: #666;
        }

        .timeline-item time {
            font-size: 0.875rem;
            color: #999;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <!-- Header with photo and name -->
            <div class="profile-container">
                <img src="assets/perfil.JPG" alt="Mi foto" class="profile-img">
                <div class="profile-info">
                    <h1>Tobias Stanislavsky</h1>
                    <h4 style="color:#CCC90C; font-weight: 300;">Desarrollador web Symfony</h4>
                    <p>Descripción breve sobre mí. Esto puede incluir tu experiencia, habilidades o cualquier otra información relevante.</p>
                </div>
            </div>

            <!-- Cards for projects -->
            <div class="grid">
                <!-- Card 1 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto1.jpg" class="card-img-top" alt="Proyecto 1">
                    <div class="card-body">
                        <h5 class="card-title">API de OMDB</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Puede incluir detalles sobre su funcionalidad y propósito.</p>
                        <a href="/OmdBapi/index.php" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto2.jpg" class="card-img-top" alt="Proyecto 2">
                    <div class="card-body">
                        <h5 class="card-title">API de Próxima Película de Marvel</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="/curso-php/index.php" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto3.jpg" class="card-img-top" alt="Proyecto 3">
                    <div class="card-body">
                        <h5 class="card-title">EventJournal</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="https://github.com/Tobias-Stani/EventJournal" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 4 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto4.jpg" class="card-img-top" alt="Proyecto 4">
                    <div class="card-body">
                        <h5 class="card-title">Bot telegram con Jira</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="https://github.com/Tobias-Stani/TelegramBotNotifier" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 5 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto4.jpg" class="card-img-top" alt="Proyecto 5">
                    <div class="card-body">
                        <h5 class="card-title">Simon say</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="https://github.com/Tobias-Stani/simon-say-dcoker" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 5 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto4.jpg" class="card-img-top" alt="Proyecto 5">
                    <div class="card-body">
                        <h5 class="card-title">Generador de qr</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="/libraries/barcode-1.1.1/index.php" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 6 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto4.jpg" class="card-img-top" alt="Proyecto 5">
                    <div class="card-body">
                        <h5 class="card-title">Random Episode the office</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="/OmdBapi/TmbApi.php" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 6 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto4.jpg" class="card-img-top" alt="Proyecto 5">
                    <div class="card-body">
                        <h5 class="card-title">Reloj Binario</h5>
                        <p class="card-text">reloj de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="/relojBinary/index.html" class="btn">Ingresar</a>
                    </div>
                </article>
            </div>

            <!-- Timeline -->
            <h1 style="position: relative; display: inline-block;">
                Mi experiencia profesional
                <span style="position: absolute; bottom: 0; left: 0; height: 2px; width: 100%; background-color: currentColor;"></span>
            </h1>
            <ul class="timeline">
                <li class="timeline-item">
                    <h3>Tercer Proyecto o Hito</h3>
                    <p>Descripción brevedddd tercer proyecto o hito importante.</p>
                    <time datetime="2022-09">Septiembre 2022</time>
                </li>
                <li class="timeline-item">
                    <h3>Segundo Proyecto o Hito</h3>
                    <p>Descripción breve del segundo proyecto o hito importante.</p>
                    <time datetime="2021-06">Junio 2021</time>
                </li>
                <li class="timeline-item">
                    <h3>Primer Proyecto Importante</h3>
                    <p>Descripción breve del primer proyecto o hito importante.</p>
                    <time datetime="2020-01">Enero 2020</time>
                </li>
                <!-- Añade más items según sea necesario -->
            </ul>
        </div>
    </main>
</body>

</html>
