-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 07:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`name`, `email`, `password`) VALUES
('Shusmita Aziz', 'aziz@gmail.com', '77@77777');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `appointment_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `appointment_time` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `problem` varchar(250) NOT NULL,
  `token` varchar(100) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_request`
--

INSERT INTO `appointment_request` (`appointment_id`, `name`, `email`, `doctor_id`, `doctor_name`, `appointment_time`, `appointment_date`, `problem`, `token`, `file_path`) VALUES
(1, 'ggg sss', 'gs@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-07', 'ohiug', '1', NULL),
(2, 'hhh rrr', 'hr@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-07', 'fnjkrb', '2', NULL),
(7, 'zzz aaa', 'za@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-07', 'headache', '2', '/webtech_merge_test/module_one_two/uploads/Screenshot 2025-01-17 114637.png'),
(9, 'Saiba', 'saiba@yahoo.com', 1, 'Samia Jahan', '3.00 PM - 5.00 PM', '2025-01-02', 'stomach ache', '1', NULL),
(12, 'aaa zzz', 'az@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-07', 'fever', '1', NULL),
(13, 'aaa zzz', 'az@gmail.com', 1, 'Samia Jahan', '9.00 AM - 11.00 AM', '2025-01-01', 'headache', '1', NULL),
(14, 'aaa zzz', 'az@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-02', 'fever', '1', '/webtech_merge_test/module_one_two/uploads/Screenshot 2025-01-17 114637.png'),
(15, 'bbb yyy', 'by@gmail.com', 1, 'Samia Jahan', '9.00 AM - 11.00 AM', '2025-01-01', 'headache', '2', NULL),
(19, 'aaa zzz', 'az@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-11', 'headache', '1', NULL),
(22, 'ccc xxx', 'cx@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-22', 'Stress', '3', NULL),
(23, 'Peter Parker', 'parker@gmail.com', 3, 'Azhar Hossain', '9.00PM - 111.00PM', '2025-01-22', 'head spinning', '1', NULL),
(30, 'aaa zzz', 'az@gmail.com', 3, 'Azhar Hossain', '9.00PM - 111.00PM', '2025-01-24', 'ekegnjetnh', '1', NULL),
(31, 'aaa zzz', 'az@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-08', ',fjwr9purobhnjl.', '1', NULL),
(34, 'aaa zzz', 'az@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-24', 'matha betha', '1', NULL),
(35, 'aaa zzz', 'az@gmail.com', 1, 'Samia Jahan', '9:00 AM- 11:00 AM', '2025-01-24', 'matha betha', '2', NULL),
(36, 'aaa zzz', 'az@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-19', 'KNIHV', '1', NULL),
(37, 'aaa zzz', 'az@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-17', 'ohiugjkutdtr', '1', NULL),
(38, 'aaa zzz', 'az@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-24', 'test1', '1', NULL),
(45, 'bbb yyy', 'by@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-20', 'headache', '1', NULL),
(47, 'bbb yyy', 'by@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-23', 'test3', '1', NULL),
(48, 'bbb yyy', 'by@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-24', 'test5', '2', NULL),
(49, 'ccc xxx', 'cx@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-24', 'test6', '3', NULL),
(50, 'Sadika Alam', 'sa@gmail.com', 4, 'Noor Azad', '7.00PM - 9.00PM', '2025-01-22', 'Matha betha', '1', NULL),
(51, 'Sadika Alam', 'sa@gmail.com', 5, 'Farhana Ahmed', '3.00 PM - 5.00 PM', '2025-01-25', 'Prochur Matha betha', '1', NULL),
(52, 'Sadika Alam', 'sa@gmail.com', 3, 'Azhar Hossain', '9.00PM - 111.00PM', '2025-01-25', 'Back pain', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dcomplaints`
--

CREATE TABLE `dcomplaints` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `complaint` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dcomplaints`
--

INSERT INTO `dcomplaints` (`id`, `name`, `email`, `phone`, `complaint`, `date_created`, `date_updated`) VALUES
(1, '', 'david.brown@hospital.com', '', 'ioh7', '2025-01-04 08:36:12', '2025-01-04 08:36:12'),
(3, 'Dr. David Brown', 'david.brown@hospital.com', '7891234560', 'ioh7', '2025-01-04 08:40:16', '2025-01-04 08:40:16'),
(4, 'Dr. John Doe', 'dr.john.doe@hospital.com', '1234567890', 'UH87T87WT8Q3R6328R', '2025-01-10 07:15:06', '2025-01-10 07:15:06'),
(7, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '8', '2025-01-15 15:40:02', '2025-01-15 15:40:02'),
(8, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '5', '2025-01-15 16:00:35', '2025-01-15 16:00:35'),
(9, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '5', '2025-01-15 16:00:35', '2025-01-15 16:00:35'),
(10, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '5', '2025-01-15 16:00:35', '2025-01-15 16:00:35'),
(11, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '7', '2025-01-15 16:03:10', '2025-01-15 16:03:10'),
(12, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '5', '2025-01-15 16:05:22', '2025-01-15 16:05:22'),
(13, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '1', '2025-01-15 16:07:11', '2025-01-15 16:07:11'),
(14, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '1', '2025-01-15 16:07:11', '2025-01-15 16:07:11'),
(15, 'Dr. milo miki', 'milom@gmail.com', '1234567890', '3', '2025-01-15 16:07:20', '2025-01-15 16:07:20'),
(16, 'Dr. John Doe', 'dr.john.doe@hospital.com', '1234567890', '7', '2025-01-15 16:55:13', '2025-01-15 16:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `available_time` varchar(100) NOT NULL,
  `speciality` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`id`, `phone`, `email`, `name`, `available_time`, `speciality`, `hospital`, `password`) VALUES
(3, '11111111111', 'a1@gmail.com', 'Azhar Hossain', '9.00PM - 111.00PM', 'Surgery', 'Rajshahi Medical College Hospital', '&1111111'),
(4, '22222222222', 'b2@gmail.com', 'Noor Azad', '7.00PM - 9.00PM', 'Surgery', 'Dhaka Medical College Hospital', '&2222222'),
(5, '12345678901', 'farhana@gmail.com', 'Farhana Ahmed', '3.00 PM - 5.00 PM', 'Medicine', 'Mymensingh Medical College Hospital', '1111111$'),
(1, '01234567890', 'samia@gmail.com', 'Samia Jahan', '9:00 AM- 11:00 AM', 'Neurology', 'Dhaka Medical College Hospital', '00@00000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cardholder_name` varchar(100) NOT NULL,
  `card_number` varchar(19) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `expiry_month` int(11) NOT NULL,
  `expiry_year` int(11) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_email`, `payment_method`, `name`, `cardholder_name`, `card_number`, `appointment_id`, `expiry_month`, `expiry_year`, `cvv`) VALUES
(1, 'user1@gmail.com', '', 'Jolil Mia', 'Jolil', '2222 3333 4444 555', 0, 12, 2027, '123'),
(2, 'user1@gmail.com', 'card', 'Test', 'Test ', '123445667', 0, 9, 2026, '222'),
(3, 'user1@gmail.com', '', 'Last Test ', 'Last Test', '12345678', 0, 11, 2026, '999'),
(4, 'az@gmail.com', 'paypal', 'aaa zzz', 'Aziz', '1234567890098765', 0, 3, 2026, '332'),
(5, 'az@gmail.com', 'paypal', 'aaa zzz', 'Aziz', '1234567890098765', 0, 3, 2025, '445'),
(6, 'az@gmail.com', 'paypal', 'aaa zzz', 'Aziz', '1234567890098765', 0, 2, 2025, '666'),
(7, 'az@gmail.com', 'card', 'aaa zzz', 'Aziz', '1234567890098765', 0, 4, 2026, '777'),
(8, 'az@gmail.com', 'card', 'aaa zzz', 'Aziz', '1122334455667788', 0, 2, 2026, '321'),
(9, 'az@gmail.com', 'card', 'aaa zzz', 'Aziz', '1111222233334444', 0, 3, 2026, '778'),
(10, 'by@gmail.com', 'card', 'bbb yyy', 'test2', '2222222222222222', 0, 2, 2025, '222'),
(11, 'by@gmail.com', 'card', 'bbb yyy', 'test3', '3333333333333333', 0, 3, 2025, '333'),
(12, 'by@gmail.com', 'card', 'bbb yyy', 'test4', '4444444444444444', 0, 4, 2027, '444'),
(13, 'by@gmail.com', 'card', 'bbb yyy', 'test5', '5555555555555555', 0, 5, 2025, '555'),
(14, 'cx@gmail.com', 'card', 'ccc xxx', 'test6', '6666666666666666', 0, 6, 2026, '666'),
(15, 'sa@gmail.com', 'paypal', 'Sadika Alam', 'Niloy', '1234567890123456', 0, 1, 2026, '323'),
(16, 'sa@gmail.com', 'card', 'Sadika Alam', 'Niloy', '1234567890123456', 51, 2, 2026, '123'),
(19, 'sa@gmail.com', 'card', 'Sadika Alam', 'Niloy', '1234567890123456', 52, 7, 2025, '123');

-- --------------------------------------------------------

--
-- Table structure for table `pcomplaints`
--

CREATE TABLE `pcomplaints` (
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `complaint` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pcomplaints`
--

INSERT INTO `pcomplaints` (`email`, `first_name`, `last_name`, `phone`, `complaint`) VALUES
('ashusmita7108@gmail.com', 'aaa', 'zzz', '1302926514', 'iuhiwhsqiwjioq'),
('ddd@gmail.com', 'ddd', 'vvv', '1302926514', '8'),
('fktng@gmail.com', 'bbb', 'xxx', '2147483647', 'uhyu8yg8iwlh98wye82ey2871'),
('gs@gmail.com', 'ggg', 'sss', '1302926514', 'blehh'),
('hr@gmail.com', 'hhh', 'rrr', '1302926514', 'uhfkuehfeilfh'),
('johndoe@example.com', 'John', 'Doe', '1234567890', 'wehiwdhqwoieh'),
('milo12@gmail.com', 'milo', 'miki', '12345678901', 'jui'),
('sa@gmail.com', 'Sadika', 'Alam', '01302926514', 'Egula to thik na'),
('sf@gmail.com', 'saiba', 'Doe', '1234567890', 'ygsyugsqjdqwudhqwodiw');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `patient_email`, `patient_name`, `doctor_name`, `doctor_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 'az@gmail.com', 'aaa', 'Noor Azad', 4, 'Good doctorGood doctorGood doctorGood doctorGood doctorGood doctorGood doctor', '2025-01-19 12:26:05', '2025-01-19 12:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `medical_history` varchar(500) NOT NULL,
  `emergency_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`first_name`, `last_name`, `email`, `phone`, `nid`, `password`, `dob`, `gender`, `address`, `medical_history`, `emergency_contact`) VALUES
('aaa', 'zzz', 'az@gmail.com', '11111111111', '1234567890', '@@aA@@@@', '2008-01-07', 'Male', 'aazz', 'zzaa', '11111111111'),
('Bruce', 'Wayne', 'bw@gmail.com', '00000000000', '0011225588', 'bwbwbwbw@', '2008-05-04', 'Male', 'Gotham', 'injury in knee', '00000000000'),
('bbb', 'yyy', 'by@gmail.com', '22222222222', '2345678901', '2222222@', '2008-02-03', 'Male', 'bbbb', 'yyyy', '22222222222'),
('ccc', 'xxx', 'cx@gmail.com', '33333333333', '3456789012', '2222222#', '2005-06-14', 'Female', 'cccc', 'xxxx', '33333333333'),
('Samia', 'Dehan', 'dehan@gmail.com', '11111111111', '1313131313', '1111#111', '2004-01-03', 'Female', 'aaaa', 'aaaa', '33333333333'),
('ddd', 'vvv', 'dv@gmail.com', '44444444444', '4567890123', '3333333#', '1998-12-16', 'Male', 'dddd', 'vvvv', '44444444444'),
('eee', 'uuu', 'eu@gmail.com', '55555555555', '5678901234', '4444444#', '1998-12-16', 'Female', 'eeee', 'uuuu', '55555555555'),
('Farzana', 'Kafil', 'farzana.kafil@gmail.com', '01302926514', '1122334455', '1234567@', '2001-08-04', 'Female', 'Khilkhet, Dhaka', 'none', '01302926514'),
('fff', 'ttt', 'ft@gmail.com', '66666666666', '6789012345', '5555555#', '1996-09-15', 'Female', 'ffff', 'tttt', '66666666666'),
('ggg', 'sss', 'gs@gmail.com', '77777777777', '7890123456', '6666666#', '2003-05-11', 'Male', 'gggg', 'ssss', '77777777777'),
('hhh', 'rrr', 'hr@gmail.com', '88888888888', '8901234567', '7777777#', '2003-05-11', 'Male', 'hhhh', 'rrrr', '88888888888'),
('iii', 'qqq', 'iq@gmail.com', '99999999999', '9012345678', '8888888#', '2003-05-11', 'Male', 'iiii', 'qqqq', '99999999999'),
('jjj', 'ppp', 'jp@gmail.com', '00000000000', '0123456789', '9999999#', '2003-05-11', 'Male', 'jjjj', 'pppp', '00000000000'),
('kkk', 'ooo', 'ko@gmail.com', '11111111111', '9123456780', '0000000$', '2003-05-11', 'Male', 'kkkk', 'oooo', '00000000000'),
('mmm', 'nnn', 'mn@gmail.com', '11111111111', '8912345670', '@$000000', '2003-05-11', 'Male', 'mmmm', 'nnnn', '00000000000'),
('Noor', 'Nahar', 'nahar@gmail.com', '11111111111', '1144778855', '@@1234@@', '1966-03-21', 'Female', 'Mashkanda, Mymensingh', 'high blood pressure', '11111111111'),
('Peter', 'Parker', 'parker@gmail.com', '11111111111', '1111111110', '1111111@', '1999-05-11', 'Male', 'Queens, New York', '', '11111111111'),
('Sadika', 'Alam', 'sa@gmail.com', '01302926514', '2342342340', '@@123456@@', '1990-06-19', 'Female', 'Dhaka', '', '01711207066'),
('zzz', 'aaa', 'za@gmail.com', '11111111111', '8912345671', '@@000000', '2003-05-11', 'Male', 'mmmm', 'nnnn', '00000000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `dcomplaints`
--
ALTER TABLE `dcomplaints`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`,`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcomplaints`
--
ALTER TABLE `pcomplaints`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`,`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_request`
--
ALTER TABLE `appointment_request`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `dcomplaints`
--
ALTER TABLE `dcomplaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
