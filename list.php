<!DOCTYPE html>
<html lang="en">
<?php
include_once("./class/movie.php");

$m = new Movie();
$data_per_page = 5;

$total_page = !isset($_GET['search']) ? Movie::get_total_page($data_per_page) : Movie::get_total_page($data_per_page, $_GET['search']);
$current = isset($_GET['page']) ? $_GET['page'] : 1;
$prev = $current - 1;
$next = $current + 1;

$data_start = $current > 1 ? ($current * $data_per_page) - $data_per_page : 0;
$data = Movie::get_movies_list($data_start, $data_per_page);

if (isset($_GET['search'])) {
    $data = Movie::search_movie($_GET['search'], $data_start, $data_per_page);
}

if (isset($_POST['search'])) {
    header("location: ?search=" . $_POST['search']);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/style/style.css" rel="stylesheet">
    <link href="./assets/style/list.css" rel="stylesheet">
    <title>MovieKu - Database Film dari semua negara!</title>
</head>

<body>
    <div id="navbar"></div>
    <div class="container">
        <div class="views">
            <ul>
                <span>Views</span>
                <li><a href="index.php"><img src="https://img.icons8.com/metro/26/000000/activity-grid-2.png"></a></li>
                <li><a href="list.php"><img src="https://img.icons8.com/metro/26/5c4ac7/list.png"></a></li>
            </ul>
        </div>
        <div class="mt-3 mb-3">
            <h3>Explore Movie</h3>
            <form method="POST">
                <div class="input-group mt-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <svg width="25" height="25" class="svgIcon-use" viewBox="0 0 25 25" data-children-count="0">
                                <path d="M20.067 18.933l-4.157-4.157a6 6 0 10-.884.884l4.157 4.157a.624.624 0 10.884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path>
                            </svg>
                        </span>
                    </div>
                    <input placeholder="Search your movie..." class="search form-control" name="search" />
                    <small>Press enter to search</small>
                </div>
            </form>
        </div>
        <div class="list__wrapper">
            <?php
            foreach ($data as $key => $value) { ?>
                <div class=" item__wrapper box-shadow">
                    <div class="item__image">
                        <img src="upload/poster/<?php echo $value['poster'] ?>">
                    </div>
                    <div class="item__detail">
                        <h3><a href="detail.php?movie=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h3><small class="score"> *<?php echo $value['rating'] ?></small>
                        <p class="year"><?php echo $value['release_date'] ?></p>
                        <p class="" style="margin-bottom: -5px;"><?php echo substr($value['synopsis'], 0, 500) ?>...</p>
                        <p style="font-size: 14px; margin-bottom:20px;"><?php echo implode(", ", Movie::get_movie_genre($value['id'])) ?></p>
                        <div class="">
                            <a class="btn btn-primary" href="detail.php?movie=<?php echo $value['id'] ?>">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="pagination">
            <ul class="page">
                <?php
                $url = '?page=';

                if (isset($_GET['search'])) {
                    $url = "?search=" . $_GET['search'] . "&page=";
                }

                if ($current < 6)
                    $minus = $current - ($current - 1);
                else {
                    $minus = $current - 5;
                    echo '<li><a href="' . $url  . '1">1</a></li><li><a>...</a></li>';
                }

                $max = $current + 5;

                if ($max > $total_page)
                    $max = $total_page;

                if ($current > 1)
                    echo "<li><a href='?page=" . $prev . "'> < </a></li>";

                for ($i = $minus; $i <= $max; $i++) { ?>
                    <li class="<?php echo $current == $i ? "active" : "" ?>"><a href="<?php echo $url . $i ?>"><?php echo $i ?></a></li>
                <?php }
                if ($total_page > 1) {
                ?>
                    <?php
                    if ($current != $total_page) { ?>
                        <li><a href='<?php echo $url . $next ?>'>></a></li>
                    <?php } ?>
                    <li>
                        <a>...</a>
                    </li>

                    <li><a href="<?php echo $url . $total_page ?>"><?php echo $total_page ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div id="foot"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#navbar").load("navbar.html");
            $('#foot').load('footer.html')
            window.scrollTo(0, 0);
        });
    </script>
</body>

</html>