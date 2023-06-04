-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 08:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stationary`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `title`, `area`, `street`, `city`, `zip`, `userid`) VALUES
(4, 'Home Address', 'Masaken Sheraton', 'Mostafa Kamel', 'Cairo', 115911, 6),
(5, 'School Address', 'New Cairo', 'Mahmoud Nagib', 'Cairo', 11872, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `isPackage?` tinyint(1) NOT NULL,
  `quantity` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `isPackage?`, `quantity`) VALUES
(66, 59, 1, 0, 2),
(67, 64, 2, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `cardid` int(11) NOT NULL,
  `cardholdername` varchar(255) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `cvv` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`cardid`, `cardholdername`, `expirydate`, `cardnumber`, `cvv`, `userid`) VALUES
(28, 'asdddddddddddddddddddddddddd', '02/32', '6666666666666666', 0, 6),
(29, 'asdasdaw', '09/33', '1111111111111111', 111, 6),
(30, 'sfasassdsadadada', '08/30', '1121222222222222', 111, 6),
(31, 'alikhaled', '08/31', '1111111111111111', 111, 59),
(32, 'alikhaled', '08/31', '1111111111111111', 111, 59);

-- --------------------------------------------------------

--
-- Table structure for table `excess`
--

CREATE TABLE `excess` (
  `excessid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `product_photo` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(1, '1st grade'),
(2, '2nd grade'),
(3, '3rd grade'),
(4, '4th grade'),
(5, '5th grade'),
(6, '6th grade'),
(7, '7th grade'),
(8, '8th grade'),
(9, '9th grade'),
(10, '10th grade'),
(11, '11th grade'),
(12, '12th grade');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `ParentId` int(11) NOT NULL,
  `ChildId` int(11) DEFAULT NULL,
  `childname` varchar(255) DEFAULT NULL,
  `childage` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`ParentId`, `ChildId`, `childname`, `childage`) VALUES
