-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 07:45 AM
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
  `cand_image_path` varchar(255) NOT NULL,
  `cand_election` int(11) NOT NULL,
  `cand_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates_tbl`
--

INSERT INTO `candidates_tbl` (`cand_id`, `cand_name`, `cand_age`, `cand_desc1`, `cand_desc2`, `cand_desc3`, `cand_image_path`, `cand_election`, `cand_votes`) VALUES
(5, 'Calliope', 19, 'A', 'B', 'C', '../uploads/Calliope.jpg', 1999, 1),
(6, 'Jules', 16, 'H', 'J', 'K', '../uploads/Jules.jpg', 8955, 0),
(7, 'Elino', 28, 'X', 'X', 'X', '../uploads/Elinor.jpg', 1999, 2);

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
('hello@gmail.com', 'How can I vote?'),
('taylorswift@gmail.com', 'Once a voter has submitted their vote, may they change their vote?'),
('trytry@gmail.com', 'How can I see the result of the election?');

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
(1999, 'ElectioNNN', '2022-06-29', '2022-07-06', 3, 3),
(2578, 'Best Pokemon Names', '2022-06-28', '2022-06-30', 5, 3),
(7777, 'Mushroom', '2022-06-29', '2022-07-06', 3, 3),
(8955, 'Sample Election', '2022-06-29', '2022-07-06', 5, 3);

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
(1, 'How can I create an account?', 'Tap register in the top right of the Online Election System. Then, enter your first name and last name. Also, enter your email, and choose a password. Select \"I want to vote for election\" if you are a voter. If you are an administrator, select \"I want to create my own election.\" Tap Sign Up.'),
(2, 'How can I vote?', 'After logging into your account, you will proceed to the voter\'s home page. Enter your election ID. Tap the button that was placed beside your chosen candidate.'),
(3, 'How can I see the result of the election?', 'Tap view result on the navigation bar of the Online Election System. Enter your election ID and tap view result. It will show the number of votes for each candidate of an election.'),
(4, 'Once a voter has submitted their vote, may they change their vote?', 'No. Once a person has voted, their vote is final. If they try to change their vote for a specific election, it will show that they have already voted for that election.');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_tbl`
--

CREATE TABLE `receipt_tbl` (
  `e_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_tbl`
--

INSERT INTO `receipt_tbl` (`e_id`, `v_id`, `c_id`, `receipt_id`) VALUES
(1999, 4, 5, 3),
(1999, 3, 7, 4),
(1999, 1, 7, 5);

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
-- Indexes for table `receipt_tbl`
--
ALTER TABLE `receipt_tbl`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `e_id` (`e_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `v_id` (`v_id`);

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
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `help_tbl`
--
ALTER TABLE `help_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receipt_tbl`
--
ALTER TABLE `receipt_tbl`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- Constraints for table `receipt_tbl`
--
ALTER TABLE `receipt_tbl`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `candidates_tbl` (`cand_id`),
  ADD CONSTRAINT `e_id` FOREIGN KEY (`e_id`) REFERENCES `elections_tbl` (`e_id`),
  ADD CONSTRAINT `v_id` FOREIGN KEY (`v_id`) REFERENCES `voter_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
