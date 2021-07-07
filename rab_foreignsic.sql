-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 11:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rab_foreignsic`
--

-- --------------------------------------------------------

--
-- Table structure for table `enclosed_item`
--

CREATE TABLE `enclosed_item` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enclosed_item`
--

INSERT INTO `enclosed_item` (`id`, `name`) VALUES
(1, 'খাকি খাম'),
(2, 'কাচের বোতল'),
(3, 'ধাতব পাত্র');

-- --------------------------------------------------------

--
-- Table structure for table `methodology`
--

CREATE TABLE `methodology` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `methodology`
--

INSERT INTO `methodology` (`id`, `name`) VALUES
(1, 'Physical Examination'),
(2, 'Color Test'),
(3, 'TLC'),
(4, 'GC-MS');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bacode` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `letterNo` varchar(500) NOT NULL,
  `receivedFrom` varchar(500) NOT NULL,
  `receivedBy` varchar(500) NOT NULL,
  `receivedDate` date NOT NULL,
  `description` varchar(2000) NOT NULL,
  `consisted` varchar(2000) NOT NULL,
  `enclosed` varchar(500) NOT NULL,
  `impression` int(11) NOT NULL,
  `contained` varchar(500) NOT NULL,
  `caseNo` varchar(500) DEFAULT NULL,
  `designation` varchar(100) NOT NULL,
  `battalion` varchar(100) NOT NULL,
  `tests` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `analysis` varchar(4000) DEFAULT NULL,
  `analysis_by` text DEFAULT NULL,
  `editor_ext` varchar(5000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `date`, `bacode`, `type`, `year`, `letterNo`, `receivedFrom`, `receivedBy`, `receivedDate`, `description`, `consisted`, `enclosed`, `impression`, `contained`, `caseNo`, `designation`, `battalion`, `tests`, `analysis`, `analysis_by`, `editor_ext`, `status`) VALUES
(2, '2020-09-25', 'ID-DNA000002', 1, '2020', 'sdrfsdgfdg', 'dfgdfgdf', 'gdfgdfgdfg', '2020-09-19', 'asdf', 'asdasda', '2', 1, 'dsadsadasa', 'dfrhfdghgf', 'Associate Professore', 'dsadad', '[\"1\",\"2\",\"4\"]', 'fuysdfsw \r\nfsdgsdfgisef \r\ndsa efoisdfgsdogsdgopdsgjdfoig f\r\nsfgsdffpdjfgsdklfgp[sld\r\nf[]sd\r\nf', 'Muradul', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>dsad</td>\r\n			<td>asdasdasd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>adasd</td>\r\n			<td>dasdasd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asdadasdas</td>\r\n			<td>asdasdasdsadas</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 3),
(3, '2020-09-25', 'ID-DNA000003', 1, '2021', 'sadasdd', 'asdasdas', 'gdfgdfgdfg', '2020-09-18', 'asdf', 'asdasdaa', '3', 1, 'dsadsadas', 'dfrhfdghgf', 'Associate Professore', 'dsadad', '[\"1\",\"2\"]', 'sdasdsadsa', 'Syed', '<p>rdwerwerwerwe</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>asda</td>\r\n			<td>dasdas</td>\r\n		</tr>\r\n		<tr>\r\n			<td>sadas</td>\r\n			<td>dadasdas</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dasdasd</td>\r\n			<td>asdasdsa</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 3),
(4, '2020-09-26', 'ID-NAR000004', 4, '2020', 'sdrfsdgfdg', 'asdasdas', 'gdfgdfgdfg', '2020-09-12', 'asdf', 'asdasda', '2', 1, 'dsadsadas', 'asdasdasda', 'Teacher', 'dsadad', '[\"1\",\"2\"]', 'dsadsafsfsad\r\nygdfgfdgs', 'Murad', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>dasdasd</td>\r\n			<td>dasdasds</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asdasdas</td>\r\n			<td>dasdasdas</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dasdasdasdas</td>\r\n			<td>adaasd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 3),
(5, '2020-10-15', 'ID-RNA000005', 2, '2020', 'sdrfsdgfdg', 'asdasdas', 'gdfgdfgdfg', '2020-09-12', 'asdf', 'asdasda', '3', 1, 'dsadsadas', 'asdasdasda', 'Associate Professore', 'dsadad', NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sample_type`
--

CREATE TABLE `sample_type` (
  `id` int(11) NOT NULL,
  `sample` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample_type`
--

INSERT INTO `sample_type` (`id`, `sample`) VALUES
(1, 'DNA'),
(2, 'RNA'),
(4, 'NAR');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Syed Muradul Islam', 'muradcse1177@gmail.com', '1234', 1),
(2, 'রিসিভার', 'receiver@gmail.com', '1234', 2),
(3, 'এডমিন', 'admin@gmail.com', '1234', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enclosed_item`
--
ALTER TABLE `enclosed_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `methodology`
--
ALTER TABLE `methodology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_type`
--
ALTER TABLE `sample_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enclosed_item`
--
ALTER TABLE `enclosed_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `methodology`
--
ALTER TABLE `methodology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sample_type`
--
ALTER TABLE `sample_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
