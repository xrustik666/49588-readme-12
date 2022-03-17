<?php

// функция вывода текущей даты
function displayDateTime() {
    date_default_timezone_set("Europe/Moscow");

    $curDate = date('d.m.Y H:i:s') ;
    return $curDate ;
}

