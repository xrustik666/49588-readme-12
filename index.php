<?php
require_once 'helpers.php';
require_once 'config/init.php';

/*SQL-запрос для получения типов контента*/
$ct_query = "SELECT DISTINCT content_name, icon_name FROM content_types";
$ct_result = mysqli_query ($con, $ct_query) ;
/*SQL-запрос для получения списка постов, объединённых с пользователями и отсортированный по популярности*/
$p_query = "SELECT p.title AS post_title, p.content, p.views, p.author, ct.content_name, u.login, u.avatar
            FROM posts p 
            JOIN users u ON u.id = p.id
            JOIN content_types ct ON ct.id = p.id
            ORDER BY p.views";
$p_result = mysqli_query ($con, $p_query) ;

$types = mysqli_fetch_all ($ct_result, MYSQLI_ASSOC);
$posts = mysqli_fetch_all ($p_result, MYSQLI_ASSOC);

// Подключаем шаблоны
$main = include_template ('main.php', [
    'posts' => $posts,
    'types' => $types
]) ;

$layout =  include_template('layout.php', [
    'pageContent' => htmlspecialchars($main),
    'isAuth' => mt_rand(0, 1),
    'userName' => 'Rustam Abdullaev',
    'pageName' => "Напиши собственный блог!"
]);

echo $layout;

?>