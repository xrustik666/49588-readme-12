<?php

/*Подключение к БД*/
$con = mysqli_connect ("localhost", "root", "", "aida");
mysqli_set_charset($con, "utf8");
if (!$con) {
    echo "Ошибка подключения: " . mysql_err();
}
