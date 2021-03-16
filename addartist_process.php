<?php
require_once('./class/movie.php');
$movie = new Movie();
if (isset($_POST['btn_submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $file = $_FILES['photo'];

    $file_info = getimagesize($file['tmp_name']);

    if (empty($file_info)) {
        header('location: addartist.php');
        exit();
    }

    $date_now = new DateTime();
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $pht_name = $name . '-' . strtotime($date_now->format('Y-m-d H:i:sP')) . "." . $ext;
    $pht_name = str_replace(" ", '-', $pht_name);
    move_uploaded_file($file['tmp_name'], 'upload/artist/' . $pht_name);

    $movie->add_artist($name, $gender, $pht_name);

    header('location: addartist.php');
}
