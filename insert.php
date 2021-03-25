<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Movie</title>
    <link href="./assets/style/insert.css" rel="stylesheet">
    <link href="./assets/style/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

</head>
<?php
include_once('./class/movie.php');
$movie = new Movie();
$artist = $movie->get_artist();

if (isset($_GET['success'])) {
    $is_success = $_GET['success'] == "1" ? true : false;

    if ($is_success)
        echo "<script> alert('Movie successfully inputed!')</script>";
    else
        echo "<script> alert('Error while trying to input!')</script>";
}
?>

<body>
    <div id="navbar"></div>
    <div class="container">
        <form method="POST" action="insert_process.php" enctype="multipart/form-data">
            <div class="group">
                <label>Judul</label>
                <input type="text" name="judul" require>
            </div>

            <div class="group">
                <label>Poster</label>
                <div class="group-upload" id="photo-group">
                    <div class="input__group">
                        <input type="file" id="file-poster" name="poster" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="group">
                <label>Character</label>
                <div class="group-pemain">
                    <div class="group-select-nama">
                        <select id="nama-pemain">
                            <?php foreach ($artist as $key => $value) { ?>
                                <option value='<?php echo $value['id'] ?>' data-name="<?php echo $value['name'] ?>" data-id="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="group-select-nama">
                        <input type="text" id="chara-name" placeholder="Character Name">
                    </div>
                    <div class=" group-select-peran">
                        <select id="peran-pemain">
                            <option value="Main">Main</option>
                            <option value="Supporting">Supporting</option>
                            <option value="Cameo">Cameo</option>
                        </select>
                    </div>
                </div>
                <a style="margin-bottom: 20px" href="addartist.php">Don't see Artist name? Add Here!</a>
                <div style="margin: 0 auto;">
                    <button type='button' id='btntambahpemain'>Add Character</button>
                </div>
            </div>

            <div class="group table hidden">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Character</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="pemaintable">
                    </tbody>
                </table>
            </div>

            <div class="group">
                <label>Release Date</label>
                <input type="date" name="rilis" require>
            </div>


            <div class="group">
                <label>Rating</label>
                <input type="number" step="0.1" name="skor" max="10" min="0" require>
            </div>

            <div class="group">
                <label>Synopsis</label>
                <textarea name="sinopsis" require></textarea>
            </div>

            <div class="group">
                <span><label>Serial</label> <input type="checkbox" name="serial"></span>
            </div>
            <label>Genre</label>
            <div class="group-checkbox">
                <?php
                foreach ($movie->get_genre() as $key => $row) {
                ?>
                    <div class="check__container">
                        <input id="check-<?php echo $row['id'] ?>" type="checkbox" value="<?php echo $row['id'] ?>" name="genre[]">
                        <label for="check-<?php echo $row['id'] ?>"><?php echo $row['name'] ?></label>
                    </div>
                <?php }
                ?>
            </div>
            <div class="button-submit">
                <button value="submit" name="btn_submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script>
        $('#pemaintable').on('click', '.removenama', function() {
            $(this).parent().parent().remove();
        })

        $("#btntambahpemain").on('click', function() {
            const nama = $('#nama-pemain').find(":selected").data("name");
            const charaName = $('#chara-name').val();
            const peran = $("#peran-pemain").val();
            const idNama = $('#nama-pemain').find(":selected").data("id");
            $('.table').removeClass("hidden");
            $("#pemaintable").append(
                `
            <tr>
                <td style="text-align:center;">${nama}</td>
                <td style="text-align:center;"><input type="text" name="charaname[]" value="${charaName}"></td>
                <td style="text-align:center;"><select type='hidden' name='peran[]'>
                    <option value="Utama" ${peran == 'Utama' ? "selected" : ""}>Utama</option>
                    <option value="Pembantu" ${peran == 'Pembantu' ? "selected" : ""}>Pembantu</option>
                    <option value="Cameo" ${peran == 'Cameo' ? "selected" : ""}>Cameo</option>
                </select></td>
                <td style="text-align:center;"><button type='button' class='removenama'>Remove</button></td>
                <input type='hidden' name='idpemain[]' value = '${idNama}'>
            </tr>
            `
            )
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
    </script>
</body>

</html>