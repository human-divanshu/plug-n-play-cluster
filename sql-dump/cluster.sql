-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2017 at 01:39 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cluster`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(8) NOT NULL,
  `input_file` varchar(50) NOT NULL,
  `process_func_file` varchar(50) NOT NULL,
  `aggregate_func_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `input_file`, `process_func_file`, `aggregate_func_file`) VALUES
(1, '1.txt', 'foo.js', 'bar.php'),
(2, '1.txt', 'foo.js', 'bar.php'),
(3, 't.txt', 'foo.js', 'bar.php'),
(4, '1.txt', 'foo.js', 'bar.php'),
(5, '1.txt', 'foo.js', 'bar.php'),
(6, '1.txt', 'foo.js', 'bar.php'),
(7, '1.txt', 'foo.js', 'bar.php');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `job_id` int(8) NOT NULL,
  `task_id` int(8) NOT NULL,
  `task_file_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `worker_ip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`job_id`, `task_id`, `task_file_name`, `status`, `worker_ip`) VALUES
(4, 10, '/task00', 0, NULL),
(4, 11, '/task01', 0, NULL),
(4, 12, '/task02', 0, NULL),
(4, 13, '/task03', 0, NULL),
(4, 14, '/task04', 0, NULL),
(4, 15, '/task05', 0, NULL),
(4, 16, '/task06', 0, NULL),
(5, 17, 'task00', 0, NULL),
(5, 18, 'task01', 0, NULL),
(5, 19, 'task02', 0, NULL),
(5, 20, 'task03', 0, NULL),
(5, 21, 'task04', 0, NULL),
(5, 22, 'task05', 0, NULL),
(5, 23, 'task06', 0, NULL),
(6, 24, 'task00txt', 0, NULL),
(6, 25, 'task01txt', 0, NULL),
(6, 26, 'task02txt', 0, NULL),
(6, 27, 'task03txt', 0, NULL),
(6, 28, 'task04txt', 0, NULL),
(6, 29, 'task05txt', 0, NULL),
(6, 30, 'task06txt', 0, NULL),
(7, 31, 'task00.txt', 0, NULL),
(7, 32, 'task01.txt', 0, NULL),
(7, 33, 'task02.txt', 0, NULL),
(7, 34, 'task03.txt', 0, NULL),
(7, 35, 'task04.txt', 0, NULL),
(7, 36, 'task05.txt', 0, NULL),
(7, 37, 'task06.txt', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `worker_ip` varchar(100) NOT NULL,
  `last_ping` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_ip`, `last_ping`, `status`) VALUES
(2, '::1', '2017-06-24 11:22:08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD UNIQUE KEY `Job_ID` (`job_id`,`task_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD UNIQUE KEY `worker_ip` (`worker_ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
