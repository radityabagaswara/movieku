<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_GET['movie'])) {
    header('location: index.php');
    exit();
}
include_once('./class/movie.php');

$mv_id = $_GET['movie'];

$mv = new Movie();
$selected = Movie::get_movie($mv_id);
if (!$selected) {
    header('location: index.php');
    exit();
}

$synopsis = $selected['synopsis'];
$is_large = strlen($synopsis) > 500;
$synopsis_small = substr($synopsis, 0, 499);
$synopsis_large = $is_large ? substr($synopsis, 499, strlen($synopsis)) : "";

$chara = Movie::get_movie_chara($mv_id);
$genre = Movie::get_movie_genre($mv_id);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="./assets/style/style.css" rel="stylesheet">
    <link href="./assets/style/movie.css" rel="stylesheet">
    <title><?php echo $selected['name'] ?> - MovieKu</title>
</head>


<body>
    <div id="navbar"></div>
    <div class="container movie">
        <div class="back">
            <a class="btn btn-secondary" onclick="back()">
                ⬅ Back
            </a>
        </div>
        <div class="movie__header">
            <h3><?php echo $selected["name"] ?></h3>
            <hr>
        </div>
        <div class="movie__wrapper">
            <div class="movie__sidebar">
                <div class="text-center">
                    <img src="upload/poster/<?php echo $selected['poster'] ?>" alt="poster">
                </div>
                <div class="movie__detail sticky mt-2 box-shadow">
                    <h3>Detail</h3>
                    <ul>
                        <li><strong>Judul</strong> <span><?php echo $selected["name"] ?></span></li>
                        <li><strong>Tanggal Rilis</strong><span><?php echo $selected["release_date"] ?></span></li>
                        <li><strong>Skor</strong> <span><?php echo $selected["rating"] ?></span></li>
                        <li><strong>Genre</strong><?php echo implode(", ", $genre) ?> <span></span>
                        </li>
                        <li><strong>Tipe</strong> <span><?php echo $selected["is_serial"] ? "Serial" : "Movie" ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="movie__content">
                <div class="movie__info__small text-center m-auto box-shadow">
                    <div class="movie__info__small__content">
                        <h3>Rating</h3>
                        <p>
                            <span>
                                <strong style="font-size: 22px"><?php echo $selected["rating"] ?></strong><small>/10</small>
                            </span>
                        </p>
                    </div>
                    <div class="movie__info__small__content">
                        <h3>Tipe</h3>
                        <p><?php echo $selected["is_serial"] ? "Serial" : "Movie" ?></p>
                    </div>
                    <div class="movie__info__small__content ">
                        <h3>Rilis</h3>
                        <p><?php echo $selected["release_date"] ?></p>
                    </div>
                </div>
                <div class="movie__box box-shadow">
                    <div class="movie__box__header">
                        <h3>Sinopsis</h3>
                        <p class="text-justify">
                            <?php echo $is_large ? "$synopsis_small <span id='readmore' class='sinopsis__readmore'><a>...Read more</a></span>
                            <span id='sinopsis-toggle' class='sinopsis__toggle'>$synopsis_large</span>
                            " : $synopsis ?>

                        </p>
                    </div>
                </div>
                <div class="mt-3">
                    <h3>Pemain</h3>
                    <div class="movie__pemain__wrapper">
                        <?php
                        foreach ($chara as $key => $value) { ?>
                            <div class="movie__pemain__card box-shadow">
                                <div class="movie__pemain__image">
                                    <img src="upload/artist/<?php echo $value['artist_photo'] ?>">
                                </div>
                                <div class="movie__pemain__detail">
                                    <ul>
                                        <h4><?php echo $value['character_name'] ?></h4>
                                        <li><strong>Pemain</strong><span><?php echo $value['artist_name'] ?></span></li>
                                        <li><strong>Peran</strong><span><?php echo $value['character_role'] ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#readmore').on('click', function() {
            $('#readmore').toggleClass("toggled");
            $('#sinopsis-toggle').toggleClass("toggled");
        })
    </script>
    <div id="foot"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#navbar").load("navbar.html");
            $('#foot').load('footer.html')
            window.scrollTo(0, 0);
        });

        function back() {
            history.back();
        }
    </script>
</body>

</html>