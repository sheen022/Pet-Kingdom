-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 05:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petkingdom`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_desc` varchar(128) NOT NULL,
  `cat_status` varchar(1) NOT NULL COMMENT 'A-Active, D-Discontinued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_desc`, `cat_status`) VALUES
(1, 'Dog Food', 'A'),
(2, 'Cat Food', 'A'),
(3, 'Accessories', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(128) NOT NULL,
  `cust_age` int(3) NOT NULL,
  `cust_gender` varchar(11) NOT NULL,
  `cust_status` varchar(1) NOT NULL COMMENT 'A-Active, B-Blocked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(9) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `item_short_code` varchar(128) NOT NULL,
  `item_price` double NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_status` varchar(1) NOT NULL COMMENT 'A-Active, D-Discontinued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_short_code`, `item_price`, `cat_id`, `item_status`) VALUES
(1, 'Powercat Fresh Ocean Tuna', 'PFOT001', 144, 2, 'A'),
(2, 'Whiskas Pocket Ocean Fish', 'WHPOF002', 284, 2, 'A'),
(3, 'Pedigree Puppy Chunks in Gravy 130g', 'PPCiG130G', 39, 1, 'A'),
(4, 'Vitality Value meal Adult Small Bite', 'VVMASB', 139, 1, 'A'),
(5, 'Amy Carol Flavored Rope Fruit Small', 'ACFRFS', 109, 3, 'A'),
(6, 'Amy Carol Cat Teaser Lady Bug', 'ACCTLB', 99, 3, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(9) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `net_amt` float NOT NULL DEFAULT 0,
  `order_status` varchar(1) NOT NULL COMMENT 'P-Pending, C-Confirmed, D-Delivered, P-Paid',
  `date_ordered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(11) NOT NULL,
  `emailadd` varchar(128) NOT NULL,
  `usertype` varchar(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `cust_id`, `username`, `password`, `emailadd`, `usertype`) VALUES
(0, 0, 'cla', '12324', '', 'C'),
(0, 0, 'per', 'per12345', '', 'C'),
(0, 0, 'andrei022', '123456', '', 'C'),
(0, 0, 'admin', 'admin', 'admin@gmail.com', 'A'),
(0, 0, '', '123456', '', 'C'),
(0, 0, 'shaney', '1234567', '', 'C'),
(0, 0, 'ivan', '1234567', '', 'C'),
(0, 0, 'black', 'abcabc', '', 'C'),
(0, 0, 'karen122', 'abcdefg', '', 'C'),
(0, 0, 'abc', 'abc', '', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
