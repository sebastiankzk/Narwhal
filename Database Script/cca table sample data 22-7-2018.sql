-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 12:14 PM
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
-- Dumping data for table `cca`
--

INSERT INTO `cca` (`ccaID`, `name`, `category`, `information`, `venue`, `trgDate`, `startTime`, `trgTime`, `image`, `featured`) VALUES
(2, 'Football', 'Sports', 'The NYP Soccer Team is a recreational and competitive sports club open to all NYP students. Apart from training hard to become better soccer players, we join soccer competitions, watch soccer matches together and talk about soccer. We also organise Futsal tournaments and an overseas camp that members can look forward to. In 2012, the inaugural Futbol Sala was held in NYP. It was a 5-sided competition and 20 teams participated in the competition.', 'Field', '2018-06-06', NULL, '2018-07-01 07:23:34', 'football.jpeg', '1'),
(3, 'Taekwondo', 'Sports', 'NYP’s Taekwondo Club was formed to bring together students who are passionate about this form of martial arts.', 'Indoor Stadium', '2018-05-05', NULL, '2018-07-01 07:23:34', 'taekwondo.jpg', '1'),
(4, 'Netball', 'Sports', 'NYP Netball Club is a competitive team CCA and is open to all females who have a passion for Netball. An individual must be willing to learn and grow together as a team. The netballers are very well-bonded and assist in organising sports events in NYP. The team also participates in external competitions organized by Netball Singapore in preparation for the POL-ITE and IVP Games.', 'Indoor Stadium', '2018-05-05', NULL, '2018-07-01 07:23:34', 'netball.jpg', '1'),
(5, 'Basketball', 'Sports', 'NYP’s Basketball team brings together all enthusiasts of the game from the student population in NYP, whether the students prefer to play competitively or for leisure.', 'Stadium', '2018-07-04', NULL, '2018-07-01 07:23:34', 'basketball.jpg', '0'),
(6, 'Basketball', 'Sports', 'NYP’s Basketball team brings together all enthusiasts of the game from the student population in NYP, whether the students prefer to play competitively or for leisure.', 'Stadium', '2018-07-04', NULL, '2018-07-01 07:23:34', 'basketball.jpg', '0'),
(7, 'Basketball', 'Sports', 'NYP’s Basketball team brings together all enthusiasts of the game from the student population in NYP, whether the students prefer to play competitively or for leisure.', 'Stadium', '2018-07-04', NULL, '2018-07-01 07:23:34', 'basketball.jpg', '0'),
(8, 'Basketball', 'Sports', 'NYP’s Basketball team brings together all enthusiasts of the game from the student population in NYP, whether the students prefer to play competitively or for leisure.', 'Stadium', '2018-07-04', NULL, '2018-07-01 07:23:34', 'basketball.jpg', '0'),
(9, 'Netball', 'Sports', 'NYP Netball Club is a competitive team CCA and is open to all females who have a passion for Netball. An individual must be willing to learn and grow together as a team. The netballers are very well-bonded and assist in organising sports events in NYP. The team also participates in external competitions organized by Netball Singapore in preparation for the POL-ITE and IVP Games.', 'Indoor Stadium', '2018-05-05', NULL, '2018-07-01 07:23:34', 'netball.jpg', '0'),
(10, 'Taekwondo', 'Sports', 'NYP’s Taekwondo Club was formed to bring together students who are passionate about this form of martial arts.', 'Indoor Stadium', '2018-05-05', NULL, '2018-07-01 07:23:34', 'taekwondo.jpg', '0'),
(11, 'asdesd111123123', 'asdasd', 'asd12123', 'asd', '2018-07-03', '15:00:00', '2018-07-22 09:13:26', '31.jpg', '0'),
(14, '123123', '123', '123', '123', '0000-00-00', NULL, '2018-07-01 06:51:33', '123', '0'),
(21, 'dt', 'wer', 'rwe', 'gfh', '0000-00-00', NULL, '2018-07-01 06:51:33', 'as', '0'),
(22, 'Test', 'test', 'test', 'Test', '2018-07-12', '15:00:00', '2018-07-22 09:06:14', '18.jpg', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
