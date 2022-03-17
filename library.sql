-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2021 at 06:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `other_authors` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `first_release` int(4) DEFAULT NULL,
  `release_year` int(4) NOT NULL,
  `pages` int(4) NOT NULL,
  `genre` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `pucharse_date` date DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `original_title` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `publishing_house` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `other_authors`, `first_release`, `release_year`, `pages`, `genre`, `pucharse_date`, `price`, `original_title`, `publishing_house`) VALUES
(1, 'Wiedźmin. Ostatnie życzenie.', 'Andrzej Sapkowski', '', 1993, 2014, 330, 'Fantastyka', '2016-12-06', '50.21', '', ''),
(2, 'Londongrad', 'Nadelson Reggie', '', 2009, 2013, 432, 'Kryminał', '2021-03-30', '10.20', '', 'Bauchmann');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
