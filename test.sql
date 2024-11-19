-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 05:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `salt`, `profile_image`, `created_at`) VALUES
(5, 'dastgir', 'dastgir333@gmail.com', '$2y$10$PEFGbBqsmKMZlqmecwyB4.YLLgipXsA5oS5h/oVvfa8uOckxGzMuK', '17d0b52ab2bba1b18a0152f25c03f853', 'dastgir_1732009762.jpg', '2024-11-19 09:49:22'),
(6, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$iaiixI8x016LYTLATe97Ie21UEbTlwybS57sAjMpxqpzw.E2jR4li', '8030b04c6c61848c64d5116c75de3d8a', 'admin@gmail.com_1732032187.jpg', '2024-11-19 11:04:09'),
(7, 'Alham Ansari', 'test@test.com', '$2y$10$lQUjM0SxMUTe5koNEcxVR.ndQ2ZMAQyRqkS75neFN6vIZoAqV1DmC', 'ecda0acf0d59c339df5d26c3d6cafe6b', 'Alham Ansari_1732032503.jpg', '2024-11-19 16:06:14'),
(8, 'tausif', 'tausif@gmail.com', '$2y$10$mwvNQbTaPHoEqd6.yPaicOYqEEcz0iUuG/UstXzIWF3Qa6eBQPmAy', 'e5655f2f86a2522428ba5f337761c8be', 'tausif_1732032841.jpg', '2024-11-19 16:12:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
