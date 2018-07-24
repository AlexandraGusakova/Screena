<?php
    class FilmProvider{
        
        public static function getAfishaFilms($date){
            $obj = new DatabaseAccess;
            $obj = DatabaseAccess::displayAfishaFilms($date);
            
            for ($i = 0; $i < count($obj); ++$i){
                
                $films [$obj[$i][0]] = [
                            "film_id" => $obj[$i][0],
                            "name" => $obj[$i][1],
                            "end_show" => $obj[$i][2],
                            "description" => $obj[$i][3],
                            "poster" => $obj[$i][4],
                            "city" => $obj[$i][5],
                            "cinema" => $obj[$i][6],
                            "premiere" => $obj[$i][7],
                            "genres" => $obj[$i][8]
                        ];
            }
//            var_dump($films);
            return $films;
        }
        
        public static function getFilmsByCity($city, $films, $date){
            for($i = 1; $i <= count($films); ++$i){
                if (array_keys($films[$i], $city) && $films[$i]['premiere'] < $date){
                    $films_by_city[] = $films[$i];
                }   
            }          
            krsort($films_by_city);
            return $films_by_city;
        }
        
        public static function getFilmsByGenre($genre, $films){
            for($i = 0; $i < count($films); ++$i){
                for($j = 0; $j < count($films[$i]['genres']); ++$j){
                    if (array_keys($films[$i]['genres'][$j], $genre)){
                        $films_by_genre[] = $films[$i];
//                        var_dump($films_by_genre);
                    }
                }   
            }
            krsort($films_by_genre);
            //var_dump($films_by_genre);
            return $films_by_genre;
        }
        
        public static function getPremiere($city, $films, $today_date){
           
            for($i = 1; $i <= count($films); ++$i){
                if ($films[$i]['premiere'] > $today_date){
                    $premiere[] = $films[$i];
                }   
            }          
            krsort($premiere);
            return $premiere;
        }
        
        public static function getFilm($film_id, $city_id, $date){
            $obj = new DatabaseAccess;
            $obj = DatabaseAccess::displayFilm($film_id, $city_id, $date);
            
            $director = new FilmProvider;
            $director = FilmProvider::findField($obj[2], "режиссер");
            
            $producer = new FilmProvider;
            $producer = FilmProvider::findField($obj[2], "продюсер");
            
            $writer = new FilmProvider;
            $writer = FilmProvider::findField($obj[2], "сценарист");
            
            $actor = new FilmProvider;
            $actor = FilmProvider::findField($obj[2], "актёр");
            
            $main_poster = new FilmProvider;
            $main_poster = FilmProvider::findField($obj[4], "main");
            
            $stills = new FilmProvider;
            $stills = FilmProvider::findField($obj[4], "stills");
            
            $main_trailer = new FilmProvider;
            $main_trailer = FilmProvider::findField($obj[5], "main");
            
            $trailers = new FilmProvider;
            $trailers = FilmProvider::findField($obj[5], "other");
            
            $seancies = $obj[3];
            asort($seancies);

                
            $film = [
                    "name" => $obj[0][1],
                    "orig_name" => $obj[0][2],
                    "budget" => $obj[0][3],
                    "premier_world" => $obj[0][4],
                    "premier_RF" => $obj[0][5],
                    "end_show" => $obj[0][6],
                    "age_rating" => $obj[0][7],
                    "rating_IMDb" => $obj[0][8],
                    "rating_kinopoisk" => $obj[0][9],
                    "description" => $obj[0][10],
                    "duration" => $obj[0][11],
                    "country" => $obj[0][12],
                    "genres" => $obj[1],
                    "director" => $director,
                    "producers" => $producer,
                    "writers" => $writer,
                    "actors" => $actor,
                    "main_poster" => $main_poster,
                    "stills" => $stills,
                    "main_trailer" => $main_trailer,
                    "trailers" => $trailers,
                    "reviews" => $obj[6],
                    "seancies" => $seancies
                ];
            
//            var_dump($film);
            
            return $film;
        }
        
        private static function findField($search_array, $find_field){   
            for($i = 0; $i < count($search_array); ++$i){
                if (array_keys($search_array[$i], $find_field)){
                    $result[] = $search_array[$i];
                }   
            }
            return $result;
    
        }
    }
?>
    
    