-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 06:58 PM
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
-- Database: `php3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(4, 'pizza', '5', 'pi.jpg', 1),
(5, 'jibsi', '1', 'fries.jpg', 1),
(6, 'burger', '10', 'burger.jpg', 1),
(7, 'milk', '2', 'milk.jpeg', 1),
(8, 'rice', '1', 'rice.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `wadanka` varchar(300) NOT NULL,
  `dhinaca` varchar(300) NOT NULL,
  `pin_code` int(200) NOT NULL,
  `total_product` varchar(300) NOT NULL,
  `total_price` int(200) NOT NULL,
  `Action` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `wadanka` varchar(255) NOT NULL,
  `dhinaca` varchar(255) NOT NULL,
  `pin_code` int(255) NOT NULL,
  `total_product` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `Action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`id`, `name`, `number`, `email`, `method`, `wadanka`, `dhinaca`, `pin_code`, `total_product`, `total_price`, `status`, `Action`) VALUES
(1, 'zaki', '088', 'cali@gmail.com', 'Credit Card', 'thailand', 'bankok', 2526, 'Burger (1 )', '5', '3', ''),
(2, 'zaki', '088', 'cali@gmail.com', 'Credit Card', 'thailand', 'bankok', 2526, 'Burger (1 )', '5', '1', ''),
(3, 'zaki', '088', 'cali@gmail.com', 'Credit Card', 'thailand', 'bankok', 2526, 'Burger (1 )', '5', '1', ''),
(25, 'legend', '62666262', 'abdirashiddahirali7@gmail.com', 'cash on delivery', 'UAE', 'DUBAI', 252, 'pizza (1 )', '5', '2', ''),
(26, 'RASHKA DAHIR', '0612900615', 'rashkajr8899@gmail.com', 'cash on delivery', 'somali', 'MOGADOISHU', 252, 'pizza (1 ), jibsi (1 ), burger (1 ), milk (1 ), rice (1 )', '19', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(4, 'pizza', '5', 'pi.jpg'),
(5, 'jibsi', '1', 'fries.jpg'),
(7, 'burger', '10', 'burger.jpg'),
(9, 'milk', '2', 'milk.jpeg'),
(10, 'rice', '1', 'rice.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderr`
--
ALTER TABLE `orderr`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
