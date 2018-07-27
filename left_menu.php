
<div class="site-wrap">
    <div class="left-menu">
        <img class="logo" src="images/logo.png" />

        <div class="top-left" >
            <div class="cities">
                <img src="images/geo.png" style="height: 16px; vertical-align: bottom"/>
                <a href="#" id="city" onClick="hide_cities()" style="border-bottom: 1px dashed #aca6a6;">Минск</a>
            </div>

            <div class="date">
                <img src="images/calendar.png" style="height: 16px; vertical-align: text-bottom"/>
                <input type="date" value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>"/>
            </div>
        </div>

        <div class="list-left">
        	<ul class="ul">
        		<li style="list-style-image: url(images/premier.png);">
        			<a class="socialbutton" href=""> Скоро в прокате </a>
        		</li>
        		<li style="list-style-image: url(images/genre.png)">
        				<a class="socialbutton" onClick="down_genre()"> Жанры </a>
            			<ul id="ul_genre" style="display: none; list-style: none">
                            <?php include("genres.php");?>

            			</ul>
        		</li>
        		<li style="list-style-image: url(images/cinema.png)">
        				<a class="socialbutton" onClick="down_cinema()"> Кинотеатры </a>
            			<ul id="ul_cinema" style="display: none; list-style: none;">
                            <?php include("cinema.php");?>
            			</ul>
        		</li>
        	</ul>
        </div>
    </div>

    <div class="mob">
        <img src="images/logo.png" />
    </div>

    <div id="cities_body" style=" display: none; list-style: none;">
      <div class="cities_content">
          <ul class="city-container">
              <?php include("city.php");?>
          </ul>
      </div>
    </div>
