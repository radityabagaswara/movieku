<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex Grid</title>
</head>
<style>
    body {
        margin: 0;
        background-color: #e9eaed;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        box-sizing: border-box;
        /* align-items: center; */
    }

    .movie-detail {
        background-color: white;
        border-radius: 7px;
        width: 250px;
        height: 500px;
        margin: 20px;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
        /* box-shadow:.5px .5px 2px 1px rgba(0,0,0,.32); */
    }

    .item-gambar {
        text-align: center;
    }

    .item-text {
        text-align: center;
        color: #276291;
        font-size: 25px;
        margin-top: 6%;
        font-family: "ABeeZee", "Helvetica Neue", sans-serif;
    }

    .small-font {
        color: #a1aac1;
    }

    h4,
    h6 {
        margin: 0;
    }

    .nav-search {
        background-color: #00619d;
        top: 0;
        width: 100%;
        height: 60px;
        overflow: hidden;
        position: fixed;
    }

    .space-margin {
        width: max-content;
        height: 70px;
        color: black;
    }
</style>

<body>
    <!-- Navbar -->
    <div class="nav">
        <div class="nav-search">
            <form method="GET" enctype="multipart/form-data" action="index.php">
                <div class="search-container">
                    <label>Masukan Judul : </label>
                    <input type="text" name="cari" autofocus>
                    <input type="submit" name="btnsearch" value="Search">
                </div><br>
            </form>
        </div>
    </div>
    <div class="space-margin">

    </div>
    <!--  -->

    <!-- Isi Movie -->
    <div class="container">
        <div class="movie-detail">
            <div class="item-gambar">
                <img style="width: 100%; height: 400px; border-radius: 7px 7px;" src="https://www.thefastsaga.com/images/main_content_f9_keyart-m.jpg" alt="">
            </div>
            <div class="item-text">
                <h4>The Fast Saga</h4>
                <h6><span class="small-font">Action, Komedi, Racing</span></h6>
            </div>
        </div>
        <div class="movie-detail">
            <div class="item-gambar">
                <img style="width: 100%; height: 400px; border-radius: 7px 7px;" src="https://images.moviesanywhere.com/4e4d8fbfe2c5a2b44fc779adf2e42856/465818fc-ff66-41ba-92e8-623a0c767244.jpg" alt="">
            </div>
            <div class="item-text">
                <h4>The Fate Of The Furious</h4>
                <h6><span class="small-font">Action, Komedi, Racing</span></h6>
            </div>
        </div>
        <div class="movie-detail">
            <div class="item-gambar">
                <img style="width: 100%; height: 400px; border-radius: 7px 7px;" src="https://pgsramblings.files.wordpress.com/2015/08/fast-furious-7.jpg" alt="">
            </div>
            <div class="item-text">
                <h4>Fast & Furious 7</h4>
                <h6><span class="small-font">Action, Komedi, Racing</span></h6>
            </div>
        </div>
        <div class="movie-detail">
            <div class="item-gambar">
                <img style="width: 100%; height: 400px; border-radius: 7px 7px;" src="https://images.moviesanywhere.com/0d8385198e30c6ac086b643c6a13ab50/0baff3aa-3327-4e33-9546-600bea206acf.jpg" alt="">
            </div>
            <div class="item-text">
                <h4>Tokyo Drift</h4>
                <h6><span class="small-font">Action, Komedi, Racing</span></h6>
            </div>
        </div>
        <div class="movie-detail">
            Oke
        </div>
        <div class="movie-detail">
            Oke
        </div>
        <div class="movie-detail">
            Oke
        </div>
        <div class="movie-detail">
            Oke
        </div>
        <div class="movie-detail">
            Oke
        </div>
        <div class="movie-detail">
            Oke
        </div>
        <div class="movie-detail">
            Oke
        </div>
        <div class="movie-detail">
            Oke
        </div>
    </div>
    <!--  -->
</body>

</html>