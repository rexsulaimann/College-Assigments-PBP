-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2024 at 07:13 AM
-- Server version: 5.5.16
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `age`, `gender`, `birth_date`, `email`, `phone`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1, 'admin', '2024-11-28', 'admin@admin', '0', 'admin'),
(7, 'Siti', 'Nurhaliza', 'siti456', 'password2', 30, 'Perempuan', '1993-02-02', 'siti@example.com', '081234567891', 'user'),
(8, 'Rahmat', 'Hidayat', 'rahmat789', 'password3', 28, 'Laki-laki', '1995-03-03', 'rahmat@example.com', '081234567892', 'user'),
(9, 'Aisyah', 'Putri', 'aisyah123', 'password4', 22, 'Perempuan', '2001-04-04', 'aisyah@example.com', '081234567893', 'user'),
(10, 'Ali', 'Imran', 'ali456', 'password5', 35, 'Laki-laki', '1988-05-05', 'ali@example.com', '081234567894', 'user'),
(11, 'Fatimah', 'Zahra', 'fatimah789', 'password6', 29, 'Perempuan', '1994-06-06', 'fatimah@example.com', '081234567895', 'user'),
(12, 'Muhammad', 'Rizky', 'rizky123', 'password7', 27, 'Laki-laki', '1996-07-07', 'rizky@example.com', '081234567896', 'user'),
(13, 'Nurul', 'Hidayah', 'nurul456', 'password8', 23, 'Perempuan', '2000-08-08', 'nurul@example.com', '081234567897', 'user'),
(14, 'Hendra', 'Saputra', 'hendra789', 'password9', 32, 'Laki-laki', '1991-09-09', 'hendra@example.com', '081234567898', 'user'),
(15, 'Dewi', 'Kurnia', 'dewi123', 'password10', 26, 'Perempuan', '1997-10-10', 'dewi@example.com', '081234567899', 'user'),
(22, 'andi', 'yusril', 'andi', 'andi', 20, 'Laki-laki', '2004-02-03', 'andi@yusril.com', '0998837281', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
