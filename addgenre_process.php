<?php
require_once('./class/movie.php');
$movie = new Movie();
if (isset($_POST['btn_submit'])) {
    $genre = $_POST['genre'];

    foreach ($genre as $key => $value) {
        $movie->add_genre($value);
    }

    header('location: addgenre.php');
}
