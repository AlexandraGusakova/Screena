<html>
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
  <header>
      <?php 
      if (isset($_COOKIE['id'])) 
            { 
                echo '<p>id: '; echo $_COOKIE['id'];
                echo '</p><p>Name: '; echo $_COOKIE["user_name"];
                echo '</p><p>Surname: '; echo $_COOKIE["user_surname"];
                echo '<form action="logout.php" method="post"><input type="submit" value="exit"></form>';
            }   
      ?>
  </header>
   <article>
   <?php include('output_film.php');?>
   </article>
    
</body>
    
</html>