<?php
include_once('./class/movie.php');
$mv = new Movie();
if (isset($_POST['btn_submit'])) {
    $judul = $_POST['judul'];
    $rilis = date("Y-m-d", strtotime($_POST['rilis']));
    $skor = $_POST['skor'];
    $sinopsis = $_POST['sinopsis'];
    $serial = isset($_POST['serial']) ? 1 : 0;
    $genre = $_POST['genre'];
    $photo = $_FILES['poster'];
    $pemain = $_POST['idpemain'];
    $pemain_peran = $_POST['peran'];
    $pemain_karakter = $_POST['charaname'];

    $file_info = getimagesize($photo['tmp_name']);

    if (empty($file_info) || $photo['error'] != 0) {
        $_SESSION['input_sukses'] = false;
        header("location: insert.php");
        exit();
    }

    $movie_id = $mv->insert_movie($judul, $sinopsis, $skor, $rilis, $serial);


    $date_now = new DateTime();
    $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
    $pht_name = str_replace(" ", '-', $judul) . '-' . strtotime($date_now->format('Y-m-d H:i:sP')) . "." . $ext;
    move_uploaded_file($photo['tmp_name'], 'upload/poster/' . $pht_name);
    $mv->update_photo($movie_id, $pht_name);


    foreach ($genre as $id_genre) {
        $mv->insert_genre_movie($movie_id, $id_genre);
    }

    foreach ($pemain as $key => $value) {
        $mv->insert_chara_movie((int)$value, $movie_id, $pemain_karakter[$key], $pemain_peran[$key]);
    }
}