(58, NULL, NULL, NULL),
(61, NULL, NULL, NULL),
(63, 64, NULL, NULL),
(64, NULL, NULL, NULL),
(65, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdesc` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `pdesc`, `price`, `photo`, `category`) VALUES
(1, 'Hand Sanitizer 70% Alcohol', 'Hand Sanitizer 70% Alcohol', '35.00', 'hand sanitizer.png', 'Other'),
(2, 'Pack of A4 loose-leaf paper', 'The Yassin Lined Papers Pack is a product that offers a pack of 100 sheets of lined papers. It is designed for various writing purposes, such as note-taking, journaling, or general writing tasks. The sheets are likely to have predefined horizontal lines t', '40.00', 'a4 pack.jpg', 'Notebooks & Paper'),
(3, 'English Dictionary', 'The Paperback Oxford English Dictionary is a comprehensive English dictionary that provides definitions, explanations, and meanings for a wide range of words and their usage. It is likely a paperback edition, which makes it portable and easy to carry. The', '200.00', 'english dictionary.png', 'Notebooks & Paper'),
(4, 'Wipes', 'Clinell Antibacterial Hand Wipes clean and disinfect hands in one easy step. They work from 10 seconds, killing at least 99.99% of germs. A mix of biocides prevent bacterial resistance and superbug formation. Clinell Antibacterial Hand Wipes are dermatolo', '35.00', 'wipes.png', 'Other'),
(5, 'Ring Binder With Plastic Sleeves', 'There is no better way than choosing from a variety of colourful ring binders to help keep things neat, tidy and in order.', '25.00', 'ringbinder.png', 'Binders & Folders');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `address`) VALUES
(1, 'New Generation', 'Obour');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL,
  `studentname` varchar(255) DEFAULT NULL,
  `studentemail` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `ParentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentemail`, `dob`, `school_id`, `grade`, `ParentId`) VALUES
(57, NULL, 'assdadas', '0000-00-00', 1, 6, NULL),
(59, NULL, NULL, '0000-00-00', 1, 8, NULL),
(60, NULL, '', '0000-00-00', NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'mohamed awdawd', 'alikhaledm399@gmail.com', '2023-06-07', 1, 1, 63),
(65, 'mayar', 'asd@gmail.com', '2023-06-08', 1, 1, 64),
(66, 'Ali Khaled child', 'alikhaled@gmail.com', '2023-06-12', 1, 1, 65);

-- --------------------------------------------------------

--
-- Table structure for table `supplies_list`
--

CREATE TABLE `supplies_list` (
  `id` int(11) NOT NULL,
  `listname` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplies_list`
--

INSERT INTO `supplies_list` (`id`, `listname`, `school_id`, `grade`, `total_price`, `pdf`) VALUES
(31, 'NGIS-1', 1, 1, '2500', 'supplies_list.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `supplylistitems`
--

CREATE TABLE `supplylistitems` (
  `id` int(11) NOT NULL,
  `supplylistid` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `prodcategory` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplylistitems`
--

INSERT INTO `supplylistitems` (`id`, `supplylistid`, `productid`, `prodcategory`, `quantity`) VALUES
(28, 31, 1, 'Health & Hygiene Kit', 2),
(29, 31, 3, 'English', 1),
(30, 31, 2, 'General', 1),
(31, 31, 5, 'General', 12),
(32, 31, 4, 'Health & Hygiene Kit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersclass`
--

CREATE TABLE `usersclass` (
  `id` int(11) NOT NULL,
  `acctype` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `registerdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersclass`
--

INSERT INTO `usersclass` (`id`, `acctype`, `email`, `password`, `fname`, `lname`, `phone`, `registerdate`) VALUES
(57, 'Student', 'ali@gmail.com', '12345678', 'jjhkhj', 'mohanmed', 11111111, '2023-05-30'),
(58, 'Parent', 'aliii@gmail.com', '12345678', 'ali', 'awdaw', 12345, '2023-06-01'),
(59, 'Parent', 'alikhaledm399@gmail.com', '12345678', 'ali', 'khaled', 1111, '2023-06-03'),
(60, 'Student', 'aliali@gmail.com', '12345678', 'ali', 'khaled', 111111, '2023-06-03'),
(61, 'Parent', 'asd@gmail.comasd', 'd123123231', 'ali', 'khaled', 123231123, '2023-06-03'),
(63, 'Parent', 'mayar@gmail.com', '12345678', 'mayar', 'mayar', 111, '2023-06-04'),
(64, 'Parent', 'asd@gmail.com', '12211231313', 'ali', 'mohanmed', 2147483647, '2023-06-04'),
(65, 'Parent', 'parent@gmail.com', '12345678', 'Ali', 'Khaled', 11111, '2023-06-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`cardid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `excess`
--
ALTER TABLE `excess`
  ADD PRIMARY KEY (`excessid`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `addressid` (`addressid`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`ParentId`),
  ADD KEY `parent_ibfk_2` (`ChildId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_ibfk_3` (`ParentId`),
  ADD KEY `grade` (`grade`);

--
-- Indexes for table `supplies_list`
--
ALTER TABLE `supplies_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `supplies_list_ibfk_3` (`grade`);

--
-- Indexes for table `supplylistitems`
--
ALTER TABLE `supplylistitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplylistitems_ibfk_1` (`productid`),
  ADD KEY `supplylistid` (`supplylistid`);

--
-- Indexes for table `usersclass`
--
ALTER TABLE `usersclass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `excess`
--
ALTER TABLE `excess`
  MODIFY `excessid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `ParentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `supplies_list`
--
ALTER TABLE `supplies_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `supplylistitems`
--
ALTER TABLE `supplylistitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `usersclass`
--
ALTER TABLE `usersclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usersclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`ChildId`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`ParentId`) REFERENCES `parent` (`ParentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`grade`) REFERENCES `grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplies_list`
--
ALTER TABLE `supplies_list`
  ADD CONSTRAINT `supplies_list_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplies_list_ibfk_3` FOREIGN KEY (`grade`) REFERENCES `grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplylistitems`
--
ALTER TABLE `supplylistitems`
  ADD CONSTRAINT `supplylistitems_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplylistitems_ibfk_2` FOREIGN KEY (`supplylistid`) REFERENCES `supplies_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
