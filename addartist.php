<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist - MovieKu</title>
    <link href="./assets/style/insert.css" rel="stylesheet">
    <link href="./assets/style/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

</head>

<body>
    <div id="navbar"></div>
    <div class="container">
        <form method="POST" action="addartist_process.php" enctype="multipart/form-data">
            <div class="group">
                <label>Name</label>
                <input type="text" name="name" require>
            </div>

            <div class="group">
                <label>Image</label>
                <div class="group-upload" id="photo-group">
                    <div class="input__group">
                        <input type="file" name="photo" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="group">
                <label>Gender</label>
                <div class="group-pemain">
                    <div class=" group-select-peran">
                        <select id="gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="button-submit">
                <button value="submit" name="btn_submit" type="submit">Submit</button>
            </div>
        </form>
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