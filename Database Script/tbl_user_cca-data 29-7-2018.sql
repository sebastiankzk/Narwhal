-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 12:33 PM
-- Server version: 5.6.22-log
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `narwhal`
--

--
-- Dumping data for table `tbl_user_cca`
--

INSERT INTO `tbl_user_cca` (`user_ccaID`, `userID`, `ccaID`, `quit`) VALUES
(1, 2, 1, 'Quit'),
(3, 2, 3, 'Quit'),
(4, 3, 3, 'Not Quit'),
(5, 4, 3, 'Quit'),
(6, 5, 1, 'Quit'),
(7, 7, 3, 'Not Quit'),
(8, 6, 3, 'Not Quit');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
