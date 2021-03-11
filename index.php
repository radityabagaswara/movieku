<?php
session_start();

if (isset($_SESSION['input_sukses'])) {
    if ($_SESSION['input_sukses']) {
        echo "<script>alert('Data berhasil diinputkan!')</script>";
    } else {
        echo "<script>alert('Data TIDAK berhasil diinputkan!')</script>";
    }
}

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    <link href="./assets/style/style.css" rel="stylesheet">
</head>
<?php
?>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar__container container__content">
                <div style="text-align: center;">
                    <h3>Movie Ku</h3>
                </div>
                <div class="nav">
                    <div class="nav__item">
                        <a href="">Daftar Movie</a>
                    </div>

                    <div class="nav__item">
                        <a href="">Daftar Pemain</a>
                    </div>

                    <div class="nav__item">
                        <a href="">Daftar Genre</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container__wrapper">
            <div class="container__content">
                <div class="top__table">
                    <div class="search">
                        <form method="POST">
                            <input type="text" name="search_judul" placeholder="Judul Movie">
                            <button type="submit" class="btn-secondary" style="margin-left: 10px;" name="submit_search" value="submit">Search</button>
                        </form>
                    </div>
                    <div>
                        <a class="btn-secondary" href="insert.php">Tambah Movie</a>
                    </div>
                </div>
                <h3 style="color: #fff; letter-spacing: 0.2em; padding-top:120px ">Welcome User!</h3>
                <div class="card">
                    <p style="color: #302a2a">Movie List</p>
                </div>
                <footer>
                    <div>
                        <p>© Copyright 2021 Raditya Bagaswara</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script>
    </script>
</body>

</html>