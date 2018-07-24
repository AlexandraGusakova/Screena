<?php
    header('Content-type: text/html; charset=utf-8');
    
    setcookie('id', '', time()-60*60*24);
    setcookie('user_name', '', time()-60*60*24);
    setcookie('user_surname', '', time()-60*60*24);
    
        echo('
                <script type="text/javascript">
                window.onload=function(e)
                {
                  window.open("index.php", "_self");
                }
                </script>');  

?>
    
    