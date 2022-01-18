-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 02:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`, `products`) VALUES
(1, 'Courses', 1, 3),
(2, 'Free Bootcamps', 1, 1),
(3, 'No Upfront Fee', 1, 0),
(4, 'Off Campus Placements', 1, 4),
(36, 'Test Link', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Lokeshwar Reddy', 'lokeshwarreddy629@gmail.com', '9398539948', 'Developer', '2020-01-14 00:00:00'),
(2, 'Nagarjun A', 'nagarjun2001avala1999@gmail.com', '8374017459', 'Developer', '2020-01-19 07:59:38'),
(3, 'Vishal', 'vishal@gmail.com', '1234567890', 'Developer', '2020-01-19 08:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `ex_d_t` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_link` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `mrp`, `price`, `ex_d_t`, `qty`, `image`, `product_link`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 1, 'Java', 100, 100, '2022-02-01 00:00:00', 1, '435024375_1.jpg', '', '', '', '', '', 1),
(2, 1, 'Python', 120, 129, '2022-10-20 00:00:00', 1, '737058274_1.jpg', '', '', '', '', '', 1),
(3, 2, 'C++', 11, 12, '2022-01-20 18:14:18', 1, '769137798_8.jpg', '', '', '', '', '', 1),
(4, 1, 'PHP', 11, 12, '2021-10-10 00:00:00', 1, '603331736_1.jpg', '', '', '', '', '', 0),
(5, 4, 'JS', 11, 12, '2022-02-15 00:00:00', 1, '935853313_8.jpg', '', '', '', '', '', 1),
(6, 1, 'Django', 123, 122, '2022-06-01 00:00:00', 1, '812764258_1.jpg', '', '', '', '', '', 1),
(7, 4, 'MASAI', 1200, 1199, '2022-02-01 00:00:00', 1, '845865393_8.jpg', '', '', '', '', '', 1),
(10, 36, 'Google', 12, 11, '2022-10-10 00:00:00', 1, '323750632_1.jpg', 'https://www.google.com', '', '', '', '', 1),
(11, 36, 'YouTube', 1, 1, '2023-01-01 00:00:00', 1, '265905689_1.jpg', 'https://www.youtube.com', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(1, 'Vishal Gupta', '', 'vishal@gmail.com', '1234567890', '2020-01-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` float NOT NULL,
  `product_mrp` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_ex_d_t` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `product_qty` int(11) NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`id`, `user_id`, `product_id`, `product_name`, `product_desc`, `product_price`, `product_mrp`, `product_image`, `product_ex_d_t`, `product_qty`, `product_status`, `category_id`, `time_stamp`) VALUES
(1, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:52:31'),
(2, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:52:46'),
(3, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:52:51'),
(4, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:53:00'),
(5, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:53:33'),
(6, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:53:42'),
(7, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:54:15'),
(8, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:54:37'),
(9, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:55:19'),
(10, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 12:55:33'),
(11, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 13:00:52'),
(12, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 13:01:31'),
(13, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 13:01:54'),
(14, 1, 11, 'YouTube', '', 1, 1, '265905689_1.jpg', '2023-01-01 00:00:00', 1, 1, 36, '2022-01-18 13:02:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
