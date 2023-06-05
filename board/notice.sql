-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 04:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notice`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `deptid` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `userType` varchar(20) NOT NULL,
  `fixedStatus` int(5) NOT NULL,
  `adminId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `deptid`, `status`, `userType`, `fixedStatus`, `adminId`) VALUES
(48, 'All Student', '0', NULL, '2', 1, 'admin'),
(49, 'All Teacher', '0', NULL, '3', 1, 'admin'),
(50, 'All Dept Admin', '0', NULL, '1', 1, 'admin'),
(51, 'All Users', '0', NULL, '0', 1, 'admin'),
(52, 'cse all user', 'CSE', NULL, '0', 1, 'da-cse'),
(56, 'all cse student', 'CSE', NULL, '2', 0, 'admin'),
(57, '40 batch ', 'CSE', NULL, '2', 0, 'da-cse'),
(58, 'off day', 'CSE', NULL, '2', 1, 'da-cse');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `departmentname` varchar(50) DEFAULT NULL,
  `deptcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentname`, `deptcode`) VALUES
(8, 'computer science and engineering', 'CSE'),
(9, 'Pharmacy', 'PHM'),
(11, 'English', 'ENG'),
(12, 'Food Engineering &amp; Technology', 'FET');

-- --------------------------------------------------------

--
-- Table structure for table `departmentadmin`
--

CREATE TABLE `departmentadmin` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmentadmin`
--

INSERT INTO `departmentadmin` (`id`, `userid`, `password`, `department`, `mobile`, `email`) VALUES
(5, 'da-cse', '827ccb0eea8a706c4c34a16891f84e7b', 'CSE', '01888995566', 'da.cse@gmail.com'),
(6, 'da-eng', '827ccb0eea8a706c4c34a16891f84e7b', 'ENG', '01999778811', 'da.eng@gmail.com'),
(7, 'da-fet', '827ccb0eea8a706c4c34a16891f84e7b', 'FET', '01333554499', 'da.fet@gmail.com'),
(8, 'da-phm', '827ccb0eea8a706c4c34a16891f84e7b', 'PHM', '01777664477', 'da.phm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `newnotice`
--

CREATE TABLE `newnotice` (
  `id` int(11) NOT NULL,
  `noticesubject` varchar(100) DEFAULT NULL,
  `noticedescription` varchar(500) DEFAULT NULL,
  `photo` varchar(70) DEFAULT NULL,
  `refer_id` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `category` varchar(20) DEFAULT NULL,
  `notice_status` tinyint(1) DEFAULT NULL,
  `adminId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newnotice`
--

INSERT INTO `newnotice` (`id`, `noticesubject`, `noticedescription`, `photo`, `refer_id`, `date`, `category`, `notice_status`, `adminId`) VALUES
(27, 'Hello 2', 'Hello 2 desc', 'when I need help from friends.jpg', '123', '2021-09-01 13:35:57', '52', NULL, 'da-cse');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(5) NOT NULL,
  `useerId` varchar(20) NOT NULL,
  `categoryId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `useerId`, `categoryId`) VALUES
(55, 'ug02-40-15-014', 56),
(56, 'ug02-40-15-014', 57);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `deptid` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `photo` varchar(70) DEFAULT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentid`, `name`, `deptid`, `contact`, `password`, `gender`, `photo`, `birthdate`) VALUES
(12, 'ug02-40-15-014', 'Zawad', 'CSE', '01773654333', '202cb962ac59075b964b07152d234b70', 'male', '1577004748_15871_45646_25540_13038.', '1994-12-15'),
(13, 'phm02-38-15-00', 'pharma student 1', 'PHM', '01773654333', '202cb962ac59075b964b07152d234b70', 'male', '1577010395_32010_17281_89025_72620.', '1990-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `userid`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `deptid` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `userid`, `name`, `deptid`, `contact`, `password`) VALUES
(5, 't-cse123', 'Teacher 1', 'CSE', '01773654333', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 't-phm123', 'pharma teacher', 'PHM', '01773654333', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `deptid` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `type`, `deptid`, `password`) VALUES
(1, 'h20', 'all', 'CSE', '8457348'),
(2, 'fd', 'all', 'CSE', '123456...');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `detailes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `type`, `detailes`) VALUES
(1, 'deptAdmin', NULL),
(2, 'student', NULL),
(3, 'teacher', NULL),
(4, 'admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmentadmin`
--
ALTER TABLE `departmentadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newnotice`
--
ALTER TABLE `newnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departmentadmin`
--
ALTER TABLE `departmentadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newnotice`
--
ALTER TABLE `newnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
