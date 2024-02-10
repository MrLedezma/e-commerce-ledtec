-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 06:34 PM
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
-- Database: `ledtec`
--

-- --------------------------------------------------------

--
-- Table structure for table `userhistory`
--

CREATE TABLE `userhistory` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userhistory`
--

INSERT INTO `userhistory` (`id`, `username`, `product_name`, `price`, `purchase_date`) VALUES
(16, 'MrLedezma', 'PlayStation 5', 400.00, '2024-02-10 16:39:20'),
(17, 'GiselleLB', 'Nintendo Switch', 200.00, '2024-02-10 16:41:15'),
(18, 'User_test', 'Xbox One', 300.00, '2024-02-10 17:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`) VALUES
(9, 'MrLedezma', '$2y$10$rtYJII.FFnWNdYBh/eqcOuyqk9CN3K0b3vusyAqnR0VE.nCsPmOxi', 'mr.ledezma02@gmail.com', '3329559921'),
(10, 'GiselleLB', '$2y$10$dQaJKzXDtmBL0F1F5n7yKufKBEcnBaQ7hYqPBT/1mfaau62ydRR0C', 'gigi01@gmail.com', '123456789'),
(11, 'User_test', '$2y$10$KMmSsxf7tfRCUK4S7WBFIOhBhOdfvchZS3fLgYYor..rXjuVV.uFm', 'usertest@gmail.com', '987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userhistory`
--
ALTER TABLE `userhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userhistory`
--
ALTER TABLE `userhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
