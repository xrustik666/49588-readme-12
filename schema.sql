CREATE DATABASE IF NOT EXISTS aida
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
	
USE aida;

CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	email VARCHAR (128) NOT NULL UNIQUE,
	login VARCHAR (128) NOT NULL UNIQUE,
	password CHAR (64),
	avatar TEXT
);

CREATE TABLE IF NOT EXISTS hashtags (
	id INT AUTO_INCREMENT PRIMARY KEY,
	hashname VARCHAR (128) NOT NULL
);

CREATE TABLE IF NOT EXISTS content_types (
	id INT AUTO_INCREMENT PRIMARY KEY,
	content_name ENUM ('Текст', 'Цитата', 'Фото', 'Видео', 'Ссылка') NOT NULL,
	icon_name ENUM ('photo', 'video', 'text', 'quote', 'link')
);

CREATE TABLE IF NOT EXISTS posts (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	title TEXT,
	content TEXT,
	author VARCHAR(128) NOT NULL,
	image TEXT,
	video TEXT,
	link TEXT,
	views INT,
	post_author_id INT NOT NULL,
	content_type_id INT NOT NULL,
	hash_id INT NOT NULL,
	FOREIGN KEY (post_author_id) REFERENCES users(id),
	FOREIGN KEY (content_type_id) REFERENCES content_types(id),
	FOREIGN KEY (hash_id) REFERENCES hashtags(id)
);

CREATE TABLE IF NOT EXISTS comments (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	content TEXT NOT NULL,
	comment_author_id INT NOT NULL,
	post_comment_id INT NOT NULL,
	FOREIGN KEY (comment_author_id) REFERENCES users(id),
	FOREIGN KEY (post_comment_id) REFERENCES posts(id)
);

CREATE TABLE IF NOT EXISTS likes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	comment_author_id INT NOT NULL,
	liked_post_id INT NOT NULL,
	FOREIGN KEY (comment_author_id) REFERENCES comments(id),
	FOREIGN KEY (liked_post_id) REFERENCES posts(id)
);

CREATE TABLE IF NOT EXISTS messages (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	content TEXT,
	sender_id INT NOT NULL,
	reciever_id INT NOT NULL,
	FOREIGN KEY (sender_id) REFERENCES users(id),
	FOREIGN KEY (reciever_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS subscribe (
	id INT AUTO_INCREMENT PRIMARY KEY,
	subscribing_author_id INT NOT NULL,
	subscribed_author_id INT NOT NULL,
	FOREIGN KEY (subscribing_author_id) REFERENCES users(id),
	FOREIGN KEY (subscribed_author_id) REFERENCES users(id)
);