<?php
    // include ("data_layer/film_provider.php");
    // include ("data_layer/data_access_layer.php");
    //error_reporting( E_ERROR );

    $city = "Минск";
    $date = date('Y-m-d');
    $genre = "мультфильм";

    $films = new FilmProvider;
    $films = FilmProvider::getAfishaFilms($date, $city);

    $films_by_city = new FilmProvider;
    $films_by_city = FilmProvider::getFilmsByCity($city, $films, $date);

    $films_by_genre = new FilmProvider;
    $films_by_genre = FilmProvider::getFilmsByGenre($genre, $films_by_city);

    $premiere = new FilmProvider;
    $premiere = FilmProvider::getPremiere($city, $films, $date);

    for ($i = 0; $i < count($films); ++$i){
        $film_id = $films[$i]["film_id"];
        echo '
                 <li class="movie-item">
                     <a href="film.php?film_id='.$film_id.'"><img class="movie_poster" src="'.$films[$i]["poster"].'" /></a><br />
                     <a href="film.php?film_id='.$film_id.'"><span class="name_film">'.$films[$i]["name"].'</span><br /></a>';
                         for ($j = 0; $j < count($films[$i]["genres"]); ++$j){
                             // var_dump($films[$i]["genres"][$j][0]);
                             echo '<span class="genre_film">'.$films[$i]["genres"][$j][0].", " ;
                         }
                     echo '</span>
                     <span class="date_film">до '.$films[$i]["end_show"].'</span>
                </li>

                 ';
    }
?>
