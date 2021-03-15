<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex List</title>
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
    }

    .movie-detail {
        background-color: white;
        border-radius: 7px;
        width: 100%;
        height: 200px;
        margin: 10px;
        display: inline-flex;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }

    .item-text {
        color: #276291;
        margin: 20px;
        font-family: "ABeeZee", "Helvetica Neue", sans-serif;
    }

    .small-font {
        color: #a1aac1;
    }

    h5 {
        color: black;
    }

    .space-margin {
        width: max-content;
        height: 70px;
        color: black;
    }

    .nav-search {
        background-color: #00619d;
        top: 0;
        width: 100%;
        height: 60px;
        overflow: hidden;
        position: fixed;
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
                <img style="width: 250px; height: 200px; border-radius: 7px;" src="https://www.thefastsaga.com/images/main_content_f9_keyart-m.jpg" alt="">
            </div>
            <div class="item-text">
                <h3>The Fast Saga</h3>
                <h4><span class="small-font">Action, Komedi, Racing</span></h4>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam amet accusamus nam nemo? Provident reprehenderit in temporibus. Blanditiis eligendi ratione placeat nesciunt pariatur beatae repudiandae tenetur facilis labore hic repellendus doloremque voluptatibus, fugiat consectetur expedita animi velit veniam? Mollitia illum minus eius error modi architecto quis nesciunt velit fugiat.</h5>
            </div>
        </div>
        <div class="movie-detail">
            <div class="item-gambar">
                <img style="width: 250px; height: 200px; border-radius: 7px;" src="https://images.moviesanywhere.com/4e4d8fbfe2c5a2b44fc779adf2e42856/465818fc-ff66-41ba-92e8-623a0c767244.jpg" alt="">
            </div>
            <div class="item-text">
                <h3>The Fast Of The Furious</h3>
                <h4><span class="small-font">Action, Komedi, Racing</span></h4>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam amet accusamus nam nemo? Provident reprehenderit in temporibus. Blanditiis eligendi ratione placeat nesciunt pariatur beatae repudiandae tenetur facilis labore hic repellendus doloremque voluptatibus, fugiat consectetur expedita animi velit veniam? Mollitia illum minus eius error modi architecto quis nesciunt velit fugiat.</h5>
            </div>
        </div>
        <div class="movie-detail">
            <div class="item-gambar">
                <img style="width: 250px; height: 100%; border-radius: 7px;" src="https://pgsramblings.files.wordpress.com/2015/08/fast-furious-7.jpg" alt="">
            </div>
            <div class="item-text">
                <h3>Fast & Furious 7</h3>
                <h4><span class="small-font">Action, Komedi, Racing</span></h4>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo unde necessitatibus a impedit sunt minima hic ipsam laborum. Assumenda nesciunt esse et vitae expedita iure quasi. Labore, enim repudiandae ullam molestiae accusamus excepturi. Labore aliquid dicta, ducimus quae nisi ab cumque accusamus reprehenderit nesciunt perspiciatis corrupti distinctio mollitia adipisci provident?</h5>
            </div>
        </div>
    </div>
    <!--  -->
</body>

</html>