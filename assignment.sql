-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `title` varchar(55) NOT NULL,
  `content` text NOT NULL,
  `like` int(11) DEFAULT 0,
  `comment` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO `comments` (`id`, `user_id`, `user_name`, `title`, `content`, `like`, `comment`) VALUES
(14,	16,	'user1',	'Greeting ',	'Hi Guys',	2,	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `email` varchar(155) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `pwd`, `created_date`, `updated_date`) VALUES
(1,	'root1',	'gokul.kannan@usistech.com',	'root1',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(10,	'Gokul',	'gokul.kannan12@usistech.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(12,	'hari',	'hari@gmail.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(13,	'hari',	'hari@gmail.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(14,	'user1',	'user1@gmil.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(15,	'user1',	'user1@gmil.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(16,	'user1',	'user1@gmail.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(17,	'user1',	'user1@gmail.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(18,	'user2',	'user2@gmail.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(19,	'user2',	'user2@gmail.com',	'123456',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `user_activity`;
CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Comment_content_user_add` text NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_activity` (`id`, `comment_id`, `user_id`, `Comment_content_user_add`, `created_date`) VALUES
(9,	14,	18,	'Hi User1 How r u ? ',	'2022-05-04 13:45:10');

-- 2022-05-04 11:51:01
