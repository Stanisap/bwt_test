-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 27 2020 г., 11:05
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bwt_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feetback`
--

CREATE TABLE `feetback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feetback`
--

INSERT INTO `feetback` (`id`, `user_id`, `text`, `date`) VALUES
(1, 2, 'Очень крутой сайт, мне все понравилось', '2020-02-27 08:59:47'),
(2, 3, 'Hi. This\'s a cool site', '2020-02-27 10:04:45'),
(3, 4, 'Здесь все так клево!', '2020-02-27 11:07:18'),
(4, 4, 'ваще крутяк', '2020-02-27 11:38:44'),
(6, 4, 'document.body.style.background = \"#ccc\";', '2020-02-27 11:52:03'),
(7, 4, 'cool', '2020-02-27 12:04:45');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `date_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `sex`, `date_birth`) VALUES
(1, 'Ruslan', 'Ivanov', 'ivan@email.com', 'male', '1985-04-12'),
(2, 'Constantin', 'Nicopol', 'knsn@i.ua', 'male', '0000-00-00'),
(3, 'Stas', 'serdjuk', 'qwerty@gmail.com', '', '0000-00-00'),
(4, 'vasja', 'vakarchuk', 'ivanov@i.ua', '', '0000-00-00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feetback`
--
ALTER TABLE `feetback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feetback`
--
ALTER TABLE `feetback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feetback`
--
ALTER TABLE `feetback`
  ADD CONSTRAINT `feetback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
