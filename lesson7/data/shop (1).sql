-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2020 г., 23:59
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

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`) VALUES
(8, 'd4elqseo9g8696mrsp43h4sk80dltl9g', 6),
(42, '6uhonr3q46dtlas2qj569qddht8ish4g', 2),
(78, '9jf2rhe4od26o3hs5kgsnl9gqbs31shd', 1),
(81, 'ttbjqd9t9t9e0eqrervhh1asku63iifl', 1),
(82, 'ttbjqd9t9t9e0eqrervhh1asku63iifl', 2),
(91, 'g35vboq1aaaoem9pqafgpii03mkfl7hp', 1),
(92, 'g35vboq1aaaoem9pqafgpii03mkfl7hp', 2),
(93, 'g35vboq1aaaoem9pqafgpii03mkfl7hp', 3),
(94, 'g35vboq1aaaoem9pqafgpii03mkfl7hp', 4),
(103, '7sjj45rm8dv8dnm3bau3nc8fqjno70ru', 1),
(104, 'ndlc6b6a89m19tijjbeieeq0jnfhkv83', 1),
(107, 'v2rhti8qidh27ooc7iml2h2m6skk92kf', 6),
(108, 'v2rhti8qidh27ooc7iml2h2m6skk92kf', 5),
(109, '410ia1mm4c8ipgq524ukof3lhk9skghf', 1),
(110, 'qfs647logejs07b3ei7a3slki96n39ql', 4),
(111, 'qfs647logejs07b3ei7a3slki96n39ql', 3),
(113, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 4),
(114, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 2),
(115, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 1),
(116, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 6),
(117, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 5),
(118, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 12),
(119, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 11),
(120, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 10),
(121, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 9),
(122, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 8),
(123, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 7),
(124, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 6),
(125, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 5),
(126, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 4),
(127, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 3),
(128, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 2),
(129, 'vvsppkkq58pv6et3opr0mm9r0b22h5sl', 1),
(132, 'dd53pd30g1rt1eg1f24bkv4qs4sd03hb', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `login` varchar(64) NOT NULL,
  `tel` varchar(64) NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_status_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `login`, `tel`, `email`, `order_status_id`) VALUES
(3, 'g35vboq1aaaoem9pqafgpii03mkfl7hp', 'Han Solo', '+7 (123) 465-66-56', 'solo@aol.com', '4'),
(7, 'v2rhti8qidh27ooc7iml2h2m6skk92kf', 'Admin', '+7 (554) 545-45-45', 'admin@mail.ru', '2'),
(9, '410ia1mm4c8ipgq524ukof3lhk9skghf', 'Senior Dev', '+7 (123) 465-66-56', 'msk@msk.su', '3'),
(10, 'qfs647logejs07b3ei7a3slki96n39ql', 'Admin', '+1 (410) 957-3877', 'oceancity@md.us', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'новый'),
(2, 'сборка'),
(3, 'доставка'),
(4, 'завершен');

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
(1, 'Xiaomi Mi A2 4/64GB Black', 'производительный смартфон', 10000, 'img1.jpg'),
(2, 'Xiaomi Redmi 6A 2/32GB Gold', 'надежный смартфон по доступной цене', 12000, 'img2.jpg'),
(3, 'Huawei P30 Lite Peacock Blue', 'современный смартфон', 20000, 'img3.jpg'),
(4, 'Huawei P30 Breathing Crystal', 'идеальный смартфон премиум качества', 40000, 'img4.jpg'),
(5, 'Samsung UE50RU7170U', 'улучшенный телевизор', 40000, 'img5.jpg'),
(6, 'Sony KDL32А613-67R', 'инновационный дизайн', 55000, 'img6.jpg'),
(7, 'Haier LE24K6500S-3RE', 'прогрессивный дизайн', 47000, 'img7.jpg'),
(8, 'Philips 55PUS6503-3BF3', 'недорогой качественный телевизор', 36000, 'img8.jpg'),
(9, 'Acer Aspire A315-21G-944Q', 'производительный ноутбук', 30000, 'img9.jpg'),
(10, 'ASUS S330UA-EY027T', 'компактность и функциональность', 55000, 'img10.jpg'),
(11, 'Lenovo IdeaPad 330-15IKB', 'удачное сочетание цена-качество', 38000, 'img11.jpg'),
(12, 'Lenovo IdeaPad L340-17IRH', 'ноутбук для продвинутого геймера', 80000, 'img12.jpg');

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
(1, 'Admin', '$2y$10$tckHPKk7agtljs5bB5QDL.l3BpA6fSIccaSGYLmTY7tyYwa.PSDpO', '13460931415e3e9b935e98c8.18795072', '+14109573877', 'admin@aol.com'),
(2, 'Frondend TeamLead', '$2y$10$NIT7gVPBIzECGUmFFVzyJe3Uuh5iZu0m2Pr0iCjnGRoBGkniOxH16', '', '+74991234567', 'admin@vorontsov.biz'),
(3, 'Backend TeamLead', '$2y$10$36zFuPAXAkN39zrlFTfteOmTsvvutLySC58KHIqw5hJAcI3Qdjqte', '', '+14109570354', 'geek@bk.ru'),
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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
