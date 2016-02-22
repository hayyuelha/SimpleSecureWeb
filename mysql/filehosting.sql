-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2016 at 04:06 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filehosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(4) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_email` varchar(100) NOT NULL,
  `com_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_dis` text NOT NULL,
  `pid_fk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `com_name`, `com_email`, `com_date`, `com_dis`, `pid_fk`) VALUES
(1, 'untuk aryya', 'dsadsa', '2016-02-21 17:00:00', 'dasdasdas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `fileid` int(5) NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `status` int(1) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`fileid`, `filename`, `path`, `status`, `username`) VALUES
(1, '20122013 Notulensi kumpul CAPTCHA.pdf', '2f28ad79372067db8d2e6cbbef08e6de.pdf', 1, 'hayyuhanifah'),
(11111, 'Panduan Membuat Web.pdf', '23232312312321312312312.pdf', 1, 'aryya'),
(11112, 'Fiu siu.exe', '27827872.exe', 1, 'aryya'),
(11113, 'Desert.jpg', '87d07f90f10c40ed8075f45c042fe6f6.jpg', 1, 'hayyuhanifah');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `isDeleted` tinyint(2) DEFAULT '0',
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `title`, `date`, `content`, `isDeleted`, `username`) VALUES
(1, 'Test', '2016-02-20 16:26:42', 'uwouwo', 0, 'hayyuhanifah'),
(2, 'hahha', '2016-02-20 16:58:28', 'Lorem ipsum', 0, 'hayyuhanifah'),
(3, 'dsa', '2016-02-22 03:03:19', 'dsadsa', 0, 'aryya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `active`) VALUES
('aryya', '84c29c7a16116c6e549fcafdc4a8fcf1', 'a.dwisatya@yahoo.com', 1),
('aryyaedwisatya', '7c1cadb6887373dacb595c47166bfbd9', 'aryya@gdoogle.com', 0),
('dwisatya', 'afe22da9ddbcb15d6ae186a56fd280fa', 'dwisatya', 0),
('hayyuhanifah', '5f4dcc3b5aa765d61d8327deb882cf99', 'hayyuhanifah52@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `pid_fk` (`pid_fk`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fileid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `fileid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11114;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`pid_fk`) REFERENCES `post` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
