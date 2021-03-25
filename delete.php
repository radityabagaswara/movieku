    <?php
    if (!isset($_GET['movie'])) {
        header('location: adm.php');
        exit();
    }

    include_once('class/movie.php');
    $movie = new Movie();

    if (Movie::delete_movie($_GET['movie'])) {
        header('location: adm.php?success=1');
    } else {
        header('location: adm.php?success=2');
    }
