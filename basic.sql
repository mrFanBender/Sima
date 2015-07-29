-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 29 2015 г., 06:36
-- Версия сервера: 5.6.15-log
-- Версия PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `src`) VALUES
(1, '/sima/web/uploads/8363737128_b76782c7a2_b.jpg'),
(5, '/sima/web/uploads/16981606012_bb4cc962c9_b.jpg'),
(13, '/sima/web/uploads/18984154033_633c3b708a_b.jpg'),
(21, '/sima/web/uploads/BC0153244396B0CD1A4F6EF48431D489_1920x1080.jpg'),
(23, '/sima/web/uploads/18978168593_7df261af58_b.jpg'),
(22, '/sima/web/uploads/16023192786_e3c717597c_b.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `imageslikes`
--

CREATE TABLE IF NOT EXISTS `imageslikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `imageslikes`
--

INSERT INTO `imageslikes` (`id`, `user_id`, `image_id`) VALUES
(2, 1, 1),
(3, 1, 5),
(4, 1, 21),
(5, 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1437574532),
('m150722_141430_basic', 1437574536),
('m150722_142423_crate_tables_user_and_post', 1437575082),
('m150722_142731_changes', 1437575264),
('m150722_142946_change2', 1437575944),
('m150722_144723_change3', 1437576476),
('m150722_145139_add_admin', 1437576909);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` varchar(255) NOT NULL,
  `text` text,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_key` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin23'),
(10, 'rustam', '123'),
(9, 'admin2', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
