<?php
require_once('./class/movie.php');
$movie = new Movie();
if (isset($_POST['btn_submit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $photo = !empty($_FILES['poster']) ? $_FILES['poster'] : null;
    $rilis = $_POST['rilis'];
    $serial = isset($_POST['serial']) ? 1 : 0;
    $rating = $_POST['skor'];
    $synopsis = $_POST['sinopsis'];
    $pemain = $_POST['idpemain'];
    $pemain_peran = $_POST['peran'];
    $pemain_karakter = $_POST['charaname'];
    $genre = $_POST['genre'];

    //DELETE GENRE FIRST
    Movie::delete_genre_movies($id);

    //DELETE ARTIST
    Movie::delete_artist_movies($id);

    //INPUT GENRE
    foreach ($genre as $id_genre) {
        Movie::insert_genre_movie($id, (int)$id_genre);
    }

    //INPUT CHARA
    foreach ($pemain as $key => $value) {
        Movie::insert_chara_movie((int)$value, $id, $pemain_karakter[$key], $pemain_peran[$key]);
    }
    $pht_name = null;
    if ($photo != null) {

        $date_now = new DateTime();
        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $pht_name = str_replace(" ", '-', $judul) . '-' . strtotime($date_now->format('Y-m-d H:i:sP')) . "." . $ext;
        move_uploaded_file($photo['tmp_name'], 'upload/poster/' . $pht_name);
        Movie::update_photo($id, $pht_name);
    }


    $success = Movie::update_movie($id, $judul, $synopsis, $rating, $rilis, $serial, $pht_name);

    header("location: edit.php?movie=$id&success=$success");
}
