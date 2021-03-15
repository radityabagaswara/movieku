<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/style/style.css" rel="stylesheet">
    <link href="./assets/style/grid.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h3>Explore Movie</h3>
            <form>
                <div class="input-group mt-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><svg width="25" height="25" class="svgIcon-use" viewBox="0 0 25 25" data-children-count="0">
                                <path d="M20.067 18.933l-4.157-4.157a6 6 0 10-.884.884l4.157 4.157a.624.624 0 10.884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path>
                            </svg></span>
                    </div>
                    <input placeholder="Search your movie..." class="search" />
                </div>
            </form>
        </div>
        <div class="page-header">
            <h3>For You!</h3>
        </div>
        <div class="grid__wrapper">
            <div class="item__wrapper">
                <a href="movie.php">
                    <div class="item__content__image">
                        <div class="item__image">
                            <img src="https://media.kitsu.io/anime/poster_images/8736/large.jpg">
                        </div>
                        <div class="item__synopsis">
                            <div class="item__synopsis__content text-center">
                                <h4>Owari no Seraph</h4>
                                <small>2016</small>
                                <p>With the appearance of a mysterious virus that kills everyone above the age of 13, mankind becomes enslaved by previously hidden, power-hungry vampires who emerge...</p>
                            </div>
                        </div>
                    </div>
                    <div class="item__content text-center">
                        <h4>Owari no Seraph</h4>
                        <small>Action, Military, Supernatural</small>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>

</html>