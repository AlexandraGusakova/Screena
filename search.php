<?php
    header("Content-type: text/html; charset=utf-8");
    include ("data_layer/film_provider.php");
    include ("data_layer/data_access_layer.php");

    error_reporting( E_ERROR );

    $date = date("Y-m-d");

    if (isset($_POST['query']))
    {
        $data = $_POST['query'];
        if ($data == '')
        {
            unset($data);
        }
    }

    $data = htmlspecialchars($data); //Преобразует специальные символы в HTML сущности
    $data = stripslashes($data);
    $data = trim($data); //удаляем лишние пробелы


    $search = new FilmProvider;
    $search = FilmProvider::getAfishaFilms($date);

    for($i = 1; $i <= count($search); ++$i){
        if (stripos($search[$i]["orig_name"], $data) === false && stripos(mb_strtolower($search[$i]["name"], 'UTF-8'), mb_strtolower($data, 'UTF-8')) === false){
        }
        else {
          $search_result[] = $search[$i];
        }
    }

    if (isset($search_result)){
        var_dump($search_result);
    }
    else{
        echo "Поиск не дал результатов";
    }


?>
