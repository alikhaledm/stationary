-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 09:38 AM
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
(68, 59, 6, 0, 1),
(69, 59, 7, 0, 1);

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
  `quantity` varchar(255) DEFAULT NULL,
  `product_photo` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `excess`
--

INSERT INTO `excess` (`excessid`, `type`, `product_name`, `prod_desc`, `quantity`, `product_photo`, `pickup_date`, `userid`) VALUES
(1, 'donation', 'aaaa', 'sasdasd', '123123', '', '2023-06-08', 65),
(2, 'donation', 'aaaa', '123123', '123123132', '', '2023-06-15', 65),
(3, 'donation', 'aaaa', '', NULL, 'project-7.jpg', '2023-06-08', 65),
(4, 'donation', 'aaaa', '', NULL, 'project-7.jpg', '2023-06-08', 65),
(5, 'donation', 'aaaa', '', NULL, 'project-7.jpg', '2023-06-08', 65),
(6, 'donation', 'aaaa', '', NULL, 'project-7.jpg', '2023-06-08', 65),
(7, 'Sale Request', 'aaaa', 'saawd', '12312', 'project-7.jpg', '2023-06-15', 59);

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
  `cartid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'Wipes', '200 wipes', '40.00', 'wipes.png', 'Other'),
(7, 'Ring Binder ', 'Plastic sleeves for all subjects', '70.00', 'ringbinder.png', 'Notebooks & Paper'),
(8, 'Pack of A4 loose-leaf paper', 'This A4 graph paper is supplied in loose leaf reams. It comes in 5mm squares. Printing is sharp and clear on both.', '25.00', 'a4 pack.jpg', 'Notebooks & Paper'),
(9, 'Pack of squared paper', '', '35.00', 'ql02540.jpg', 'Notebooks & Paper'),
(10, 'Plastic sleeves', 'Vault X card sleeves are the first line of defense when it comes to protecting your cards. Put every card inside a sleeve to help protect against dust, dirt and debris that can cause nasty dents and scratches.', '45.00', 'card-sleeves.webp', 'Notebooks & Paper'),
(11, 'Pack of A4 white paper', 'A4 Copy paper', '170.00', '920505.png', 'Notebooks & Paper'),
(12, 'Fabercastell copybook', '144 paper', '60.00', 'Faber-Castell-Spiral-Medium-Copybook-144-Sheet-2.png', 'Notebooks & Paper'),
(13, 'Zipped plastic folder', '', '17.00', 'Zipper.png', 'Notebooks & Paper'),
(14, 'Geometry set', '', '35.00', 'Mask_Group_219.png', 'Math & Scientfic'),
(15, 'Casio Calculator', 'Scientific calculator', '450.00', 'Casio.png', 'Math & Scientfic'),
(16, 'Squared copybook', '40 pages', '25.00', '40_p.png', 'Notebooks & Paper'),
(17, 'Lab coat', '', '90.00', 'PS_RK_KP72WH_F.png', 'Other'),
(18, 'Pocket File', '', '15.00', 'Mobile__E7CC643AA637D340F63DB42199D17600__440__es_17325_g-1bb9929e81867082149ddf63b6f16b25.png', 'Binders & Folders'),
(19, 'Business Dictionary', 'Cambridge', '400.00', 'getSocialImage.png', 'Notebooks & Paper'),
(20, 'Canson paper', 'A pack of 5', '20.00', 'images-removebg-preview.png', 'Art Supplies'),
(21, 'Glue stick', '', '25.00', 'images-removebg-preview (1).png', 'Art Supplies'),
(22, 'Plastic scissors', '', '30.00', 'DEL1607-1_1024x.webp', 'Art Supplies'),
(23, 'Wireless copybook', '', '60.00', 'Screenshot_20230604-235933_2-removebg-preview.png', 'Notebooks & Paper'),
(24, 'Al Adwaa', 'Arabic (Grade 9)', '70.00', 'images__1_-removebg-preview.png', 'Other'),
(25, 'Social Studies Alemtehan', '???????? (???????? ??????????)', '80.00', 'images__3_-removebg-preview~2.png', 'Notebooks & Paper'),
(26, 'Music notebook', '40 pages', '25.00', 'images__5_-removebg-preview.png', 'Notebooks & Paper'),
(27, 'Canson Sketch', 'A3', '80.00', 'drawsketch_canson_12sh_3550_wt_1024x1024-removebg-preview.png', 'Art Supplies'),
(28, 'Faber Castell Pencil Colors', '36 colors', '135.00', 'IMG_6346_58045dd0-8caf-4da0-b550-463e47eb2ddd_1026x1026-removebg-preview.png', 'Notebooks & Paper'),
(29, 'Hand Sanitizer - Ethyl Alcohol', '70 % Ethyl Alcohol', '35.00', 'hand sanitizer.png', 'Other'),
(30, 'Acrylic colors', 'pallet ', '250.00', 'shopping-removebg-preview.png', 'Art Supplies');

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
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentemail`, `dob`, `school_id`, `grade`, `userid`) VALUES
(136, 'mayar', 'alikhaledm399@gmail.com', '2023-06-14', 1, 9, 67),
(137, 'mayar', 'alikhaledm399@gmail.com', '2023-06-15', 1, 1, 59);

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
(39, 'NGIS-5', 1, 5, '800', 'NGIS-5.pdf'),
(41, 'NGIS-6', 1, 6, '1800', 'NGIS-6.pdf'),
(42, 'NGIS-9', 1, 9, '2200', 'NGIS-9.pdf');

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
(38, 37, 25, 'Social Studies', 1),
(39, 38, 30, 'English', 1),
(40, 38, 31, 'English', 1),
(41, 38, 33, 'English', 1),
(42, 38, 27, 'English', 1),
(43, 38, 29, 'English', 2),
(44, 39, 28, 'Art Supplies', 1),
(45, 39, 14, 'Academic Kit', 6),
(46, 39, 50, 'Art Supplies', 1),
(47, 39, 21, 'Mathematics', 1),
(48, 39, 33, 'Music', 1),
(49, 39, 17, 'Science', 4),
(50, 39, 13, 'Health & Hygiene Kit', 1),
(51, 39, 24, 'Science', 2),
(52, 39, 38, 'Art Supplies', 3),
(53, 39, 45, 'French', 1),
(54, 39, 51, 'Arabic', 2),
(55, 39, 44, 'Social Studies', 1),
(56, 39, 19, 'Science', 2),
(57, 39, 77, 'English', 2),
(58, 39, 15, 'Mathematics', 1),
(59, 40, 28, 'Art Supplies', 1),
(60, 40, 14, 'Academic Kit', 6),
(61, 40, 50, 'Art Supplies', 1),
(62, 40, 21, 'Mathematics', 1),
(63, 40, 33, 'Music', 1),
(64, 40, 17, 'Science', 4),
(65, 40, 13, 'Health & Hygiene Kit', 1),
(66, 40, 24, 'Science', 2),
(67, 40, 38, 'Art Supplies', 3),
(68, 40, 45, 'French', 1),
(69, 40, 51, 'Arabic', 2),
(70, 40, 44, 'Social Studies', 1),
(71, 40, 19, 'Science', 2),
(72, 40, 77, 'English', 2),
(73, 40, 15, 'Mathematics', 1),
(74, 41, 44, 'English', 1),
(75, 41, 71, 'Academic Kit', 1),
(76, 41, 13, 'Health & Hygiene Kit', 1),
(77, 41, 42, 'Academic Kit', 1),
(78, 41, 40, 'Art Supplies', 2),
(79, 41, 28, 'Art Supplies', 3),
(80, 41, 35, 'Art Supplies', 1),
(81, 41, 29, 'Art Supplies', 1),
(82, 41, 53, 'French', 1),
(83, 41, 34, 'Art Supplies', 2),
(84, 41, 25, 'French', 1),
(85, 41, 45, 'French', 1),
(86, 41, 31, 'Arabic', 1),
(87, 41, 52, 'Arabic', 2),
(88, 41, 51, 'Arabic', 2),
(89, 41, 50, 'Social Studies', 1),
(90, 41, 45, 'Social Studies', 1),
(91, 41, 14, 'Social Studies', 1),
(92, 41, 17, 'Science', 3),
(93, 41, 15, 'Science', 1),
(94, 41, 24, 'Science', 1),
(95, 41, 45, 'Science', 1),
(96, 41, 22, 'Mathematics', 1),
(97, 41, 17, 'English', 2),
(98, 41, 14, 'English', 1),
(99, 41, 48, 'English', 1),
(100, 41, 23, 'Mathematics', 1),
(101, 41, 21, 'Mathematics', 1),
(102, 42, 13, 'Health & Hygiene Kit', 2),
(103, 42, 41, 'Academic Kit', 1),
(104, 42, 27, 'Art Supplies', 1),
(105, 42, 40, 'Art Supplies', 5),
(106, 42, 39, 'Art Supplies', 3),
(107, 42, 37, 'Art Supplies', 1),
(108, 42, 38, 'Art Supplies', 1),
(109, 42, 35, 'Art Supplies', 1),
(110, 42, 34, 'Art Supplies', 1),
(111, 42, 33, 'Music', 1),
(112, 42, 45, 'French', 1),
(113, 42, 25, 'French', 1),
(114, 42, 30, 'Religion', 1),
(115, 42, 31, 'Arabic', 1),
(116, 42, 30, 'Arabic', 1),
(117, 42, 29, 'Electives', 1),
(118, 42, 28, 'Electives', 1),
(119, 42, 26, 'Electives', 1),
(120, 42, 30, 'Electives', 1),
(121, 42, 14, 'Social Studies', 1),
(122, 42, 18, 'Social Studies', 1),
(123, 42, 25, 'Science', 1),
(124, 42, 24, 'Science', 1),
(125, 42, 21, 'Mathematics', 1),
(126, 42, 22, 'Mathematics', 1),
(127, 42, 16, 'Mathematics', 1),
(128, 42, 18, 'English', 1),
(129, 42, 26, 'English', 1),
(130, 42, 17, 'Academic Kit', 2),
(131, 42, 16, 'Academic Kit', 1),
(132, 42, 18, 'Academic Kit', 1),
(133, 42, 15, 'Academic Kit', 1),
(134, 42, 36, 'Health & Hygiene Kit', 1);

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
(65, 'Parent', 'parent@gmail.com', '12345678', 'Ali', 'Khaled', 11111, '2023-06-04'),
(66, 'Parent', 'adadaw@gmail.com', '123123123123', 'ali', 'fsefsfef', 1212123123, '2023-06-06'),
(67, 'Parent', 'lolololol@gmail.com', '1233213231', 'ali', 'khaled', 12312312, '2023-06-06'),
(68, 'Student', 'alikhaled@gmail.com', '12345678', 'Ali', 'Khaled', 11111111, '2023-06-06');

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
  ADD PRIMARY KEY (`excessid`),
  ADD KEY `userid` (`userid`);

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
  ADD KEY `addressid` (`addressid`),
  ADD KEY `cartid` (`cartid`);

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
  ADD KEY `student_ibfk_3` (`userid`),
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
  ADD KEY `productid` (`productid`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `excess`
--
ALTER TABLE `excess`
  MODIFY `excessid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `supplies_list`
--
ALTER TABLE `supplies_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `supplylistitems`
--
ALTER TABLE `supplylistitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `usersclass`
--
ALTER TABLE `usersclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `excess`
--
ALTER TABLE `excess`
  ADD CONSTRAINT `excess_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usersclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usersclass` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`cartid`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
