-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 03:53 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_doll_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `Tag_id` int(10) NOT NULL,
  `Tag_name` varchar(255) NOT NULL,
  `Tag_username` varchar(255) NOT NULL,
  `Tag_create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`Tag_id`, `Tag_name`, `Tag_username`, `Tag_create_at`) VALUES
(23, 'sawadee', 'admin', '2021-07-23 09:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `tag_log`
--

CREATE TABLE `tag_log` (
  `Tag_log_id` int(10) NOT NULL,
  `Tag_id` int(10) NOT NULL,
  `Tag_article_id` int(11) DEFAULT NULL,
  `Tag_product_id` int(11) DEFAULT NULL,
  `Admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag_log`
--

INSERT INTO `tag_log` (`Tag_log_id`, `Tag_id`, `Tag_article_id`, `Tag_product_id`, `Admin_id`) VALUES
(97, 23, 54, NULL, 1),
(98, 23, 55, NULL, 1),
(99, 23, NULL, 101, 1),
(100, 23, NULL, 102, 1),
(101, 23, NULL, 101, 1),
(102, 23, NULL, 103, 1),
(103, 23, NULL, 102, 1),
(104, 23, NULL, 104, 1),
(105, 23, NULL, 105, 1),
(106, 23, NULL, 106, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `fname`, `lname`, `password`, `date`) VALUES
(1, 'admin', 'programmer', 'test', '202cb962ac59075b964b07152d234b70', '2021-06-30 10:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_article`
--

CREATE TABLE `tb_article` (
  `Article_id` int(11) NOT NULL,
  `Article_title` varchar(50) NOT NULL,
  `Article_description` longtext DEFAULT NULL,
  `Article_date` datetime DEFAULT current_timestamp(),
  `Seo_title` varchar(255) NOT NULL,
  `Seo_description` longtext NOT NULL,
  `Seo_url` varchar(255) NOT NULL,
  `Seo_keyword` varchar(255) NOT NULL,
  `Article_Category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_article`
--

INSERT INTO `tb_article` (`Article_id`, `Article_title`, `Article_description`, `Article_date`, `Seo_title`, `Seo_description`, `Seo_url`, `Seo_keyword`, `Article_Category`) VALUES
(54, 'Title test', '<h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2021-07-24 13:20:31', 'asdasd', 'asdad', 'asdasd', 'dasdad', NULL),
(55, 'vbcg', '<h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2021-07-24 13:36:26', '1231', 'GDSF', '1ESfvd', 'g egav f', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_username` varchar(255) NOT NULL,
  `c_create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`c_id`, `c_name`, `c_username`, `c_create_at`) VALUES
(1, 'marvel', 'admin', '2021-07-30 09:49:56'),
(2, 'justice leage ', 'admin', '2021-07-30 09:56:05'),
(4, 'bear', 'admin', '2021-07-30 11:27:31'),
(5, 'animal', 'admin', '2021-07-31 09:18:05'),
(6, 'Doll', 'admin', '2021-07-31 10:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_picture`
--

CREATE TABLE `tb_picture` (
  `Picture_id` int(11) NOT NULL,
  `Picture_name` varchar(50) NOT NULL,
  `Product_id` int(11) DEFAULT NULL,
  `Article_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_picture`
--

INSERT INTO `tb_picture` (`Picture_id`, `Picture_name`, `Product_id`, `Article_id`) VALUES
(200, '60fbb12f5ca659.24128098.png', NULL, 54),
(203, '61024e45b29d30.44579426.jpg', 101, NULL),
(204, '61024e45b68497.58103606.jpg', 101, NULL),
(205, '61026d4a229413.73749181.png', 102, NULL),
(206, '61026d4a23da52.04366480.jpg', 102, NULL),
(207, '61026d4a252fc0.70356449.png', 102, NULL),
(210, '6104b07d1b90f3.96680976.png', 103, NULL),
(211, '6104bb152ee7b0.65984307.jpg', 104, NULL),
(214, '6107584d50fb70.69856409.jpg', NULL, 55),
(215, '61075852c03f67.81636326.jpg', NULL, 55);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `Product_id` int(11) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Product_description` varchar(100) DEFAULT NULL,
  `Product_price` int(7) NOT NULL,
  `Product_amount` int(4) NOT NULL,
  `Product_status` varchar(255) DEFAULT NULL,
  `Product_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`Product_id`, `Product_name`, `Product_description`, `Product_price`, `Product_amount`, `Product_status`, `Product_category`) VALUES
(101, 'spiderman', 'PETER PARKER', 1990, 100, 'ราคาถูก', 'marvel'),
(102, 'pan pan', 'WE bare bear panda', 100, 100, 'มาแรง', 'animal'),
(103, 'pan', 'WE bare bear panda', 111, 111, 'ขายดี', 'animal'),
(104, 'Baby queen', 'baby queen', 11, 11, 'มาแรง', 'Doll'),
(105, 'ffff', 'ffff', 888, 999, 'ขายดี', 'Doll');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`Tag_id`);

--
-- Indexes for table `tag_log`
--
ALTER TABLE `tag_log`
  ADD PRIMARY KEY (`Tag_log_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_article`
--
ALTER TABLE `tb_article`
  ADD PRIMARY KEY (`Article_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_picture`
--
ALTER TABLE `tb_picture`
  ADD PRIMARY KEY (`Picture_id`),
  ADD KEY `FK_Picture_Product` (`Product_id`) USING BTREE,
  ADD KEY `FK_Picture_Article` (`Article_id`) USING BTREE;

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`Product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `Tag_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tag_log`
--
ALTER TABLE `tag_log`
  MODIFY `Tag_log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_article`
--
ALTER TABLE `tb_article`
  MODIFY `Article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_picture`
--
ALTER TABLE `tb_picture`
  MODIFY `Picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_picture`
--
ALTER TABLE `tb_picture`
  ADD CONSTRAINT `FK_Picture_Product` FOREIGN KEY (`Product_id`) REFERENCES `tb_product` (`Product_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
