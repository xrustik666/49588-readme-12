<html>
    <head>
        <meta charset="utf-8">
    </head>
</html>

<?php

$con = mysqli_connect("localhost", "root", "", "aida");
mysqli_set_charset($con, "utf8");
if (!$con) {
    echo ("Ошибка подключения: " . mysqli_connect_err()) ;
} else {
    echo ("Подключение установлено!") ;
}

?>