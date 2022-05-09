/*добавляем пользователей*/
INSERT INTO users SET email = 'hello@gmail.com', login = 'valera', pass = 'xxxxx', avatar = "http://avatar.com/xxx";
INSERT INTO users SET email = 'byebye@hotmail.com', login = 'sonya', pass = 'zzzzz', avatar = "http://avatar.com/zzz";
INSERT INTO users SET email = 'here_we_go@mail.com', login = 'elon', pass = 'musk', avatar = "http://avatar.com/yyy";

/*добавляем типы контента*/
INSERT INTO content_types SET content_name = 'Текст', icon_name = 'quote';
INSERT INTO content_types SET content_name = 'Текст', icon_name = 'quote';
INSERT INTO content_types SET content_name = 'Текст', icon_name = 'quote';

/*добавляем хэштеги*/
INSERT INTO hashtags SET hashname = 'first hash ever';
INSERT INTO hashtags SET hashname = 'second hash ever';
INSERT INTO hashtags SET hashname = 'third hash ever';

/*добавляем посты*/
INSERT INTO posts SET title = 'first post ever', content = 'first content ever', cite_author = 'Оруэлл', post_author_id = '1', content_type_id = '1', hash_id = '1';
INSERT INTO posts SET title = 'second post ever', content = 'second content ever', cite_author = 'Брэдберри', post_author_id = '2', content_type_id = '2', hash_id = '2';
INSERT INTO posts SET title = 'third post ever', content = 'third content ever', cite_author = 'Азимов', post_author_id = '3', content_type_id = '3', hash_id = '3';

/*добавляем комментарии*/
INSERT INTO comments SET content = 'first comment ever', comment_author_id = 1, post_comment_id = 1;
INSERT INTO comments SET content = 'second comment ever', comment_author_id = 2, post_comment_id = 2;
INSERT INTO comments SET content = 'third comment ever', comment_author_id = 3, post_comment_id = 3;