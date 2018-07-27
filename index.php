<html>
<head>
    <meta charset="UTF-8">
    <title>Screena</title>
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"> -->
    <script src="js/jquery.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="styles/style.css?<?=time()?>" rel="stylesheet" type="text/css" />
    <link href="styles/mob.css?<?=time()?>" rel="stylesheet" type="text/css" />
    <link href="styles/pc.css?<?=time()?>" rel="stylesheet" type="text/css" />
    <link href="styles/tabs.css?<?=time()?>" rel="stylesheet" type="text/css" />
    <script src="js/hide.js"></script>
    <script>
        // $(function(){
        //   $("#search_box").autocomplete({
        //       source: "search.php",
        //       // source: ["суперсемейка", "Монстры на каникулах"],
        //   });
        // });

        $(document).ready(function(){
            // $.ajax({
            //     url: "output.php",
            //     type: "post",
            //     // data: {id:1} ,
            //     success: function (data) {
            //         $("article").html(data);
            //     },
            //     error: function(jqXHR, textStatus, errorThrown) {
            //        console.log(textStatus, errorThrown);
            //     }
            // })

            alert("Привет");

            // $('.genre').click(function(){
            //     var id = $(this).attr("value");
            //     alert("id");
                // $.ajax({
                //     url: "output.php",
                //     type: "post",
                //     data: {genre_id:id} ,
                //     success: function (data) {
                //         $("article").html(data);
                //     },
                //     error: function(jqXHR, textStatus, errorThrown) {
                //        console.log(textStatus, errorThrown);
                //     }
                // })

            });

    </script>
</head>
<body>
    <?php include("class.php");?>

    <?php include("left_menu_mob.php")?>

    <?php include("left_menu.php"); ?>

    <?php include("header.php");?>

     <article>
         <h1>Киноафиша сегодня: <a href="#" id="city" onClick="hide_cities()" style="border-bottom: 1px dashed #1aa195; color:#1aa195">Минск</a></h1>
         <ul class="movie-container">
             <?php include("output.php");?>
        </ul>
     </article>

     <?php include("footer.php");?>
 </div>
</body>

</html>
