-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 06:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `tenant_name` varchar(100) NOT NULL,
  `room_id` varchar(100) NOT NULL,
  `duration_month` varchar(30) NOT NULL,
  `book_start_date` date NOT NULL,
  `book_end_date` date NOT NULL,
  `payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `tenant_name`, `room_id`, `duration_month`, `book_start_date`, `book_end_date`, `payment`) VALUES
(138, 'Nazhara Natasya', 'W01', '3', '2022-06-20', '2022-09-21', '3750000'),
(139, ' Aurora Calista', 'W02', '2', '2022-05-16', '2022-07-12', '2500000'),
(140, 'Arion Reinaldo', 'M01', '3', '2022-06-13', '2022-09-13', '3750000'),
(141, 'Kalypso Dirgantari', 'W04', '2', '2022-06-30', '2022-08-29', '2500000');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `trans_month` varchar(100) NOT NULL,
  `trans_date` date NOT NULL,
  `the_month` varchar(100) NOT NULL,
  `monthly_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `trans_id`, `trans_month`, `trans_date`, `the_month`, `monthly_price`) VALUES
(41, 165, ' May  2022', '2022-05-16', 'June  2022', ' 1250000'),
(42, 166, ' May  2022', '2022-05-16', 'July  2022', ' 1250000'),
(43, 170, ' May  2022', '2022-05-16', 'June  2022', ' 1250000'),
(44, 173, ' May  2022', '2022-05-16', 'June  2022', ' 1250000');

-- --------------------------------------------------------

--
-- Table structure for table `myadmin`
--

CREATE TABLE `myadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myadmin`
--

INSERT INTO `myadmin` (`id`, `username`, `password`) VALUES
(2, 'devrika', '$2y$10$Qnt1SUiqb.xoQb.qan1jseIwKR95tk.g7TWrb2szGOAusjV1dlqRG'),
(3, 'admin', '$2y$10$FEsmHHVNBktRFwvqdnPY.OD/oxD/QBKnudGhRU4D9aZBQlnPRJDo2'),
(4, 'admin2', '$2y$10$.CzE2yzvnDh70L7KqQWyAuQtYtSeGok4qx4iG8YSeRz1m8PI1.fy6');

-- --------------------------------------------------------

--
-- Table structure for table `myroom`
--

CREATE TABLE `myroom` (
  `room_id` varchar(100) NOT NULL,
  `room_label` varchar(100) NOT NULL,
  `room_location` varchar(100) NOT NULL,
  `room_window` varchar(100) NOT NULL,
  `room_monthly_price` varchar(100) NOT NULL,
  `room_availability` varchar(100) NOT NULL,
  `room_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myroom`
--

INSERT INTO `myroom` (`room_id`, `room_label`, `room_location`, `room_window`, `room_monthly_price`, `room_availability`, `room_description`) VALUES
('M01', 'M1', '1st floor', 'garden', '1.250.000', 'Available', 'only for male'),
('M03', 'M3', '2nd floor', 'backyard', 'Rp.1,250,000', 'Available', 'Only for Male'),
('M04', 'M4', '1st floor', 'swimming pool', 'Rp.1,250,000', 'Available', 'Only for Male'),
('M05', 'M5', '1st floor', 'swimming pool', 'Rp.1,250,000', 'Available', 'Only for Male'),
('W01', 'W1', '2nd floor', 'garden', 'Rp.1,250,000', 'NOT AVAILABLE', 'Only for Female'),
('W02', 'W2', '2nd floor', 'garden', 'Rp.1,250,000', 'NOT AVAILABLE', 'Only for Female'),
('W03', 'W3', '2nd floor', 'backyard', 'Rp.1,250,000', 'Available', 'Only for Female'),
('W04', 'W4', '2nd floor', 'swimming pool', 'Rp.1,250,000', 'NOT AVAILABLE', 'Only for Female'),
('W05', 'W5', '2nd floor', 'swimming pool', 'Rp.1,250,000', 'Available', 'Only for Female');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(10) NOT NULL,
  `tenant_name` varchar(100) NOT NULL,
  `tenant_address` varchar(100) NOT NULL,
  `tenant_ktp_no` varchar(100) NOT NULL,
  `tenant_phone` varchar(100) NOT NULL,
  `tenant_email` varchar(100) NOT NULL,
  `tenant_emergcp` varchar(100) NOT NULL,
  `tenant_emergcp_phone` varchar(100) NOT NULL,
  `tenant_emergcp_email` varchar(100) NOT NULL,
  `tenant_bankaccount` varchar(100) NOT NULL,
  `tenant_bankaccount_no` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `tenant_name`, `tenant_address`, `tenant_ktp_no`, `tenant_phone`, `tenant_email`, `tenant_emergcp`, `tenant_emergcp_phone`, `tenant_emergcp_email`, `tenant_bankaccount`, `tenant_bankaccount_no`, `status`) VALUES
