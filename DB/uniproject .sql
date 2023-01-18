-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 07:58 PM
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
-- Database: `uniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(200) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `userid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryname`, `userid`) VALUES
(1, 'Storage & organisation', 50),
(2, 'Furniture', 50),
(3, 'Decoration', 50),
(4, 'Outdoor products', 50),
(5, 'Stationery', 50);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` int(11) NOT NULL,
  `quantity_sell` int(11) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` double NOT NULL,
  `user_id` int(50) NOT NULL,
  `warehouse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sell_id`, `quantity_sell`, `time_date`, `price`, `user_id`, `warehouse`) VALUES
(26, 1, '2022-12-14 14:58:42', 15, 50, 50),
(27, 50, '2021-10-05 14:59:26', 54, 50, 45),
(28, 2, '2023-01-14 15:00:18', 58, 50, 18),
(29, 7, '2022-03-19 15:00:51', 200, 50, 32),
(30, 1, '2023-01-14 15:01:26', 2320, 50, 30),
(31, 1, '2023-01-05 15:03:41', 1.5, 50, 29),
(32, 12, '2022-07-20 15:04:55', 25, 50, 36),
(33, 6, '2022-08-17 15:05:51', 55, 50, 44),
(34, 25, '2020-12-30 15:06:29', 15, 50, 39),
(35, 65, '2021-01-14 15:07:11', 3.5, 50, 48);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastname` varchar(22) NOT NULL,
  `profile_path` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'default_profile.png',
  `businessname` varchar(50) NOT NULL,
  `code` mediumint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `password`, `email`, `lastname`, `profile_path`, `businessname`, `code`) VALUES
(50, 'Alina', '$2y$10$LZ1OgJ6XuAXq2c0k9ojoNu.SlHFdIkRodkB6u.RydcG', 'alinamomani2@gmail.com', 'almomani', 'logo.png', 'Graduation Project', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `cost`, `quantity`, `date`, `name`, `category_id`, `user`) VALUES
(17, 32, 9, '2022-01-14 14:26:56', 'Shelving unit', 1, 50),
(18, 49, 4, '2023-01-01 11:06:22', 'Bookcase', 1, 50),
(19, 29, 5, '2023-01-14 14:07:17', 'Clothes rack', 1, 50),
(20, 1.5, 15, '2021-09-14 14:11:18', 'Storage box', 1, 50),
(29, 0.99, 4, '2023-01-04 14:29:09', 'Organiser', 1, 50),
(30, 1419, 2, '2023-01-14 14:29:59', 'Corner sofa', 2, 50),
(31, 40, 20, '2019-01-14 14:31:00', 'Table', 2, 50),
(32, 163, 7, '2021-11-10 14:31:55', 'TV bench with drawers', 2, 50),
(34, 309, 4, '2023-01-14 14:33:22', 'Bed frame with storage', 2, 50),
(35, 199, 10, '2023-01-14 14:34:17', 'Gaming chair', 2, 50),
(36, 19, 23, '2022-05-14 14:35:21', 'Decorative mirror', 3, 50),
(37, 4.8, 9, '2023-01-14 14:36:20', 'Candlesticks', 3, 50),
(38, 12.4, 40, '2023-01-14 14:37:37', 'Wall clock', 3, 50),
(39, 11.99, 31, '2020-10-24 14:39:18', 'Decoration set of 3', 3, 50),
(40, 85, 1, '2023-01-14 14:40:05', 'Artificial potted plant', 3, 50),
(41, 128, 7, '2023-01-14 14:41:30', 'Cabinet in/outdoor', 4, 50),
(42, 133, 43, '2023-01-07 17:50:19', 'Parasol', 4, 50),
(43, 2.5, 50, '2023-01-08 14:44:11', 'Plant pot', 4, 50),
(44, 49.99, 18, '2021-02-04 14:45:13', 'LED lighting chain with 12 lights', 4, 50),
(45, 24.67, 90, '2020-12-28 14:46:12', 'Floor decking', 4, 50),
(46, 2, 50, '2023-01-14 14:47:07', '50sheets Clear Sticky Note', 5, 50),
(47, 1, 66, '2023-01-14 14:48:50', ' Letter Graphic Desktop Storage Calendar', 5, 50),
(48, 3, 87, '2019-11-18 14:49:52', 'Random Color Paper Corner Rounder', 5, 50),
(49, 4.5, 24, '2022-12-14 20:50:44', 'Pencil Sharpener', 5, 50),
(50, 11, 7, '2022-05-14 14:52:58', 'Iron Bookend', 5, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `useer` (`userid`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `userr` (`user_id`),
  ADD KEY `warehousee` (`warehouse`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `useer` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `userr` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warehousee` FOREIGN KEY (`warehouse`) REFERENCES `warehouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
