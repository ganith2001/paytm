-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2022 at 08:59 AM
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
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `BIC` varchar(255) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `bankLogo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`BIC`, `bankName`, `bankLogo`) VALUES
('AXISIN', 'AXIS Bank Limited', 'https://th.bing.com/th/id/OIP.LIVul6-rqdhxX-AKjqjPbQAAAA?pid=ImgDet&rs=1'),
('CNRBIN', 'Canara Bank', 'https://www.westbengalcareers.com/wp-content/uploads/2021/07/Canara-Bank-Recruitment.jpg'),
('HDFCIN', 'HDFC Bank Limited', 'https://www.getyourvacancy.com/wp-content/uploads/2019/03/HDFC-bank-logo-150x150.jpg'),
('ICICIN', 'ICICI Bank Limited', 'https://www.pikpng.com/pngl/b/71-718369_download-icici-bank-logo-hd-png-clipart.png'),
('SBININ', 'State Bank of India', 'https://th.bing.com/th/id/OIP.4vZR-i8QK5XY1P70FTnqDwHaHa?pid=ImgDet&rs=1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `aadhar` varchar(255) NOT NULL,
  `itemid` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`aadhar`, `itemid`, `quantity`) VALUES
('GERG', '2', 3),
('qwert', '1', 1),
('qwert', '2', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cartitems`
-- (See below for the actual view)
--
CREATE TABLE `cartitems` (
`itemid` varchar(255)
,`itemname` varchar(255)
,`category` varchar(255)
,`description` varchar(255)
,`price` int(11)
,`DOD` date
,`image` varchar(255)
,`aadhar` varchar(255)
,`quantity` int(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` varchar(255) NOT NULL,
  `itemname` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `DOD` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `itemname`, `category`, `description`, `price`, `DOD`, `image`) VALUES
('1', 'HP Pavilion', 'Laptop', 'HP Pavilion 14,11th Gen Intel Core i5 16GB RAM/512GB SSD 14 inch(35.6 cm),FHD IPS Anti-Glare Display/Intel Iris Xe Graphics/Backlit KB/B&O Audio/FPR/Win 11/Thin & Light/1.41kg, 14-dv1001TU', 64990, '2022-05-01', 'https://rukminim2.flixcart.com/image/416/416/kyvvtzk0/computer/2/7/l/-original-imagbygbzq27x6sy.jpeg?q=70'),
('2', 'Samsung Galaxy M53', 'Mobile', 'Samsung Galaxy M53 5G (Mystique Green, 8GB, 128GB Storage) | Travel Adapter to be Purchased Separately', 28999, '2022-05-02', 'https://i0.wp.com/smartprice.com.pk/wp-content/uploads/2022/04/Samsung-Galaxy-M53-vs-Xiaomi-Redmi-Note-11-Release-Date.jpg?fit=1200%2C628&ssl=1'),
('3', 'Fastrack', 'Watch', 'Fastrack Analog Black Dial Unisex-Adult Watch-38024PP25', 850, '2022-05-04', 'https://rukminim1.flixcart.com/image/1664/1664/j431rbk0/watch/9/k/m/ng3039sp01c-fastrack-original-imaev2thd4f837wk.jpeg?q=90');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `aadhar` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `DOB` date DEFAULT NULL,
  `wallet` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`aadhar`, `name`, `phno`, `email`, `address`, `passwd`, `DOB`, `wallet`) VALUES
('GERG', 'Ganith', '1234567890', 'ganith2001@gmail.com', 'sdgndkgnklgd', '3b8ce6f42359416496d441c6c7c50308', '2022-04-01', 150),
('qwert', 'Trisha', '2422233333', 'trish@gmail.com', 'nlenlsnglknskelg', '2cec097bf872a77028ede205a6603b6f', '2022-04-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userbank`
--

CREATE TABLE `userbank` (
  `BIC` varchar(255) DEFAULT NULL,
  `AccountID` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `Expiry` date DEFAULT NULL,
  `balance` int(11) DEFAULT '100000',
  `aadhar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userbank`
--

INSERT INTO `userbank` (`BIC`, `AccountID`, `Name`, `cvv`, `Expiry`, `balance`, `aadhar`) VALUES
('ICICIN', '1222122212221222', 'V Ganith', '111', '2024-12-01', 100000, 'GERG');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userbankname`
-- (See below for the actual view)
--
CREATE TABLE `userbankname` (
`BIC` varchar(255)
,`bankName` varchar(255)
,`bankLogo` varchar(255)
,`AccountID` varchar(255)
,`Name` varchar(255)
,`cvv` varchar(255)
,`Expiry` date
,`balance` int(11)
,`aadhar` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `cartitems`
--
DROP TABLE IF EXISTS `cartitems`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cartitems`  AS SELECT `items`.`itemid` AS `itemid`, `items`.`itemname` AS `itemname`, `items`.`category` AS `category`, `items`.`description` AS `description`, `items`.`price` AS `price`, `items`.`DOD` AS `DOD`, `items`.`image` AS `image`, `cart`.`aadhar` AS `aadhar`, `cart`.`quantity` AS `quantity` FROM (`items` join `cart`) WHERE (`items`.`itemid` = `cart`.`itemid`)  ;

-- --------------------------------------------------------

--
-- Structure for view `userbankname`
--
DROP TABLE IF EXISTS `userbankname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userbankname`  AS SELECT `banks`.`BIC` AS `BIC`, `banks`.`bankName` AS `bankName`, `banks`.`bankLogo` AS `bankLogo`, `userbank`.`AccountID` AS `AccountID`, `userbank`.`Name` AS `Name`, `userbank`.`cvv` AS `cvv`, `userbank`.`Expiry` AS `Expiry`, `userbank`.`balance` AS `balance`, `userbank`.`aadhar` AS `aadhar` FROM (`userbank` join `banks`) WHERE (`userbank`.`BIC` = `banks`.`BIC`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`BIC`),
  ADD UNIQUE KEY `bankName` (`bankName`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`aadhar`,`itemid`),
  ADD KEY `itemid` (`itemid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`aadhar`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `phno` (`phno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `address` (`address`),
  ADD UNIQUE KEY `passwd` (`passwd`);

--
-- Indexes for table `userbank`
--
ALTER TABLE `userbank`
  ADD KEY `BIC` (`BIC`),
  ADD KEY `aadhar` (`aadhar`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`aadhar`) REFERENCES `signup` (`aadhar`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `items` (`itemid`);

--
-- Constraints for table `userbank`
--
ALTER TABLE `userbank`
  ADD CONSTRAINT `userbank_ibfk_1` FOREIGN KEY (`BIC`) REFERENCES `banks` (`BIC`),
  ADD CONSTRAINT `userbank_ibfk_2` FOREIGN KEY (`aadhar`) REFERENCES `signup` (`aadhar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
