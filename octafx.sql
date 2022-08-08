-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 08:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `octafx`
--

-- --------------------------------------------------------

--
-- Table structure for table `mastertraders`
--

CREATE TABLE `mastertraders` (
  `id` int(11) NOT NULL,
  `mastertrader` varchar(20) NOT NULL,
  `mastertraderid` varchar(15) NOT NULL,
  `bot` int(1) NOT NULL,
  `Datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mastertraders`
--

INSERT INTO `mastertraders` (`id`, `mastertrader`, `mastertraderid`, `bot`, `Datetime`, `status`) VALUES
(1, 'rezagustiana', '11564591', 1, '2022-07-29 21:43:42', 1),
(2, 'ymalwal', '18182439', 2, '2021-07-01 13:29:50', 1),
(3, 'Hina-Raja', '18079144', 3, '2021-07-01 21:40:44', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mastertraders`
--
ALTER TABLE `mastertraders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mastertraders`
--
ALTER TABLE `mastertraders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
