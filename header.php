    <header>

       <?php error_reporting( E_ERROR ); ?>

        <?php  if (!isset($_COOKIE['id']))
                 { ?>
              <input type="button" id="checkin" onClick="hide_checkin()" value="Регистрация" />
              <input type="button" id="login" onClick="hide_login()" value="Войти" />
        <?php }else{?>
              <form action="logout.php" method="post" class="logout"><input type="submit" id="logout" value="Выйти"></form>
        <?php }?>
        <form action="search.php" method="POST" class="search_area">
      	     <input type="search" name="query" id="search_box" placeholder="Найти" value="" style="background:url(images/search.png) no-repeat 370px center; background-size: 18px;">
      	</form>

    </header>
    <div class="forms">
        <div id="container_login" style="display: none;">
            <form action='auth.php' method="post" class="auth_form">
               <label>Вход</label><br /><br />
               <input type='email' placeholder="email" name="email"/><br />
               <input type='password' placeholder="password" name="password"/><br />
               <input type="submit">
           </form>
        </div>

        <div id="container_checkin" style="display: none;">
            <form action='registr.php' method="post" class="registr_form">
              <label>Регистрация</label><br /><br />
               <input type='email' placeholder="email" name="email"><br />
              <input type='text' placeholder="name" name="name"><br />
              <input type='text' placeholder="surname" name="surname"><br />
              <input type='password' placeholder="password" name="password"><br />
              <input type="submit">
          </form>
        </div>
    </div>
