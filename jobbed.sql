-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 02:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobbed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issues`
--

CREATE TABLE `tbl_issues` (
  `issue_id` int(11) NOT NULL,
  `issue_owner_id` int(11) NOT NULL,
  `issue_category` int(11) NOT NULL,
  `issue_location` int(11) NOT NULL,
  `issue_details` text NOT NULL,
  `issue_map_location` varchar(255) NOT NULL,
  `issue_status` int(11) NOT NULL,
  `issue_handler_id` int(11) NOT NULL,
  `issue_final_bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_issues`
--

INSERT INTO `tbl_issues` (`issue_id`, `issue_owner_id`, `issue_category`, `issue_location`, `issue_details`, `issue_map_location`, `issue_status`, `issue_handler_id`, `issue_final_bid`) VALUES
(19, 19, 48, 2, 'I need help moving from South C to South B', 'South C, Nairobi West', 1, 0, 0),
(20, 30, 50, 1, 'I have a huge load of clothes like 30 shirts , 20 socks with sticky stains, 10 pairs of pants. I will provide water and detergents. ', 'Qwetu Wilsonview, Keri road', 1, 0, 0),
(21, 29, 44, 1, 'My sink has a serious leak . Kids playing destroyed it. Need help urgently', 'South C, Nairobi West', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `request_id` int(11) NOT NULL,
  `request_owner_id` int(11) NOT NULL,
  `request_issue_id` int(11) NOT NULL,
  `request_bidder_id` int(11) NOT NULL,
  `request_bid_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `request_owner_id`, `request_issue_id`, `request_bidder_id`, `request_bid_amt`) VALUES
(3, 0, 20, 22, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'USER_CLIENT'),
(2, 'USER_WORKER'),
(3, 'USER_ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `service_name`, `service_photo`) VALUES
(44, 'Plumbing', '1658217836_6739965aed0e73bccc14.png'),
(45, 'electrical', '1658217875_8c7d098d53e73c9684f8.png'),
(46, 'gardening', '1658217890_95a4de52e195d75c0918.png'),
(47, 'welding', '1658217911_f584b0d1eddfd1b01add.png'),
(48, 'movers', '1658217933_e556505f84a3dc917b6c.png'),
(49, 'cleaning', '1658217952_963b5f3d870a806fc179.png'),
(50, 'laundry', '1658218032_45ed3de2f93af260126b.png'),
(51, 'parcel delivery', '1658218918_30f307439cc1c6d9b0d5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_location`
--

CREATE TABLE `tbl_service_location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_location`
--

INSERT INTO `tbl_service_location` (`location_id`, `location_name`) VALUES
(1, 'Indoors'),
(2, 'Outdoors'),
(4, 'Attic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_name`) VALUES
(1, 'pending'),
(2, 'active'),
(3, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `users_name`, `user_email`, `user_password`, `user_role_id`, `is_deleted`) VALUES
(0, 'null', 'null', 'null', 2, 0),
(19, 'angelo', 'angelomkry@gmail.com', '$2y$10$pJNGuDdhBEKC9U/LU6Cdwuy1Dm5rqSS2bameSybC4nfkfO9ArX7Ga', 1, 0),
(22, 'migos', 'migos@gmail.com', '$2y$10$tR5mlj2Mr1zl13l2VCeR7epF1mAFdNC9pZZswWMbEbzJXl2e5K9hC', 1, 0),
(28, 'jb', 'JB@gmail.com', '$2y$10$XPzvAEhBrqXQECDMfQisYORFSJPL7RpBiDAl8Et.4LD3ZpryBPAd2', 2, 0),
(29, 'nelson', 'nelsonmwangi197@gmail.com', '$2y$10$/v2C1LXn.p7M5/LGDgPavu24mZ.qRIzB2m1XBFcZT8ZTdiGYizob.', 1, 0),
(30, 'The Papaa', 'ryan.kiilu@strathmore.edu', '$2y$10$/iZquXzFb2xYi5P5Dfqke.MnSabLimPS9JFeHOhuaRECEjysdws3m', 1, 0),
(31, 'ADMIN', 'admin@gmail.com', '$2y$10$lQhI0UxOZXqOT6qgkPNQbuwUF1pZd0AYNBrPNkO4Q2Rh88SSN8hTi', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workers`
--

CREATE TABLE `tbl_workers` (
  `worker_id` int(11) NOT NULL,
  `worker_fname` varchar(255) NOT NULL,
  `worker_lname` varchar(255) NOT NULL,
  `worker_email` varchar(255) NOT NULL,
  `worker_phone_no` int(11) NOT NULL,
  `worker_nat_id` int(11) NOT NULL,
  `worker_address` varchar(255) NOT NULL,
  `worker_cert_good_cond` varchar(255) NOT NULL,
  `worker_n_id_photo` varchar(255) NOT NULL,
  `worker_service_id` int(11) NOT NULL,
  `worker_password` varchar(255) NOT NULL,
  `is_verfied` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_workers`
--

INSERT INTO `tbl_workers` (`worker_id`, `worker_fname`, `worker_lname`, `worker_email`, `worker_phone_no`, `worker_nat_id`, `worker_address`, `worker_cert_good_cond`, `worker_n_id_photo`, `worker_service_id`, `worker_password`, `is_verfied`) VALUES
(1, 'John', 'Derek', 'johnderek@gmail.com', 714165105, 39292083, 'Keri Rd.,Qwetu Wilsonview', 'johnderek.CV', 'john_derek.png', 2, '39292083', 0),
(2, 'Nelson', 'Mwangi', 'nelsonmwangi197@gmail.com', 714165105, 3093930, 'Keri Rd, Madaraka', 'C:fakepathICS-3106-CAT-2.pdf', 'C:fakepath134979-ICS3A-CAT2OR.pdf', 3, '$2y$10$sUXan9TdbxtjYZ.FUZmr1ezxVXgIfY7V.FR89TpdwrtS.CXHPFAbO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_issues`
--
ALTER TABLE `tbl_issues`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `issue_status` (`issue_status`),
  ADD KEY `issue_owner_id` (`issue_owner_id`),
  ADD KEY `issue_category` (`issue_category`),
  ADD KEY `issue_location` (`issue_location`),
  ADD KEY `issue_handler_id` (`issue_handler_id`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `request_issue_id` (`request_issue_id`),
  ADD KEY `request_bidder_id` (`request_bidder_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_service_location`
--
ALTER TABLE `tbl_service_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `tbl_workers`
--
ALTER TABLE `tbl_workers`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_issues`
--
ALTER TABLE `tbl_issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_service_location`
--
ALTER TABLE `tbl_service_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_workers`
--
ALTER TABLE `tbl_workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_issues`
--
ALTER TABLE `tbl_issues`
  ADD CONSTRAINT `tbl_issues_ibfk_1` FOREIGN KEY (`issue_status`) REFERENCES `tbl_status` (`status_id`),
  ADD CONSTRAINT `tbl_issues_ibfk_2` FOREIGN KEY (`issue_owner_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_issues_ibfk_3` FOREIGN KEY (`issue_category`) REFERENCES `tbl_services` (`service_id`),
  ADD CONSTRAINT `tbl_issues_ibfk_4` FOREIGN KEY (`issue_location`) REFERENCES `tbl_service_location` (`location_id`),
  ADD CONSTRAINT `tbl_issues_ibfk_5` FOREIGN KEY (`issue_handler_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD CONSTRAINT `tbl_requests_ibfk_2` FOREIGN KEY (`request_bidder_id`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
