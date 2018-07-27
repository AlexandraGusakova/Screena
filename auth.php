   <?php
    header('Content-type: text/html; charset=utf-8');
   
    if (isset($_POST['email'])) 
    { 
        $email = $_POST['email']; 
        if ($email == '') 
        { 
            unset($email);
        } 
    } 
    
    if (isset($_POST['password'])) 
    { 
        $password=$_POST['password']; 
        if ($password =='') 
        { 
            unset($password);
        } 
    }
   
    //обрабатываем
    $email = stripslashes($email); //Удаляет экранирующие бэкслэши. (\' преобразуется в ', и т.д.). Двойные бэкслэши (\\) преобразуется в одиночные(\).
    $email = htmlspecialchars($email); //Преобразует специальные символы в HTML сущности
    $password = stripslashes($password); 
    $password = htmlspecialchars($password); 
    $email = trim($email); //удаляем лишние пробелы
    $password = trim($password);
    
    
    include ("db.php");


    $query ="SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    
    $row = mysqli_fetch_row($result);

    if (empty($row[0])) //если пользователя с введенным логином не существует
    {
            mysqli_close($link);
            echo('
                <script type="text/javascript">
                window.onload=function(e)
                {
                  window.open("index.php", "_self");
                  alert("Извините, такого пользователя не существует");
                }
                </script>');   
    }
    else {
        
        if ($row[3]==$password)
        { 
            if ($row[4] == 1){
                echo('
                    <script type="text/javascript">
                    window.onload=function(e)
                    {
                      window.open("admin/admin_user.php", "_self");
                    }
                    </script>');   
            }
            else{
                setcookie('id', $row[0], time()+60*60);
                setcookie('user_name', $row[1], time()+60*60);
                setcookie('user_surname', $row[2],time()+60*60);

                 echo('
                    <script type="text/javascript">
                    window.onload=function(e)
                    {
                      window.open("index.php", "_self");
                    }
                    </script>');   
            }
           
        }
        else {            
            mysqli_close($link);
             echo('
                <script type="text/javascript">
                window.onload=function(e)
                {
                  window.open("index.php", "_self");
                  alert("Введённый вами пароль не верный. Попробуйте еще раз");
                }
                </script>');   
        }
    }
?>
    
    