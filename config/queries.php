<?
/* Фунция отображения поста  */
$getPostData = function (int $id) use ($con) {
    $ct_query = "SELECT p.*, u.*, u.login AS user_login, u.avatar AS user_avatar, ct.icon_name 
    FROM posts p
                JOIN content_types ct ON ct.id = p.content_type_id
                JOIN users u ON u.id = p.post_author_id
                JOIN subscribe ON u.id = subscribe.subscribing_author_id
                WHERE p.id = $id";
    $ct_result = mysqli_query ($con, $ct_query) ;

    if ($ct_result) {
        return mysqli_fetch_assoc ($ct_result);
    } else {
        die ("С запросом или ресурсом запроса что-то не так");
    }
};

/* Функция-SQL-запрос для получения типов контента */
$getContentTypeList = function () use ($con) {
    $ct_query = "SELECT id, content_name, icon_name
                FROM content_types";
    $ct_result = mysqli_query ($con, $ct_query) ;

    if ($ct_result) {
        return mysqli_fetch_all ($ct_result, MYSQLI_ASSOC);
    } else {
        die ("С запросом или ресурсом запроса что-то не так");
    }
};

/* SQL-запрос для получения списка постов, объединённых с пользователями и отсортированный по популярности */
$getPostList = function ($content_type) use ($con) {
    $contentTypeCondition = mysqli_real_escape_string($con, ($content_type !== null ? "WHERE p.content_type_id = {$content_type}" : ''));
    $p_query = "SELECT p.id AS post_id, p.title AS post_title, p.content AS post_content, p.video AS post_video, p.image as post_image, p.views, p.author, ct.content_name, u.login AS user_login, u.avatar
                FROM posts p 
                JOIN users u ON u.id = p.id
                JOIN content_types ct ON ct.id = p.id
                $contentTypeCondition
                ORDER BY p.views";

    $p_result = mysqli_query ($con, $p_query) ;

    if ($p_result) {
        return mysqli_fetch_all ($p_result, MYSQLI_ASSOC);
    } else {
        die ("С запросом или ресурсом запроса что-то не так");
    }
};
