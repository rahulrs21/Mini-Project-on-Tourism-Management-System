-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 02:53 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('rahul', 'rahul123'),
('vikki', 'vikki123');

-- --------------------------------------------------------

--
-- Table structure for table `bookticket`
--

CREATE TABLE `bookticket` (
  `email` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `people` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookticket`
--

INSERT INTO `bookticket` (`email`, `place`, `date`, `people`) VALUES
('shruthi@gmail.com', 'Malpe ', '2020-01-03', 7),
('mahesh@gmail.com', 'Pilikula Nisargadhama ', '2020-01-03', 8),
('mahesh@gmail.com', 'Murudeshwara ', '2020-04-06', 2),
('mahesh@gmail.com', 'Malpe ', '2020-09-09', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `name` varchar(250) NOT NULL,
  `day` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `routes` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`name`, `day`, `price`, `image`, `routes`) VALUES
('Malpe', 'ten day', 10000, 'uploads/2547201912051575547781.jpg', 'Malpe Beach -->  Saint Marris Island --> Kaup Beach'),
('Murudeshwara', 'seven day', 7000, 'uploads/3415201912051575555536.jpg', 'Murudeshwara --> Honnavara --> Delta Beach'),
('Pilikula Nisargadhama', 'seven day', 15000, 'uploads/4870201912051575547438.jpg', 'Pilikula Nisargadhama');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `phone_number`, `address`, `email`, `password`) VALUES
('Vikhyath Bangera', 9591280007, 'Udupi', 'vickybangera@gmail.com', 'vicky'),
('Rahul', 9945784578, 'Udupi', 'rahul@gmail.com', 'rahul'),
('shruthi', 976543216, 'puttur', 'shruthi@gmail.com', '123'),
('Jyothsna', 7019567296, 'Karkala', 'jos@gmail.com', 'jos123'),
('Aditya', 9960245637, 'udupi', 'adi@gmail.com', 'adi'),
('Praneeth', 9449734211, 'Kar', 'praneeth@gmail.com', 'praneeth'),
('Mahesh', 9449329129, 'Hasan', 'mahesh@gmail.com', 'mahesh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
