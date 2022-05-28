<?php

$content_type = $_GET['type'] ?? null;

require_once 'helpers.php';
require_once 'config/db.php';
require_once 'config/queries.php';

// Подключаем шаблоны
$main = include_template ('main.php', [
    'posts' => $posts,
    'types' => $types,
    'content_type' => $content_type
]) ;

$layout =  include_template('layout.php', [
    'main' => htmlspecialchars($main),
    'isAuth' => mt_rand(0, 1),
    'userName' => 'Rustam Abdullaev',
    'pageName' => "Напиши собственный блог!"
]);

echo $layout;
