-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2017 at 04:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Archie`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `document_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`document_id`, `category_id`) VALUES
(1, 5),
(2, 5),
(4, 20),
(5, 4),
(6, 5),
(7, 14),
(8, 5),
(9, 12),
(10, 11),
(11, 2),
(12, 21),
(13, 22);

-- --------------------------------------------------------

--
-- Table structure for table `category_catalog`
--

CREATE TABLE `category_catalog` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_catalog`
--

INSERT INTO `category_catalog` (`category_id`, `category_name`, `parent_id`) VALUES
(1, 'Technology', NULL),
(2, 'History', NULL),
(3, 'Communications ', NULL),
(4, 'Finance ', NULL),
(5, 'Typewriter', 1),
(6, 'Typewritter', 1),
(7, 'World War II', 2),
(8, 'Social Media', 3),
(9, 'Art', NULL),
(10, 'Languages', NULL),
(11, 'Israel', 2),
(12, 'Music', 9),
(13, 'Books', NULL),
(14, 'Romance', NULL),
(15, 'OCR', NULL),
(20, 'Social Networking', NULL),
(21, 'Hebrew', 10),
(22, 'Worid War II', 2),
(23, 'Main Category', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `picture_file` text,
  `text_file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `page`, `picture_file`, `text_file`) VALUES
(1, 0, '/files/1.jpg', '/files/documentNumber1.txt'),
(2, 0, '/files/2.jpg', '/files/documentNumber2.txt'),
(4, 0, '/files/4.1.jpg', '/files/documentNumber4.txt'),
(4, 1, '/files/4.2.jpg', '/files/documentNumber4.txt'),
(5, 0, '/files/5.gif', '/files/documentNumber5.txt'),
(6, 0, '/files/6.png', '/files/documentNumber6.txt'),
(7, 0, '/files/7.jpg', '/files/documentNumber7.txt'),
(8, 0, '/files/h1.jpg', '/files/documentNumber8.txt'),
(9, 0, '/files/h2.png', '/files/documentNumber9.txt'),
(10, 0, '/files/h3.1.jpg', '/files/documentNumber10.txt'),
(10, 1, '/files/h3.2.jpg', '/files/documentNumber10.txt'),
(11, 0, '/files/h4.png', '/files/documentNumber11.txt'),
(12, 0, '/files/h5.JPG', '/files/documentNumber12.txt'),
(13, 0, '/files/3.jpg', '/files/documentNumber13.txt'),
(14, 0, '/files/4.2.jpg', '/files/documentNumber14.txt');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `document_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`document_id`, `keyword_id`) VALUES
(1, 6),
(1, 14),
(1, 26),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 42),
(1, 48),
(2, 16),
(2, 32),
(2, 33),
(2, 35),
(2, 36),
(2, 37),
(4, 38),
(4, 39),
(4, 40),
(5, 33),
(5, 51),
(5, 53),
(5, 54),
(6, 33),
(6, 38),
(6, 52),
(7, 55),
(8, 33),
(8, 42),
(8, 43),
(9, 2),
(9, 46),
(9, 47),
(9, 48),
(9, 49),
(9, 50),
(10, 1),
(10, 16),
(10, 19),
(10, 45),
(10, 46),
(12, 7),
(12, 42),
(13, 1),
(13, 2),
(13, 3),
(13, 18),
(13, 19),
(13, 53),
(14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `keyword_catalog`
--

CREATE TABLE `keyword_catalog` (
  `keyword_id` int(11) NOT NULL,
  `keyword_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword_catalog`
--

INSERT INTO `keyword_catalog` (`keyword_id`, `keyword_name`, `category_id`) VALUES
(1, 'jewish', 7),
(2, 'cultural', 7),
(3, 'property', 7),
(4, 'NOTINARTICLE', 15),
(5, 'cell phone', 1),
(6, 'computer', 1),
(7, 'automobile', 1),
(8, 'radio', 1),
(9, 'hi-tech', 1),
(10, 'internet', 1),
(11, 'cell phone', 3),
(12, 'internet', 3),
(13, 'newspaper', 3),
(14, 'words', 5),
(15, 'pages', 5),
(16, 'war', 6),
(17, 'hitler', 6),
(18, 'germany', 6),
(19, 'jewish', 6),
(20, 'cell phone', 7),
(21, 'facebook', 7),
(22, 'hebrew', 9),
(23, 'english', 9),
(24, 'jerusalem', 10),
(25, 'rock', 11),
(26, 'words', 15),
(27, 'industry', 1),
(28, 'allies', 6),
(29, 'independence', 10),
(30, 'middle east', 11),
(31, 'translation', 15),
(32, 'key', 5),
(33, 'write', 5),
(34, 'mistakes', 5),
(35, 'ribbon', 5),
(36, 'finger', 5),
(37, 'ancient', 5),
(38, 'web', 8),
(39, 'hashtag', 8),
(40, 'celebrities', 8),
(41, 'internet', 8),
(42, 'word', 5),
(43, 'machine', 5),
(44, 'nationality', 11),
(45, 'jewish agency for israel', 11),
(46, 'golan', 11),
(47, 'orchestra', 12),
(48, 'band', 12),
(49, 'beatles', 12),
(50, 'festival', 12),
(51, 'capitalists', 4),
(52, 'money', 4),
(53, 'organization', 4),
(54, 'stockholders', 4),
(55, 'love', 14),
(56, 'relationship', 14),
(57, 'soul', 14);

-- --------------------------------------------------------

--
-- Table structure for table `mainartifact`
--

CREATE TABLE `mainartifact` (
  `document_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT '0001-01-17',
  `updater_name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainartifact`
