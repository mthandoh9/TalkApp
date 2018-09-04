-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 10:47 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talkapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `ID` int(11) NOT NULL,
  `Email1` varchar(255) NOT NULL,
  `Email2` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`ID`, `Email1`, `Email2`, `Date`) VALUES
(1, '123@gmail.com', '321@gmail.com', '0000-00-00 00:00:00'),
(2, '321@gmail.com', '123@gmail.com', '2018-08-02 02:07:54'),
(3, '123@gmail.com', '000@gmail.com', '2018-08-22 04:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `message`, `receiver`, `sender`, `Date`) VALUES
(15, 'xcxc', '321@gmail.com', '123@gmail.com', '2018-08-02 01:14:47'),
(16, 'xcxc', '321@gmail.com', '123@gmail.com', '2018-08-02 01:14:53'),
(17, 'fd', '321@gmail.com', '123@gmail.com', '2018-08-02 01:24:18'),
(18, 'asas', '321@gmail.com', '123@gmail.com', '2018-08-02 01:25:08'),
(19, 'thrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttthhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '321@gmail.com', '123@gmail.com', '2018-08-02 01:56:13'),
(20, 'thrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttthhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '321@gmail.com', '123@gmail.com', '2018-08-02 01:56:40'),
(21, 'erere', '123@gmail.com', '321@gmail.com', '2018-08-02 02:11:41'),
(22, 'yey', '123@gmail.com', '321@gmail.com', '2018-08-02 02:14:06'),
(23, 'jdfhdjf', '321@gmail.com', '123@gmail.com', '2018-08-02 02:42:11'),
(24, 'tbgtgtgtgtg', '321@gmail.com', '123@gmail.com', '2018-08-02 02:55:59'),
(25, 'thandanani here!', '321@gmail.com', '123@gmail.com', '2018-08-22 04:21:40'),
(26, 'Please reply man \r\nheyy', '321@gmail.com', '123@gmail.com', '2018-08-22 04:22:03'),
(27, 'thththth tkttkktt', '321@gmail.com', '123@gmail.com', '2018-08-22 04:47:27'),
(28, 'tgtgtgtg\r\ntgtgtgtg\r\ntgtgtgtg', '321@gmail.com', '123@gmail.com', '2018-08-22 04:47:36'),
(29, 'olaaaaa', '000@gmail.com', '123@gmail.com', '2018-08-22 04:55:23'),
(30, 'wow', '321@gmail.com', '123@gmail.com', '2018-09-03 21:45:25'),
(31, 'thththt\r\nththththt\r\nth\r\nth\r\ntht', '321@gmail.com', '123@gmail.com', '2018-09-03 22:09:19'),
(32, 'Please reply brou', '000@gmail.com', '123@gmail.com', '2018-09-03 22:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `ID` int(11) NOT NULL,
  `postmessage` varchar(1000) NOT NULL,
  `Attachment` varchar(100) NOT NULL,
  `AttachmentType` varchar(15) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `postmessage`, `Attachment`, `AttachmentType`, `Email`, `Name`, `Surname`, `Date`) VALUES
(1, 'This is Me ', './files/WIN_20180721_04_37_13_Pro.jpg', 'image/jpeg', '123@gmail.com', 'Thandanani', 'Skhakhane', '2018-09-04 00:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `postcomments`
--

CREATE TABLE IF NOT EXISTS `postcomments` (
  `ID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `commenterName` varchar(50) NOT NULL,
  `commeterSurname` varchar(50) NOT NULL,
  `commenterEmail` varchar(250) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Surname`, `Email`, `Password`, `Status`) VALUES
(1, 'Thandanani', 'Fekethiso', 'mthandoh9@gmail.com', '9d3549f1aad79deaa34db1f85d3d3a9e', '1'),
(2, 'Melusi', 'Maphumulo', '321@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(3, 'Thandanani', 'Skhakhane', '123@gmail.com', '9d3549f1aad79deaa34db1f85d3d3a9e', '1'),
(4, 'Delani', 'Mkhize', '000@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `postcomments`
--
ALTER TABLE `postcomments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `postcomments`
--
ALTER TABLE `postcomments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
