-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 22 2022 г., 18:12
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hakaton`
--

-- --------------------------------------------------------

--
-- Структура таблицы `date`
--

CREATE TABLE `date` (
  `id` int(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `othestvo` varchar(30) NOT NULL,
  `iin` bigint(12) NOT NULL,
  `city` varchar(15) NOT NULL,
  `street` varchar(30) NOT NULL,
  `house` varchar(5) NOT NULL,
  `flat` varchar(3) NOT NULL,
  `cadast` varchar(20) NOT NULL,
  `area` int(10) NOT NULL,
  `dop` text NOT NULL,
  `coord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `date`
--

INSERT INTO `date` (`id`, `fname`, `name`, `othestvo`, `iin`, `city`, `street`, `house`, `flat`, `cadast`, `area`, `dop`, `coord`) VALUES
(30, '', 'Ерназар Жумабаев', '', 0, 'Актобе', '', '', '', '', 0, '', 'Array'),
(31, '', 'Ерназар Жумабаев', '', 0, 'Актобе', '', '', '', '', 0, '', '50.300377,57.154555'),
(32, '', 'Ерназар Жумабаев', '', 0, 'Актобе', 'улица Д.А. Кунаева', '64', '', '', 0, '', '50.293247,57.221031'),
(33, '', 'Ерназар Жумабаев', '', 0, 'Актобе', 'улица Д.А. Кунаева', '', '', '', 0, '', '50.292781,57.223007');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `date`
--
ALTER TABLE `date`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
