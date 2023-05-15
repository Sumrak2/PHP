-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 17 2022 г., 22:06
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `my_bd` (
  `name` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `my_bd` (`name`, `email`, `password`) VALUES
('user', 'user@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc'),
('user1', 'user1@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc'),
('user2', 'user2@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc'),
('name', 'name@mail.ru', 'ec6a6536ca304edf844d1d248a4f08dc'),
('name1', 'name1@mail.ru', 'ec6a6536ca304edf844d1d248a4f08dc'),
('name2', 'name2@mail.ru', 'ec6a6536ca304edf844d1d248a4f08dc'),
('login', 'login@mail.ru', '7c75d66c6cdd272e847d465a73af39ff'),
('login1', 'login1@mail.ru', '7c75d66c6cdd272e847d465a73af39ff'),
('login2', 'login2@mail.ru', '7c75d66c6cdd272e847d465a73af39ff'),
('meow', 'meow@mail.ru', '8d909b810b4a43cdb83c6c12a129660f'),
('meow1', 'meow1@mail.ru', '897c8fde25c5cc5270cda61425eed3c8'),
('meow2', 'meow2@mail.ru', '4e40beaf133b47b8b0020881b20ad713');



ALTER TABLE `my_bd`
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;