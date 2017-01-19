-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2017 г., 01:48
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `messages`
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
  `p_level` int(5) unsigned NOT NULL DEFAULT '0' COMMENT 'уровень вложенности',
  `p_root` bigint(11) unsigned NOT NULL COMMENT 'id корневого поста',
  PRIMARY KEY (`p_id`),
  KEY `p_parent_id` (`p_parent_id`,`p_date`),
  KEY `p_level` (`p_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`p_id`, `p_parent_id`, `p_text`, `p_date`, `p_level`, `p_root`) VALUES
(1, NULL, 'Сообщение 1', '2017-01-19 20:53:03', 0, 0),
(2, 1, 'Сообщение 3', '2017-01-19 20:57:26', 1, 0),
(3, NULL, 'Сообщение 2', '2017-01-19 20:57:26', 0, 0),
(4, 1, 'Сообщение 4', '2017-01-19 20:57:26', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
