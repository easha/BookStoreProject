-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2018 at 04:18 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookworm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `First_name` varchar(255) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `Author_id` int(11) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `Book_id` int(11) NOT NULL,
  `Author_id` int(11) NOT NULL,
  `Publisher_id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Publication_year` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Condition` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `About` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Book_id`, `Author_id`, `Publisher_id`, `Title`, `Category`, `Publication_year`, `Price`, `Condition`, `Quantity`, `About`) VALUES
(3, 2, 3, 'splendid sun', 'horror', 2000, 90, 'good', 34, 'tragic'),
(4, 8, 7, 'me before u', 'romance', 1999, 890, 'good', 76, 'kissu bolar nai');

-- --------------------------------------------------------

--
-- Table structure for table `Card`
--

CREATE TABLE `Card` (
  `Card_number` int(11) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Card`
--

INSERT INTO `Card` (`Card_number`, `User_name`, `Customer_id`) VALUES
(121212, 'lllll', 5),
(2147483647, 'lllll', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `Customer_id` int(11) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_number` varchar(255) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`Customer_id`, `First_name`, `Last_name`, `Email`, `Address`, `Phone_number`, `User_name`, `Password`) VALUES
(5, 'kqjhjfj', 'jhef', 'wehf', 'ljaf', '8yuery', 'kkk', '77'),
(6, 'fgg', 'drg', 'ydghiuyo', 'fdgh', 'rtg', 'lllll', 'rtrt'),
(7, 'kwerj', 'ermgn', 'kerg', 'lkwerj', '65', 'we', '23'),
(8, 'r', 'g', 'dfgm,n', ',fgn', '4', 'rrrr', 'rrrr'),
(9, 'j', 'y', 'jkh', 'j', '0', 'oo', '00');

-- --------------------------------------------------------

--
-- Table structure for table `Order_item`
--

CREATE TABLE `Order_item` (
  `Order_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Publisher`
--

CREATE TABLE `Publisher` (
  `Publisher_id` int(11) NOT NULL,
  `Publisher_name` varchar(255) NOT NULL,
  `Book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Recommendation`
--

CREATE TABLE `Recommendation` (
  `Customer_id` int(11) NOT NULL,
  `Horror` int(11) DEFAULT NULL,
  `Cooking` int(11) NOT NULL,
  `Liturature` int(11) NOT NULL,
  `Mystery` int(11) NOT NULL,
  `Biography` int(11) NOT NULL,
  `History` int(11) NOT NULL,
  `Religion` int(11) NOT NULL,
  `Romance` int(11) DEFAULT NULL,
  `Poetry` int(11) NOT NULL,
  `Comic` int(11) NOT NULL,
  `Manga` int(11) NOT NULL,
  `Adventure` int(11) NOT NULL,
  `Science_fiction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Recommendation`
--

INSERT INTO `Recommendation` (`Customer_id`, `Horror`, `Cooking`, `Liturature`, `Mystery`, `Biography`, `History`, `Religion`, `Romance`, `Poetry`, `Comic`, `Manga`, `Adventure`, `Science_fiction`) VALUES
(6, 109, 2, 0, 0, 0, 0, 0, 44, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `Customer_id` int(11) NOT NULL,
  `Review` varchar(500) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`Customer_id`, `Review`, `Book_id`, `Title`, `Type`, `Rating`) VALUES
(6, 'good', 77, 'splendid sun', 'horror', 5),
(6, 'good', 77, 'lol', 'horror', 3),
(6, 'good', 77, 'vut', 'horror', 1),
(6, 'good', 77, 'spl', 'romance', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Suggestion`
--

CREATE TABLE `Suggestion` (
  `Customer_id` int(11) NOT NULL,
  `Feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Admin_id`),
  ADD UNIQUE KEY `User_name` (`User_name`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`Author_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`Book_id`),
  ADD UNIQUE KEY `Title` (`Title`),
  ADD KEY `Publisher_id` (`Publisher_id`),
  ADD KEY `Foreign key constraints` (`Author_id`);

--
-- Indexes for table `Card`
--
ALTER TABLE `Card`
  ADD PRIMARY KEY (`Card_number`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`Customer_id`),
  ADD UNIQUE KEY `User_name` (`User_name`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indexes for table `Order_item`
--
ALTER TABLE `Order_item`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- Indexes for table `Publisher`
--
ALTER TABLE `Publisher`
  ADD PRIMARY KEY (`Publisher_id`),
  ADD KEY `Foreign key constraint` (`Book_id`);

--
-- Indexes for table `Recommendation`
--
ALTER TABLE `Recommendation`
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- Indexes for table `Suggestion`
--
ALTER TABLE `Suggestion`
  ADD KEY `Customer_id` (`Customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `Author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `Book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Order_item`
--
ALTER TABLE `Order_item`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Publisher`
--
ALTER TABLE `Publisher`
  MODIFY `Publisher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Author`
--
ALTER TABLE `Author`
  ADD CONSTRAINT `Author_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `Books` (`Book_id`);

--
-- Constraints for table `Card`
--
ALTER TABLE `Card`
  ADD CONSTRAINT `Card_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `Customers` (`Customer_id`);

--
-- Constraints for table `Order_item`
--
ALTER TABLE `Order_item`
  ADD CONSTRAINT `Order_item_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `Books` (`Book_id`);

--
-- Constraints for table `Publisher`
--
ALTER TABLE `Publisher`
  ADD CONSTRAINT `Foreign key constraint` FOREIGN KEY (`Book_id`) REFERENCES `Books` (`Book_id`);

--
-- Constraints for table `Recommendation`
--
ALTER TABLE `Recommendation`
  ADD CONSTRAINT `Recommendation_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `Customers` (`Customer_id`);

--
-- Constraints for table `Suggestion`
--
ALTER TABLE `Suggestion`
  ADD CONSTRAINT `Suggestion_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `Customers` (`Customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
