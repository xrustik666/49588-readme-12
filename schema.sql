CREATE DATABASE IF NOT EXISTS aida
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
	
USE aida;

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	email VARCHAR (128) NOT NULL UNIQUE,
	login VARCHAR (128) NOT NULL UNIQUE,
	password CHAR (64),
	avatar TEXT
);

CREATE TABLE posts (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	title TEXT,
	content TEXT,
	author VARCHAR(128) NOT NULL,
	image TEXT,
	video TEXT,
	link TEXT,
	views INT
);

CREATE TABLE comments (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	content TEXT NOT NULL
);

CREATE TABLE likes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	author VARCHAR (128),
	subscribe VARCHAR(128)
);

CREATE TABLE messages (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cur_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	content TEXT
);

CREATE TABLE hashtags (
	hashname VARCHAR (128)
);

CREATE TABLE content_type (
	content_name ENUM ('Текст', 'Цитата', 'Картинка', 'Видео', 'Ссылка'),
	icon_name ENUM ('photo', 'video', 'text', 'quote', 'link')
);