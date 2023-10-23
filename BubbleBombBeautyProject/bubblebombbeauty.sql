-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 02:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubblebombbeauty1`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `adminID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminID`, `emailAddress`, `password`) VALUES
(1, 'admin@bubblebombbeauty.com', '$2a$10$PEnmRwrKKlFKJwop/IzsVeGARZvQhJp0jl.SRGkdrYVHcLn1GbVqq');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OID` int(10) UNSIGNED NOT NULL,
  `ORDER_NO` varchar(45) NOT NULL DEFAULT '',
  `ORDER_DATE` date NOT NULL DEFAULT '0000-00-00',
  `UID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `TOTAL_AMT` double(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `ORDER_NO`, `ORDER_DATE`, `UID`, `TOTAL_AMT`) VALUES
(1, '35768', '2022-05-04', 1, 15.00),
(2, '88262', '2022-05-04', 2, 30.99);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ID` int(10) UNSIGNED NOT NULL,
  `OID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `PID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `PNAME` varchar(45) NOT NULL DEFAULT '',
  `PRICE` double(10,2) NOT NULL DEFAULT 0.00,
  `QTY` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `TOTAL` double(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ID`, `OID`, `PID`, `PNAME`, `PRICE`, `QTY`, `TOTAL`) VALUES
(1, 1, 2, 'Honey I washed the kids', 15.00, 1, 15.00),
(2, 2, 4, 'Sleeping beauty', 10.99, 1, 10.99),
(3, 2, 1, 'Whats up doc', 20.00, 1, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PID` int(10) UNSIGNED NOT NULL,
  `PRODUCT` varchar(45) NOT NULL DEFAULT '',
  `PRICE` double(10,2) NOT NULL DEFAULT 0.00,
  `IMAGE` varchar(100) NOT NULL DEFAULT '',
  `DESCRIPTION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `PRODUCT`, `PRICE`, `IMAGE`, `DESCRIPTION`) VALUES
(1, 'Whats up doc', 20.00, '1.jpg', 'Enjoy this fabulous moisturizer fused with carrot juice, carrot seeds and carrot extract.'),
(2, 'Honey I washed the kids', 15.00, '2.jpg', '\"Nothing feels better than a nice clean shower! Enjoy our luxorious shower gel. Fused with lavender and jasmine.'),
(3, 'Make Lemonade', 18.99, '3.jpg', 'The lemon in the water will normalize the skin and decrease the oil secretion. It will energize your body for the whole day. Combats odor from the body. Regular activity causes sweat in our body which attracts several germs and bacteria.'),
(4, 'Sleeping beauty', 10.99, '4.jpg', 'The lemon in the water will normalize the skin and decrease the oil secretion. It will energize your body for the whole day. Combats odor from the body. Regular activity causes sweat in our body which attracts several germs and bacteria.'),
(5, 'Siren\'s Salt', 10.99, '5.jpg', 'Lift away dirt and dullness with a daily scrub made with real strawberries and smoothing sugar crystals that melt as they polish. This gentle face wash exfoliates and cleanses all in one while smoothing the skin’s texture and maintaining its natural moisture.'),
(6, 'Gimme Gimme More Charcoal Peppermint Scrub', 10.99, '6.jpg', 'Lift away dirt and dullness with a daily scrub made with real strawberries and smoothing sugar crystals that melt as they polish. This gentle face wash exfoliates and cleanses all in one while smoothing the skin’s texture and maintaining its natural moisture.'),
(7, 'It’s All About That Face', 10.99, '7.jpg', 'Antioxidant-packed, multifunction gel cleanser that\'s pH balanced, non-drying, and removes makeup with ease. Custom Superfoods Blend: Kale, spinach, green tea, alfalfa, vitamins C, E, K'),
(8, 'Polyjuice Potion', 10.99, '8.jpg', 'Love Potion in a potion in a lotion. This pretty pink butter is hand whipped with sweet almond oil and shea butter to help smooth skin on your face. While natural fragrances react with your body chemistry to concoct a unique scent that sure to attract the right kind of attention.'),
(9, 'Youth to the People Black Head Clearing Scrub', 10.99, '9.jpg', 'NATURAL EXFOLIANTS: This face scrub is made with 100% natural exfoliants and salicylic acid to buff away dead skin and unclog pores for clear, radiant skin.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `NAME` varchar(150) NOT NULL DEFAULT '',
  `CONTACT` varchar(150) NOT NULL DEFAULT '',
  `ADDRESS` text DEFAULT NULL,
  `CITY` varchar(45) NOT NULL DEFAULT '',
  `PINCODE` varchar(45) NOT NULL DEFAULT '',
  `EMAIL` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `NAME`, `CONTACT`, `ADDRESS`, `CITY`, `PINCODE`, `EMAIL`) VALUES
(1, 'Catherine', '551 427 5471', '423 Broadway', 'Westwood', '07675', 'thaureauxc1@montclair.edu'),
(2, 'Catherine Thaureaux', '5514275471', '423 Broadway', 'Westwood', '07675', 'cmariethaureaux@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
