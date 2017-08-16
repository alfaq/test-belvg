-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 16 2017 г., 15:55
-- Версия сервера: 5.6.34-log
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test.app`
--

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id записи',
  `type` enum('magento','prestashop') NOT NULL COMMENT 'тип CMS',
  `name` varchar(255) NOT NULL COMMENT 'имя директории сайта',
  `db_host` varchar(255) NOT NULL,
  `db_name` varchar(255) NOT NULL,
  `db_username` varchar(255) NOT NULL,
  `db_password` varchar(255) NOT NULL,
  `date` datetime NOT NULL COMMENT 'время обхода',
  `last_modified` date NOT NULL COMMENT 'время последнего изменения файла конфига'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `type`, `name`, `db_host`, `db_name`, `db_username`, `db_password`, `date`, `last_modified`) VALUES
(1, 'prestashop', 'site1-pr', 'db.some-host.com5656', 'prestashop-1238-5656', 'dbuser', '577prEsFpaTUkuF5656', '2017-08-16 15:55:15', '2017-08-15'),
(2, 'magento', 'site2-m', 'localhost', 'some-host-db2', 'dbuser', ';3e-;{8=/]02Q5E', '2017-08-16 15:55:15', '2017-08-15'),
(3, 'prestashop', 'site3-pr', 'db.some-host.com', 'prestashop-1238-2', 'dbuser', '577prEsFpaTUkuF', '2017-08-16 15:55:15', '2017-08-15'),
(4, 'magento', 'site4-m', 'localhost', 'some-host-db', 'dbuser', ';3e-;{8=/]02Q5E', '2017-08-16 15:55:15', '2017-08-15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id записи', AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
