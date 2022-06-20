-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Cze 2022, 21:47
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `events_web_service_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `event`
--

INSERT INTO `event` (`id`, `id_owner`, `title`, `description`, `date`, `create_date`) VALUES
(7, 10, 'title', 'desc', '2022-06-15', '2022-06-14'),
(8, 14, 'nowy event', 'desc', '2022-06-17', '2022-06-15'),
(9, 12, 'title', 'desc', '2022-06-16', '2022-06-15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `event_members`
--

CREATE TABLE `event_members` (
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `event_members`
--

INSERT INTO `event_members` (`id_event`, `id_user`, `join_date`) VALUES
(8, 12, '0000-00-00'),
(7, 12, '2022-06-15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favorite_events`
--

CREATE TABLE `favorite_events` (
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `logout_datetime` datetime DEFAULT NULL,
  `logged_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `logs`
--

INSERT INTO `logs` (`id`, `id_user`, `login_datetime`, `logout_datetime`, `logged_time`) VALUES
(1, 10, '2022-06-14 23:30:39', NULL, NULL),
(2, 10, '2022-06-14 23:34:01', NULL, NULL),
(3, 10, '2022-06-14 23:38:31', NULL, NULL),
(4, 10, '2022-06-14 23:39:38', NULL, NULL),
(5, 10, '2022-06-14 23:39:39', NULL, NULL),
(6, 10, '2022-06-14 23:45:29', NULL, NULL),
(7, 12, '2022-06-14 23:51:00', NULL, NULL),
(8, 10, '2022-06-14 23:54:34', NULL, NULL),
(9, 10, '2022-06-14 23:58:45', NULL, NULL),
(10, 10, '2022-06-15 00:01:31', NULL, NULL),
(11, 10, '2022-06-15 00:06:25', NULL, NULL),
(12, 12, '2022-06-15 00:06:34', NULL, NULL),
(13, 14, '2022-06-15 00:14:21', NULL, NULL),
(14, 12, '2022-06-15 00:14:55', NULL, NULL),
(15, 12, '2022-06-15 01:00:36', NULL, NULL),
(16, 10, '2022-06-15 01:04:37', NULL, NULL),
(17, 10, '2022-06-15 01:07:02', NULL, NULL),
(18, 10, '2022-06-15 01:07:52', NULL, NULL),
(19, 10, '2022-06-15 01:08:18', NULL, NULL),
(20, 10, '2022-06-15 01:08:28', NULL, NULL),
(21, 10, '2022-06-15 01:09:16', NULL, NULL),
(22, 12, '2022-06-15 01:10:16', NULL, NULL),
(23, 12, '2022-06-15 02:03:01', NULL, NULL),
(24, 10, '2022-06-15 16:20:02', NULL, NULL),
(25, 12, '2022-06-15 16:20:14', NULL, NULL),
(26, 10, '2022-06-15 17:05:53', NULL, NULL),
(27, 12, '2022-06-15 17:11:58', NULL, NULL),
(28, 10, '2022-06-15 17:13:25', NULL, NULL),
(29, 12, '2022-06-15 17:13:40', NULL, NULL),
(30, 12, '2022-06-15 17:26:02', NULL, NULL),
(31, 12, '2022-06-15 17:41:07', NULL, NULL),
(32, 10, '2022-06-15 18:03:33', NULL, NULL),
(33, 12, '2022-06-15 18:04:01', NULL, NULL),
(34, 10, '2022-06-15 18:06:52', NULL, NULL),
(35, 13, '2022-06-15 18:09:33', NULL, NULL),
(36, 10, '2022-06-15 19:49:14', NULL, NULL),
(37, 12, '2022-06-15 19:49:28', NULL, NULL),
(38, 10, '2022-06-15 19:51:15', NULL, NULL),
(39, 12, '2022-06-15 19:51:40', NULL, NULL),
(40, 10, '2022-06-15 21:09:07', NULL, NULL),
(41, 12, '2022-06-15 21:21:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` bit(1) NOT NULL,
  `is_active` bit(1) NOT NULL,
  `allow_notifications` bit(1) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `is_admin`, `is_active`, `allow_notifications`, `name`, `surname`, `username`, `register_date`) VALUES
(10, 'test', 'test@test.pl', 'test123', b'0', b'1', b'1', 'Jan', 'Testowy', 'Teścik2', '2022-06-14'),
(12, 'tnorek21', 'tnorek21@gmail.com', 'tnorek21', b'1', b'1', b'1', 'Tadeusz', 'Norek', 'Tnorek21', '0000-00-00'),
(13, 'user', 'user1@wp.pl', 'user123', b'1', b'1', b'1', 'Marek', 'Mostowiak', 'Userek', '2022-06-14'),
(14, 'nowyuser', 'nowy@wp.pl', 'nowy123', b'1', b'1', b'1', 'Mariusz', 'Pudzianowski', 'Pudzian1', '2022-06-15');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT dla tabeli `user`
--


ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
  ALTER TABLE `event_members`
ADD FOREIGN KEY event_id_fk (id_event) REFERENCES `event` (id) ON DELETE CASCADE,
ADD FOREIGN KEY user_id_fk (id_user) REFERENCES `user` (id) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
