-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2021 at 03:30 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(20) DEFAULT NULL,
  `acc_no` int(10) NOT NULL,
  `balance` float DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `acc_no`, `balance`, `email`, `phone`) VALUES
('keshava', 1115658974, 10846, 'keshava3@gmail.com', 1887745869),
('Dhakshayini', 1125611974, 12376, 'dhakshaya@gmail.com', 1227755669),
('latha', 1125657996, 668, 'lathad@gmail.com', 1125657997),
('shashank', 1125658156, 3668, 'shashank@gmail.com', 1235879856),
('madhukar', 1125658635, 11115, 'madhuka@gmail.com', 1887755667),
('somasundar', 1125658886, 55568, 'somaks@gmail.com', 1125658897),
('hemanth', 1125658963, 1256, 'hemanth@gmail.com', 1887755669),
('lokanath', 1125658974, 20978, 'lokanath@gmail.com', 1998875564),
('abhishek', 1125658989, 5568, 'abhishek@gmail.com', 1254846866),
('chandan', 1125658996, 2545, 'chandan@gmail.com', 1238798456);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `T_no` int(10) NOT NULL,
  `t_from` int(10) DEFAULT NULL,
  `t_to` int(10) DEFAULT NULL,
  `amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`T_no`, `t_from`, `t_to`, `amount`) VALUES
(178808249, 1125657996, 1125658974, 500),
(202241451, 1125658156, 1125657996, 100),
(227085870, 1115658974, 1125658974, 200),
(464194291, 1115658974, 1125658974, 1233),
(498957491, 1125658974, 1125657996, 500),
(750441699, 1125611974, 1125658156, 123),
(778207165, 1115658974, 1125658156, 166);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`T_no`),
  ADD KEY `t_from` (`t_from`),
  ADD KEY `t_to` (`t_to`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`t_from`) REFERENCES `customer` (`acc_no`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`t_to`) REFERENCES `customer` (`acc_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
