-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 09:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gec_taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `issue_type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `assigner` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `dateCreated` varchar(255) NOT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `issue_type`, `subject`, `description`, `status`, `assignee`, `assigner`, `project`, `dateCreated`, `duedate`) VALUES
(22, '', '', '', '', 'User Admin ', 2, 'Query', '', '0000-00-00'),
(23, '', 'aaa', '', '', 'User Admin ', 2, 'UI', '2023-05-25 03:32:57 PM', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `issues_attachment`
--

CREATE TABLE `issues_attachment` (
  `id` int(11) NOT NULL,
  `issues_id` int(11) NOT NULL,
  `attachment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `issues_attachment`
--

INSERT INTO `issues_attachment` (`id`, `issues_id`, `attachment`) VALUES
(16, 22, ''),
(17, 23, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `password`, `user_type`, `user_status`) VALUES
(1, 'User Admin', '', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 1, 1),
(2, 'Kent Angelo', 'Tayco', 'kent@gmail.com', '7b0172b419534186a9af2f95b040e7b8', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigner` (`assigner`);

--
-- Indexes for table `issues_attachment`
--
ALTER TABLE `issues_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issues_id` (`issues_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `issues_attachment`
--
ALTER TABLE `issues_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`assigner`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `issues_attachment`
--
ALTER TABLE `issues_attachment`
  ADD CONSTRAINT `issues_attachment_ibfk_1` FOREIGN KEY (`issues_id`) REFERENCES `issues` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
