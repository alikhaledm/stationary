-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 08:30 PM
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
  `quantity` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `quantity`) VALUES
(42, 8, 3, 1),
(43, 9, 1, 6),
(46, 12, 3, 4),
(47, 12, 7, 1),
(48, 9, 3, 1),
(49, 9, 4, 4),
(50, 6, 3, 3),
(51, 6, 6, 5),
(52, 6, 4, 5),
(53, 6, 7, 1),
(54, 6, 1, 3),
(55, 54, 3, 1);

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
(30, 'sfasassdsadadada', '08/30', '1121222222222222', 111, 6);

-- --------------------------------------------------------

--
-- Table structure for table `excess`
--

CREATE TABLE `excess` (
  `excessid` int(11) NOT NULL,
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
(54, NULL, NULL, '2023-05-09'),
(55, NULL, NULL, NULL),
(56, NULL, NULL, NULL);

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
(1, 'Notebook', 'A spiral-bound notebook with lined pages', '6.00', 'notebook.jpeg', ''),
(3, 'faber castel colors', 'color markers collection', '400.00', 'pencils.jpg', ''),
(4, 'Blue Pen', 'A blue ballpoint pen', '2.99', 'blue_pen.jpg', 'Stationery'),
(5, 'Notebook', 'A ruled notebook with 100 pages', '4.99', 'notebook.jpg', 'Stationery'),
(6, 'Highlighter Set', 'A set of 4 highlighter markers', '6.99', 'highlighter_set.jpg', 'Stationery'),
(7, 'Calculator', 'A basic calculator for calculations', '8.99', 'calculator.jpg', 'Electronics'),
(8, 'Wireless Mouse', 'A wireless optical mouse', '12.99', 'wireless_mouse.jpg', 'Electronics'),
(9, 'Water Bottle', 'A stainless steel water bottle', '9.99', 'water_bottle.jpg', 'Accessories'),
(10, 'Travel Backpack', 'A durable backpack for travel', '29.99', 'travel_backpack.jpg', 'Accessories');

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
  `studentemail` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `ParentId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentemail`, `dob`, `photo`, `school_id`, `grade`, `ParentId`) VALUES
(1, '', '', NULL, '', 1, 6, NULL),
(55, NULL, '', NULL, 'profile.png', NULL, NULL, 55),
(56, 'ali khaled', 'alikhaled@newgeneration.edu', '2000-12-23', '', 1, 10, 56),
(57, NULL, '', NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplies_list`
--

CREATE TABLE `supplies_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `address` varchar(255) DEFAULT NULL,
  `registerdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersclass`
--

INSERT INTO `usersclass` (`id`, `acctype`, `email`, `password`, `fname`, `lname`, `phone`, `address`, `registerdate`) VALUES
(1, 'Student', 'ali@gmail.com', '12345678', 'ali', 'khaled', 12345678, NULL, NULL),
(54, 'Parent', 'parent@gmail.com', '12345678', 'ali', 'khaled', 12345678, NULL, NULL),
(55, 'Parent', 'parentemail@gmail.com', '12345678', 'parent', 'parent', 12345678, NULL, NULL),
(56, 'Parent', '1232313@gmail.com', '12345r46735', 'second', 'parent', 123124124, NULL, NULL),
(57, 'Student', '3elwa@gmail.com', '12345678', '3elwa', 'khaled', 11234567, NULL, '2023-05-30');

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `product_id` (`product_id`),
  ADD KEY `school_id` (`school_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `ParentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `supplies_list`
--
ALTER TABLE `supplies_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersclass`
--
ALTER TABLE `usersclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usersclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productid` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `usersclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `creditcard_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usersclass` (`id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`ParentId`) REFERENCES `usersclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_ibfk_2` FOREIGN KEY (`ChildId`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `usersclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`ParentId`) REFERENCES `parent` (`ParentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`grade`) REFERENCES `grade` (`id`);

--
-- Constraints for table `supplies_list`
--
ALTER TABLE `supplies_list`
  ADD CONSTRAINT `supplies_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplies_list_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
