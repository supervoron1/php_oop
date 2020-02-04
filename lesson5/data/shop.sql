-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 31 2020 г., 17:58
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Xiaomi Mi A2', 'смартфон', 10000, 'img1.jpg'),
(2, 'Xiaomi Redmi 6A', 'надежный смартфон по доступной цене', 12000, 'img2.jpg'),
(3, 'Huawei P30 Lite Peacock Blue', 'смартфон', 20000, 'img3.jpg'),
(4, 'Huawei P30 Breathing Crystal', 'идеальный смартфон премиум качества', 40000, 'img4.jpg'),
(5, 'Samsung UE50RU7170U', 'улучшенный телевизор', 40000, 'img5.jpg'),
(6, 'Sony KDL32WE613', 'инновационный дизайн', 55000, 'img6.jpg'),
(7, 'Haier LE24K6500SA', 'прогрессивный дизайн', 47000, 'img7.jpg'),
(8, 'Philips 55PUS6503', 'Недорогой качественный телевизор', 36000, 'img8.jpg'),
(9, 'Acer Aspire A315-21G-944Q NX.GQ4ER.059', 'ноутбук', 30000, 'img9.jpg'),
(10, 'ASUS S330UA-EY027T', 'компактность и функциональность', 55000, 'img10.jpg'),
(11, 'Lenovo IdeaPad 330-15IKB (81DE02VRRU)', 'удачные пропорции', 38000, 'img11.jpg'),
(12, 'Lenovo IdeaPad L340-17IRH (81LL001HRU)', 'игровой ноутбук - удачное решение для продвинутого геймера', 80000, 'img12.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL,
  `tel` varchar(63) NOT NULL,
  `email` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `tel`, `email`) VALUES
(1, 'Admin', '$2y$10$tckHPKk7agtljs5bB5QDL.l3BpA6fSIccaSGYLmTY7tyYwa.PSDpO', '11845755115e0373458eb886.78831411', '+14109573877', 'admin@aol.com'),
(2, 'Frondend TeamLead', '$2y$10$NIT7gVPBIzECGUmFFVzyJe3Uuh5iZu0m2Pr0iCjnGRoBGkniOxH16', '3404783135e030c4bd39be1.68860464', '+74991234567', 'admin@vorontsov.biz'),
(3, 'Backend TeamLead', '$2y$10$36zFuPAXAkN39zrlFTfteOmTsvvutLySC58KHIqw5hJAcI3Qdjqte', '3868285475e04c10f3137c0.50238975', '+14109570354', 'geek@bk.ru'),
(4, 'Frondend Dev', '$2y$10$3oxkssDLRhozL2n.DQPvLO.6RMHjjPlBjdtOvv8vfjh.FOlGZEiL.', '', '+79991712017', 'mike@vorontsov.biz'),
(5, 'Backend Dev', '$2y$10$XAiDujmjoZLhKDCqCR3Sou6QQLDsK9lfkNZJF8EUgTTSpbX9Elkqe', '', '+19991234567', 'yoda@tatuin.space'),
(6, 'Senior Dev', '$2y$10$Hqn8JMb9cPhC8xeA.i9feuceM4u3M62B3pkUHmulq/JaX/mspauma', '', '+14109573877', 'dev@time.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
