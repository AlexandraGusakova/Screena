<?php
    include ("data_layer/film_provider.php");
    include ("data_layer/data_access_layer.php");
    
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
    $premiere = FilmProvider::getPremiere($city, $films, $today_date);

    var_dump($premiere);
    
    var_dump($films_by_genre);
?>