(1, 'Nazhara Natasya', 'East Cikarang, Bekasi', '2171043101020003', '085170937541', 'nazha@gmail.com', 'Ara (Sister)', '082143657712', 'ara@gmail.com', 'Nazhara Natasya', '1102320973', 'Active'),
(2, 'Eliza Kim', 'North Cikarang, Bekasi', '2102042106010007', '089533736542', 'eliza@gmail.com', 'Saphira (Sister)', '081232769032', 'saphi@gmail.com', 'Eliza Kim', '1023470843', 'Active'),
(3, 'Re Dirgantara', 'East Cikarang, Bekasi', '2172026201050002', '089532547821', 're@gmail.com', 'Dirgantara (Father)', '089522707825', 'dirgantara@gmail.com', 'Re Dirgantara', '0025895370', ''),
(4, 'Kenan Aditya', 'West Cikarang, Bekasi', '2174029207020021', '089858662043', 'ken@gmail.com', 'Intan (Mother)', '082157662903', 'intan@gmail.com', 'Kenan Aditya', '1104568730', 'Moving Out'),
(5, 'Adinda Aletheia', 'Tebet, South Jakarta', '2177119103020801', '085132758090', 'ale@gmail.com', 'Vio (Mother)', '085188782012', 'vio@gmail.com', 'Adinda Aletheia', '0110320100', ''),
(6, ' Aurora Calista', 'South Cikarang, Bekasi', '2126619000030904', '089933404050', 'au@gmail.com', 'Adi (Father)', '089913304030', 'adi@gmail.com', ' Aurora Calista', '0000110910', 'Active'),
(7, 'Kalypso Dirgantari', 'Cengkareng, West Jakarta', '2120017005430119', '082131015010', 'kai@gmail.com', 'Nadia (Mother)', '082111014401', 'nadia@gmail.com', 'Kalypso Dirgantari', '0110021910', 'Active'),
(8, 'Arion Reinaldo', 'Gambir, Central Jakarta', '2120105225454111', '082280027741', 'arion@gmail.com', 'Aldo (Brother)', '081250037540', 'aldo@gmail.com', 'Arion Reinaldo', '0020120221', 'Active'),
(9, 'Regan Pratama', 'Central Cikarang, Bekasi', '2100119222334212', '089543885510', 'regan@gmail.com', 'Dio (Brother)', '089513605329', 'dio@gmail.com', 'Regan Pratama', '1011091043', 'Moving Out');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `trans_id` int(11) NOT NULL,
  `tenant_name` varchar(100) NOT NULL,
  `due_date` date NOT NULL,
  `the_month` varchar(100) NOT NULL,
  `monthly_price` varchar(100) NOT NULL,
  `trans_date` date DEFAULT NULL,
  `trans_month` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`trans_id`, `tenant_name`, `due_date`, `the_month`, `monthly_price`, `trans_date`, `trans_month`, `description`) VALUES
(165, 'Nazhara Natasya', '2022-06-20', 'June  2022', ' 1250000', '2022-05-16', 'May  2022', 'Paid'),
(166, 'Nazhara Natasya', '2022-07-20', 'July  2022', ' 1250000', '2022-05-16', 'May  2022', 'Paid'),
(167, 'Nazhara Natasya', '2022-08-20', 'August  2022', ' 1250000', NULL, '', NULL),
(168, ' Aurora Calista', '2022-05-16', 'May  2022', ' 1250000', NULL, '', NULL),
(169, ' Aurora Calista', '2022-06-16', 'June  2022', ' 1250000', NULL, '', NULL),
(170, 'Arion Reinaldo', '2022-06-13', 'June  2022', ' 1250000', '2022-05-16', 'May  2022', 'Paid'),
(171, 'Arion Reinaldo', '2022-07-13', 'July  2022', ' 1250000', NULL, '', NULL),
(172, 'Arion Reinaldo', '2022-08-13', 'August  2022', ' 1250000', NULL, '', NULL),
(173, 'Kalypso Dirgantari', '2022-06-30', 'June  2022', ' 1250000', '2022-05-16', 'May  2022', 'Paid'),
(174, 'Kalypso Dirgantari', '2022-07-30', 'July  2022', ' 1250000', NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `myadmin`
--
ALTER TABLE `myadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myroom`
--
ALTER TABLE `myroom`
  ADD PRIMARY KEY (`room_id`) USING BTREE;

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `myadmin`
--
ALTER TABLE `myadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
