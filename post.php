<?php

require_once 'helpers.php';
require_once 'config/db.php';
require_once 'config/queries.php';

$post = $getPostData ($_GET['id']) ;
//var_dump ($post) ;

if (empty ($post)) {
    die ('Пост не найден');
}

if ($post['icon_name'] === 'link') {
        $post_main = include_template('post-link.php', [
            'link' => $post['link'],
            'title' => $post['title']
        ]);
} else if ($post['icon_name'] === 'photo') {
        $post_main = include_template('post-photo.php', [
            'img' => $post['img']
        ]);
} else if ($post['icon_name'] === 'quote') {
        $post_main = include_template('post-quote.php', [
            'text' => $post['content'],
            'cite_author' => $post['cite_author']
        ]);
} else if ($post['icon_name'] === 'text') {
        $post_main = include_template('post-text.php', [
            'text' => $post['content']
        ]);
} else if ($post['icon_name'] === 'video') {
    $post_main = include_template('post-video.php', [
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