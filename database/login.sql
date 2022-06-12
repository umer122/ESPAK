-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 09:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `codee` text NOT NULL,
  `phone` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `codee`, `phone`, `address`, `dob`) VALUES
(27, 'usman', 'ujameel26@gmail.com', '123', '', '03064045572', 'plot 285 G3 johar town lahore', '2008-12-20'),
(28, 'admin', '9.usmanjamil@gmail.com', '123', '', '03014902974', 'House # 285 G3 Johar', '2000-10-10'),
(29, 'Haider', 'haiderali@gmail.com', '123', '', '03064045572', 'plot 285 G3 johar town lahore', '1998-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'boiler'),
(2, 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `name`, `phone`, `cat`) VALUES
(8, 'usman', '982758724', ''),
(9, 'Usman Jamil', '03064045572', ''),
(10, 'haider', '9829574857', ''),
(11, 'usman', '982758724', ''),
(12, 'sundas', '123456', 'Ahmad'),
(13, 'ali', '982758724', 'Usman'),
(14, 'usman', '9829574857', 'Ahmad'),
(15, 'df', 'sss', 'Ahmad'),
(16, 'ali', ',skjs', 'Usman'),
(17, 'usman', '982758724', 'Ahmad'),
(18, 'usman', '9829574857', 'Usman');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(250) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_quantity` text NOT NULL,
  `buying_price` varchar(30) NOT NULL,
  `selling_price` int(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `minimum_quantity` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`product_id`, `product_title`, `product_category`, `product_quantity`, `buying_price`, `selling_price`, `supplier`, `minimum_quantity`, `time`) VALUES
(14, 'Bolierq', 'boiler', '5', '500', 500, 'Ali', 2, '2022-02-24 19:30:22'),
(15, 'Mobile', 'Tech', '45', '50000', 60000, 'Ahmad', 10, '2022-02-24 19:30:22'),
(16, 'Projector', 'Tech', '12', '1200000', 140000, 'Ali', 2, '2022-02-24 19:30:22'),
(17, 'mdkm', 'kkcosk', '5', '500', 600, 'usman', 5, '2022-03-14 13:18:05'),
(18, 'laptop', 'nxjn', '25', '25000', 120000, 'xyz', 10, '2022-06-08 20:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `link`, `email`) VALUES
(9, 's,km', 'mksmsk', 'ujameel26@gmail.com'),
(10, 'kjsijmk', 'kmcxksn', 'ujameel26@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `buying_price` int(100) NOT NULL,
  `selling_price` int(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `minimum_quantity` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category`, `product_quantity`, `buying_price`, `selling_price`, `supplier`, `minimum_quantity`, `time`, `status`) VALUES
(49, 'Projector', 'mobile', 15, 150000, 60000, 'Usman', 8, '2022-02-28 19:33:22', 0),
(54, 'Mobile', 'boiler', 15, 150000, 160000, 'umer', 3, '2022-02-28 19:33:14', 0),
(55, 'Boiler', 'mobile', 5, 150000, 60000, 'umer', 8, '2022-02-28 19:33:19', 0),
(56, 'Mobile', 'mobile', 15, 150000, 160000, 'Usman', 8, '2022-02-28 19:33:25', 0),
(57, 'Boiler', 'boiler', 15, 50000, 60000, 'Usman', 8, '2022-02-28 19:33:29', 0),
(58, 'Boiler', 'boiler', 15, 50000, 60000, 'Usman', 8, '2022-02-28 19:33:33', 0),
(59, 'Boiler', 'boiler', 15, 50000, 60000, 'Usman', 8, '2022-02-28 19:33:35', 0),
(60, 'Mobile', 'boiler', 9, 150000, 60000, 'Usman', 3, '2022-02-28 19:33:40', 0),
(61, 'Mobile', 'boiler', 9, 150000, 60000, 'Usman', 3, '2022-02-28 19:33:43', 0),
(62, 'Boiler', 'mobile', 5, 150000, 60000, 'Usman', 8, '2022-02-28 19:33:46', 0),
(63, 'Boiler', 'mobile', 5, 150000, 60000, 'Usman', 8, '2022-02-28 19:33:52', 0),
(64, 'Chemical', 'boiler', 14, 50000, 60000, 'Usman', 3, '2022-02-28 19:33:54', 0),
(65, 'Chemical', 'boiler', 14, 50000, 60000, 'Usman', 3, '2022-02-28 19:33:58', 0),
(66, 'Watch', 'mobile', 15, 150000, 60000, 'Usman', 8, '2022-02-28 19:34:03', 0),
(67, 'Boiler', 'mobile', 5, 50000, 90000, 'Usman', 3, '2022-02-28 19:34:07', 0),
(68, 'Boiler', 'mobile', 5, 50000, 90000, 'Usman', 3, '2022-02-28 19:34:59', 0),
(69, 'Mouse', 'mobile', 5, 150000, 60000, 'Usman', 8, '2022-02-28 19:34:59', 0),
(70, 'Wllet', 'boiler', 45, 900, 1100, 'Usman', 2, '2022-03-14 12:23:39', 0),
(71, 'Projector', 'boiler', 5, 150000, 160000, 'Usman', 8, '2022-03-14 12:35:56', 0),
(72, 'XYX', 'mobile', 15, 150000, 160000, 'Ahmad', 8, '2022-06-09 12:05:23', 0),
(73, 'abc', 'boiler', 15, 150000, 160000, 'Ahmad', 8, '2022-06-09 12:05:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `title`) VALUES
(1, ''),
(2, ''),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(255) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `Supplier_mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `Supplier_mail`) VALUES
(3, 'Ahmad', ''),
(5, 'Usman', 'ujameel26@gmail.com'),
(6, 'umer', '9.usmanjamil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`) VALUES
(5, 'admin', 'ujameel26@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(7, 'admin', '9.usmanjamil@gmail.com', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
