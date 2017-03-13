-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2017 at 08:20 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`id` int(11) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cid`, `Name`) VALUES
(1, 'INFT219', 'computer vision'),
(2, 'INFT200', 'software engineering'),
(4, 'INFT445', 'programming'),
(6, 'INFT234', 'information system');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
`id` int(11) NOT NULL,
  `deptid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `deptid`, `name`) VALUES
(2, 'DH102', 'Computer Science'),
(4, 'DH101', 'Nursing'),
(5, 'DH103', 'Information Technology'),
(6, 'DH104', 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE IF NOT EXISTS `hall` (
`id` int(11) NOT NULL,
  `hallId` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `capacity` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `hallId`, `name`, `capacity`) VALUES
(3, 'H101', 'E.G White', 40),
(4, 'H102', 'J.J Nortey', 70),
(8, 'H104', 'American High', 50),
(9, 'H103', 'Caf ', 150);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sid`, `fname`, `lname`, `department`, `gender`, `dob`, `email`, `password`) VALUES
(1, '215IT01002802', 'Abiodun', 'Junior', 'Information Technology', 'Male', '2017-03-04', 'osigbelu.abiodun@gmail.com', '07e45a9ff8cc067b011949ead442b491'),
(2, '215NS01002950', 'Osigbelu', 'Samuel', 'Nursing', 'Female', '2017-03-14', 'samuel2017@gmail.com', 'f5962f77b293b0d7fe5b7f1e29bde747'),
(4, '215BS01002563', 'Bello', 'Damilola', 'Nursing', 'Male', '2017-12-31', 'bello@gmail.com', 'c372a15d35fbf0133cd45297957c6a67'),
(6, '215CS01002856', 'Tunde', 'Baba', 'Nursing', 'Male', '2013-01-01', 'tunde21@yahoo.com', '4e671d1f5972f2fe1d8a3215db5167fd'),
(8, '214IT01002323', 'Nick', 'Taiwan', 'Information Technology', 'Male', '2017-03-07', 'nicknick@gmail.com', 'febf77efb96b83cc717f8e3875932fa5');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` int(11) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hall` varchar(50) NOT NULL,
  `sid` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `cid`, `name`, `hall`, `sid`) VALUES
(1, 'INFT212', 'computer vision', 'J.J Nortey', '215NS01002950'),
(2, 'INFT445', 'programming', 'E.G White', '215NS01002950'),
(3, 'INFT234', 'information system', 'Caf ', '215NS01002950'),
(5, 'INFT445', 'programming', 'E.G White', '215IT01002802'),
(7, 'INFT200', 'software engineering', 'American High', '215CS01002856'),
(8, 'INFT234', 'information system', 'Caf ', '215CS01002856'),
(9, 'INFT212', 'computer vision', 'J.J Nortey', '215CS01002856'),
(11, 'INFT445', 'programming', 'E.G White', '215CS01002856'),
(12, 'INFT212', 'computer vision', 'J.J Nortey', '215IT01002802'),
(14, 'INFT200', 'software engineering', 'American High', '215IT01002802'),
(15, 'INFT200', 'software engineering', 'American High', '215NS01002950'),
(19, 'INFT234', 'information system', '', '215IT01002802');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
