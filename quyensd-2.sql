-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 12:38 PM
-- Server version: 10.4.21-MariaDB-log
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citizenv`
--

-- --------------------------------------------------------

--
-- Table structure for table `quyensd`
--

CREATE TABLE `quyensd` (
  `donVi` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ngayDong` date DEFAULT NULL,
  `tienDo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quyensd`
--

INSERT INTO `quyensd` (`donVi`, `username`, `password`, `ngayDong`, `tienDo`) VALUES
('Hà Nội', '01', '123', '2021-12-31', 'Chưa hoàn thành'),
('Ba Đình', '0101', '123', '2021-12-30', 'Chưa hoàn thành'),
('Việt Nam', '1', '123', NULL, 'Chưa hoàn thành');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quyensd`
--
ALTER TABLE `quyensd`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
