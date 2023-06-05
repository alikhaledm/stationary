-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 09:30 PM
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
(6, 'donation', 'aaaa', '', NULL, 'project-7.jpg', '2023-06-08', 65);

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
(13, 'Wipes', '200 wipes', '40.00', 'wipes.png', 'Other'),
(14, 'Ring Binder ', 'Plastic sleeves for all subjects', '70.00', 'ringbinder.png', 'Notebooks & Paper'),
(15, 'Pack of A4 loose-leaf paper', 'This A4 graph paper is supplied in loose leaf reams. It comes in 5mm squares. Printing is sharp and clear on both.', '25.00', 'a4 pack.jpg', 'Notebooks & Paper'),
(16, 'Pack of squared paper', '', '35.00', 'ql02540.jpg', 'Notebooks & Paper'),
(17, 'Plastic sleeves', 'Vault X card sleeves are the first line of defense when it comes to protecting your cards. Put every card inside a sleeve to help protect against dust, dirt and debris that can cause nasty dents and scratches.', '45.00', 'card-sleeves.webp', 'Notebooks & Paper'),
(18, 'Pack of A4 white paper', 'A4 Copy paper', '170.00', '920505.png', 'Notebooks & Paper'),
(19, 'Fabercastell copybook', '144 paper', '60.00', 'Faber-Castell-Spiral-Medium-Copybook-144-Sheet-2.png', 'Notebooks & Paper'),
(20, 'Zipped plastic folder', '', '17.00', 'Zipper.png', 'Notebooks & Paper'),
(21, 'Geometry set', '', '35.00', 'Mask_Group_219.png', 'Math & Scientfic'),
(22, 'Casio Calculator', 'Scientific calculator', '450.00', 'Casio.png', 'Math & Scientfic'),
(23, 'Squared copybook', '40 pages', '25.00', '40_p.png', 'Notebooks & Paper'),
(24, 'Lab coat', '', '90.00', 'PS_RK_KP72WH_F.png', 'Other'),
(25, 'Pocket File', '', '15.00', 'Mobile__E7CC643AA637D340F63DB42199D17600__440__es_17325_g-1bb9929e81867082149ddf63b6f16b25.png', 'Binders & Folders'),
(26, 'Business Dictionary', 'Cambridge', '400.00', 'getSocialImage.png', 'Notebooks & Paper'),
(27, 'Canson paper', 'A pack of 5', '20.00', 'images-removebg-preview.png', 'Art Supplies'),
(28, 'Glue stick', '', '25.00', 'images-removebg-preview (1).png', 'Art Supplies'),
(29, 'Plastic scissors', '', '30.00', 'DEL1607-1_1024x.webp', 'Art Supplies'),
(30, 'Wireless copybook', '', '60.00', 'Screenshot_20230604-235933_2-removebg-preview.png', 'Notebooks & Paper'),
(31, 'Al Adwaa', 'Arabic (Grade 9)', '70.00', 'images__1_-removebg-preview.png', 'Other'),
(32, 'Social Studies Alemtehan', '???????? (???????? ??????????)', '80.00', 'images__3_-removebg-preview~2.png', 'Notebooks & Paper'),
(33, 'Music notebook', '40 pages', '25.00', 'images__5_-removebg-preview.png', 'Notebooks & Paper'),
(34, 'Canson Sketch', 'A3', '80.00', 'drawsketch_canson_12sh_3550_wt_1024x1024-removebg-preview.png', 'Art Supplies'),
(35, 'Faber Castell Pencil Colors', '36 colors', '135.00', 'IMG_6346_58045dd0-8caf-4da0-b550-463e47eb2ddd_1026x1026-removebg-preview.png', 'Notebooks & Paper'),
(36, 'Hand Sanitizer - Ethyl Alcohol', '70 % Ethyl Alcohol', '35.00', 'hand sanitizer.png', 'Other'),
(37, 'Acrylic colors', 'pallet ', '250.00', 'shopping-removebg-preview.png', 'Art Supplies'),
(38, 'Set of oil colors', '12 colors', '180.00', 'images__7_-removebg-preview.png', 'Art Supplies'),
(39, 'Brushes', '7 brushes', '100.00', 'images__8_-removebg-preview.png', 'Art Supplies'),
(40, 'Glue gun wax sticks', '6 sticks', '45.00', 'Screenshot_20230605-002539_2-removebg-preview.png', 'Art Supplies'),
(41, 'Pencil case ', 'Girls', '50.00', 'images__10_-removebg-preview.png', 'Bags & Cases'),
(42, 'Pencil case', 'Boys ', '50.00', 'images__11_-removebg-preview.png', 'Bags & Cases'),
(43, 'Turpentine', '100ml', '35.00', 'images__12_-removebg-preview.png', 'Art Supplies'),
(44, 'My Journal Notebook', '60 pages', '60.00', 'PIN03862_PNG_noshadow.png', 'Notebooks & Paper'),
(45, 'Wired Copybook', 'With Dividers 120 pages', '55.00', '5_subject-1000x1000-removebg-preview.png', 'Notebooks & Paper'),
(46, 'Pack of dividers', 'Write and Erase Durable Plastic Dividers with Slash Pocket', '70.00', '1EE79F9EE9CC239D385F5C4D8B4D2CD4430627FD_VAZWD2C7AZMRPRFU594N_feature.png', 'Binders & Folders'),
(47, 'Index Cards', 'Index Cards Ruled 4x6 Asst 10/pkg', '30.00', '000820_90114_0001_fl.png', 'Notebooks & Paper'),
(48, 'Internet USB', 'Wireless Adapter Network LAN Card 802.11n', '100.00', 'TL-WN823N-1.png', 'Other'),
(49, 'Transparent tracing paper', 'A4 Tracing Paper 40gsm Ultra Thin See Through Copy Drawing Calligraphy Trace', '35.00', '51eEgvrSmrL-removebg-preview.png', 'Notebooks & Paper'),
(50, 'Pack of colored paper', '50 sheets Colored Paper, 80gm 10 assorted color / pack', '120.00', '18x24.png', 'Notebooks & Paper'),
(51, 'Red Notebook ', '100 Pages', '60.00', 'AUP140749.webp', 'Notebooks & Paper'),
(52, 'Green Notebook', '100 Pages', '60.00', '197724_3__33789.webp', 'Notebooks & Paper'),
(53, 'Plastic envelope folder', 'Envelope folder ErichKrause® Glossy Ice Metallic,opaque, A4, assorted colors', '10.00', 'Mobile__7E7DB833504A0332EF3069829BB3258C__1200__630__es_628491-a60ce13815d9bd0223830ede12e2b5f4.webp', 'Binders & Folders'),
(54, 'Metal Scissors', 'Blue black', '40.00', 'CHL80825_1-removebg-preview.png', 'Art Supplies'),
(55, 'Faber-Castell Soft Pastel Sticks ', '(Box of 24)', '210.00', '717tNmaL94L._AC_UF1000_1000_QL80_-removebg-preview.png', 'Art Supplies'),
(56, 'Dong-A Dooly Poster Colors', '15 Ml - Set Of 12', '240.00', '41GQOVs+ckL._SR600_315_PIWhiteStrip_BottomLeft_0_35_SCLZZZZZZZ_FMpng_BG255_255_255-removebg-preview.png', 'Art Supplies'),
(57, 'Reynolds Ball 045 Pen ', 'pack of 10 - Blue Ink', '20.00', 's-l1600-removebg-preview.png', 'Writing Tools'),
(58, 'Deli Graphite Pencils', '2.4 mm C004-2B with eraser tip - 12 black pencils', '60.00', '1-removebg-preview.png', 'Writing Tools'),
(59, 'Faber Castell Highlighter', 'Assorted Colors', '15.00', 'Textliner.png', 'Writing Tools'),
(60, 'Max Half Strip Japanese Stapler', ' Hd-50f, Black', '240.00', 'Mobile__EA2CE42753EE55E62B1FD243E2856F95__440__ra_23810501-fcddc9b112d7863c2c0f5f006e846572.webp', 'Other'),
(61, 'Rexel Staples', ' 24/6 Staples - Pack of 1000 Pcs', '30.00', 'Desktop__8A421A580E115EB9E32A13051D8E6A4A__440__rx_6070_v2-5457437ef59f3f7a193551c889be7bde.webp', 'Other'),
(62, 'Deli Paper Punch ', 'T40020 - 8 Sheets', '60.00', '1E0101-BLU.png', 'Other'),
(63, 'Aopai B3-1 High Quality Sticky Notes ', '76 * 76mm Set Of 100 Sheets - Mutli Color', '11.00', 'unnamed.png', 'Notebooks & Paper'),
(64, ' Transparent Cello tape ', 'Size: 2 inch', '20.00', 'cello-tape-manufactures-in-india.png', 'Other'),
(65, 'Designability Ruler', 'Weighted Ruler', '15.00', 'WeightedRuler_1.png', 'Writing Tools'),
(66, 'Uniball- Correction Pen', '', '55.00', '71FGMBY9BxL-removebg-preview.png', 'Writing Tools'),
(67, 'Hikvision Flash Drive', 'M200 4GB USB 2.0', '70.00', 'e6335940-b9f0-437a-97c7-050aa35f94a8.webp', 'Other'),
(68, 'Fine - Pocket facial tissue', ' 10 sheets x 3 layers, pack of 10 sterilized tissue for germ protection.', '20.00', 'ceec35a0-f433-4703-a458-0dca67a1df9a.__CR0_0_300_300_PT0_SX300_V1___-removebg-preview.png', 'Other'),
(69, 'Faber Castell  Eraser', 'B384 Plastic Eraser Black', '8.00', '51EEZzT0yCL-removebg-preview.png', 'Writing Tools'),
(70, 'Sharpener with container', 'Deli School Supplies Pencil Sharpener 520 - Assorted', '10.00', '2_E39768BLU.webp', 'Writing Tools'),
(71, 'Non-Metal Ruler', 'Keyroad Ruler 30cm', '5.00', 'KR971081-3efbaddb.png', 'Writing Tools'),
(72, 'White Board Marker', 'Sakura-Set of 4', '30.00', 'white_board_marker_mi.png', 'Writing Tools'),
(73, 'White Board Eraser', 'Deli 7810 Whiteboard Eraser - Grey', '28.00', '1579267162--DL-E7810_1.png', 'Writing Tools'),
(74, 'Small White Board', 'Board-White, 30X20 CM', '65.00', 'HTB19JWAXjzuK1RjSsppq6xz0XXaa_adobespark.png', 'Writing Tools'),
(75, 'Triangular pencil holder', 'Soft Silicone Triangular Pencil Grips (Set of 3)', '30.00', '72161b441fa2c03f6457e2d307dab463-removebg-preview.png', 'Writing Tools'),
(76, 'Play Dough', 'Wow Play Dough Set, 6 Buckets - 125 gm', '200.00', '41834q94TuL._AC_UF1000_1000_QL80_-removebg-preview.png', 'Art Supplies'),
(77, 'Notebook with alphabetical tabs', 'Notebook with Alphabetical Tabs, 80 Pages, 6x7 in', '100.00', 'e27b8faf-62a8-4e75-9194-4f795a67e5f8.e17ef5deb3f8989fdcf4dd77d4624a4e-removebg-preview.png', 'Notebooks & Paper'),
(78, 'Long-sleeved Apron', '', '110.00', 'ULTITEC-4000-DD603-Chemical-Resistant-Disposable-Coat-Apron_1024x1024.webp', 'Other'),
(79, 'Crayons', ' ', '60.00', 'crayola-jumbo-crayons-16-ct.jpg', 'Art Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `productsold`
--

CREATE TABLE `productsold` (
  `id` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdesc` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productsold`
--

INSERT INTO `productsold` (`id`, `pname`, `pdesc`, `price`, `photo`, `category`) VALUES
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
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentemail`, `dob`, `school_id`, `grade`, `userid`) VALUES
(95, 'mayar', 'alikhaledm399@gmail.com', '2023-06-01', 1, 1, 65);

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
  ADD KEY `productid` (`productid`),
  ADD KEY `addressid` (`addressid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsold`
--
ALTER TABLE `productsold`
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
  MODIFY `excessid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `productsold`
--
ALTER TABLE `productsold`
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
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `productsold` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `productsold` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `supplylistitems_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `productsold` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplylistitems_ibfk_2` FOREIGN KEY (`supplylistid`) REFERENCES `supplies_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
