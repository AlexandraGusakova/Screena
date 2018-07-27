<?php
    $city = new FilmProvider;
    $city = FilmProvider::getCity();

    for ($i = 0; $i < count($city); ++$i){
        echo '<li class="city-item" name="city" value="'.$city[$i][0].'">
                    '.$city[$i][1].'
                </li>';
    }
?>
