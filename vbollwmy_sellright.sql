-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2021 at 07:09 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vbollwmy_sellright`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `cart_id` int(5) NOT NULL,
  `number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(5) NOT NULL,
  `vid` int(5) NOT NULL,
  `cid` int(5) NOT NULL,
  `qty` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sub_total` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `cid` int(5) NOT NULL,
  `vid` int(5) NOT NULL,
  `catalogue_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`cid`, `vid`, `catalogue_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'SellRight', '2021-06-30 12:07:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `vid` int(5) NOT NULL,
  `cid` int(5) NOT NULL,
  `number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(101) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `pid`, `vid`, `cid`, `number`, `qty`, `price`, `product`, `description`, `image`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '8545256326', '2', '200', 'xyz', 'ghggvfgfcg', 'IMG-20200218-WA0002 (2).jpg', NULL, '2021-06-30 12:50:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `plan_payment_detail`
--

CREATE TABLE `plan_payment_detail` (
  `plan_id` int(5) NOT NULL,
  `plan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `vid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan_payment_detail`
--

INSERT INTO `plan_payment_detail` (`plan_id`, `plan`, `price`, `vid`) VALUES
(1, '1 Month', '500.00', 41),
(2, '1 Month', '500', 41),
(3, '1 Month', '500', 41),
(4, '12 Month', '4000', 41),
(5, '6 Month', '2000', 41);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `pid` int(5) NOT NULL,
  `vid` int(5) NOT NULL,
  `cid` int(5) NOT NULL,
  `product_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image_2` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'sell_right_logo.png',
  `image_3` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'sell_right_logo.png',
  `image_4` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'sell_right_logo.png',
  `image_5` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'sell_right_logo.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`pid`, `vid`, `cid`, `product_name`, `price`, `description`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'T-Shirt', '300', 'Nike T- shirt', 'image_picker3627502975527334894.jpg', '', '', '', '', '2021-06-30 12:10:59', '0000-00-00 00:00:00'),
(2, 2, 1, 'Jeans', '1000', 'Brand Jeans', 'image_picker2359730114519048151.jpg', '', '', '', '', '2021-06-30 12:11:49', '0000-00-00 00:00:00'),
(3, 2, 1, 'Wooden Craft', '700', 'Wooden design plat', 'image_picker8958407430539681361.jpg', 'image_picker7373845115708256248.jpg', '', '', '', '2021-06-30 12:13:26', '0000-00-00 00:00:00'),
(4, 1, 1, 'xyz', '100', 'ghggvfgfcg', 'IMG-20200218-WA0002 (2).jpg', NULL, NULL, NULL, NULL, '2021-06-30 12:20:42', '0000-00-00 00:00:00'),
(5, 2, 1, 'Bottle', '600', 'Steal Bottle', 'image_picker7267688062552859431.jpg', '', '', '', '', '2021-06-30 12:56:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sellright_users`
--

CREATE TABLE `sellright_users` (
  `uid` int(5) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `payment_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `OTP` int(5) NOT NULL,
  `api_token` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sellright_users`
--

INSERT INTO `sellright_users` (`uid`, `username`, `image`, `email`, `password`, `number`, `address`, `role`, `payment_status`, `OTP`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'sell_right_logo.png', 'admin@gmail.com', 'admin', '7589654253', 'ahmedabad', 0, '0', 0, '', '2021-06-30 11:56:24', '0000-00-00 00:00:00'),
(2, 'sell right', '', 'sellright@gmail.com', '123456', '+9112345678', NULL, 2, '0', 3862, '3886708132', '2021-06-30 12:06:23', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `plan_payment_detail`
--
ALTER TABLE `plan_payment_detail`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `sellright_users`
--
ALTER TABLE `sellright_users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plan_payment_detail`
--
ALTER TABLE `plan_payment_detail`
  MODIFY `plan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sellright_users`
--
ALTER TABLE `sellright_users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
