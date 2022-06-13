<?php

require_once 'helpers.php';
require_once 'config/db.php';
require_once 'config/queries.php';

$post = $getPostData ($_GET['id']) ;

echo "<pre>";
var_dump ($post) ;
echo "</pre>";

if (empty ($post)) {
    die ('Пост не найден');
}

if ($post['icon_name'] === 'link') {
    $post_main = include_template('post-link.php', [
        'title' => $post['title'],
        'link' => $post['link'],
        'user_login' => $post['user_login'],
        'user_avatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'photo') {
    $post_main = include_template('post-photo.php', [
        'title' => $post['title'],
        'image' => $post['image'],
        'user_login' => $post['user_login'],
        'user_avatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'quote') {
    $post_main = include_template('post-quote.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'cite_author' => $post['cite_author'],
        'user_login' => $post['user_login'],
        'user_avatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'text') {
    $post_main = include_template('post-text.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'user_login' => $post['user_login'],
        'user_avatar' => $post['user_avatar']
    ]);
} else if ($post['icon_name'] === 'video') {
    $post_main = include_template('post-video.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'video' => $post['video'],
        'user_login' => $post['user_login'],
        'user_avatar' => $post['user_avatar']
    ]);
}

$layout =  include_template('layout.php', [
    'main' => htmlspecialchars($post_main),
    'pageName' => "Напиши собственный блог!",
    'isAuth' => mt_rand(0, 1),
]);

echo $layout;