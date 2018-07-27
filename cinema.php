<?php
    $city = "Минск";

    $cinema = new FilmProvider;
    $cinema = FilmProvider::getCinemas($city);

    for ($i = 0; $i < count($cinema); ++$i){
        echo '
                 <li name="cinema" value="'.$cinema[$i][0].'">
                    '.$cinema[$i][1].'
                </li>
                 ';
    }
?>
