
   <?php
    header('Content-type: text/html; charset=utf-8');
    if (isset($_POST['name'])) 
    { 
        $user_name = $_POST['name']; 
        if ($user_name == '') 
        { 
            unset($user_name);
        } 
    } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    
    if (isset($_POST['surname'])) 
    { 
        $surname = $_POST['surname']; 
        if ($surname == '') 
        { 
            unset($surname);
        } 
    }

        if (isset($_POST['email'])) 
    { 
        $email = $_POST['email']; 
        if ($email == '') 
        { 
            unset($email);
        } 
    }
    
    if (isset($_POST['password'])) 
    { $password=$_POST['password']; 
        if ($password =='') 
         { 
             unset($password);
         } 
    }//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

    
    $user_name = stripslashes($user_name);
    $user_name = htmlspecialchars($user_name);
    $surname = stripslashes($surname);
    $surname = htmlspecialchars($surname);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $user_name = trim($user_name);//удаляем лишние пробелы
    $password = trim($password);
    $surname = trim($surname);
    $email = trim($email);
    
    
    
    include ('db.php');

    // проверка на существование пользователя с таким же логином
    $query = "SELECT id FROM user WHERE email='$email'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_row($result);
    
    if (!empty($row[0]))
    {
        echo "<p><a href='index.php'>НАЗАД</a></p>";
        mysqli_close($link);
        exit ("Извините, введённая вами почта уже зарегистрирован. Введите другую.");
    }
    else
    {
        $query ="INSERT INTO user (name, surname, password, typeId, statusId, email) VALUES('$user_name','$surname', '$password', '2', '1',  '$email')";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    }
    mysqli_close($link);

    // Проверяем, есть ли ошибки
    if ($result=='TRUE')
    {
        include ("auth.php");
        echo('
        <script type="text/javascript">
        window.onload=function(e)
        {
          window.open("index.php", "_self");
          alert("Поздравляем! Вы успешно зарегистрировались!");
        }
        </script>');      
        
    }
    else {
         echo('
        <script type="text/javascript">
        window.onload=function(e)
        {
          window.open("index.php", "_self");
          alert("При регистрации произошла ошибка. Попробуйте повторить");
        }
        </script>');    
    }
   
?>
    
    