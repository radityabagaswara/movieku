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

if (isset($_GET['success'])) {
    if ($_GET['success'] == '1')
        echo "<script>alert('Data Deleted!')</script>";
    else
        echo "<script>alert('ERROR! while deleting data.')</script>";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/style/style.css" rel="stylesheet">
    <link href="./assets/style/list.css" rel="stylesheet">
    <title>Admin - MovieKu</title>
</head>

<body>
    <div id="navbar"></div>
    <div class="container">
        <div class="mt-1 mb-3">
            <h3>Admin</h3>
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
        <div class="admin-controll mb-3 text-right">
            <a class="btn btn-secondary" href="insert.php">Add Movie</a>
            <a class="btn btn-secondary" href="addartist.php">Add Artist</a>
            <a class="btn btn-secondary" href="addgenre.php">Add Genre</a>
        </div>
        <div class="list__wrapper">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Realase Date</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><img src="upload/poster/<?php echo $value['poster'] ?>" width=100px></td>
                            <td><?php echo $value['name'] ?></td>
                            <td class="text-center"><?php echo $value['release_date'] ?></td>
                            <td><?php echo implode(", ", Movie::get_movie_genre($value['id'])) ?></td>
                            <td class="text-center"><a class="btn btn-primary" href="edit.php?movie=<?php echo $value['id'] ?>" target="_blank">Edit</a><a class="btn btn-danger ml-1" href="delete.php?movie=<?php echo $value['id'] ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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