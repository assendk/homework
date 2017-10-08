-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 05:08 PM
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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visibility` int(1) NOT NULL DEFAULT '1',
  `lock_user` int(1) NOT NULL DEFAULT '0',
  `location_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `full_name`, `password`, `email`, `age`, `profile_pic`, `visibility`, `lock_user`, `location_id`, `second_id`) VALUES
(1, 'alen', 'Alen Karr', 'cd4ccad472bc64177bb39a06', 'bewebdeveloper@gmail.com', 27, NULL, 1, 0, NULL, NULL),
(2, 'paul', 'Paul Xavier', 'cd4ccad472bc64177bb39a06', 'paul@domain.com', 22, NULL, 1, 0, NULL, NULL),
(4, 'christen', 'Christien Davinci', 'cd4ccad472bc64177bb39a06', 'christien@domain.com', 32, NULL, 1, 0, NULL, NULL),
(5, 'admin', 'Administrator', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'admin@domain.com', 40, NULL, 1, 1, NULL, NULL),
(7, 'assy', 'Assy', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'assy@mymail.mail', 43, NULL, 1, 0, NULL, NULL),
(10, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873', 'test@mail.mail', 0, NULL, 1, 0, NULL, NULL),
(15, 'test3', 'test3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test3@test3.3', 33, NULL, 1, 0, NULL, NULL),
(25, 'test5', 'test5 test5', 'a94a8fe5ccb19ba61c4c0873', 'test5@test5.test5', 22, NULL, 1, 0, NULL, NULL),
(26, 'admin', 'admina', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'admin@admin.test', 100, NULL, 1, 0, NULL, NULL),
(27, 'test6', 'test6', 'a66df261120b6c2311c6ef0b', 'test6@test6.test6', 66, NULL, 1, 0, NULL, NULL),
(28, 'test55', 'test55 test55', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test5@test5.test5', 22, NULL, 1, 0, NULL, NULL),
(30, 'test722', 'test722', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.aa', 0, NULL, 1, 0, NULL, NULL),
(31, 'test77', 'test77', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.aa', 0, NULL, 1, 0, NULL, NULL),
(32, 'proba1', 'proba1', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test5@test5.test5', 22, NULL, 1, 0, NULL, NULL),
(33, 'proba2', 'proba2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.aaa', 0, NULL, 1, 0, NULL, NULL),
(36, 'proba3', 'admin', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.aa', 0, NULL, 1, 0, NULL, NULL),
(37, 'proba5', 'proba5', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test5@test.aa', 0, NULL, 1, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `second_id` (`second_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
