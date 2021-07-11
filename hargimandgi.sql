-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2020 г., 08:04
-- Версия сервера: 10.3.22-MariaDB-54+deb10u1
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hargimandgi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `todolist`
--

CREATE TABLE `todolist` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `task` text NOT NULL,
  `state` tinyint(1) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `todolist`
--

INSERT INTO `todolist` (`name`, `email`, `task`, `state`, `id`) VALUES
('Amsam', 'amsam@mail.com', 'Find the sense of life', 1, 1),
('Umsum', 'Umsum@mail.com', 'Repair all broken cookies', 1, 2),
('Doshifushi', 'doshifushi@mail.com', 'Become a small square figure', 0, 3),
('Quantus', 'quantus@mail.com', 'Take a look at any finger of the left hand', 0, 4),
('Zukifan', 'zukifan@mail.com', 'Take a big round form', 0, 5),
('Xaieaouz', 'xaieaouz@mail.com', 'Do not do anything', 1, 6),
('Usmanhad', 'usmanhad@mail.com', 'Learn how to learn the principes of studying sciense', 0, 7),
('Artis', 'artis@mail.com', 'Forget about ... What?', 1, 8),
('Neoman', 'neoman@mail.com', 'Repeat one more time', 0, 9),
('Zelmer', 'zelmer@mail.com', 'Take some skills of drinking coffee', 0, 10),
('Dogface', 'dogface@mail.com', 'Show show', 0, 11),
('q', 'e', 'e', 0, 12),
('aaaabbb', 'aaabbbb', 'aaaabbbb', 1, 13),
('Fda', 'hjvfj@m.uv', 'Add a task', 0, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
