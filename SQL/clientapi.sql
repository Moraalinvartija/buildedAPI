-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 12:58 PM
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
-- Database: `clientapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `client_id` int(11) NOT NULL,
  `client_fname` varchar(60) NOT NULL,
  `client_lname` varchar(60) NOT NULL,
  `client_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`client_id`, `client_fname`, `client_lname`, `client_address`) VALUES
(1, 'Pekka', 'Juurakkonen', 'Kuuselankuja 12'),
(2, 'Jukka', 'Virtanen', 'Teollisuustie 45'),
(3, 'Hilkka', 'Laine', 'Kapakkakuja 7'),
(4, 'Sirja', 'Nieminen', 'Honkatie 78'),
(5, 'Hannu', 'Heikkinen', 'Palokalliontie 67'),
(6, 'Anna', 'Koskinen', 'Knutersintie 8'),
(7, 'Hannele', 'Lehtonen', 'Martiksentie 53'),
(8, 'Heikki', 'Salonen', 'Hauklampi 11'),
(9, 'Jarno', 'Karhunen', 'Sihtikuja 3'),
(10, 'Mielikki', 'Kekäle', 'Sihtikuja 15'),
(11, 'Katariina', 'Helmenkalastaja', 'Nahkurinkatu 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
