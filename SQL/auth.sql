-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 01:20 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salts` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `ban` varchar(255) DEFAULT 'NULL',
  `close` varchar(255) DEFAULT 'NULL',
  `created` int(255) NOT NULL,
  `lastOnline` int(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `pImg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `salts`, `token`, `resetToken`, `ip`, `role`, `ban`, `close`, `created`, `lastOnline`, `bio`, `pImg`) VALUES
(1, 'test', 'test', 'test@gmauil.com', '$2y$10$wR5w3fUdJ/P4iZjkl7j4UOT295qkwhHWKE3XbUZd.N9wWc2/xSOL2', 'd01ej1GyRGTz', 'NULL', 'NULL', '::1', 'normal', 'NULL', 'NULL', 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
