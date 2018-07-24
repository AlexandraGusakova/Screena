<?php
    class DatabaseAccess{
        
        public static function displayFilm($film_id, $city_id, $date){
            include ("db.php");
            
            $film = new DatabaseAccess;
            $genre = new DatabaseAccess;
            $person = new DatabaseAccess;
            $seance = new DatabaseAccess;
            $poster = new DatabaseAccess;
            $trailer = new DatabaseAccess;
            $review = new DatabaseAccess;
            
            $film = DatabaseAccess::getFilm($film_id);
            $genre = DatabaseAccess::getGenre($film_id);
            $person = DatabaseAccess::getPerson($film_id);
            $seance = DatabaseAccess::getSeance($film_id, $city_id, $date);
            $poster = DatabaseAccess::getPoster($film_id);
            $trailer = DatabaseAccess::getTrailer($film_id);
            $review = DatabaseAccess::getReview($film_id);
            
            mysqli_close($link);
            return [$film, $genre, $person, $seance, $poster, $trailer, $review];
        }
        
        public static function displayAfishaFilms($date){
            include ("db.php");
            
            $films = new DatabaseAccess;
            
            $films = DatabaseAccess::getAfishaFilms($date);
            
            mysqli_close($link);
            return $films;
        }
        
        private static function getFilm($film_id){
            include ("db.php");
            $query_film = "SELECT * FROM film WHERE id='$film_id'";
            $result_film =  mysqli_query($link, $query_film) or die("Ошибка " . mysqli_error($link));
            
            if($result_film){              
                $row_film = mysqli_fetch_row($result_film);
            }
            
            return $row_film;
        }
        
        private static function getAfishaFilms($date){
            include ("db.php");
            
            $query_films = "SELECT film.id, film.name, film.endShow, film.description, poster.poster, city.name, cinema.name, film.premiereRF 
                    FROM film 
                            INNER JOIN poster ON poster.filmId=film.id 
                            INNER JOIN seance ON film.id=seance.id
                            INNER JOIN cinema ON cinema.id=seance.cinemaId
                            INNER JOIN city ON cinema.cityId=city.id
                    WHERE poster.typeId=1 
                            AND film.endShow>'$date'";
	        $result_films = mysqli_query($link, $query_films) or die("Ошибка " . mysqli_error($link));
            
            if($result_films){              
                $row_films = mysqli_fetch_all($result_films);
                $rows = mysqli_num_rows($result_films);
				for ($i = 0 ; $i < $rows; ++$i)
				{        
                        $genres = new DatabaseAccess;
                        $genres = DatabaseAccess::getGenre($row_films[$i][0]);
                        $row_films[$i][8] = $genres;
                }
            }
            return $row_films;
        }
        
        private static function getGenre($film_id){
            include ("db.php");
            $query_genre = "SELECT genre.name 
                                FROM genre
                                    INNER JOIN genrefilm ON genre.id=genrefilm.typeId
                                WHERE genrefilm.filmId='$film_id'";
            $result_genre = mysqli_query($link, $query_genre) or die("Ошибка " . mysqli_error($link));
            
            if($result_genre){              
                $row_genre = mysqli_fetch_all($result_genre);
            }
            return $row_genre;
            mysqli_close($link);
        }
        
        private static function getPerson($film_id){
            include ("db.php");
            $query_person = "SELECT persontype.name, person.name, person.surname, person.link 
                                FROM person 
                                    INNER JOIN personfilm ON person.id=personfilm.personId
                                    INNER JOIN persontype ON personfilm.typeId=persontype.id
                                WHERE personfilm.filmId='$film_id'";
            $result_person = mysqli_query($link, $query_person) or die("Ошибка " . mysqli_error($link));
            
            if($result_person){                
                $row_person = mysqli_fetch_all($result_person);
            }
            
            return $row_person;
            mysqli_close($link);
        }
        
        private static function getSeance($film_id, $city_id, $date){
            include ("db.php");
            $query_seance = "SELECT seance.date, cinema.name, seance.time, seance.cost, cinematechnology.name 
                                FROM seance 
                                    INNER JOIN cinema ON seance.cinemaId=cinema.id
                                    INNER JOIN cinematechnology ON seance.typeId=cinematechnology.id
                                    INNER JOIN film ON seance.filmId=film.id
                                    INNER JOIN city ON cinema.cityId=city.id
                                WHERE film.id='$film_id'
                                    AND city.id='$city_id'
                                    AND seance.date>='$date'";
            $result_seance = mysqli_query($link, $query_seance) or die("Ошибка " . mysqli_error($link));
            
            if($result_seance){               
                $row_seance = mysqli_fetch_all($result_seance);
            }
            
            return $row_seance;
            mysqli_close($link);
        }
        
        private static function getPoster($film_id){
            include ("db.php");
            $query_poster = "SELECT poster.poster, postertype.name
                                FROM poster
                                    INNER JOIN postertype ON poster.typeId=postertype.id
                                WHERE poster.filmId='$film_id'";
            $result_poster = mysqli_query($link, $query_poster) or die("Ошибка " . mysqli_error($link));
            
            if($result_poster){              
                $row_poster = mysqli_fetch_all($result_poster);
            }
            
            return $row_poster;
            mysqli_close($link);
        }
        
        private static function getTrailer($film_id){
            include ("db.php");
            $query_trailer = "SELECT trailer.trailer, trailertype.name
                                FROM trailer
                                    INNER JOIN trailertype ON trailer.typeId=trailertype.id
                                WHERE trailer.filmId='$film_id'";
            $result_trailer = mysqli_query($link, $query_trailer) or die("Ошибка " . mysqli_error($link));
            
            if($result_trailer){             
                $row_trailer = mysqli_fetch_all($result_trailer);
            }
            
            return $row_trailer;
            mysqli_close($link);
        }
        
        private static function getReview($film_id){
            include ("db.php");
            $query_review = "SELECT review.date, review.review, review.rating, user.name, user.surname
                                FROM review
                                    INNER JOIN user ON review.userId=user.id
                                    INNER JOIN reviewfilm ON review.id=reviewfilm.reviewId
                                WHERE reviewfilm.filmId='$film_id'";
            $result_review = mysqli_query($link, $query_review) or die("Ошибка " . mysqli_error($link));
            
            if($result_review){           
                $row_review = mysqli_fetch_all($result_review);
            }
            
            return $row_review;
            mysqli_close($link);
        }
    }
?>
    
    