-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2017 at 07:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archie`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `Category_ID` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`Category_ID`, `category_name`, `parent_id`) VALUES
(1, 'Art', NULL),
(2, 'Religion', NULL),
(3, 'Sport', NULL),
(4, 'Music', 1),
(5, 'Judaism', 2),
(6, 'leg', NULL),
(7, 'ftr', NULL),
(8, 'ewf', NULL),
(9, 'eferf', NULL),
(10, 'ewfw', NULL),
(11, 'eferfw', NULL),
(12, 'ewfwr', NULL),
(13, 'eferfwa', NULL),
(14, 'opperiuiou', NULL),
(15, 'klierjuio', NULL),
(16, 'frdty', NULL),
(17, 'ioui', NULL),
(18, '', NULL),
(19, 'Hebraw', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Document_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `Picture_file` text,
  `Text_file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `Document_id` int(11) NOT NULL,
  `keyword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mainartifact`
--

CREATE TABLE `mainartifact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT '0001-01-17',
  `Updater_Name` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `user_name`, `password`, `role`, `mail`) VALUES
('Michael Cohen', 'mc11079', 'mc123456', 'Archive Employee', 'mc11079@gmail.com'),
('Gal Avrahami', 'rfg44', 'xc3ed34', 'Researcher', 'rg5@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`Category_ID`),
  ADD KEY `Parent_id` (`parent_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Document_id`,`Category_id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`,`page`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`Document_id`,`keyword`);

--
-- Indexes for table `mainartifact`
--
ALTER TABLE `mainartifact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Updater_Name` (`Updater_Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `name_2` (`name`),
  ADD KEY `name_3` (`name`),
  ADD KEY `name_4` (`name`),
  ADD KEY `name_5` (`name`),
  ADD KEY `name_6` (`name`),
  ADD KEY `name_7` (`name`),
  ADD KEY `name_8` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mainartifact`
--
ALTER TABLE `mainartifact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`Parent_id`) REFERENCES `catalog` (`Category_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Document_id`) REFERENCES `mainartifact` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`Category_id`) REFERENCES `catalog` (`Category_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`id`) REFERENCES `mainartifact` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `keywords_ibfk_1` FOREIGN KEY (`Document_id`) REFERENCES `mainartifact` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `mainartifact`
--
ALTER TABLE `mainartifact`
  ADD CONSTRAINT `mainartifact_ibfk_1` FOREIGN KEY (`Updater_Name`) REFERENCES `user` (`user_name`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
