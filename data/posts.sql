-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2017 г., 00:39
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `posts`
--

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `p_id` bigint(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `p_parent_id` bigint(11) unsigned DEFAULT NULL COMMENT 'id родителя',
  `p_text` text NOT NULL COMMENT 'текст',
  `p_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'дата',
  `p_uid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_parent_id` (`p_parent_id`,`p_date`),
  KEY `p_uid` (`p_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=337 ;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`p_id`, `p_parent_id`, `p_text`, `p_date`, `p_uid`) VALUES
(332, 0, 'екпекп', '2017-01-29 22:37:40', 3),
(333, 332, 'упаекпаекп', '2017-01-29 22:37:49', 3),
(334, 332, 'Сообщение 2', '2017-01-29 22:38:10', 3),
(335, 332, 'Сообщение 3', '2017-01-29 22:38:22', 3),
(336, 0, 'Сообщение 4', '2017-01-29 22:38:29', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_name` varchar(250) DEFAULT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_ip` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_ip`) VALUES
(3, 'Max Karas', 'karasmg@gmail.com', 0),
(2, 'Ivan Petrov', 'ivanpetrov@gmail.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
