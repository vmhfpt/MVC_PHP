-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2023 at 06:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab6`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `active`, `createdAt`) VALUES
(19, 'fasdf asdfa sdf', 0, '2023-06-25'),
(20, 'Hung Vu', 1, '2023-06-25'),
(21, 'Cà phê Trung  Nguyên 123 123', 1, '2023-06-25'),
(22, 'Cà phê Trung  Nguyên 123 hahah', 1, '2023-06-25'),
(25, '1231123', 0, '2023-06-25'),
(26, '1231123 edit', 0, '2023-06-25'),
(27, 'dffffffdf', 0, '2023-06-25'),
(28, 'fasdfasdf', 0, '2023-06-25'),
(29, '1234123123', 0, '2023-06-25'),
(30, 'Cà phê Trung  Nguyên3fsadf', 0, '2023-06-25'),
(31, 'sdfasdf333', 0, '2023-06-25'),
(32, 'fasdfasdf1231', 0, '2023-06-25'),
(33, 'fasdfsadf3432', 0, '2023-06-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
