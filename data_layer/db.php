<?php
     $host = "localhost"; // адрес сервера
     $database = "screena"; // имя базы данных
     $user = "root"; // имя пользователя
     $pass = ""; // пароль
     $link = mysqli_connect($host, $user, $pass, $database) or die("Ошибка подключения к бд" . mysqli_error($link));

     mysqli_query($link, "SET NAMES 'UTF8'");
?>
    
    