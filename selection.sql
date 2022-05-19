/*получить список постов с сортировкой по популярности и вместе с именами авторов и типом контента*/
SELECT p.id, p.title, p.content, u.login, ct.content_name
FROM posts p
JOIN users u ON u.id = p.post_author_id
JOIN content_types ct ON ct.id = p.content_type_id
ORDER BY p.views;

/*получить список постов для конкретного пользователя*/
SELECT p.id, p.title, p.content, u.login
FROM posts p
JOIN users u ON p.post_author_id = u.id
WHERE u.id = 2;

/*получить список комментариев для одного поста, в комментариях должен быть логин пользователя (по посту выборку сделать)*/
SELECT u.login, c.content, p.title
FROM comments c
JOIN users u ON c.comment_author_id = u.id
JOIN posts p ON  p.post_author_id = u.id
WHERE p.id = 2;

/*добавить лайк к посту*/
INSERT INTO likes SET comment_author_id = 1, liked_post_id = 1;

/*подписаться на пользователя*/
INSERT INTO subscribe SET subscribing_author_id = 1, subscribed_author_id = 1;