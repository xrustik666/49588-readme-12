<?php
require_once 'helpers.php';

/*Подключение к БД*/
$con = mysqli_connect ("localhost", "root", "", "aida");
mysqli_set_charset($con, "utf8");
if (!$con) {
    echo "Ошибка подключения: " . mysql_err();
}

/*SQL-запрос для получения типов контента*/
$ct_query = "SELECT content_name, icon_name FROM content_types";
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


// Функция обрезания текста
function textCut($str, $maxStringLen = 300) {
    $words = explode(' ', $str);
    $length = -1;
    $outWords = [];

    foreach ($words as $word) {
        $length += mb_strlen($word) + 1;

        if ($length > $maxStringLen) {
            break;
        }

        $outWords[] = $word;
    }

    return implode(' ', $outWords);
}

$pageContent = include_template ('main.php', [
    'posts' => $posts,
    'types' => $types
]) ;

echo include_template('layout.php', [
    'pageContent' => htmlspecialchars($pageContent),
    'isAuth' => mt_rand(0, 1),
    'userName' => 'Rustam Abdullaev',
    'pageName' => "Напиши собственный блог!"
]);

?>                    