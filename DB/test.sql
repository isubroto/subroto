-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 06:26 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `c_id` int(11) NOT NULL,
  `Company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `Company_name`) VALUES
(26, 'এ্যাপোলো'),
(27, 'গরু'),
(28, 'মটকা'),
(29, 'কে ওয়াই'),
(30, 'চ্যামন');

-- --------------------------------------------------------

--
-- Table structure for table `draft_memo`
--

CREATE TABLE `draft_memo` (
  `DM_Id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Creation_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `draft_memo`
--

INSERT INTO `draft_memo` (`DM_Id`, `Customer_id`, `Creation_Date`) VALUES
(33, 1, '2021-02-12 18:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `draft_memo_details`
--

CREATE TABLE `draft_memo_details` (
  `D_id` int(11) NOT NULL,
  `DM_Id` int(11) NOT NULL,
  `C_Id` int(11) NOT NULL,
  `T_Id` int(11) NOT NULL,
  `I_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `baseprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `draft_memo_details`
--

INSERT INTO `draft_memo_details` (`D_id`, `DM_Id`, `C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice`) VALUES
(31, 33, 26, 9, 4, 777, 777);

-- --------------------------------------------------------

--
-- Table structure for table `lenth`
--

CREATE TABLE `lenth` (
  `l_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `length` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lenth`
--

INSERT INTO `lenth` (`l_id`, `t_id`, `length`) VALUES
(4, 9, '৬'),
(5, 10, '৬'),
(6, 11, '৬'),
(7, 13, '৬'),
(8, 13, '৮'),
(9, 14, '১২');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `log_id` int(11) NOT NULL,
  `log_date` datetime(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `device_details` varchar(100) NOT NULL,
  `device_mac` varchar(50) NOT NULL,
  `browser_details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`log_id`, `log_date`, `username`, `device_details`, `device_mac`, `browser_details`) VALUES
(23, '2021-02-05 19:16:23.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(24, '2021-02-05 07:21:31.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(25, '2021-02-05 19:24:22.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(26, '2021-02-05 19:25:22.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(27, '2021-02-05 19:35:36.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(28, '2021-02-05 21:37:34.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(29, '2021-02-08 13:36:14.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(30, '2021-02-09 12:57:16.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 87.0.4280.88'),
(31, '2021-02-10 13:45:22.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 88.0.4324.150'),
(32, '2021-02-10 21:33:15.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 88.0.4324.150'),
(33, '2021-02-12 13:10:11.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 88.0.4324.150'),
(34, '2021-02-22 11:14:39.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 88.0.4324.150'),
(35, '2021-02-22 13:38:24.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 88.0.4324.182'),
(36, '2021-02-27 23:01:52.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 88.0.4324.182');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `sid` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `pice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sid`, `l_id`, `pice`) VALUES
(1, 4, 20),
(3, 6, 64),
(4, 5, 40),
(5, 7, 114),
(6, 8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_log`
--

INSERT INTO `stock_log` (`id`, `user_name`, `activity`, `time`) VALUES
(6, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলি যোগ করা হয়েছে ', '22/01/2021 : 07.48 PM'),
(7, 'subroto', 'গরু কোম্পানির ১২ মোটা মিলি যোগ করা হয়েছে ', '22/01/2021 : 07.48 PM'),
(8, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(9, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(10, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(11, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(12, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(13, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(14, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(15, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(16, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(17, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(18, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(19, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(20, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 20 পিছ যো', ' 22/01/2021 : 09.11 PM'),
(21, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুট যোগ করা হয়েছে ', '22/01/2021 : 09.16 PM'),
(22, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 50 পিছ যোগ করা ', '22/01/2021 : 09.16 PM '),
(23, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 50 পিছ যোগ করা ', ' 22/01/2021 : 09.16 PM'),
(24, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 50 পিছ যোগ করা ', ' 22/01/2021 : 09.16 PM'),
(25, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM'),
(26, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM'),
(27, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM'),
(28, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM'),
(29, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM'),
(30, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে 50 পিছ যো', '22/01/2021 : 09.18 PM '),
(31, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে 50 পিছ যো', ' 22/01/2021 : 09.19 PM'),
(32, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে 40 পিছ যো', ' 22/01/2021 : 09.20 PM'),
(33, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলি যোগ করা হয়েছে ', '22/01/2021 : 09.25 PM'),
(34, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুট যোগ করা হয়েছে ', '22/01/2021 : 09.26 PM'),
(35, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 50 পিছ যোগ করা', '22/01/2021 : 09.26 PM '),
(36, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 10 পিছ যোগ করা', ' 22/01/2021 : 09.26 PM'),
(37, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 12 পিছ যোগ করা', ' 22/01/2021 : 09.30 PM'),
(38, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 22 পিছ যোগ করা', ' 22/01/2021 : 09.30 PM'),
(39, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 44 পিছ যোগ করা ', ' 22/01/2021 : 09.33 PM'),
(40, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুট যোগ করা হয়েছে ', '22/01/2021 : 10.06 PM'),
(41, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 20 পিছ যোগ করা', ' 22/01/2021 : 10.33 PM'),
(42, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুটে 40 পিছ যোগ করা', '22/01/2021 : 10.34 PM '),
(43, 'Subroto', 'মটকা কোম্পানির ২৬০ মিলি যোগ করা হয়েছে ', '2021-02-22 14:23:01'),
(44, 'Subroto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুট যোগ করা হয়েছে ', '2021-02-22 14:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

CREATE TABLE `test_users` (
  `test_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`test_id`, `user_name`, `password`, `email`, `type`) VALUES
(3, 'sudepto', '0c78245ba4866b4569bced2e3e61863a', 'sudeptosaha@gmail.com', 'user'),
(4, 'subroto', 'ad09666971be412484d625817ff015e2', 'subrotosaha@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `thikness`
--

CREATE TABLE `thikness` (
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `mm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thikness`
--

INSERT INTO `thikness` (`t_id`, `c_id`, `mm`) VALUES
(9, 26, '১২০ চেরী'),
(10, 26, '১২০ মোটা'),
(11, 27, '১২ চেরী'),
(12, 27, '১২ মোটা'),
(13, 26, '১৩০'),
(14, 28, '২৬০');

-- --------------------------------------------------------

--
-- Table structure for table `wholesale_customer`
--

CREATE TABLE `wholesale_customer` (
  `C_id` int(11) NOT NULL,
  `Shop_Name` varchar(500) NOT NULL,
  `Shop_Address` varchar(2000) NOT NULL,
  `Balance Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wholesale_customer`
--

INSERT INTO `wholesale_customer` (`C_id`, `Shop_Name`, `Shop_Address`, `Balance Amount`) VALUES
(1, 'সাহা ট্রেডার্স', 'সৈয়দপুর', 0),
(2, 'রেয়াজ ট্রেডার্স', 'সৈয়দপুর', 0),
(3, 'ডি.কে.সরকার', 'সৈয়দপুর', 0),
(4, 'শান্তি ট্রেডার্স', 'সৈয়দপুর', 0),
(5, 'মারিয়া ট্রেডার্স', 'সৈয়দপুর', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `draft_memo`
--
ALTER TABLE `draft_memo`
  ADD PRIMARY KEY (`DM_Id`);

--
-- Indexes for table `draft_memo_details`
--
ALTER TABLE `draft_memo_details`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `DM_Id` (`DM_Id`),
  ADD KEY `C_Id` (`C_Id`),
  ADD KEY `I_Id` (`I_Id`),
  ADD KEY `T_Id` (`T_Id`);

--
-- Indexes for table `lenth`
--
ALTER TABLE `lenth`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `thikness id` (`t_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_users`
--
ALTER TABLE `test_users`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `thikness`
--
ALTER TABLE `thikness`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `company id` (`c_id`);

--
-- Indexes for table `wholesale_customer`
--
ALTER TABLE `wholesale_customer`
  ADD PRIMARY KEY (`C_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `draft_memo`
--
ALTER TABLE `draft_memo`
  MODIFY `DM_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `draft_memo_details`
--
ALTER TABLE `draft_memo_details`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lenth`
--
ALTER TABLE `lenth`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `test_users`
--
ALTER TABLE `test_users`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thikness`
--
ALTER TABLE `thikness`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wholesale_customer`
--
ALTER TABLE `wholesale_customer`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `draft_memo_details`
--
ALTER TABLE `draft_memo_details`
  ADD CONSTRAINT `draft_memo_details_ibfk_1` FOREIGN KEY (`DM_Id`) REFERENCES `draft_memo` (`DM_Id`),
  ADD CONSTRAINT `draft_memo_details_ibfk_2` FOREIGN KEY (`C_Id`) REFERENCES `company` (`c_id`),
  ADD CONSTRAINT `draft_memo_details_ibfk_3` FOREIGN KEY (`I_Id`) REFERENCES `lenth` (`l_id`),
  ADD CONSTRAINT `draft_memo_details_ibfk_4` FOREIGN KEY (`T_Id`) REFERENCES `thikness` (`t_id`);

--
-- Constraints for table `lenth`
--
ALTER TABLE `lenth`
  ADD CONSTRAINT `thikness id` FOREIGN KEY (`t_id`) REFERENCES `thikness` (`t_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `lenth` (`l_id`);

--
-- Constraints for table `thikness`
--
ALTER TABLE `thikness`
  ADD CONSTRAINT `company id` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
