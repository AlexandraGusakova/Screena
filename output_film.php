<?php

    error_reporting( E_ERROR );
    
    $city_id = 1;
    $date = date('Y-m-d');


    include ("data_layer/film_provider.php");
    include ("data_layer/data_access_layer.php");

    $film = new FilmProvider;
    $film = FilmProvider::getFilm($film_id, $city_id, $date);

    var_dump($film);

?>
