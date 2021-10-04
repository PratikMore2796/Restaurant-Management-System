-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 12:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psrestaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `res_login`
--

CREATE TABLE `res_login` (
  `res_id` int(11) NOT NULL,
  `res_username` varchar(50) NOT NULL,
  `res_pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_login`
--

INSERT INTO `res_login` (`res_id`, `res_username`, `res_pass`) VALUES
(0, 'root', 'root'),
(1001, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `res_tbl`
--

CREATE TABLE `res_tbl` (
  `tbl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tbl_number` varchar(50) NOT NULL,
  `res_date` date NOT NULL,
  `res_timing` time NOT NULL,
  `tbl_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_tbl`
--

INSERT INTO `res_tbl` (`tbl_id`, `user_id`, `tbl_number`, `res_date`, `res_timing`, `tbl_status`) VALUES
(1, 23, '1', '2021-01-06', '14:06:00', 'Booked'),
(2, 26, '2', '2021-01-20', '05:19:00', 'Booked'),
(3, 26, '3', '2021-01-29', '08:39:00', 'Preparing'),
(4, 4, '4', '0000-00-00', '00:00:00', 'Empty'),
(5, 5, '5', '0000-00-00', '00:00:00', 'Empty'),
(6, 6, '6', '0000-00-00', '00:00:00', 'Empty'),
(7, 7, '7', '0000-00-00', '00:00:00', 'Empty'),
(8, 8, '8', '0000-00-00', '00:00:00', 'Empty'),
(9, 9, '9', '0000-00-00', '00:00:00', 'Empty'),
(10, 12, '10', '0000-00-00', '00:00:00', 'Empty');

-- --------------------------------------------------------

--
-- Table structure for table `special_menu`
--

CREATE TABLE `special_menu` (
  `special_id` int(11) NOT NULL,
  `special_food_name` varchar(50) NOT NULL,
  `special_food_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special_menu`
--

INSERT INTO `special_menu` (`special_id`, `special_food_name`, `special_food_category`) VALUES
(1, 'chikendana', 'nonveg'),
(2, 'gobi', 'veg'),
(3, 'chicken kadhai', 'nonveg');

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `Veg` tinyint(5) NOT NULL,
  `Nonveg` tinyint(5) NOT NULL,
  `Rice` tinyint(5) NOT NULL,
  `Roti` tinyint(5) NOT NULL,
  `Overall` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ratings`
--

INSERT INTO `user_ratings` (`user_id`, `user_first_name`, `user_last_name`, `Veg`, `Nonveg`, `Rice`, `Roti`, `Overall`) VALUES
(1, 'Pramod', 'root', 2, 5, 4, 4, 5),
(2, 'pratik', 'more', 3, 5, 5, 5, 5),
(3, 'Abhishek', 'Shinde', 3, 4, 5, 5, 5),
(6, '', '', 3, 4, 4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_mob` varchar(12) NOT NULL,
  `veg_sabji` varchar(50) NOT NULL,
  `veg_sabji_qua` varchar(50) NOT NULL,
  `non_veg_sabji` varchar(50) NOT NULL,
  `non_veg_sabji_qua` varchar(50) NOT NULL,
  `rice` varchar(50) NOT NULL,
  `rice_qua` varchar(50) NOT NULL,
  `roti` varchar(50) NOT NULL,
  `roti_qua` varchar(50) NOT NULL,
  `special_food` varchar(50) NOT NULL,
  `special_food_qua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_fname`, `user_lname`, `user_mob`, `veg_sabji`, `veg_sabji_qua`, `non_veg_sabji`, `non_veg_sabji_qua`, `rice`, `rice_qua`, `roti`, `roti_qua`, `special_food`, `special_food_qua`) VALUES
(22, 'Abhishek', 'Suthar', '659959595979', 'chanamasala', '3', 'chickentikka', '3', 'chickenbiryani', '3', 'parathas', '3', 'gobi', 2),
(24, 'Pratik', 'More', '4372239897', 'chanamasala', '3', 'chickentikkamasala', '4', 'matonbiryani', '3', 'parathas', '3', 'chicken kadhai', 3),
(25, 'Abhishek', 'root', '659959595979', 'aloogobi', '2', 'Beef sizzler', '2', 'basmati', '2', 'rumalroti', '2', 'chikendana', 2),
(26, 'pratik', 'Suthar', '4372239898', 'mixvegetables', '4', 'chickentikkamasala', '4', 'matonbiryani', '3', 'parathas', '4', 'gobi', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `res_login`
--
ALTER TABLE `res_login`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `res_tbl`
--
ALTER TABLE `res_tbl`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `special_menu`
--
ALTER TABLE `special_menu`
  ADD PRIMARY KEY (`special_id`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `res_tbl`
--
ALTER TABLE `res_tbl`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `special_menu`
--
ALTER TABLE `special_menu`
  MODIFY `special_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
