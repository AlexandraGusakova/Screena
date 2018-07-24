<html>
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
  <header>
    
     <?php //error_reporting( E_ERROR ); ?>
     
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
   <?php  if (!isset($_COOKIE['id'])) 
            { ?>
   <form action='auth.php' method="post">
      <label>Вход</label>
       <input type='email' placeholder="email" name="email">
      <input type='password' placeholder="password" name="password">
      <input type="submit">
  </form>
   
    <form action='registr.php' method="post">
      <label>Регистрация</label>
       <input type='email' placeholder="email" name="email">
      <input type='text' placeholder="name" name="name">
      <input type='text' placeholder="surname" name="surname">
      
      <input type='password' placeholder="password" name="password">
      <input type="submit">
      <?php }?>
  </form>
        <?php include("output.php");?>
   </article>
    
</body>
    
</html>