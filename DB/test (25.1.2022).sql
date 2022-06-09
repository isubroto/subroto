-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 12:22 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_log`
--

CREATE TABLE `account_log` (
  `AL_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `C_id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Payment Status` varchar(11) NOT NULL,
  `Balance` int(11) NOT NULL,
  `Old_Balance` int(11) NOT NULL,
  `Referance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_log`
--

INSERT INTO `account_log` (`AL_Id`, `Date`, `C_id`, `Amount`, `Payment Status`, `Balance`, `Old_Balance`, `Referance`) VALUES
(16, '2022-01-07', 5, 1052, 'Debit', 1021052, 1020000, '01WOR07'),
(17, '2022-01-07', 5, 0, 'Credit', 1021052, 1021052, '01WOR07'),
(18, '2022-01-07', 5, 2083, 'Debit', 1023135, 1021052, '01ZN107'),
(19, '2022-01-07', 5, 4000, 'Credit', 1019135, 1023135, '01ZN107'),
(20, '2022-01-12', 1, 50311, 'Debit', 50311, 0, '01DU412'),
(21, '2022-01-12', 1, 0, 'Credit', 50311, 50311, '01DU412'),
(22, '2022-01-13', 3, 7620, 'Debit', 7620, 0, '015KJ13'),
(23, '2022-01-13', 3, 0, 'Credit', 7620, 7620, '015KJ13'),
(24, '2022-01-13', 2, 8000, 'Debit', 8000, 0, '01DYD13'),
(25, '2022-01-13', 2, 0, 'Credit', 8000, 8000, '01DYD13'),
(26, '2022-01-13', 6, 3300, 'Debit', 3300, 0, '017MU13'),
(27, '2022-01-13', 6, 0, 'Credit', 3300, 3300, '017MU13');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `BA_Id` int(11) NOT NULL,
  `B_Id` int(11) NOT NULL,
  `Account_Number` varchar(50) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`BA_Id`, `B_Id`, `Account_Number`, `Amount`) VALUES
