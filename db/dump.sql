-- Adminer 4.8.1 MySQL 10.9.2-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `id_user` int(10) unsigned NOT NULL,
                            `id_recipe` int(10) unsigned NOT NULL,
                            `text` text NOT NULL,
                            PRIMARY KEY (`id`),
                            KEY `id_user` (`id_user`),
                            KEY `id_recipe` (`id_recipe`),
                            CONSTRAINT `comments_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
                            CONSTRAINT `comments_ibfk_7` FOREIGN KEY (`id_recipe`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `comments` (`id`, `id_user`, `id_recipe`, `text`) VALUES
                                                                  (23,	1,	13,	'super!'),
                                                                  (24,	16,	18,	'komentar od jozka'),
                                                                  (25,	1,	18,	'Admin komentar 1');

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
                         `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                         `id_user` int(10) unsigned NOT NULL,
                         `id_recipe` int(10) unsigned NOT NULL,
                         PRIMARY KEY (`id`),
                         KEY `id_user` (`id_user`),
                         KEY `id_recipe` (`id_recipe`),
                         CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
                         CONSTRAINT `likes_ibfk_4` FOREIGN KEY (`id_recipe`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `likes` (`id`, `id_user`, `id_recipe`) VALUES
                                                       (99,	16,	16),
                                                       (100,	16,	13),
                                                       (101,	1,	18);

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
                           KEY `id_user` (`id_user`),
                           CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `recipes` (`id`, `title`, `description`, `text`, `time`, `rating`, `id_user`) VALUES
                                                                                              (13,	'recetsss',	'dwadawdadwfa',	'fwaffafwffawf',	12,	1,	1),
                                                                                              (16,	'dwadwa',	'dwadwad',	'dwadawdwadwad',	0,	1,	1),
                                                                                              (18,	'Jozkov prvy recept',	'prvy recept',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fringilla varius massa eu gravida. Nunc efficitur odio vel accumsan porta. Nunc nec tortor a urna sagittis mollis. Sed consectetur, augue quis dignissim suscipit, lorem augue dignissim odio, facilisis bibendum nibh quam non nibh. Nunc vitae purus nec justo interdum suscipit congue non lectus. Quisque sit amet dolor sit amet libero posuere faucibus eu quis lacus. Integer sed quam non elit iaculis lacinia. Nunc sagittis efficitur leo id bibendum. Donec consectetur libero nec nisl sollicitudin consequat.',	15,	1,	16),
                                                                                              (19,	'Druhy recept',	'kratky opis',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In fringilla varius massa eu gravida. Nunc efficitur odio vel accumsan porta. Nunc nec tortor a urna sagittis mollis. Sed consectetur, augue quis dignissim suscipit, lorem augue dignissim odio, facilisis bibendum nibh quam non nibh. Nunc vitae purus nec justo interdum suscipit congue non lectus. Quisque sit amet dolor sit amet libero posuere faucibus eu quis lacus. Integer sed quam non elit iaculis lacinia. Nunc sagittis efficitur leo id bibendum. Donec consectetur libero nec nisl sollicitudin consequat.',	15,	0,	16),
                                                                                              (20,	'Jablko',	'Jablko',	'Pole',	1,	0,	17);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
                         `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                         `login` varchar(50) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `users` (`id`, `login`, `password`) VALUES
                                                    (1,	'admin',	'$argon2id$v=19$m=65536,t=4,p=1$aHlsdGl1bEVHYmExaEFtTA$pimCkG4sGceJrikkEfsEKuXwpD8QfZ2uwgTCitrf98I'),
                                                    (15,	'Ferko',	'$argon2id$v=19$m=65536,t=4,p=1$NldVWEpudXlhSnZ2MEJPZA$AgiDS3nABw7FXFA/RgbyVHCNrXZD97QbQjbyzlp135I'),
                                                    (16,	'Jozko',	'$argon2id$v=19$m=65536,t=4,p=1$LmRxN2xvc1oubS9qZTMubQ$S7r01u61pq2e7ELk7km6LtOdQSdEK+3Irlsxckoe+Y4'),
                                                    (17,	'Mravec',	'$argon2id$v=19$m=65536,t=4,p=1$Y0hCUVl1ek5RR2NJMTcyMQ$lYPRDdMoVTZuM1kze0YwGP9e21DSyd039Nhyohz4Fv4');

-- 2023-01-17 19:56:08