<?php
    $city_id = 1;
    $date = date('Y-m-d');
    $film_id = 1;
    
    include ("data_layer/film_provider.php");
    include ("data_layer/data_access_layer.php");
    
    $film = new FilmProvider;
    $film = FilmProvider::getFilm($film_id, $city_id, $date);
    
    var_dump($film);

?>
