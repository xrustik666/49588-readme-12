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
        'link' => $post['link']
    ]);
} else if ($post['icon_name'] === 'photo') {
    $post_main = include_template('post-photo.php', [
        'title' => $post['title'],
        'image' => $post['image']
    ]);
} else if ($post['icon_name'] === 'quote') {
    $post_main = include_template('post-quote.php', [
        'title' => $post['title'],
        'content' => $post['content'],
        'cite_author' => $post['cite_author']
    ]);
} else if ($post['icon_name'] === 'text') {
    $post_main = include_template('post-text.php', [
        'title' => $post['title'],
        'content' => $post['content']
    ]);
} else if ($post['icon_name'] === 'video') {
    $post_main = include_template('post-video.php', [
        'title' => $post['title'],
        'video' => $post['video']
    ]);
}

$layout =  include_template('layout.php', [
    'main' => htmlspecialchars($post_main),
    'isAuth' => mt_rand(0, 1),
    'userName' => 'Rustam Abdullaev',
    'pageName' => "Напиши собственный блог!"
]);

echo $layout;