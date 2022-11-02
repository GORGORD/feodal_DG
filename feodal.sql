-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 02 2022 г., 05:11
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `feodal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `castles`
--

CREATE TABLE `castles` (
  `id` int NOT NULL,
  `idOwner` int NOT NULL,
  `gold` int NOT NULL,
  `posX` float NOT NULL,
  `posY` float NOT NULL,
  `level` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `castles`
--

INSERT INTO `castles` (`id`, `idOwner`, `gold`, `posX`, `posY`, `level`) VALUES
(1, 1, 993, 1, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `fromUser` int NOT NULL,
  `message` varchar(100) NOT NULL,
  `toUser` int NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `fromUser`, `message`, `toUser`, `time`) VALUES
(5, 1, 'привет', 0, '2022-10-25 19:15:41'),
(6, 2, 'пока', 0, '2022-10-25 19:15:52'),
(7, 2, 'ku', 0, '2022-10-25 19:15:57'),
(8, 1, 'ku', 0, '2022-10-25 19:16:03'),
(9, 4, 'Здарова', 0, '2022-10-25 19:48:23'),
(10, 5, 'хуй!', 0, '2022-10-25 20:08:57'),
(11, 6, 'и тебе хуй!', 0, '2022-10-25 20:09:07');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL,
  `name` varchar(36) NOT NULL,
  `token` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `token`) VALUES
(5, 'test', '37693cfc748049e45d87b8c7d8b9aacd', 'den', 'f3829c77813d381542f4ee288c5fbd11'),
(6, 'test2', '37693cfc748049e45d87b8c7d8b9aacd', 'den2', '709dc002be4b099d9e25b97660fb3850');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `castles`
--
ALTER TABLE `castles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `castles`
--
ALTER TABLE `castles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
