-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2017 г., 19:11
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

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
  `p_level` int(5) unsigned NOT NULL DEFAULT '0' COMMENT 'уровень вложенности',
  `p_root` bigint(11) unsigned NOT NULL COMMENT 'id корневого поста',
  PRIMARY KEY (`p_id`),
  KEY `p_parent_id` (`p_parent_id`,`p_date`),
  KEY `p_level` (`p_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=264 ;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`p_id`, `p_parent_id`, `p_text`, `p_date`, `p_level`, `p_root`) VALUES
(1, NULL, 'Сообщение 1', '2017-01-19 20:53:03', 0, 0),
(2, 1, 'Сообщение 3', '2017-01-20 13:26:47', 1, 1),
(3, NULL, 'Сообщение 2', '2017-01-19 20:57:26', 0, 0),
(4, 1, 'Сообщение 4', '2017-01-20 13:26:47', 1, 1),
(5, NULL, 'Сообщение 1', '2017-01-19 20:53:00', 0, 0),
(6, NULL, 'Сообщение 1', '2017-01-19 20:53:00', 0, 0),
(7, 1, 'Сообщение 3', '2017-01-20 13:26:47', 1, 1),
(8, NULL, 'Сообщение 2', '2017-01-19 20:57:00', 0, 0),
(9, 1, 'Сообщение 4', '2017-01-20 13:26:47', 1, 1),
(10, 3, 'Сообщение 5', '2017-01-20 13:26:47', 1, 3),
(11, 3, 'Сообщение 6', '2017-01-20 13:26:47', 1, 3),
(12, 5, 'Сообщение 7', '2017-01-20 13:26:47', 1, 5),
(13, 7, 'Сообщение 8', '2017-01-20 14:07:31', 2, 0),
(14, 6, 'Сообщение 9', '2017-01-20 13:26:47', 1, 6),
(15, 3, 'Сообщение 10', '2017-01-20 13:26:47', 1, 3),
(16, NULL, 'Сообщение 11', '2017-01-26 20:57:00', 0, 0),
(17, 11, 'Сообщение 12', '2017-01-20 14:07:31', 2, 0),
(18, 12, 'Сообщение 13', '2017-01-20 14:07:31', 2, 0),
(19, 13, 'Сообщение 14', '2017-01-20 15:33:28', 3, 13),
(20, 14, 'Сообщение 15', '2017-01-20 14:07:31', 2, 0),
(21, 12, 'Сообщение 16', '2017-01-20 14:07:31', 2, 0),
(22, 11, 'Сообщение 17', '2017-01-20 14:07:31', 2, 0),
(23, 12, 'Сообщение 18', '2017-01-20 14:07:31', 2, 0),
(24, 18, 'Сообщение 19', '2017-01-20 15:33:28', 3, 18),
(25, 16, 'Сообщение 20', '2017-01-20 13:26:47', 1, 16),
(26, NULL, 'Сообщение 21', '2017-02-05 20:57:00', 0, 0),
(27, 21, 'Сообщение 22', '2017-01-20 15:33:28', 3, 21),
(28, 21, 'Сообщение 23', '2017-01-20 15:33:28', 3, 21),
(29, 21, 'Сообщение 24', '2017-01-20 15:33:28', 3, 21),
(30, 22, 'Сообщение 25', '2017-01-20 15:33:28', 3, 22),
(31, 22, 'Сообщение 26', '2017-01-20 15:33:28', 3, 22),
(32, 23, 'Сообщение 27', '2017-01-20 15:33:28', 3, 23),
(33, 22, 'Сообщение 28', '2017-01-20 15:33:28', 3, 22),
(34, 21, 'Сообщение 29', '2017-01-20 15:33:28', 3, 21),
(35, 22, 'Сообщение 30', '2017-01-20 15:33:28', 3, 22),
(36, 23, 'Сообщение 31', '2017-01-20 15:33:28', 3, 23),
(37, 24, 'Сообщение 32', '2017-01-20 14:10:51', 4, 0),
(38, NULL, 'Сообщение 33', '2017-02-17 20:57:00', 0, 0),
(39, 33, 'Сообщение 34', '2017-01-20 14:10:51', 4, 0),
(40, 34, 'Сообщение 35', '2017-01-20 14:10:51', 4, 0),
(41, 35, 'Сообщение 36', '2017-01-20 14:10:51', 4, 0),
(42, 36, 'Сообщение 37', '2017-01-20 14:10:51', 4, 0),
(43, 37, 'Сообщение 38', '2017-01-20 14:11:02', 5, 0),
(44, 38, 'Сообщение 39', '2017-01-20 13:26:47', 1, 38),
(45, 39, 'Сообщение 40', '2017-01-20 14:11:02', 5, 0),
(46, 40, 'Сообщение 41', '2017-01-20 14:11:02', 5, 0),
(47, NULL, 'Сообщение 42', '2017-02-26 20:57:00', 0, 0),
(48, 42, 'Сообщение 43', '2017-01-20 14:11:02', 5, 0),
(49, 43, 'Сообщение 44', '2017-01-20 14:11:19', 6, 0),
(50, 43, 'Сообщение 45', '2017-01-20 14:11:19', 6, 0),
(51, 43, 'Сообщение 46', '2017-01-20 14:11:19', 6, 0),
(52, 43, 'Сообщение 47', '2017-01-20 14:11:19', 6, 0),
(53, 43, 'Сообщение 48', '2017-01-20 14:11:19', 6, 0),
(54, 43, 'Сообщение 49', '2017-01-20 14:11:19', 6, 0),
(55, NULL, 'Сообщение 50', '2017-03-06 20:57:00', 0, 0),
(56, 50, 'Сообщение 51', '2017-01-20 14:11:28', 7, 0),
(57, 51, 'Сообщение 52', '2017-01-20 14:11:28', 7, 0),
(58, 52, 'Сообщение 53', '2017-01-20 14:11:28', 7, 0),
(59, 53, 'Сообщение 54', '2017-01-20 14:11:28', 7, 0),
(60, 54, 'Сообщение 55', '2017-01-20 14:11:28', 7, 0),
(61, 55, 'Сообщение 56', '2017-01-20 13:26:47', 1, 55),
(62, 56, 'Сообщение 57', '2017-01-20 14:11:42', 8, 0),
(63, NULL, 'Сообщение 58', '2017-03-14 20:57:00', 0, 0),
(64, 58, 'Сообщение 59', '2017-01-20 14:11:42', 8, 0),
(65, 59, 'Сообщение 60', '2017-01-20 14:11:42', 8, 0),
(66, 59, 'Сообщение 61', '2017-01-20 14:11:42', 8, 0),
(67, 59, 'Сообщение 62', '2017-01-20 14:11:42', 8, 0),
(68, 60, 'Сообщение 63', '2017-01-20 14:11:42', 8, 0),
(69, 61, 'Сообщение 64', '2017-01-20 14:07:31', 2, 0),
(70, 61, 'Сообщение 65', '2017-01-20 14:07:31', 2, 0),
(71, 62, 'Сообщение 66', '2017-01-20 14:11:53', 9, 0),
(72, 63, 'Сообщение 67', '2017-01-20 13:26:47', 1, 63),
(73, 64, 'Сообщение 68', '2017-01-20 14:11:53', 9, 0),
(74, 65, 'Сообщение 69', '2017-01-20 14:11:53', 9, 0),
(75, 66, 'Сообщение 70', '2017-01-20 14:11:53', 9, 0),
(76, 67, 'Сообщение 71', '2017-01-20 14:11:53', 9, 0),
(77, 68, 'Сообщение 72', '2017-01-20 14:11:53', 9, 0),
(78, 69, 'Сообщение 73', '2017-01-20 15:33:28', 3, 69),
(79, 70, 'Сообщение 74', '2017-01-20 15:33:28', 3, 70),
(80, 71, 'Сообщение 75', '2017-01-20 14:12:04', 10, 0),
(81, 72, 'Сообщение 76', '2017-01-20 14:07:31', 2, 0),
(82, 73, 'Сообщение 77', '2017-01-20 14:12:04', 10, 0),
(83, 74, 'Сообщение 78', '2017-01-20 14:12:04', 10, 0),
(84, 75, 'Сообщение 79', '2017-01-20 14:12:04', 10, 0),
(85, 76, 'Сообщение 80', '2017-01-20 14:12:04', 10, 0),
(86, 80, 'Сообщение 81', '2017-01-20 14:12:23', 11, 0),
(87, 80, 'Сообщение 82', '2017-01-20 14:12:23', 11, 0),
(88, NULL, 'Сообщение 83', '2017-04-08 19:57:00', 0, 0),
(89, 83, 'Сообщение 84', '2017-01-20 14:12:23', 11, 0),
(90, 84, 'Сообщение 85', '2017-01-20 14:12:23', 11, 0),
(91, 83, 'Сообщение 86', '2017-01-20 14:12:23', 11, 0),
(92, 84, 'Сообщение 87', '2017-01-20 14:12:23', 11, 0),
(93, 87, 'Сообщение 88', '2017-01-20 14:12:33', 12, 0),
(94, 87, 'Сообщение 89', '2017-01-20 14:12:33', 12, 0),
(95, 87, 'Сообщение 90', '2017-01-20 14:12:33', 12, 0),
(96, 87, 'Сообщение 91', '2017-01-20 14:12:33', 12, 0),
(97, 87, 'Сообщение 92', '2017-01-20 14:12:33', 12, 0),
(98, 87, 'Сообщение 93', '2017-01-20 14:12:33', 12, 0),
(99, 87, 'Сообщение 94', '2017-01-20 14:12:33', 12, 0),
(100, 87, 'Сообщение 95', '2017-01-20 14:12:33', 12, 0),
(101, 87, 'Сообщение 96', '2017-01-20 14:12:33', 12, 0),
(102, 87, 'Сообщение 97', '2017-01-20 14:12:33', 12, 0),
(103, 87, 'Сообщение 98', '2017-01-20 14:12:33', 12, 0),
(104, 87, 'Сообщение 99', '2017-01-20 14:12:33', 12, 0),
(105, 87, 'Сообщение 100', '2017-01-20 14:12:33', 12, 0),
(106, 87, 'Сообщение 101', '2017-01-20 14:12:33', 12, 0),
(107, NULL, 'Сообщение 102', '2017-04-27 19:57:00', 0, 0),
(108, 102, 'Сообщение 103', '2017-01-20 14:12:46', 13, 0),
(109, 103, 'Сообщение 104', '2017-01-20 14:12:46', 13, 0),
(110, 104, 'Сообщение 105', '2017-01-20 14:12:46', 13, 0),
(111, 105, 'Сообщение 106', '2017-01-20 14:12:46', 13, 0),
(112, 106, 'Сообщение 107', '2017-01-20 14:12:46', 13, 0),
(113, 107, 'Сообщение 108', '2017-01-20 13:26:47', 1, 107),
(114, 108, 'Сообщение 109', '2017-01-20 14:13:07', 14, 0),
(115, 108, 'Сообщение 110', '2017-01-20 14:13:07', 14, 0),
(116, 108, 'Сообщение 111', '2017-01-20 14:13:07', 14, 0),
(117, 109, 'Сообщение 112', '2017-01-20 14:13:07', 14, 0),
(118, 110, 'Сообщение 113', '2017-01-20 14:13:07', 14, 0),
(119, 111, 'Сообщение 114', '2017-01-20 14:13:07', 14, 0),
(120, NULL, 'Сообщение 115', '2017-05-10 19:57:00', 0, 0),
(121, 115, 'Сообщение 116', '2017-01-20 14:13:22', 15, 0),
(122, 115, 'Сообщение 117', '2017-01-20 14:13:22', 15, 0),
(123, 115, 'Сообщение 118', '2017-01-20 14:13:22', 15, 0),
(124, 116, 'Сообщение 119', '2017-01-20 14:13:22', 15, 0),
(125, 117, 'Сообщение 120', '2017-01-20 14:13:22', 15, 0),
(126, 118, 'Сообщение 121', '2017-01-20 14:13:22', 15, 0),
(127, 119, 'Сообщение 122', '2017-01-20 14:13:22', 15, 0),
(128, 120, 'Сообщение 123', '2017-01-20 13:26:47', 1, 120),
(129, 120, 'Сообщение 124', '2017-01-20 13:26:47', 1, 120),
(130, 120, 'Сообщение 125', '2017-01-20 13:26:47', 1, 120),
(131, 120, 'Сообщение 126', '2017-01-20 13:26:47', 1, 120),
(132, 121, 'Сообщение 127', '2017-01-20 14:13:30', 16, 0),
(133, 122, 'Сообщение 128', '2017-01-20 14:13:30', 16, 0),
(134, 123, 'Сообщение 129', '2017-01-20 14:13:30', 16, 0),
(135, NULL, 'Сообщение 130', '2017-05-25 19:57:00', 0, 0),
(136, 130, 'Сообщение 131', '2017-01-20 14:07:31', 2, 0),
(137, 131, 'Сообщение 132', '2017-01-20 14:07:31', 2, 0),
(138, 132, 'Сообщение 133', '2017-01-20 14:13:43', 17, 0),
(139, 133, 'Сообщение 134', '2017-01-20 14:13:43', 17, 0),
(140, 134, 'Сообщение 135', '2017-01-20 14:13:43', 17, 0),
(141, 135, 'Сообщение 136', '2017-01-20 13:26:47', 1, 135),
(142, 136, 'Сообщение 137', '2017-01-20 15:33:28', 3, 136),
(143, 137, 'Сообщение 138', '2017-01-20 15:33:28', 3, 137),
(144, 138, 'Сообщение 139', '2017-01-20 14:13:51', 18, 0),
(145, 139, 'Сообщение 140', '2017-01-20 14:13:51', 18, 0),
(146, 140, 'Сообщение 141', '2017-01-20 14:13:51', 18, 0),
(147, 141, 'Сообщение 142', '2017-01-20 14:07:31', 2, 0),
(148, 142, 'Сообщение 143', '2017-01-20 14:10:51', 4, 0),
(149, NULL, 'Сообщение 144', '2017-06-08 19:57:00', 0, 0),
(150, 140, 'Сообщение 145', '2017-01-20 14:13:51', 18, 0),
(151, 140, 'Сообщение 146', '2017-01-20 14:13:51', 18, 0),
(152, 140, 'Сообщение 147', '2017-01-20 14:13:51', 18, 0),
(153, 140, 'Сообщение 148', '2017-01-20 14:13:51', 18, 0),
(154, 140, 'Сообщение 149', '2017-01-20 14:13:51', 18, 0),
(155, 140, 'Сообщение 150', '2017-01-20 14:13:51', 18, 0),
(156, 140, 'Сообщение 151', '2017-01-20 14:13:51', 18, 0),
(157, 140, 'Сообщение 152', '2017-01-20 14:13:51', 18, 0),
(158, 140, 'Сообщение 153', '2017-01-20 14:13:51', 18, 0),
(159, 140, 'Сообщение 154', '2017-01-20 14:13:51', 18, 0),
(160, 140, 'Сообщение 155', '2017-01-20 14:13:51', 18, 0),
(161, 155, 'Сообщение 156', '2017-01-20 14:14:05', 19, 0),
(162, 156, 'Сообщение 157', '2017-01-20 14:14:05', 19, 0),
(163, 157, 'Сообщение 158', '2017-01-20 14:14:05', 19, 0),
(164, 158, 'Сообщение 159', '2017-01-20 14:14:05', 19, 0),
(165, NULL, 'Сообщение 160', '2017-06-24 19:57:00', 0, 0),
(166, 157, 'Сообщение 161', '2017-01-20 14:14:05', 19, 0),
(167, 157, 'Сообщение 162', '2017-01-20 14:14:05', 19, 0),
(168, 157, 'Сообщение 163', '2017-01-20 14:14:05', 19, 0),
(169, 157, 'Сообщение 164', '2017-01-20 14:14:05', 19, 0),
(170, 157, 'Сообщение 165', '2017-01-20 14:14:05', 19, 0),
(171, 157, 'Сообщение 166', '2017-01-20 14:14:05', 19, 0),
(172, 157, 'Сообщение 167', '2017-01-20 14:14:05', 19, 0),
(173, 157, 'Сообщение 168', '2017-01-20 14:14:05', 19, 0),
(174, NULL, 'Сообщение 169', '2017-07-03 19:57:00', 0, 0),
(175, 122, 'Сообщение 170', '2017-01-20 14:13:30', 16, 0),
(176, 121, 'Сообщение 171', '2017-01-20 14:13:30', 16, 0),
(177, 119, 'Сообщение 172', '2017-01-20 14:13:22', 15, 0),
(178, 170, 'Сообщение 173', '2017-01-20 14:14:18', 20, 0),
(179, 171, 'Сообщение 174', '2017-01-20 14:14:18', 20, 0),
(180, 172, 'Сообщение 175', '2017-01-20 14:14:18', 20, 0),
(181, 173, 'Сообщение 176', '2017-01-20 14:14:18', 20, 0),
(182, 174, 'Сообщение 177', '2017-01-20 13:26:47', 1, 174),
(183, 175, 'Сообщение 178', '2017-01-20 14:13:43', 17, 0),
(184, 176, 'Сообщение 179', '2017-01-20 14:13:43', 17, 0),
(185, NULL, 'Сообщение 180', '2017-07-14 19:57:00', 0, 0),
(186, 180, 'Сообщение 181', '2017-01-20 14:14:31', 21, 0),
(187, 180, 'Сообщение 182', '2017-01-20 14:14:31', 21, 0),
(188, 180, 'Сообщение 183', '2017-01-20 14:14:31', 21, 0),
(189, 183, 'Сообщение 184', '2017-01-20 14:13:51', 18, 0),
(190, 181, 'Сообщение 185', '2017-01-20 14:14:31', 21, 0),
(191, 182, 'Сообщение 186', '2017-01-20 14:07:31', 2, 0),
(192, 183, 'Сообщение 187', '2017-01-20 14:13:51', 18, 0),
(193, 184, 'Сообщение 188', '2017-01-20 14:13:51', 18, 0),
(194, 185, 'Сообщение 189', '2017-01-20 13:26:47', 1, 185),
(195, 186, 'Сообщение 190', '2017-01-20 14:14:43', 22, 0),
(196, 187, 'Сообщение 191', '2017-01-20 14:14:43', 22, 0),
(197, 188, 'Сообщение 192', '2017-01-20 14:14:43', 22, 0),
(198, NULL, 'Сообщение 193', '2017-07-27 19:57:00', 0, 0),
(199, 190, 'Сообщение 194', '2017-01-20 14:14:43', 22, 0),
(200, 191, 'Сообщение 195', '2017-01-20 15:33:28', 3, 191),
(201, 192, 'Сообщение 196', '2017-01-20 14:14:05', 19, 0),
(202, 193, 'Сообщение 197', '2017-01-20 14:14:05', 19, 0),
(203, 194, 'Сообщение 198', '2017-01-20 14:07:31', 2, 0),
(204, 195, 'Сообщение 199', '2017-01-20 14:14:54', 23, 0),
(205, 196, 'Сообщение 200', '2017-01-20 14:14:54', 23, 0),
(206, 197, 'Сообщение 201', '2017-01-20 14:14:54', 23, 0),
(207, 198, 'Сообщение 202', '2017-01-20 13:26:47', 1, 198),
(208, 199, 'Сообщение 203', '2017-01-20 14:14:54', 23, 0),
(209, 200, 'Сообщение 204', '2017-01-20 14:10:51', 4, 0),
(210, NULL, 'Сообщение 205', '2017-08-08 19:57:00', 0, 0),
(211, 205, 'Сообщение 206', '2017-01-20 14:15:07', 24, 0),
(212, 206, 'Сообщение 207', '2017-01-20 14:15:07', 24, 0),
(213, 207, 'Сообщение 208', '2017-01-20 14:07:31', 2, 0),
(214, 208, 'Сообщение 209', '2017-01-20 14:15:07', 24, 0),
(215, 209, 'Сообщение 210', '2017-01-20 14:11:02', 5, 0),
(216, 210, 'Сообщение 211', '2017-01-20 13:26:47', 1, 210),
(217, 211, 'Сообщение 212', '2017-01-20 14:15:13', 25, 0),
(218, 212, 'Сообщение 213', '2017-01-20 14:15:13', 25, 0),
(219, 213, 'Сообщение 214', '2017-01-20 15:33:28', 3, 213),
(220, 214, 'Сообщение 215', '2017-01-20 14:15:13', 25, 0),
(221, 215, 'Сообщение 216', '2017-01-20 14:11:19', 6, 0),
(222, NULL, 'Сообщение 217', '2017-08-20 19:57:00', 0, 0),
(223, 205, 'Сообщение 218', '2017-01-20 14:15:07', 24, 0),
(224, 206, 'Сообщение 219', '2017-01-20 14:15:07', 24, 0),
(225, 207, 'Сообщение 220', '2017-01-20 14:07:31', 2, 0),
(226, 208, 'Сообщение 221', '2017-01-20 14:15:07', 24, 0),
(227, 209, 'Сообщение 222', '2017-01-20 14:11:02', 5, 0),
(228, 210, 'Сообщение 223', '2017-01-20 13:26:47', 1, 210),
(229, 211, 'Сообщение 224', '2017-01-20 14:15:13', 25, 0),
(230, 212, 'Сообщение 225', '2017-01-20 14:15:13', 25, 0),
(231, 213, 'Сообщение 226', '2017-01-20 15:33:28', 3, 213),
(232, 214, 'Сообщение 227', '2017-01-20 14:15:13', 25, 0),
(233, 215, 'Сообщение 228', '2017-01-20 14:11:19', 6, 0),
(234, 216, 'Сообщение 229', '2017-01-20 14:07:31', 2, 0),
(235, NULL, 'Сообщение 230', '2017-09-02 19:57:00', 0, 0),
(236, 230, 'Сообщение 231', '2017-01-20 14:15:20', 26, 0),
(237, 207, 'Сообщение 232', '2017-01-20 14:07:31', 2, 0),
(238, 208, 'Сообщение 233', '2017-01-20 14:15:07', 24, 0),
(239, 209, 'Сообщение 234', '2017-01-20 14:11:02', 5, 0),
(240, 210, 'Сообщение 235', '2017-01-20 13:26:47', 1, 210),
(241, 211, 'Сообщение 236', '2017-01-20 14:15:13', 25, 0),
(242, 212, 'Сообщение 237', '2017-01-20 14:15:13', 25, 0),
(243, 213, 'Сообщение 238', '2017-01-20 15:33:28', 3, 213),
(244, 214, 'Сообщение 239', '2017-01-20 14:15:13', 25, 0),
(245, 201, 'Сообщение 240', '2017-01-20 14:14:18', 20, 0),
(246, NULL, 'Сообщение 241', '2017-09-13 19:57:00', 0, 0),
(247, 209, 'Сообщение 242', '2017-01-20 14:11:02', 5, 0),
(248, 210, 'Сообщение 243', '2017-01-20 13:26:47', 1, 210),
(249, 211, 'Сообщение 244', '2017-01-20 14:15:13', 25, 0),
(250, 212, 'Сообщение 245', '2017-01-20 14:15:13', 25, 0),
(251, 213, 'Сообщение 246', '2017-01-20 15:33:28', 3, 213),
(252, 214, 'Сообщение 247', '2017-01-20 14:15:13', 25, 0),
(253, 215, 'Сообщение 248', '2017-01-20 14:11:19', 6, 0),
(254, 216, 'Сообщение 249', '2017-01-20 14:07:31', 2, 0),
(255, 214, 'Сообщение 250', '2017-01-20 14:15:13', 25, 0),
(256, 215, 'Сообщение 251', '2017-01-20 14:11:19', 6, 0),
(257, 216, 'Сообщение 252', '2017-01-20 14:07:31', 2, 0),
(258, NULL, 'Сообщение 253', '2017-09-25 19:57:00', 0, 0),
(259, 253, 'Сообщение 254', '2017-01-20 14:11:28', 7, 0),
(260, 253, 'Сообщение 255', '2017-01-20 14:11:28', 7, 0),
(261, 253, 'Сообщение 256', '2017-01-20 14:11:28', 7, 0),
(262, 253, 'Сообщение 257', '2017-01-20 14:11:28', 7, 0),
(263, 253, 'Сообщение 258', '2017-01-20 14:11:28', 7, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
