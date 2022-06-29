-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 07:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_account`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(2, 'Admin', 'Try', 'trytry@gmail.com', 'hello123'),
(3, 'Hello', 'Guys', 'hi@hello', 'hi123');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_tbl`
--

CREATE TABLE `candidates_tbl` (
  `cand_id` int(11) NOT NULL,
  `cand_name` varchar(255) NOT NULL,
  `cand_age` int(11) NOT NULL,
  `cand_desc1` varchar(100) NOT NULL,
  `cand_desc2` varchar(100) DEFAULT NULL,
  `cand_desc3` varchar(100) DEFAULT NULL,
  `cand_image` blob NOT NULL,
  `cand_election` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `email` varchar(80) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`email`, `comment`) VALUES
('hello@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
('taylorswift@gmail.com', '“To me, Fearless is not the absense of fear. It\'s not being completely unafraid. To me, Fearless is having fears. Fearless is having doubts. Lots of them. To me, Fearless is living in spite of those things that scare you to death.”\r\n'),
('trytry@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `elections_tbl`
--

CREATE TABLE `elections_tbl` (
  `e_id` int(5) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_start` date NOT NULL,
  `e_end` date NOT NULL,
  `cand_count` int(1) NOT NULL,
  `e_owner` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elections_tbl`
--

INSERT INTO `elections_tbl` (`e_id`, `e_name`, `e_start`, `e_end`, `cand_count`, `e_owner`) VALUES
(1234, 'Barangay SK Elections', '2022-06-23', '2022-06-30', 2, 3),
(2578, 'Best Pokemon Names', '2022-06-28', '2022-06-30', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `help_tbl`
--

CREATE TABLE `help_tbl` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `help_tbl`
--

INSERT INTO `help_tbl` (`id`, `question`, `answer`) VALUES
(1, 'How do I vote?', 'Dunno'),
(2, 'How to manage your account?', 'Idk'),
(3, 'How to manage your account?', 'I don\'t know');

-- --------------------------------------------------------

--
-- Table structure for table `voter_tbl`
--

CREATE TABLE `voter_tbl` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter_tbl`
--

INSERT INTO `voter_tbl` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Will', 'Vote', 'vote@gmail.com', '12345'),
(2, 'Testing', 'Update', 'testupdate@gmail.com', 'test123'),
(3, 'Voter', 'Person', 'voter@yahoo.com', '12345'),
(4, 'Toni', 'Bechayda', 'toni@hello.org', '7575');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  ADD PRIMARY KEY (`cand_id`),
  ADD KEY `candidate_election` (`cand_election`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `election_owner` (`e_owner`);

--
-- Indexes for table `help_tbl`
--
ALTER TABLE `help_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter_tbl`
--
ALTER TABLE `voter_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_tbl`
--
ALTER TABLE `help_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voter_tbl`
--
ALTER TABLE `voter_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  ADD CONSTRAINT `candidate_election` FOREIGN KEY (`cand_election`) REFERENCES `elections_tbl` (`e_id`);

--
-- Constraints for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  ADD CONSTRAINT `election_owner` FOREIGN KEY (`e_owner`) REFERENCES `admin_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
