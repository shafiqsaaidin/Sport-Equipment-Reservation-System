-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 03:28 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spers`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingequipment`
--

CREATE TABLE `bookingequipment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `equip_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `deadline_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingequipment`
--

INSERT INTO `bookingequipment` (`id`, `user_id`, `equip_id`, `quantity`, `booking_date`, `deadline_date`, `booking_time`, `deadline_time`) VALUES
(2, 277777, 9, 5, '2020-03-20', '2020-03-21', '16:00:00', '18:00:00'),
(3, 277777, 17, 2, '2020-03-30', '2020-03-31', '18:00:00', '19:00:00'),
(4, 211111, 9, 2, '2020-03-30', '2020-04-01', '17:00:00', '18:00:00'),
(5, 254455, 6, 3, '2020-01-01', '2020-01-02', '14:00:00', '14:00:00'),
(6, 243322, 12, 5, '2019-10-03', '2020-10-06', '15:00:00', '16:00:00'),
(7, 268899, 16, 1, '2020-02-11', '2020-01-12', '17:00:00', '17:00:00'),
(8, 276655, 18, 1, '2020-01-22', '2020-01-23', '10:00:00', '11:00:00'),
(9, 267788, 10, 5, '2020-03-12', '2020-03-15', '16:00:00', '17:00:00'),
(10, 245566, 9, 10, '2019-11-19', '2020-11-22', '15:00:00', '16:00:00'),
(12, 254430, 41, 10, '2019-12-18', '2020-12-20', '08:00:00', '17:00:00'),
(13, 247777, 47, 2, '2020-02-16', '2020-02-17', '13:00:00', '17:00:00'),
(14, 236677, 21, 2, '2019-09-18', '2019-09-19', '15:00:00', '17:00:00'),
(15, 236688, 19, 2, '2019-09-24', '2019-09-26', '08:00:00', '17:00:00'),
(16, 247766, 17, 2, '2019-10-20', '2019-10-21', '08:00:00', '16:00:00'),
(18, 258844, 3, 4, '2019-12-01', '2019-12-03', '09:00:00', '16:00:00'),
(19, 276543, 42, 2, '2019-11-08', '2019-11-10', '08:00:00', '15:00:00'),
(20, 245677, 15, 1, '2020-03-17', '2020-03-19', '08:00:00', '09:00:00'),
(21, 276543, 8, 5, '2020-02-09', '2020-09-14', '08:00:00', '14:00:00'),
(22, 265555, 45, 5, '2020-01-26', '2020-02-28', '09:00:00', '15:00:00'),
(23, 244444, 35, 5, '2020-04-01', '2020-04-03', '14:00:00', '16:00:00'),
(24, 266677, 7, 5, '2020-04-27', '2020-04-28', '08:00:00', '10:00:00'),
(25, 247776, 40, 1, '2019-04-16', '2019-04-18', '08:00:00', '16:00:00'),
(26, 276665, 13, 1, '2019-03-12', '2019-03-13', '14:00:00', '16:00:00'),
(27, 247733, 16, 2, '2019-03-04', '2019-03-05', '08:00:00', '14:00:00'),
(28, 245566, 2, 3, '2020-03-02', '2020-03-04', '10:00:00', '04:00:00'),
(29, 255592, 9, 2, '2020-04-10', '2020-04-10', '08:00:00', '16:00:00'),
(30, 267772, 9, 2, '2020-04-10', '2020-04-10', '08:00:00', '14:00:00'),
(31, 248877, 38, 3, '2020-03-11', '2020-03-13', '08:00:00', '16:00:00'),
(32, 276543, 5, 9, '2020-02-02', '2020-02-05', '08:00:00', '16:00:00'),
(33, 237788, 44, 1, '2020-01-20', '2020-01-22', '09:00:00', '15:00:00'),
(34, 268888, 39, 3, '2020-01-03', '2020-01-04', '08:00:00', '16:00:00'),
(35, 247766, 36, 4, '2020-01-02', '2020-01-04', '08:00:00', '10:00:00'),
(36, 277722, 31, 4, '2020-01-06', '2020-01-08', '10:00:00', '16:00:00'),
(37, 265844, 34, 1, '2020-04-01', '2020-04-06', '08:30:00', '10:00:00'),
(38, 265544, 32, 1, '2019-12-05', '2019-12-07', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookingfacilities`
--

CREATE TABLE `bookingfacilities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `faci_id` int(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingfacilities`
--

INSERT INTO `bookingfacilities` (`id`, `user_id`, `faci_id`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
(4, 51115, 1, '2020-03-05', '2020-03-05', '08:30:00', '10:30:00'),
(5, 51117, 2, '2020-03-06', '2020-03-06', '17:00:00', '18:30:00'),
(6, 51115, 7, '2020-03-07', '2020-03-07', '16:30:00', '18:30:00'),
(8, 51115, 8, '2020-03-10', '2020-03-10', '08:00:00', '10:00:00'),
(9, 51115, 1, '2020-03-06', '2020-03-06', '06:41:00', '08:41:00'),
(10, 51115, 4, '2020-03-13', '2020-03-13', '07:00:00', '09:00:00'),
(11, 51115, 3, '2020-03-21', '2020-03-21', '16:00:00', '18:00:00'),
(12, 51115, 3, '2020-03-21', '2020-03-21', '15:10:00', '18:10:00'),
(13, 277777, 17, '2020-03-20', '2020-03-21', '18:00:00', '20:00:00'),
(14, 277777, 17, '2020-03-20', '2020-03-21', '16:00:00', '18:00:00'),
(15, 211111, 18, '2020-03-30', '2020-04-01', '14:00:00', '17:00:00'),
(16, 255666, 2, '2020-05-11', '2020-05-12', '07:30:00', '17:00:00'),
(17, 265595, 4, '2020-05-25', '2020-05-28', '08:00:00', '16:00:00'),
(18, 277554, 5, '2020-05-10', '2020-05-12', '08:00:00', '16:30:00'),
(19, 265597, 8, '2020-06-04', '2020-06-06', '09:00:00', '17:00:00'),
(20, 265982, 7, '2020-06-02', '2020-06-04', '08:00:00', '14:00:00'),
(21, 244877, 6, '2020-06-23', '2020-06-25', '10:00:00', '16:00:00'),
(22, 255587, 9, '2020-06-26', '2020-06-28', '09:00:00', '16:00:00'),
(23, 267744, 10, '2020-06-15', '2020-06-17', '08:00:00', '10:00:00'),
(24, 268844, 11, '2020-07-03', '2020-07-05', '07:30:00', '18:00:00'),
(25, 277888, 25, '2020-07-30', '2020-07-30', '15:00:00', '17:00:00'),
(26, 266664, 11, '2020-08-22', '2020-08-24', '07:30:00', '14:00:00'),
(27, 278859, 22, '2020-08-03', '2020-08-04', '08:00:00', '10:00:00'),
(28, 248855, 27, '2020-09-16', '2020-09-16', '09:00:00', '16:00:00'),
(29, 234556, 16, '2020-09-27', '2020-09-28', '08:00:00', '10:00:00'),
(30, 267854, 25, '2020-10-20', '2020-10-20', '14:00:00', '16:00:00'),
(31, 278855, 28, '2020-10-14', '2020-10-21', '13:00:00', '14:00:00'),
(32, 248655, 12, '2020-11-16', '2020-11-18', '07:30:00', '14:00:00'),
(33, 268897, 23, '2020-12-07', '2020-12-08', '08:00:00', '14:00:00'),
(34, 248775, 5, '2020-11-16', '2020-11-18', '08:00:00', '15:00:00'),
(35, 276655, 15, '2020-12-29', '2020-12-30', '08:00:00', '10:00:00'),
(36, 286655, 12, '2020-06-28', '2020-06-30', '08:30:00', '17:00:00'),
(37, 264877, 11, '2020-10-04', '2020-10-06', '09:00:00', '16:00:00'),
(38, 246587, 22, '2020-12-07', '2020-12-08', '07:30:00', '13:00:00'),
(39, 274565, 2, '2020-07-05', '2020-07-06', '08:00:00', '16:00:00'),
(40, 276555, 10, '2020-08-23', '2020-08-25', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equip_name` varchar(30) NOT NULL,
  `equip_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equip_name`, `equip_quantity`) VALUES
(2, 'Bola Jaring', 10),
(3, 'Bola Tampar', 10),
(5, 'Bola Baling', 10),
(6, 'Bola Futsal', 10),
(7, 'Bola Rugby', 10),
(8, 'Bola Tampar Pantai', 10),
(9, 'Gelung', 15),
(10, 'Kon Besar', 10),
(11, 'Kon Kecil', 10),
(12, 'Maker', 15),
(13, 'Scoreboard Kecil', 2),
(14, 'Scoreboard Besar', 3),
(15, 'Beg Jersi', 3),
(16, 'Jam Chess', 5),
(17, 'Chess', 5),
(18, 'Dart', 5),
(19, 'Congkak', 3),
(20, 'Bad Ping Pong', 2),
(21, 'Net Ping Pong', 6),
(22, 'Grib Raket', 6),
(23, 'Kayu Hoki', 15),
(24, 'Peluru', 5),
(25, 'Cakera', 5),
(26, 'Lembing', 8),
(27, 'Nombor Lari', 8),
(28, 'Loceng', 2),
(29, 'Baton', 5),
(30, 'Starting Block', 5),
(31, 'Spike', 10),
(32, 'Payung', 5),
(33, 'Khemah 10x10', 2),
(34, 'Kaki Khemah', 2),
(35, 'Terompah', 6),
(36, 'Raket Badminton', 6),
(37, 'Raket Tenis', 6),
(38, 'Raket Squash', 10),
(39, 'Helmet Basikal', 10),
(40, 'Tali Besar', 1),
(41, 'Guni', 10),
(42, 'Bola Petanque', 10),
(43, 'Healer', 2),
(44, 'Set Keeper Hoki', 10),
(45, 'Bola Takraw', 10),
(47, 'bola', 10),
(48, 'bola sepak', 12);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `name`, `image`, `date`, `status`) VALUES
(7, 255555, 'Padang Ragbi', 'uploads/5e63c0f088bfe3.55145799.jpg', '2020-03-07', 'Approved'),
(11, 211111, 'bola sepak', 'uploads/5e65c2df2f9be3.76311298.jpg', '2020-03-09', 'Approved'),
(12, 51115, 'Test', 'uploads/5ea3e8bbb3e521.93691667.jpg', '2020-04-25', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(15) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `status`) VALUES
(2, 'Padang Bola Sepak', 'Booked'),
(4, 'Padang Hoki', 'Booked'),
(5, 'Padang Bola Baling', 'Booked'),
(6, 'Padang Bola Jarring', 'Booked'),
(7, 'Padang Sofbol', 'Booked'),
(8, 'Trek 400m', 'Booked'),
(9, 'Kolam Renang', 'Booked'),
(10, 'Dewan Serbaguna', 'Booked'),
(11, 'Gelanggang Tenis', 'Booked'),
(12, 'Gelanggang Sepak Takraw', 'Booked'),
(13, 'Gelanggang Bola Tampar', 'Available'),
(14, 'Gelanggang Bola Keranjang', 'Available'),
(15, 'Gelanggang Skuasy', 'Booked'),
(16, 'Lapang Sasar Memanah', 'Booked'),
(18, 'Aerobic', 'Booked'),
(19, 'Gymnasium Lelaki', 'Available'),
(20, 'Gymnasium Perempuan', 'Available'),
(21, 'Tembok Mendaki', 'Available'),
(22, 'Go-Kart', 'Booked'),
(23, 'Boling Padang', 'Booked'),
(24, 'Sauna Lelaki', 'Available'),
(25, 'Sauna Perempuan', 'Booked'),
(26, 'Basikal-Tendem bike', 'Available'),
(27, 'Basikal-Single', 'Booked'),
(28, 'Hidroterapi', 'Booked'),
(30, 'bola sepak', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_phone` int(12) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_type`, `user_email`, `user_phone`, `fullname`, `dob`, `gender`) VALUES
(12345, 'dodo', '123', 'user', '', 175822523, 'Doha Dzahari', '1996-06-28', 'Female'),
(51115, 'doha_dzahari', '0175822523', 'admin', 'dodo.dzahari@yahoo.c', 175822523, 'Doha', '0000-00-00', ''),
(51116, 'adam_dzahari', 'adam', 'staff', 'adam@gmail.com', 125567917, 'adam', '0000-00-00', ''),
(51117, '', '$2y$10$Uvw8tTEDPIPjdRMMpladX.ayJDcvnjSgmcpjdJwQrnoCo2b2ybEUq', 'user', '', 0, '', '0000-00-00', ''),
(51118, '', '$2y$10$sQZiTD.1pJA/tgR6jAoDLe06hLZEfB8RGMYMkFFoVvePYe5cFeSYK', 'user', '', 0, '', '0000-00-00', ''),
(51119, '', '$2y$10$MkPF2S/ipbQ3O7mUTrpd7eD2dYbi/40ZR/288xp2ndilZNNWi2bxK', 'admin', '', 0, '', '0000-00-00', ''),
(211111, '', '$2y$10$Fdf/br2GVQccNNOusjjmNe6K31hE9/MXNj9ojW1VnloHIf6NyIGXS', 'user', '', 0, '', '0000-00-00', ''),
(255555, '', '$2y$10$./i2hHXlmLpR3XgwF5u9vO5edwRSJ0muq2Ve1SHlz465a77PP/Ade', 'admin', '', 0, '', '0000-00-00', ''),
(256677, 'doha_dzahari', 'doha', 'Student', '', 175822523, 'doha', '1996-06-28', 'Female'),
(277777, '', '$2y$10$XBzn8LYFqiVk6T201n7qXOkR4xL9W0YdxhTFy2OSJkIfaTYwnTanK', 'user', '', 0, '', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingequipment`
--
ALTER TABLE `bookingequipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingfacilities`
--
ALTER TABLE `bookingfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingequipment`
--
ALTER TABLE `bookingequipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `bookingfacilities`
--
ALTER TABLE `bookingfacilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
