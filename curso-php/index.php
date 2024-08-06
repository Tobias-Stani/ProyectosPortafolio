<?php
require_once 'const.php';
require_once 'functions.php';
require_once 'clases/NextMovie.php';

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data = $next_movie->get_data();

?>

<?php render_template('head', $next_movie_data); ?>

<body>
    <?php 
    render_template('main', array_merge($next_movie_data, ["untilMessage" => $untilMessage])); 
    ?>
</body>
</html>

