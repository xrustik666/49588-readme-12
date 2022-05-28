<?

/*SQL-запрос для получения типов контента*/
$ct_query = "SELECT id, content_name, icon_name
                FROM content_types";
$ct_result = mysqli_query ($con, $ct_query) ;

// Прогнать через функцию-экран
$contentTypeCondition = mysqli_real_escape_string($con, ($content_type !== null ? "WHERE p.content_type_id = {$content_type}" : ''));

/*SQL-запрос для получения списка постов, объединённых с пользователями и отсортированный по популярности*/
$p_query = "SELECT p.id, p.title AS post_title, p.content, p.views, p.author, ct.content_name, u.login, u.avatar
                FROM posts p 
                JOIN users u ON u.id = p.id
                JOIN content_types ct ON ct.id = p.id
                $contentTypeCondition
                ORDER BY p.views";

$p_result = mysqli_query ($con, $p_query) ;

if ($ct_result) {
    $types = mysqli_fetch_all ($ct_result, MYSQLI_ASSOC);
} else {
    echo "С запросом или ресурсом запроса что-то не так";
}

if ($p_result) {
    $posts = mysqli_fetch_all ($p_result, MYSQLI_ASSOC);
} else {
    echo "С запросом или ресурсом запроса что-то не так";
}