--

INSERT INTO `mainartifact` (`document_id`, `name`, `date`, `updater_name`, `author`) VALUES
(1, 'Typewriter Notes', '2017-06-02', 'ArchiveEmployeeUser', 'NA'),
(2, 'Typewriter Comeback', '2017-06-02', 'ArchiveEmployeeUser', 'NA'),
(4, 'Social Networking and its Influences', '2017-06-02', 'ArchiveEmployeeUser', 'Jared Hussey'),
(5, 'A Brief Report of Stockholders', '2017-06-02', 'ArchiveEmployeeUser', 'Nickerson Typewriter Company'),
(6, 'Letter', '2017-06-02', 'ArchiveEmployeeUser', 'Bryan'),
(7, 'The Blooming Madness Poem', '2017-06-02', 'ArchiveEmployeeUser', 'Christopher Poindexter'),
(8, '×”×ž×›×•× ×” ×”×—×©×ž×œ×™×ª', '2017-06-02', 'ArchiveEmployeeUser', '×›×ª×‘×™× ×¢×‘×¨×™×™× ×—×“×©×™×'),
(9, '×¡×™×›×•× ×œ×”×§×•×ª', '2017-06-02', 'ArchiveEmployeeUser', '×”×•×¢×“×” ×œ××™×©×•×¨ ××•×ž× ×™×'),
(10, '×œ× ×”×©×œ×ž× ×• ×’× ×¢× ×”×—×œ×•×§×” ×”×¨××©×', '2017-06-02', 'ArchiveEmployeeUser', '×”×¡×•×›× ×•×ª ×”×™×”×•×“×™×ª'),
(11, '×“×¨×•×© ×™×', '2017-06-02', 'ArchiveEmployeeUser', '×©×ž×•××œ'),
(12, '×§×‘×™×¢×ª ×©×ž×•×ª ×‘×¢×‘×¨×™×ª', '2017-06-02', 'ArchiveEmployeeUser', 'NA'),
(13, 'Memorandum of Agrement', '2017-06-04', 'ArchiveEmployeeUser', 'NA'),
(14, 'TestMe', '2017-07-06', 'ArchiveEmployeeUser', 'TestMeAruthor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `user_name`, `password`, `role`, `email`, `approved`) VALUES
('ArchiveEmployeeName', 'ArchiveEmployeeUser', '123', 'Archive Employee', 'ArchiveEmployee@gmail.com', 1),
('Delete Me', 'DeleteMe', '123', 'Researcher', 'DeleteMe@gmail.com', 1),
('ManagerName', 'ManagerUser', '123', 'Manager', 'Manager@gmail.com', 1),
('Unapproved User', 'UnapprovedUser', '123', 'Researcher', 'UnapprovedUser@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`document_id`,`category_id`),
  ADD KEY `categoryCatalogFK` (`category_id`);

--
-- Indexes for table `category_catalog`
--
ALTER TABLE `category_catalog`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`,`page`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`document_id`,`keyword_id`),
  ADD KEY `keywordfk` (`keyword_id`);

--
-- Indexes for table `keyword_catalog`
--
ALTER TABLE `keyword_catalog`
  ADD PRIMARY KEY (`keyword_id`,`category_id`),
  ADD KEY `keywordCatalogCategoryFK` (`category_id`);

--
-- Indexes for table `mainartifact`
--
ALTER TABLE `mainartifact`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `updater_name` (`updater_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_catalog`
--
ALTER TABLE `category_catalog`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `keyword_catalog`
--
ALTER TABLE `keyword_catalog`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `mainartifact`
--
ALTER TABLE `mainartifact`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `categoryCatalogFK` FOREIGN KEY (`category_id`) REFERENCES `catalog` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryMainartifactIDFK` FOREIGN KEY (`document_id`) REFERENCES `mainartifact` (`document_id`) ON UPDATE CASCADE;

--
-- Constraints for table `category_catalog`
--
ALTER TABLE `category_catalog`
  ADD CONSTRAINT `parentFK` FOREIGN KEY (`parent_id`) REFERENCES `catalog` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `documentMainartifactFK` FOREIGN KEY (`id`) REFERENCES `mainartifact` (`document_id`) ON UPDATE CASCADE;

--
-- Constraints for table `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `documentKeywordFK` FOREIGN KEY (`document_id`) REFERENCES `mainartifact` (`document_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `keywordfk` FOREIGN KEY (`keyword_id`) REFERENCES `keyword_catalog` (`keyword_id`) ON UPDATE CASCADE;

--
-- Constraints for table `keyword_catalog`
--
ALTER TABLE `keyword_catalog`
  ADD CONSTRAINT `keywordCatalogCategoryFK` FOREIGN KEY (`category_id`) REFERENCES `category_catalog` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `mainartifact`
--
ALTER TABLE `mainartifact`
  ADD CONSTRAINT `mainartifactUserFK` FOREIGN KEY (`updater_name`) REFERENCES `user` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
