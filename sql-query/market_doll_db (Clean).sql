-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 06:02 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

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
  `Seo_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_username` varchar(255) NOT NULL,
  `c_status` tinyint(1) NOT NULL,
  `c_sequence` int(10) NOT NULL,
  `c_create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Product_view` int(10) NOT NULL,
  `Product_status` varchar(255) DEFAULT NULL,
  `Product_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `Tag_log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_article`
--
ALTER TABLE `tb_article`
  MODIFY `Article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_picture`
--
ALTER TABLE `tb_picture`
  MODIFY `Picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

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
