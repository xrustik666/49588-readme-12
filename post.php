<?php

require_once 'helpers.php';
require_once 'config/db.php';
require_once 'config/queries.php';

$post = $getPostData ($_GET['id']) ;

//echo "<pre>";
//var_dump ($post) ;
//echo "</pre>";

if (empty ($post)) {
    /*
    $err = include_template('err.php', [
        'title' => "Ошибка 404",
        'content' => http_response_code(404)
    ]);
    echo $err;
    */
    die("HTTP/1.1 404 Not Found");
}

if ($post['icon_name'] === 'link') {
    $post_main = include_template('post/post-link.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'link' => $post['link'],
        'userLogin' => $post['user_login'],
        'userAvatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'photo') {
    $post_main = include_template('post/post-photo.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'urlImage' => $post['image'],
        'userLogin' => $post['user_login'],
        'userAvatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'quote') {
    $post_main = include_template('post/post-quote.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'cite_author' => $post['cite_author'],
        'userLogin' => $post['user_login'],
        'userAvatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'text') {
    $post_main = include_template('post/post-text.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'userLogin' => $post['user_login'],
        'userAvatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'video') {
    $post_main = include_template('post/post-video.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'video' => $post['video']
    ]);
}

$postDetails =  include_template('post/post-details.php', [
    // Вывод типового шаблона
    'pageMain' => htmlspecialchars($post_main),
    // Заголовок страницы
    'pageTitle' => $post['title'],
    // Рандомный вывод юзера
    'isAuth' => mt_rand(0, 1),
    // Имя пользователя, под которым произведен вход
    'myName' => 'Rustam Abdullaev',
    
    // Заголовок поста
    'postTitle' => $post['title'],
    // Имя пользователя, опубликовавшего пост
    'userLogin' => $post['user_login'],
    // Аватар пользователя, опубликовавшего пост
    'userAvatar' => $post['user_avatar']
]);

echo $postDetails;