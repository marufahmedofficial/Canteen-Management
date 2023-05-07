-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 03:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(4) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_type`, `customer_password`) VALUES
(1, 'Anto', '+880123456789', 'anto@yahoo.com', 'Other', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(4) NOT NULL,
  `item_id` int(4) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_price` int(4) NOT NULL,
  `location` varchar(255) NOT NULL,
  `customer_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `item_title`, `item_price`, `location`, `customer_id`) VALUES
(1, 1, 'Water', 0, '', 1),
(2, 1, 'Water', 15, '', 1),
(3, 1, 'Water', 15, '', 1),
(4, 1, 'Water', 15, '', 1),
(5, 1, 'Water', 15, '', 1),
(6, 1, 'Water', 15, '', 1),
(7, 1, 'Water', 15, '', 1),
(8, 1, 'Water', 15, '', 1),
(9, 1, 'Water', 15, '', 1),
(10, 1, 'Water', 15, '', 1),
(11, 2, 'Roti', 10, '', 1),
(12, 3, 'Dal', 15, '', 1),
(13, 1, 'Water', 15, '', 1),
(14, 1, 'Water', 15, '', 1),
(15, 1, 'Water', 15, '', 1),
(16, 2, 'Roti', 10, '', 1),
(17, 2, 'Roti', 10, '', 1),
(18, 2, 'Roti', 10, '', 1),
(19, 2, 'Roti', 10, '', 1),
(20, 2, 'Roti', 10, '', 1),
(21, 2, 'Roti', 10, '', 1),
(22, 3, 'Dal', 15, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(4) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_title`, `item_price`) VALUES
(1, 'Water', 15),
(2, 'Roti', 10),
(3, 'Dal', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
