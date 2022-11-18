
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `semestralka_db` /*!40100 DEFAULT CHARACTER SET utf8mb3 */;
USE `semestralka_db`;

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
                           `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                           `title` varchar(50) NOT NULL,
                           `description` text NOT NULL,
                           `text` longtext CHARACTER SET utf32 COLLATE utf32_czech_ci NOT NULL,
                           `time` int(11) NOT NULL,
                           `rating` float DEFAULT NULL,
                           `id_user` int(10) unsigned NOT NULL,
                           PRIMARY KEY (`id`),
                           KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

INSERT INTO `recipes` (`id`, `title`, `description`, `text`, `time`, `rating`, `id_user`) VALUES
                                                                                              (1,	'Pizza',	'ayo the pizza here!',	'wdawdadwada',	15,	4,	1),
                                                                                              (2,	'Hamburger',	'dwadwadwa',	'dwadwadwadadwadba',	16,	4,	1),
                                                                                              (10,	'recept1',	'wdwdwadwadwad',	'wgawgawgaasdwdawdawwd',	12,	0,	10),
                                                                                              (11,	'recept2',	'ognoignoinoin',	'wdawdawdawdadw',	15,	0,	10);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
                         `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                         `login` varchar(50) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

INSERT INTO `users` (`id`, `login`, `password`) VALUES
                                                    (1,	'admin',	'$argon2id$v=19$m=65536,t=4,p=1$aHlsdGl1bEVHYmExaEFtTA$pimCkG4sGceJrikkEfsEKuXwpD8QfZ2uwgTCitrf98I'),
                                                    (10,	'casnocha',	'$argon2id$v=19$m=65536,t=4,p=1$RHkuYlZxVWQyR2EwMUlreQ$dn8A/QB8y7YOLrnkFHeQNm17ZlAiQY7K6ckmxS9/AJI');