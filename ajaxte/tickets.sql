-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 05:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `ti_text` varchar(255) DEFAULT NULL,
  `ti_price` int(11) DEFAULT NULL,
  `ti_owner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `img_url`, `ti_text`, `ti_price`, `ti_owner`) VALUES
(1, '/uploads/7-0.37369000 1507160683.jpeg', 'vcfgbnfgnfgnfgnfg', 10, 7),
(3, '/uploads/7-0.39063000 1507162364.jpeg', 'bbbbbbb', 43, 7),
(5, '/uploads/7-0.98388100 1507163100.png', 'fffffff', 43, 7),
(6, '/uploads/7-0.32596900 1507163160.jpeg', 'bbbbbb', 34, 7),
(7, '/uploads/15-0.18647100 1507163507.png', 'cccccc', 56, 15),
(8, '/uploads/15-0.32095000 1507163835.png', 'bbbbbbb', 111, 15),
(14, '/uploads/15-0.35323100 1507164622.jpeg', 'hhhhh', 33, 15),
(15, '/uploads/15-0.02533500 1507164695.jpeg', 'jjjjjj', 22, 15),
(16, '/uploads/15-0.31762400 1507164873.jpeg', 'safasdfsdafsadfsd', 11, 15),
(17, '/uploads/15-0.72132700 1507165325.jpeg', 'wwwww', 222, 15),
(22, '/uploads/5-0.07033600 1507166759.jpeg', 'my second TT [edited] pig', 101, 5),
(28, '/uploads/5-0.64313200 1507167120.jpeg', 'edited 1st ticket !!', 104, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ti_owner_idx` (`ti_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_ti_owner` FOREIGN KEY (`ti_owner`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
