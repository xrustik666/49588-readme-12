<?php
require_once 'helpers.php';

// Создаем массив с данными для карточек
/*$posts = [
    [
        'title' => 'Цитата',
        'type' => 'post-quote',
        'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
        'name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Игра престолов',
        'type' => 'post-text',
        'content' => 'Досмотрел таки последний сезон. Сказать, что разочарован - значит не сказать ничего. Превращение Дейнерис в монстра произошло слишком быстро, буквально за несколько серий. А ведь по хорошему, столь важный сюжетный ход должен был происходить на протяжении нескольких сезонов. Конечно, тревожные звоночки были и раньше, но они были не ярко выражены, и ничего не предвещало столь ужасного исхода.',
        'name' => 'Владик',
        'avatar' => 'userpic.jpg'
    ],
    [
        'title' => 'Наконец, обработал фотки!',
        'type' => 'post-photo',
        'content' => 'rock-medium.jpg',
        'name' => 'Виктор',
        'avatar' => 'userpic-mark.jpg'
    ],
    [
        'title' => 'Моя мечта',
        'type' => 'post-photo',
        'content' => 'coast-medium.jpg',
        'name' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Лучшие курсы',
        'type' => 'post-link',
        'content' => 'www.htmlacademy.ru',
        'name' => 'Владик',
        'avatar' => 'userpic.jpg'
    ]
] ;*/


/*Считываем данные из БД*/
$con = mysqli_connect ("localhost", "root", "", "aida");
mysqli_set_charset($con, "utf8");
if (!$con) {
    echo "Ошибка подключения: " . mysql_err();
}
/*SQL-запрос для получения типов контента*/
$ct_query = "SELECT content_name, icon_name FROM content_types";
$ct_result = mysqli_query ($con, $ct_query) ;
/*Отправьте SQL-запрос для получения списка постов, объединённых с пользователями и отсортированный по популярности*/
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