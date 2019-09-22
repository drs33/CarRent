-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 11 2019 г., 14:25
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ap1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regnum` varchar(10000) NOT NULL,
  `id_model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`id`, `color`, `status`, `regnum`, `id_model`) VALUES
(1, 'black', 'enable', 'c872ta198', 3),
(2, 'white', 'enable', 'h221ma98', 2),
(3, 'brown', 'enable', 'c445xc78', 1),
(4, 'gray', 'NOT available', 'k200em198', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `login` varchar(500) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `stag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `sname`, `phone`, `login`, `password`, `stag`) VALUES
(82, 'Evgeniy', 'Alferov', '+7(921)747-55-20', 'drs33', '123', 0),
(83, '', '', '', '333', '333', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `dogovor`
--

CREATE TABLE `dogovor` (
  `id` int(11) NOT NULL,
  `dataf` date NOT NULL,
  `datal` date NOT NULL,
  `dlitelnost` int(11) NOT NULL,
  `zena` int(11) NOT NULL,
  `summ` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `dogovor`
--

INSERT INTO `dogovor` (`id`, `dataf`, `datal`, `dlitelnost`, `zena`, `summ`, `id_client`, `id_auto`) VALUES
(2, '2019-05-12', '2019-05-13', 0, 0, 0, 82, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `marka` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `trannsm` varchar(50) NOT NULL,
  `zena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`id`, `marka`, `model`, `class`, `trannsm`, `zena`) VALUES
(1, 'renault', 'logan', 'econom', 'mech', 1500),
(2, 'hyundai', 'solaris', 'econom', 'auto', 1500),
(3, 'bmw', 'x5', 'business', 'auto', 4500),
(4, 'audi', 'a5', 'business', 'auto', 4500);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_model` (`id_model`),
  ADD KEY `id_model_2` (`id_model`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `dogovor`
--
ALTER TABLE `dogovor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`,`id_auto`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `dogovor`
--
ALTER TABLE `dogovor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `model` (`id`);

--
-- Ограничения внешнего ключа таблицы `dogovor`
--
ALTER TABLE `dogovor`
  ADD CONSTRAINT `dogovor_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `dogovor_ibfk_2` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
