-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 23 2022 г., 00:17
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
-- Структура таблицы `deleted`
--

CREATE TABLE `deleted` (
  `iddeleted` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `otchestvo` varchar(30) NOT NULL,
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
-- Дамп данных таблицы `deleted`
--

INSERT INTO `deleted` (`iddeleted`, `id`, `fname`, `name`, `otchestvo`, `iin`, `city`, `street`, `house`, `flat`, `cadast`, `area`, `dop`, `coord`) VALUES
(1, 64, 'Ernazar', 'Zhumabaev', '', 0, '', '', 'Ernaz', 'Ern', '', 0, '', '43.13298,70.83994'),
(2, 61, 'Жумабаев', 'Ерназар', 'Кенжежбекулы', 20930550940, 'Актобе', 'улица Ораза Татеулы', '', '', '1234567', 150, '', '50.287659,57.221354');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `deleted`
--
ALTER TABLE `deleted`
  ADD PRIMARY KEY (`iddeleted`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `deleted`
--
ALTER TABLE `deleted`
  MODIFY `iddeleted` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
