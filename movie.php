<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="./assets/style/style.css" rel="stylesheet">
    <link href="./assets/style/movie.css" rel="stylesheet">
    <title>Owari no Seraph - Movie Ku</title>
</head>

<body>
    <div class="container movie">
        <div class="movie__header">
            <h3>Owari no Seraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <hr>
        </div>
        <div class="movie__wrapper">
            <div class="movie__sidebar">
                <div class="text-center">
                    <img src="https://media.kitsu.io/anime/poster_images/8736/large.jpg?1597697638" alt="poster">
                </div>
                <div class="movie__detail sticky mt-2 box-shadow">
                    <h3>Detail</h3>
                    <ul>
                        <li><strong>Judul</strong> <span>Owari no Seraph</span></li>
                        <li><strong>Tanggal Rilis</strong><span>Apr 4, 2015</span></li>
                        <li><strong>Skor</strong> <span>9.5</span></li>
                        <li><strong>Genre</strong> <span>Action, Military, Supernatural, Drama, Vampire, Shounen</span>
                        </li>
                        <li><strong>Tipe</strong> <span>Serial</span></li>
                    </ul>
                </div>
            </div>
            <div class="movie__content">
                <div class="movie__info__small text-center m-auto box-shadow">
                    <div class="movie__info__small__content">
                        <h3>Rating</h3>
                        <p>
                            <span>
                                <strong style="font-size: 22px">9.5</strong><small>/10</small>
                            </span>
                        </p>
                    </div>
                    <div class="movie__info__small__content">
                        <h3>Tipe</h3>
                        <p>Serial</p>
                    </div>
                    <div class="movie__info__small__content ">
                        <h3>Rilis</h3>
                        <p>2017</p>
                    </div>
                </div>
                <div class="movie__box box-shadow">
                    <div class="movie__box__header">
                        <h3>Sinopsis</h3>
                        <p class="text-justify">With the appearance of a mysterious virus that kills everyone above the
                            age of 13, mankind becomes enslaved by previously hidden, power-hungry vampires who emerge
                            in order to subjugate society with the promise of protecting the survivors, in exchange for
                            donations of their blood.
                            <span id="readmore" class="sinopsis__readmore"><a>Read more...</a></span><span id="sinopsis-toggle" class="sinopsis__toggle">Many years later, now a member of the
                                Japanese Imperial Demon Army, Yuuichirou is determined to take revenge on the creatures
                                that slaughtered his family, but at what cost?
                                Among these survivors are Yuuichirou and Mikaela Hyakuya, two young boys who are taken
                                captive from an orphanage, along with other children whom they consider family.
                                Discontent with being treated like livestock under the vampires' cruel reign, Mikaela
                                hatches a rebellious escape plan that is ultimately doomed to fail. The only survivor to
                                come out on the other side is Yuuichirou, who is found by the Moon Demon Company, a
                                military unit dedicated to exterminating the vampires in Japan.
                                Owari no Seraph is a post-apocalyptic supernatural shounen anime that follows a young
                                man's search for retribution, all the while battling for friendship and loyalty against
                                seemingly impossible odds.</span>
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                    <h3>Pemain</h3>
                    <div class="movie__pemain__wrapper">
                        <div class="movie__pemain__card box-shadow">
                            <div class="movie__pemain__image">
                                <img src="https://media.kitsu.io/characters/images/53576/original.jpg?1483096805">
                            </div>
                            <div class="movie__pemain__detail">
                                <ul>
                                    <h4>Shinoa Hiiragi</h4>
                                    <li><strong>Pemain</strong><span>Hayami Saori</span></li>
                                    <li><strong>Peran</strong><span>Cameo</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="movie__pemain__card box-shadow">
                            <div class="movie__pemain__image">
                                <img src="https://media.kitsu.io/characters/images/53576/original.jpg?1483096805">
                            </div>
                            <div class="movie__pemain__detail">
                                <ul>
                                    <h4>Shinoa Hiiragi</h4>
                                    <li><strong>Pemain</strong><span>Hayami Saori</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="movie__pemain__card box-shadow">
                            <div class="movie__pemain__image">
                                <img src="https://media.kitsu.io/characters/images/53576/original.jpg?1483096805">
                            </div>
                            <div class="movie__pemain__detail">
                                <ul>
                                    <h4>Shinoa Hiiragi</h4>
                                    <li><strong>Pemain</strong><span>Hayami Saori</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="movie__pemain__card box-shadow">
                            <div class="movie__pemain__image">
                                <img src="https://media.kitsu.io/characters/images/53576/original.jpg?1483096805">
                            </div>
                            <div class="movie__pemain__detail">
                                <ul>
                                    <h4>Shinoa Hiiragi</h4>
                                    <li><strong>Pemain</strong><span>Hayami Saori</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="movie__pemain__card box-shadow">
                            <div class="movie__pemain__image">
                                <img src="https://media.kitsu.io/characters/images/53576/original.jpg?1483096805">
                            </div>
                            <div class="movie__pemain__detail">
                                <ul>
                                    <h4>Shinoa Hiiragi</h4>
                                    <li><strong>Pemain</strong><span>Hayami Saori</span></li>
                                </ul>
                            </div>
                        </div>
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
</body>

</html>