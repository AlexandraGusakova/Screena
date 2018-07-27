
    <ul class="navigation">
        <form action="search.php" method="POST" class="search_area">
              <input type="search" name="query" id="search_box" placeholder="Найти" value="" style="background:url(images/search.png) no-repeat 370px center; background-size: 18px;">
          </form>
        <?php  if (!isset($_COOKIE['id'])){ ?>
                  <input type="button" id="checkin" onClick="hide_checkin()" value="Регистрация" /><br/>
                  <input type="button" id="login" onClick="hide_login()" value="Войти" />
        <?php }else{?>
                  <form action="logout.php" method="post" class="logout"><input type="submit" id="logout" value="Выйти"></form>
        <?php }?>

        <li class="nav-item"><a href="#">Минск</a></li>
        <li class="nav-item" style="margin-bottom: 50px;"><a href="#"><?php echo date("Y-m-d");?></a></li>
            <li class="nav-item" style="list-style-image: url(images/premier.png);">
                <a class="socialbutton" href=""> Скоро в прокате </a>
            </li>
            <li class="nav-item" style="list-style-image: url(images/genre.png)">
                    <a class="socialbutton" onClick="down_genre_mob()"> Жанры </a>
                    <ul id="ul_genre_mob" style="display: none; list-style: none">
                        <?php include("genres.php");?>
                    </ul>
            </li>
            <li class="nav-item" style="list-style-image: url(images/cinema.png)">
                    <a class="socialbutton" onClick="down_cinema_mob()"> Кинотеатры </a>
                    <ul id="ul_cinema_mob" style="display: none; list-style: none;">
                        <?php include("cinema.php");?>
                    </ul>
            </li>
    </ul>
    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger" style="background:url(images/hamburg.png) no-repeat center center; background-size: 48px;"></label>
