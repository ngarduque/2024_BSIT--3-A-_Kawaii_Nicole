-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 04:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample5`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `item_img` varchar(255) DEFAULT NULL,
  `item_name` varchar(55) NOT NULL,
  `item_desc` text NOT NULL,
  `item_category` int(11) NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `item_image` blob NOT NULL,
  `item_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `item_img`, `item_name`, `item_desc`, `item_category`, `item_price`, `item_image`, `item_status`) VALUES
(1, 'apple-red.jpg', 'Apple - Red', 'Test Only', 0, 100.00, '', 'I'),
(2, 'green_apple.jpg', 'Apple - Green', 'Apol pradaks', 0, 40000.00, '', 'I'),
(3, 'apple-hilaw.jpg', 'Apple - Hilaw', 'Mango', 0, 30000.00, '', 'I'),
(4, 'kamote_apple.jpg', 'Apple - Kamote', '1TB M1 Processor', 0, 65000.00, '', 'I'),
(5, 'fuji_apple.jpg', 'Apple - Fuji', 'New release', 0, 30000.00, '', 'I'),
(6, 'apple_orange.jpg', 'Apple - Orange', '1 TB M1', 0, 35000.00, '', 'I'),
(7, '20037458.jpg', 'Apple - Violet', 'Violet na Iphone', 0, 20000.00, '', 'I'),
(8, 'close-up-fresh-apple.jpg', 'New Apple', 'Apple 1TB 2GB Memory', 0, 34000.00, '', 'I'),
(9, NULL, 'Gyoza (Pan-Fried Dumplings)', 'Delicate dumplings filled with a mix of ground meat and vegetables, pan-fried until golden brown. Served with a savory dipping sauce.', 0, 200.00, 0x73756363756c656e742e706e67, 'I'),
(10, NULL, 'Mochi', 'apple', 0, 110.00, 0x382e706e67, 'A'),
(11, NULL, 'Gyoza (Pan-Fried Dumplings)', 'Japanese Dessert', 0, 20.00, 0x392e706e67, 'I'),
(12, NULL, 'apple', 'hehehe', 0, 110.00, 0x392e706e67, 'I'),
(13, NULL, 'Gyoza (Pan-Fried Dumplings)', 'Japanese Dessert', 0, 0.00, '', 'I'),
(14, NULL, 'tako', 'hehehe', 0, 10.00, 0x382e706e67, 'I'),
(15, NULL, 'watermelon', 'yy', 0, 10.00, 0x33323632386239333965646165633063613035623331356561613061383565352e6a7067, 'I'),
(16, NULL, 'Mochi', 'Japanese Dessert', 0, 20.00, 0x392e706e67, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `item_statuses`
--

CREATE TABLE `item_statuses` (
  `item_status_id` int(11) NOT NULL,
  `item_status_cd` char(1) NOT NULL,
  `item_status_desc` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_statuses`
--

INSERT INTO `item_statuses` (`item_status_id`, `item_status_cd`, `item_status_desc`) VALUES
(1, 'A', 'Active'),
(2, 'I', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `order_ref_number` varchar(9) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `gcash_ref_num` varchar(55) DEFAULT NULL,
  `gcash_account_name` varchar(55) DEFAULT NULL,
  `gcash_account_number` varchar(22) DEFAULT NULL,
  `gcash_amount_sent` double DEFAULT NULL,
  `shipper_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `alternate_receiver` varchar(100) DEFAULT NULL,
  `alternate_address` varchar(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_qty` int(11) NOT NULL,
  `order_phase` varchar(1) NOT NULL DEFAULT '1' COMMENT '1 - Cart\r\n2 - Checkout\r\n3 - Pending\r\n4 - Confirmed\r\n5 - Delivered\r\n0 - Cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `order_ref_number`, `payment_method`, `gcash_ref_num`, `gcash_account_name`, `gcash_account_number`, `gcash_amount_sent`, `shipper_id`, `user_id`, `alternate_receiver`, `alternate_address`, `item_id`, `date_added`, `item_qty`, `order_phase`) VALUES
(123, '', 1, 'H792EJWT', 'mika', '09876545678', 20, 1, 14, '', '', 16, '2024-05-26 12:48:52', 1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `order_phase`
--

CREATE TABLE `order_phase` (
  `order_phase_id` int(11) NOT NULL,
  `order_phase_desc` varchar(55) NOT NULL,
  `order_phase_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_phase`
--

INSERT INTO `order_phase` (`order_phase_id`, `order_phase_desc`, `order_phase_admin`) VALUES
(1, 'Cart', ''),
(2, 'Checkout', 'New'),
(3, 'Pending', ''),
(4, 'Confirmed', ''),
(5, 'Delivered', ''),
(0, 'Cancelled', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method_desc` varchar(55) NOT NULL,
  `payment_method_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method_desc`, `payment_method_status`) VALUES
(1, 'GCASH', 'A'),
(2, 'COD', 'A'),
(3, 'Debit', 'A'),
(4, 'Credit Card', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `shipper_id` int(11) NOT NULL,
  `shipping_company` varchar(55) NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_company_cd` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipping_company`, `shipping_address`, `shipping_company_cd`) VALUES
(1, 'J&T Express', NULL, 'JTX'),
(2, 'Flash Express', NULL, 'FX'),
(3, 'SPX', 'Shoppee Express', '');

-- --------------------------------------------------------

--
-- Table structure for table `total_per_date`
--

CREATE TABLE `total_per_date` (
  `transaction_date` date DEFAULT NULL,
  `total_item_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_per_item`
--

CREATE TABLE `total_per_item` (
  `item_name` varchar(55) DEFAULT NULL,
  `item_img` varchar(255) DEFAULT NULL,
  `total_item_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_per_order`
--

CREATE TABLE `total_per_order` (
  `order_ref_number` varchar(9) DEFAULT NULL,
  `total_item_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total_per_user`
--

CREATE TABLE `total_per_user` (
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(55) DEFAULT NULL,
  `total_item_qty` decimal(32,0) DEFAULT NULL,
  `total_amt` decimal(39,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_info_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(22) NOT NULL,
  `gender` char(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` char(1) NOT NULL DEFAULT 'A',
  `user_type` char(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_info_id`, `username`, `password`, `fullname`, `address`, `contact_no`, `gender`, `date_added`, `user_status`, `user_type`) VALUES
(12, 'niki', 'niki', 'mima souichiro', 'chiba', 'weeb', 'M', '2024-05-26 10:15:29', 'A', 'A'),
(13, 'sunki', 'sunki', 'nicole', 'chiba', '11222', 'M', '2024-05-26 10:48:22', 'A', 'C'),
(14, 'mika', 'mika', 'mika', 'hahahha', '1562161246', 'M', '2024-05-26 11:35:44', 'A', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`),
  ADD KEY `item_status_items` (`item_status`);

--
-- Indexes for table `item_statuses`
--
ALTER TABLE `item_statuses`
  ADD PRIMARY KEY (`item_status_id`),
  ADD KEY `item_status_cd` (`item_status_cd`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `user_id_orders` (`user_id`),
  ADD KEY `item_id_orders` (`item_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`shipper_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `item_statuses`
--
ALTER TABLE `item_statuses`
  MODIFY `item_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `item_status_items` FOREIGN KEY (`item_status`) REFERENCES `item_statuses` (`item_status_cd`) ON DELETE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_id_orders` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_info_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
