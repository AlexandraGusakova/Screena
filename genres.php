<?php

    $genres = new FilmProvider;
    $genres = FilmProvider::getGenres();

    for ($i = 0; $i < count($genres); ++$i){
        echo '
                 <li class="genre" name="genre" value="'.$genres[$i][0].'">
                    '.$genres[$i][1].'
                </li>

                 ';
    }
?>
