-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2023 at 02:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_101`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`task_id`, `task_name`, `archive`, `created_at`, `updated_at`) VALUES
(1, 'AAAA', 0, '2023-07-14 07:20:51', '2023-11-04 13:00:32'),
(2, 'BBBBB', 0, '2023-07-14 07:20:51', '2023-11-04 13:00:37'),
(3, 'CCCCC', 0, '2023-07-14 07:51:19', '2023-11-04 13:00:40'),
(4, 'DDDDDD', 0, '2023-07-14 07:58:19', '2023-11-04 13:00:48'),
(5, 'EEEEEE', 0, '2023-07-14 07:59:11', '2023-11-04 13:00:52'),
(6, 'FFFFFF', 0, '2023-07-14 07:59:48', '2023-11-04 13:00:58'),
(7, 'GGGGGG', 0, '2023-07-14 08:20:32', '2023-11-04 13:01:01'),
(8, 'HHHHHHH', 0, '2023-07-14 08:33:00', '2023-11-04 13:01:05'),
(9, 'IIIIIIII', 0, '2023-07-14 08:47:38', '2023-11-04 13:01:12'),
(10, 'JJJJJJ', 1, '2023-07-14 08:57:45', '2023-11-04 13:01:22'),
(11, 'KKKKKKK', 0, '2023-07-14 09:30:10', '2023-11-04 13:01:27'),
(12, 'LLLLLLL', 0, '2023-07-14 09:32:33', '2023-11-04 13:01:33'),
(13, 'MMMMMM', 0, '2023-07-14 10:21:57', '2023-11-04 13:01:43'),
(14, 'NNNNN', 0, '2023-07-14 11:27:05', '2023-11-04 13:01:47'),
(15, 'OOOOOO', 0, '2023-07-14 12:45:27', '2023-11-04 13:02:00'),
(16, 'PPPPPPP', 0, '2023-07-14 13:00:59', '2023-11-04 13:02:04'),
(17, 'QQQQQQ', 0, '2023-07-14 13:41:46', '2023-11-04 13:02:27'),
(18, 'RRRRRR', 0, '2023-07-14 14:49:24', '2023-11-04 13:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
