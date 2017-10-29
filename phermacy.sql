-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 11:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phermacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Stock` int(11) NOT NULL,
  `BuyingPrice` int(11) NOT NULL,
  `SellingPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Name`, `Stock`, `BuyingPrice`, `SellingPrice`) VALUES
(1, 'Napa Extra', 20, 1, 2),
(2, 'Antacid Plus', 15, 7, 10),
(3, 'Hexasol', 80, 75, 80),
(4, 'Savlon Cream', 50, 45, 50),
(5, 'Senora Sanitary Napkin', 60, 105, 110),
(6, 'Zero Cal 6.5 mg', 0, 115, 122),
(7, 'Molfix Wipes', 50, 130, 140),
(8, 'Cerelac', 20, 390, 400),
(9, 'Durex Thin Feel Condoms(3 PCS)', 100, 95, 100),
(10, 'Nido 900g', 10, 1400, 1450),
(11, 'Huggies Dry 3-7 kg', 60, 1150, 1200),
(12, 'Jhonson Baby Lotion', 40, 420, 450),
(13, 'Jhonson Baby Oil', 40, 320, 330),
(14, 'L''oreal Face Wash', 65, 580, 600),
(15, 'Ponds Daily Face Wash', 65, 110, 130),
(16, 'Oral B Toothbrush', 65, 70, 80),
(18, 'Sensodyne Toothpaste', 500, 500, 525),
(19, 'Colgate Toothpaste', 500, 60, 70),
(20, 'Mouth Wash', 400, 180, 200),
(21, 'Savlon', 400, 35, 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `password`, `email`, `address`, `contactno`) VALUES
(1, 'Sifat', '123abc', 'sifat@gmail.com', 'uttara', 1670950940),
(2, 'Protik', 'Asd123', 'pro@gmail.com', 'norda', 1654223542);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
