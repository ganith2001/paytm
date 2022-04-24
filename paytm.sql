-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2022 at 05:39 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paytm`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `aadhar` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(1500) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`aadhar`, `name`, `phno`, `email`, `address`, `passwd`, `DOB`) VALUES
('gkgyyk', 'vasanth', '4321112345', 'trish44a@gmail.com', 'qqqq', '35a7120bf975d5975fa9727993010795', '2022-04-05'),
('grdhdhsh', 'Ganith va', '1234567890', 'ganith2001@gmal.com', 'rykrykrk', '188835a0f357abbd4682040748d31e5a', NULL),
('wwwww', 'Trisha ', '9234567890', 'trisha@gmail.com', 'qqqqqq', 'ae3e1e84897db7f2e58af36608f7d208', '2001-01-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`aadhar`),
  ADD UNIQUE KEY `phno` (`phno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `passwd` (`passwd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