(1, 1, '1312', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank_account_manage`
--

CREATE TABLE `bank_account_manage` (
  `BAM_Id` int(11) NOT NULL,
  `BA_Id` int(11) NOT NULL,
  `Operation` varchar(50) NOT NULL,
  `Source` int(50) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Previous_Amount` int(11) NOT NULL,
  `Login_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_manage`
--

CREATE TABLE `bank_manage` (
  `B_Id` int(11) NOT NULL,
  `Bank_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_manage`
--

INSERT INTO `bank_manage` (`B_Id`, `Bank_Name`) VALUES
(1, 'উত্তরা ব্যাংক');

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
(30, 'চ্যামন'),
(36, 'গরু জিংক');

-- --------------------------------------------------------

--
-- Table structure for table `company_details_manage`
--

CREATE TABLE `company_details_manage` (
  `CDM_Id` int(11) NOT NULL,
  `CM_Id` varchar(50) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `ThiknessId` int(11) NOT NULL,
  `LengthId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_details_manage`
--

INSERT INTO `company_details_manage` (`CDM_Id`, `CM_Id`, `CompanyId`, `ThiknessId`, `LengthId`, `Quantity`, `Rate`) VALUES
(1, '01VFU002', 26, 9, 4, 2111, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `company_manage`
--

CREATE TABLE `company_manage` (
  `CM_Id` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `QuanititinPice` int(11) NOT NULL,
  `QuantityInTon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_manage`
--

INSERT INTO `company_manage` (`CM_Id`, `Date`, `TotalPrice`, `QuanititinPice`, `QuantityInTon`) VALUES
('01VFU002', '2022-01-02', 374291, 2111, 7);

-- --------------------------------------------------------

--
-- Table structure for table `draft_memo`
--

CREATE TABLE `draft_memo` (
  `DM_Id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Creation_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `hisab`
--

CREATE TABLE `hisab` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Memo Number` varchar(50) CHARACTER SET utf8 NOT NULL,
  `BanglaDate` varchar(50) CHARACTER SET utf8 NOT NULL,
  `WeekDate` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hisab`
--

INSERT INTO `hisab` (`Id`, `Date`, `Memo Number`, `BanglaDate`, `WeekDate`) VALUES
(105, '2022-01-18', '010PV13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(106, '2022-01-18', '0116813', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(107, '2022-01-18', '012BZ13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(108, '2022-01-18', '015KJ13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(109, '2022-01-18', '016UD13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(110, '2022-01-18', '017MU13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(111, '2022-01-18', '019RQ13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(112, '2022-01-18', '019SY13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(113, '2022-01-18', '01AW913', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(114, '2022-01-18', '01CUR13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(115, '2022-01-18', '01DU412', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(116, '2022-01-18', '01DYD13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(117, '2022-01-18', '01F4313', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(118, '2022-01-18', '01GV313', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(119, '2022-01-18', '01KLW13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(120, '2022-01-18', '01OMJ13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(121, '2022-01-18', '01R3N13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(122, '2022-01-18', '01S3B13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(123, '2022-01-18', '01SWT13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(124, '2022-01-18', '01SYA13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(125, '2022-01-18', '01VA213', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(126, '2022-01-18', '01WOR07', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(127, '2022-01-18', '01YES13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(128, '2022-01-18', '01YI013', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(129, '2022-01-18', '01Z6C13', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার'),
(130, '2022-01-18', '01ZN107', '৪ মাঘ, ১৪২৮ সন', 'মঙ্গলবার');

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
(9, 14, '১২'),
(10, 15, '৯');

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
(36, '2021-02-27 23:01:52.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 88.0.4324.182'),
(39, '2021-12-17 10:05:42.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(40, '2021-12-17 10:09:17.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(41, '2021-12-17 10:11:53.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(42, '2021-12-17 10:13:16.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(43, '2021-12-17 10:27:55.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(44, '2021-12-17 10:29:03.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(45, '2021-12-17 10:31:28.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(46, '2021-12-17 10:31:37.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.93'),
(47, '2022-01-01 16:12:05.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.110'),
(48, '2022-01-01 16:19:45.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.110'),
(49, '2022-01-02 17:07:37.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.110'),
(50, '2022-01-07 17:04:50.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.110'),
(51, '2022-01-07 18:23:38.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.110'),
(52, '2022-01-09 16:16:55.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 96.0.4664.110'),
(53, '2022-01-11 15:48:33.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(54, '2022-01-11 16:58:46.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(55, '2022-01-12 07:01:42.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(56, '2022-01-12 17:40:52.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(57, '2022-01-13 08:04:37.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(58, '2022-01-13 08:27:27.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(59, '2022-01-13 08:55:46.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(60, '2022-01-13 15:59:59.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(61, '2022-01-15 07:34:40.000000', 'Subroto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(62, '2022-01-15 09:27:31.000000', 'Sudepto', 'Operating System: Windows 10', '', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(63, '2022-01-15 09:27:31.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(64, '2022-01-15 09:27:31.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(65, '2022-01-15 16:49:46.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(66, '2022-01-16 05:57:21.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71'),
(67, '2022-01-18 16:38:31.000000', 'Sudepto', 'Operating System: Windows 10', 'Local Host', ' Browser: Chrome Browser Version: 97.0.4692.71');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `M_Id` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Labor` int(11) NOT NULL,
  `Less` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`M_Id`, `Date`, `TotalPrice`, `Labor`, `Less`, `CustomerId`, `Status`) VALUES
('010PV13', '2022-01-13', 2750, 0, -50, 0, 'Checked'),
('0116813', '2022-01-13', 2420, 0, -80, 0, 'Checked'),
('012BZ13', '2022-01-13', 7000, 0, 0, 0, 'Checked'),
('015KJ13', '2022-01-13', 7620, 20, 0, 3, 'Checked'),
('016UD13', '2022-01-13', 27750, 0, 50, 0, 'Checked'),
('016UM01', '2022-01-01', 7800, 0, 50, 0, 'Not Checked'),
('017MU13', '2022-01-13', 3300, 0, 0, 6, 'Checked'),
('018MA01', '2022-01-01', 729053, 600, 0, 5, 'Not Checked'),
('018TL01', '2022-01-01', 4800, 0, 0, 0, 'Not Checked'),
('019ES01', '2022-01-01', 42168, 0, 0, 5, 'Not Checked'),
('019RQ13', '2022-01-13', 24420, 0, -2980, 0, 'Checked'),
('019SY13', '2022-01-13', 0, 0, -6900, 0, 'Checked'),
('01AW913', '2022-01-13', 2750, 0, 0, 0, 'Checked'),
('01BWJ02', '2022-01-02', 10175, 550, 8615, 0, 'Not Checked'),
('01C6H02', '2022-01-02', 4898, 30, 0, 5, 'Not Checked'),
('01CUR13', '2022-01-13', 440, 0, 40, 0, 'Checked'),
('01D9M02', '2022-01-02', 10725, 550, 75, 0, 'Not Checked'),
('01DU412', '2022-01-12', 50311, 0, 0, 1, 'Checked'),
('01DWM01', '2022-01-01', 8333, 0, 0, 5, 'Not Checked'),
('01DYD13', '2022-01-13', 8000, 33, 0, 2, 'Checked'),
('01F4313', '2022-01-13', 12975, 50, 12920, 0, 'Checked'),
('01GV313', '2022-01-13', 4041, 20, -19, 0, 'Checked'),
('01KLW13', '2022-01-13', 110, 0, -10, 0, 'Checked'),
('01OMJ13', '2022-01-13', 3333, 0, 3, 0, 'Checked'),
('01Q5B01', '2022-01-01', 11642, 0, 0, 5, 'Not Checked'),
('01QRO01', '2022-01-01', 4792, 0, 0, 5, 'Not Checked'),
('01QU001', '2022-01-01', 20725, 100, 0, 5, 'Not Checked'),
('01R3N13', '2022-01-13', 2220, 0, 20, 0, 'Checked'),
('01RC101', '2022-01-01', 9415, 40, 0, 5, 'Not Checked'),
('01S3B13', '2022-01-13', 800, 0, -100, 0, 'Checked'),
('01SWT13', '2022-01-13', 22387, 20, -13, 0, 'Checked'),
('01SYA13', '2022-01-13', 10354, 40, 10300, 0, 'Checked'),
('01VA213', '2022-01-13', 610, 0, 0, 0, 'Checked'),
('01WER02', '2022-01-02', 332908, 500, 0, 5, 'Not Checked'),
('01WOR07', '2022-01-07', 1052, 10, 0, 5, 'Checked'),
('01YES13', '2022-01-13', 1100, 0, -100, 0, 'Checked'),
('01YI013', '2022-01-13', 275, 0, 5, 0, 'Checked'),
('01Z6C13', '2022-01-13', 1117, 0, 7, 0, 'Checked'),
('01ZN107', '2022-01-07', 2083, 0, 0, 5, 'Checked'),
('12TZ717', '2021-12-17', 3000, 0, 0, 5, 'Not Checked');

-- --------------------------------------------------------

--
-- Table structure for table `memo_details`
--

CREATE TABLE `memo_details` (
  `MD_Id` int(11) NOT NULL,
  `M_Id` varchar(50) NOT NULL,
  `C_Id` int(11) NOT NULL,
  `T_Id` int(11) NOT NULL,
  `I_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `baseprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memo_details`
--

INSERT INTO `memo_details` (`MD_Id`, `M_Id`, `C_Id`, `T_Id`, `I_Id`, `Quantity`, `baseprice`) VALUES
(1, '12TZ717', 26, 13, 7, 12, 3000),
(2, '01DWM01', 26, 9, 4, 40, 2500),
(3, '01RC101', 26, 9, 4, 45, 2500),
(4, '018MA01', 26, 9, 4, 120, 2500),
(5, '018MA01', 26, 9, 4, 2544, 2500),
(6, '018MA01', 26, 10, 5, 656, 2540),
(7, '019ES01', 26, 9, 4, 44, 2500),
(8, '019ES01', 27, 11, 6, 25, 2500),
(9, '019ES01', 26, 10, 5, 244, 2500),
(10, '019ES01', 26, 13, 8, 44, 3000),
(11, '01QU001', 26, 9, 4, 44, 2500),
(12, '01QU001', 27, 11, 6, 22, 2500),
(13, '01QU001', 27, 11, 6, 33, 2500),
(14, '018TL01', 26, 9, 4, 24, 2400),
(15, '016UM01', 26, 9, 4, 36, 2600),
(16, '01C6H02', 27, 11, 6, 12, 2540),
(17, '01C6H02', 26, 9, 4, 11, 2540),
(18, '01WER02', 26, 9, 4, 45, 2540),
(19, '01WER02', 26, 10, 5, 120, 2540),
(20, '01WER02', 26, 13, 8, 451, 2750),
(21, '01WER02', 26, 9, 4, 55, 2540),
(22, '01WER02', 26, 13, 8, 410, 2750),
(23, '01WER02', 26, 13, 8, 44, 2750),
(24, '01WER02', 27, 11, 6, 44, 2540),
(25, '01BWJ02', 26, 10, 5, 55, 2100),
(26, '01D9M02', 26, 9, 4, 55, 2100),
(27, '01WOR07', 26, 9, 4, 5, 2500),
(28, '01ZN107', 26, 9, 4, 10, 2500),
(29, '01DU412', 26, 9, 4, 777, 777),
(30, '015KJ13', 28, 14, 9, 20, 380),
(31, '01DYD13', 26, 9, 4, 20, 2500),
(32, '01DYD13', 28, 14, 9, 10, 380),
(33, '019SY13', 26, 9, 4, 22, 2550),
(35, '01F4313', 26, 9, 4, 45, 2500),
(37, '01SYA13', 26, 9, 4, 4, 1111),
(38, '01SYA13', 26, 9, 4, 1, 50),
(41, '01GV313', 26, 9, 4, 1, 255),
(42, '01SWT13', 26, 9, 4, 20, 2500),
(43, '01SWT13', 28, 14, 9, 40, 350),
(44, '01SWT13', 28, 14, 9, 12, 350),
(45, '01R3N13', 28, 14, 9, 10, 222),
(46, '012BZ13', 28, 14, 9, 20, 350),
(47, '017MU13', 28, 14, 9, 10, 330),
(48, '01VA213', 28, 14, 9, 122, 5),
(49, '016UD13', 28, 14, 9, 50, 555),
(50, '01YI013', 28, 14, 9, 11, 25),
(51, '019RQ13', 28, 14, 9, 44, 555),
(52, '01YES13', 28, 14, 9, 20, 55),
(53, '01KLW13', 28, 14, 9, 5, 22),
(54, '010PV13', 28, 14, 9, 50, 55),
(55, '01AW913', 28, 14, 9, 50, 55),
(56, '0116813', 28, 14, 9, 44, 55),
(57, '01S3B13', 28, 14, 9, 20, 40),
(58, '01CUR13', 28, 14, 9, 20, 22),
(59, '01Z6C13', 26, 9, 4, 20, 550),
(60, '01Z6C13', 28, 14, 9, 10, 20),
(61, '01OMJ13', 27, 11, 6, 20, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `memo_log`
--

CREATE TABLE `memo_log` (
  `ML_Id` int(11) NOT NULL,
  `Jomataka` int(11) NOT NULL,
  `memoId` varchar(50) NOT NULL,
  `CustomerName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memo_log`
--

INSERT INTO `memo_log` (`ML_Id`, `Jomataka`, `memoId`, `CustomerName`) VALUES
(1, 0, '01DWM01', '5'),
(2, 4000, '01RC101', '5'),
(3, 729050, '018MA01', '5'),
(4, 42160, '019ES01', '5'),
(5, 0, '01QU001', '5'),
(6, 0, '018TL01', 'Sudepto'),
(7, 0, '016UM01', 'Sudepto Saha'),
(8, 6300, '01C6H02', '5'),
(9, 69333, '01WER02', '5'),
(10, 0, '01BWJ02', 'সুব্রত সাহা'),
(11, 0, '01D9M02', 'সুব্রত সাহা'),
(12, 1050, '01WOR07', '5'),
(13, 4000, '01ZN107', '5'),
(14, 0, '01DU412', '1'),
(15, 0, '015KJ13', '3'),
(16, 0, '01DYD13', '2'),
(17, 0, '019SY13', 'Jshhhah'),
(18, 0, '01F4313', 'ggg'),
(19, 0, '01SYA13', 'hhh'),
(20, 0, '01GV313', 'kkk'),
(21, 0, '01SWT13', 'hhh'),
(22, 0, '01R3N13', '444'),
(23, 0, '012BZ13', 'gf'),
(24, 0, '017MU13', '6'),
(25, 0, '01VA213', 'hh'),
(26, 0, '016UD13', 'hhh'),
(27, 0, '01YI013', 'hhh'),
(28, 0, '019RQ13', 'gg'),
(29, 0, '01YES13', 'd'),
(30, 0, '01KLW13', 'd'),
(31, 0, '010PV13', 'hh'),
(32, 0, '01AW913', 'ss'),
(33, 0, '0116813', 'kkk'),
(34, 0, '01S3B13', 'ddd'),
(35, 0, '01CUR13', 'ddd'),
(36, 0, '01Z6C13', 'kkk'),
(37, 0, '01OMJ13', 'kkk');

-- --------------------------------------------------------

--
-- Table structure for table `shop_manage_balance`
--

CREATE TABLE `shop_manage_balance` (
  `SMB_Id` int(11) NOT NULL,
  `SM_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Amount` int(11) NOT NULL,
  `LoginId` varchar(50) NOT NULL,
  `Reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 4, 1298),
(3, 6, 0),
(4, 5, 0),
(5, 7, 102),
(6, 8, 0),
(7, 10, 50),
(8, 9, 0),
(13, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `Foot_Id` int(11) NOT NULL,
  `Pices` int(11) NOT NULL,
  `PreviousPice` int(11) NOT NULL,
  `Operation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_log`
--

INSERT INTO `stock_log` (`id`, `user_name`, `activity`, `time`, `Foot_Id`, `Pices`, `PreviousPice`, `Operation`) VALUES
(6, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলি যোগ করা হয়েছে ', '22/01/2021 : 07.48 PM', 0, 0, 0, ''),
(7, 'subroto', 'গরু কোম্পানির ১২ মোটা মিলি যোগ করা হয়েছে ', '22/01/2021 : 07.48 PM', 0, 0, 0, ''),
(8, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(9, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(10, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(11, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(12, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(13, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(14, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(15, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(16, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(17, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(18, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(19, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 10 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(20, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে 20 পিছ যো', ' 22/01/2021 : 09.11 PM', 0, 0, 0, ''),
(21, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুট যোগ করা হয়েছে ', '22/01/2021 : 09.16 PM', 0, 0, 0, ''),
(22, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 50 পিছ যোগ করা ', '22/01/2021 : 09.16 PM ', 0, 0, 0, ''),
(23, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 50 পিছ যোগ করা ', ' 22/01/2021 : 09.16 PM', 0, 0, 0, ''),
(24, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 50 পিছ যোগ করা ', ' 22/01/2021 : 09.16 PM', 0, 0, 0, ''),
(25, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM', 0, 0, 0, ''),
(26, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM', 0, 0, 0, ''),
(27, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM', 0, 0, 0, ''),
(28, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM', 0, 0, 0, ''),
(29, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 20 পিছ যোগ করা ', ' 22/01/2021 : 09.18 PM', 0, 0, 0, ''),
(30, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে 50 পিছ যো', '22/01/2021 : 09.18 PM ', 0, 0, 0, ''),
(31, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে 50 পিছ যো', ' 22/01/2021 : 09.19 PM', 0, 0, 0, ''),
(32, 'subroto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে 40 পিছ যো', ' 22/01/2021 : 09.20 PM', 0, 0, 0, ''),
(33, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলি যোগ করা হয়েছে ', '22/01/2021 : 09.25 PM', 0, 0, 0, ''),
(34, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুট যোগ করা হয়েছে ', '22/01/2021 : 09.26 PM', 0, 0, 0, ''),
(35, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 50 পিছ যোগ করা', '22/01/2021 : 09.26 PM ', 0, 0, 0, ''),
(36, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 10 পিছ যোগ করা', ' 22/01/2021 : 09.26 PM', 0, 0, 0, ''),
(37, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 12 পিছ যোগ করা', ' 22/01/2021 : 09.30 PM', 0, 0, 0, ''),
(38, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 22 পিছ যোগ করা', ' 22/01/2021 : 09.30 PM', 0, 0, 0, ''),
(39, 'subroto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে 44 পিছ যোগ করা ', ' 22/01/2021 : 09.33 PM', 0, 0, 0, ''),
(40, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুট যোগ করা হয়েছে ', '22/01/2021 : 10.06 PM', 0, 0, 0, ''),
(41, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৬ ফুটে 20 পিছ যোগ করা', ' 22/01/2021 : 10.33 PM', 0, 0, 0, ''),
(42, 'subroto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুটে 40 পিছ যোগ করা', '22/01/2021 : 10.34 PM ', 0, 0, 0, ''),
(43, 'Subroto', 'মটকা কোম্পানির ২৬০ মিলি যোগ করা হয়েছে ', '2021-02-22 14:23:01', 0, 0, 0, ''),
(44, 'Subroto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুট যোগ করা হয়েছে ', '2021-02-22 14:23:26', 0, 0, 0, ''),
(45, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৪০ পিছ বি', '2022-01-01 17:01:44', 4, 40, 20, 'SELL'),
(46, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৪৫ পিছ বি', '2022-01-01 17:07:04', 4, 45, 0, 'SELL'),
(47, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ১২০ পিছ ব', '2022-01-01 17:16:22', 4, 120, 0, 'SELL'),
(48, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ২৫৪৪ পিছ ', '2022-01-01 17:16:22', 4, 2544, 0, 'SELL'),
(49, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে ৬৫৬ পিছ ব', '2022-01-01 17:16:22', 5, 656, 40, 'SELL'),
(50, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৪৪ পিছ বি', '2022-01-01 17:26:20', 4, 44, 0, 'SELL'),
(51, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে ২৪৪ পিছ ব', '2022-01-01 17:26:20', 5, 244, 0, 'SELL'),
(52, 'Sudepto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে ২৫ পিছ বিক্রি ক', '2022-01-01 17:26:20', 6, 25, 64, 'SELL'),
(53, 'Sudepto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুটে ৪৪ পিছ বিক্রি ', '2022-01-01 17:26:20', 8, 44, 40, 'SELL'),
(54, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৪৪ পিছ বি', '2022-01-01 17:27:22', 4, 44, 0, 'SELL'),
(55, 'Sudepto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে ২২ পিছ বিক্রি ক', '2022-01-01 17:27:22', 6, 22, 39, 'SELL'),
(56, 'Sudepto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে ৩৩ পিছ বিক্রি ক', '2022-01-01 17:27:22', 6, 33, 17, 'SELL'),
(57, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ২৪ পিছ বি', '2022-01-01 17:55:20', 4, 24, 0, 'SELL'),
(58, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৩৬ পিছ বি', '2022-01-01 18:06:46', 4, 36, 0, 'SELL'),
(59, 'Sudepto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে ১২ পিছ বিক্রি ক', '2022-01-02 17:10:31', 6, 12, 0, 'SELL'),
(60, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ১১ পিছ বি', '2022-01-02 17:10:31', 4, 11, 0, 'SELL'),
(61, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে ১২০ পিছ ব', '2022-01-02 17:13:12', 5, 120, 0, 'SELL'),
(62, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৪৫ পিছ বি', '2022-01-02 17:13:12', 4, 45, 0, 'SELL'),
(63, 'Sudepto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুটে ৪৫১ পিছ বিক্রি', '2022-01-02 17:13:13', 8, 451, 0, 'SELL'),
(64, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৫৫ পিছ বি', '2022-01-02 17:13:13', 4, 55, 0, 'SELL'),
(65, 'Sudepto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুটে ৪১০ পিছ বিক্রি', '2022-01-02 17:13:13', 8, 410, 0, 'SELL'),
(66, 'Sudepto', 'এ্যাপোলো কোম্পানির ১৩০ মিলির ৮ ফুটে ৪৪ পিছ বিক্রি ', '2022-01-02 17:13:13', 8, 44, 0, 'SELL'),
(67, 'Sudepto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে ৪৪ পিছ বিক্রি ক', '2022-01-02 17:13:13', 6, 44, 0, 'SELL'),
(68, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ মোটা মিলির ৬ ফুটে ৫৫ পিছ বি', '2022-01-02 17:19:55', 5, 55, 0, 'SELL'),
(69, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৫৫ পিছ বি', '2022-01-02 17:25:33', 4, 55, 0, 'SELL'),
(70, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ২১১১ পিছ ', '2022-01-02 17:55:14', 4, 2111, 0, 'BUY'),
(71, 'Subroto', 'গরু জিংক কোম্পানি যোগ করা হয়েছে ', '2022-01-07 18:41:15', 0, 0, 0, ''),
(72, 'Subroto', 'গরু জিংক কোম্পানির ২২ মিলি যোগ করা হয়েছে ', '2022-01-07 18:41:44', 0, 0, 0, ''),
(73, 'Subroto', 'গরু জিংক কোম্পানির ২২ মিলির ৯ ফুট যোগ করা হয়েছে ', '2022-01-07 18:42:32', 0, 0, 0, ''),
(74, 'Subroto', 'গরু জিংক কোম্পানির ২২ মিলির ৯ ফুটে 50 পিছ যোগ করা ', '2022-01-07 18:42:45', 10, 50, 0, 'BUY'),
(75, 'Subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৫ পিছ বিক', '2022-01-07 20:25:42', 4, 5, 2111, 'SELL'),
(76, 'Subroto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ১০ পিছ বি', '2022-01-07 20:32:16', 4, 10, 2106, 'SELL'),
(77, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ৭৭৭ পিছ ব', '2022-01-12 22:51:12', 4, 777, 2096, 'SELL'),
(78, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ২০ পিছ বিক্রি করা হয়েছে', '2022-01-13 02:45:59', 9, 20, 0, 'SELL'),
(79, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ২০ পিছ বি', '2022-01-13 03:09:42', 4, 20, 1319, 'SELL'),
(80, 'Sudepto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুটে ১০ পিছ বিক্রি করা', '2022-01-13 03:09:42', 9, 10, 0, 'SELL'),
(81, 'Sudepto', 'এ্যাপোলো কোম্পানির ১২০ চেরী মিলির ৬ ফুটে ১ পিছ বিক', '2022-01-13 03:32:13', 4, 1, 1299, 'SELL'),
(82, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ১২ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:37:30', 0, 12, 0, 'SELL'),
(83, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ১২ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:37:31', 0, 12, 0, 'SELL'),
(84, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ১২ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:37:32', 0, 12, 0, 'SELL'),
(85, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ১০ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:41:06', 0, 10, 0, 'SELL'),
(86, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ২০ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:44:55', 0, 20, 0, 'SELL'),
(87, 'Sudepto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুটে ১০ পিছ বিক্রি করা', '2022-01-13 03:45:41', 9, 10, 0, 'SELL'),
(88, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ১২২ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:48:21', 0, 122, 0, 'SELL'),
(89, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ৫০ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:50:23', 0, 50, 0, 'SELL'),
(90, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ১১ পিছ বিক্রি করা হয়েছে', '2022-01-13 03:52:17', 0, 11, 0, 'SELL'),
(91, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ৪৪ পিছ বিক্রি করা হয়েছে', '2022-01-13 13:31:01', 0, 44, 0, 'SELL'),
(92, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ২০ পিছ বিক্রি করা হয়েছে', '2022-01-13 13:33:38', 0, 20, 0, 'SELL'),
(93, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ৫ পিছ বিক্রি করা হয়েছে', '2022-01-13 13:35:31', 0, 5, 0, 'SELL'),
(94, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ৫০ পিছ বিক্রি করা হয়েছে', '2022-01-13 13:40:22', 0, 50, 0, 'SELL'),
(95, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ৫০ পিছ বিক্রি করা হয়েছে', '2022-01-13 13:56:39', 0, 50, 0, 'SELL'),
(96, 'Sudepto', ' কোম্পানির  মিলির  ফুটে ৪৪ পিছ বিক্রি করা হয়েছে', '2022-01-13 13:59:35', 0, 44, 0, 'SELL'),
(97, 'Sudepto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুটে ২০ পিছ বিক্রি করা', '2022-01-13 14:06:44', 9, 20, 0, 'SELL'),
(98, 'Sudepto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুটে ২০ পিছ বিক্রি করা', '2022-01-13 14:09:37', 9, 20, 0, 'SELL'),
(99, 'Sudepto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুটে ১০ পিছ বিক্রি করা', '2022-01-13 21:47:22', 9, 10, 0, 'SELL'),
(100, 'Sudepto', 'মটকা কোম্পানির ২৬০ মিলির ১২ ফুটে ১০ পিছ বিক্রি করা', '2022-01-13 21:47:23', 9, 10, 0, 'SELL'),
(101, 'Sudepto', 'গরু কোম্পানির ১২ চেরী মিলির ৬ ফুটে ২০ পিছ বিক্রি ক', '2022-01-13 21:51:24', 6, 20, 0, 'SELL');

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

CREATE TABLE `test_users` (
  `test_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `Login_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`test_id`, `user_name`, `password`, `email`, `type`, `Login_Id`) VALUES
(3, 'sudepto', '0c78245ba4866b4569bced2e3e61863a', 'sudeptosaha@gmail.com', 'user', 'user_2e3e61863a'),
(4, 'subroto', 'ad09666971be412484d625817ff015e2', 'subrotosaha@gmail.com', 'user', 'user_25817ff015e2');

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
(14, 28, '২৬০'),
(15, 36, '২২');

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
(0, 'খুচরা', 'লোকাল', 0),
(1, 'সাহা ট্রেডার্স', 'সৈয়দপুর', 50311),
(2, 'রেয়াজ ট্রেডার্স', 'সৈয়দপুর', 8000),
(3, 'ডি.কে.সরকার', 'সৈয়দপুর', 7620),
(4, 'শান্তি ট্রেডার্স', 'সৈয়দপুর', 0),
(5, 'মারিয়া ট্রেডার্স', 'সৈয়দপুর', 1019135),
(6, 'মুক্তা ট্রেডার্স', 'ঢেলাপীর', 3300),
(7, 'রেয়াজ ট্রেডার্স', 'সৈয়দপুর', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_log`
--
ALTER TABLE `account_log`
  ADD PRIMARY KEY (`AL_Id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`BA_Id`);

--
-- Indexes for table `bank_account_manage`
--
ALTER TABLE `bank_account_manage`
  ADD PRIMARY KEY (`BAM_Id`);

--
-- Indexes for table `bank_manage`
--
ALTER TABLE `bank_manage`
  ADD PRIMARY KEY (`B_Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `company_details_manage`
--
ALTER TABLE `company_details_manage`
  ADD PRIMARY KEY (`CDM_Id`);

--
-- Indexes for table `company_manage`
--
ALTER TABLE `company_manage`
  ADD PRIMARY KEY (`CM_Id`);

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
-- Indexes for table `hisab`
--
ALTER TABLE `hisab`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`M_Id`),
  ADD KEY `CustomerId` (`CustomerId`);

--
-- Indexes for table `memo_details`
--
ALTER TABLE `memo_details`
  ADD PRIMARY KEY (`MD_Id`),
  ADD KEY `C_Id` (`C_Id`),
  ADD KEY `I_Id` (`I_Id`),
  ADD KEY `M_Id` (`M_Id`),
  ADD KEY `T_Id` (`T_Id`);

--
-- Indexes for table `memo_log`
--
ALTER TABLE `memo_log`
  ADD PRIMARY KEY (`ML_Id`);

--
-- Indexes for table `shop_manage_balance`
--
ALTER TABLE `shop_manage_balance`
  ADD PRIMARY KEY (`SMB_Id`);

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
-- AUTO_INCREMENT for table `account_log`
--
ALTER TABLE `account_log`
  MODIFY `AL_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `BA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_account_manage`
--
ALTER TABLE `bank_account_manage`
  MODIFY `BAM_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_manage`
--
ALTER TABLE `bank_manage`
  MODIFY `B_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `company_details_manage`
--
ALTER TABLE `company_details_manage`
  MODIFY `CDM_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `draft_memo`
--
ALTER TABLE `draft_memo`
  MODIFY `DM_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `draft_memo_details`
--
ALTER TABLE `draft_memo_details`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `hisab`
--
ALTER TABLE `hisab`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `lenth`
--
ALTER TABLE `lenth`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `memo_details`
--
ALTER TABLE `memo_details`
  MODIFY `MD_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `memo_log`
--
ALTER TABLE `memo_log`
  MODIFY `ML_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `shop_manage_balance`
--
ALTER TABLE `shop_manage_balance`
  MODIFY `SMB_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `test_users`
--
ALTER TABLE `test_users`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thikness`
--
ALTER TABLE `thikness`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wholesale_customer`
--
ALTER TABLE `wholesale_customer`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
