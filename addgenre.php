<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Genre Movie</title>
    <link href="./assets/style/insert.css" rel="stylesheet">
    <link href="./assets/style/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

</head>

<body>
    <div class="container">
        <form method="POST" action="addgenre_process.php" enctype="multipart/form-data">
            <div class="group" id="genre-list">
                <label>Genre Name</label>
                <input type="text" name="genre[]" require>
            </div>
            <button class="btn" id="add-more" type="button">Add More</button>

            <div class="button-submit">
                <button value="submit" name="btn_submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script>
        $('#pemaintable').on('click', '.removenama', function() {
            $(this).parent().parent().remove();
        })
        $('#add-more').on('click', function() {
            $("#genre-list").append(`            
            <div class="group">
                <label>Genre Name</label>
                <input type="text" name="genre[]" require>
            </div>`)
        })
    </script>
</body>

</html>