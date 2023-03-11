-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 05:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `guide` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `experience` varchar(10000) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `start` varchar(300) NOT NULL,
  `end` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user`, `guide`, `rate`, `experience`, `status`, `start`, `end`) VALUES
(1, 1, 1, 5, 'awesome', 1, '2023/03/11', '2023/03/11'),
(2, 1, 1, 2, 'bad', 1, '2023/03/11', '2023/03/11'),
(3, 1, 2, 5, 'awesm', 1, '2023/03/11', '2023/03/11'),
(4, 2, 2, 5, 'good', 1, '2023/03/11', '2023/03/11'),
(5, 1, 1, 4, 'it was really good', 1, '2023/03/11', '2023/03/11'),
(6, 1, 1, 4, 'awesome', 1, '2023/03/11', '2023/03/11'),
(7, 1, 1, 5, 'aweome ', 1, '2023/03/11', '2023/03/11');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `lang` varchar(1000) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) DEFAULT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`id`, `name`, `pass`, `lang`, `phone`, `email`, `address`, `lat`, `lon`, `score`) VALUES
(1, 'Dhiuducdosc', '1', 'english', 2147483647, 'guide@gmail.com', 'chennai', '12.8905627', '80.243273', 5),
(2, 'guidoooo', '2', 'english', 2147483647, 'guide@gmail.com', 'chennai', '12.9134199', '80.2342143', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`id`, `name`, `pass`, `lang`, `phone`, `email`, `address`) VALUES
(1, 'Dhiyanesh', '1', 'english', 2147483647, 'hello@gmail.com', 'chennai'),
(2, 'cklmsc', 'lfwefc', 'kjnc', 897836, 'dnc s@jknkjns', 'nsunefu'),
(3, 'Dhi', 'ksndc', 'hello', 82839382, 'hi@gmail.com', 'chennai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
