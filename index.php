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
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .profile-container {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            text-align: left;
            max-width: 800px;
            width: 100%;
            margin-bottom: 2rem; /* Espacio entre la sección del perfil y las tarjetas */
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
        /* Estilo para el grid de tarjetas */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem; /* Espacio entre las tarjetas */
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
                    <h4>Desarrollador web Symfony</h4>
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
                        <a href="/otro-proyecto/index.php" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 4 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto4.jpg" class="card-img-top" alt="Proyecto 4">
                    <div class="card-body">
                        <h5 class="card-title">Bot telegram con Jira</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="/mas-proyectos/index.php" class="btn">Ingresar</a>
                    </div>
                </article>

                <!-- Card 5 -->
                <article class="card">
                    <img src="ruta/a/imagen-proyecto4.jpg" class="card-img-top" alt="Proyecto 5">
                    <div class="card-body">
                        <h5 class="card-title">Simon say</h5>
                        <p class="card-text">Una breve descripción de este proyecto. Explica brevemente qué hace y por qué es interesante.</p>
                        <a href="/mas-proyectos/index.php" class="btn">Ingresar</a>
                    </div>
                </article>
            </div>
        </div>
    </main>
</body>
</html>
