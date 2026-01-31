-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 09:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competition`
--

-- --------------------------------------------------------

--
-- Table structure for table `individuals`
--

CREATE TABLE `individuals` (
  `member_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `individuals`
--

INSERT INTO `individuals` (`member_id`, `name`, `score`) VALUES
(4, 'Makima', 50),
(5, 'Juliana', 40),
(8, 'Arthur', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `correct_answer` varchar(100) NOT NULL,
  `quiz_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`, `correct_answer`, `quiz_type`) VALUES
(1, 'What keyword is used to check if a variable is set in PHP?', 'isset', 'Programming'),
(2, 'Which keyword is used to define a class in PHP?', 'class', 'Programming'),
(3, 'What symbol is used to denote variables in PHP?', '$', 'Programming'),
(4, 'Which keyword is used to include files in PHP?', 'include', 'Programming'),
(5, 'What keyword is used to define a constant in PHP?', 'define', 'Programming'),
(6, 'Who is the governing body of international football?', 'FIFA', 'Sport'),
(7, 'Which country has won the most FIFA World Cups?', 'Brazil', 'Sport'),
(8, 'What color card means immediate ejection from the game?', 'Red', 'Sport'),
(9, 'How many players does each team have on the field?', '11', 'Sport'),
(10, 'Which player is often called (CR7)?', 'Ronaldo', 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `total_score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `total_score`) VALUES
(2, 'IV', 400),
(3, 'Titans', 200),
(4, 'Madrid', 150),
(5, 'Aid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `member_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `member_name` varchar(100) NOT NULL,
  `score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`member_id`, `team_id`, `member_name`, `score`) VALUES
(6, 2, 'Juliana', 80),
(7, 2, 'Makima', 80),
(8, 2, 'Arthur', 80),
(9, 2, 'Killua', 80),
(10, 2, 'Deku', 80),
(11, 3, 'Juliana', 40),
(12, 3, 'Makima', 40),
(13, 3, 'Arthur', 40),
(14, 3, 'Killua', 40),
(15, 3, 'Deku', 40),
(16, 4, 'Juliana', 30),
(17, 4, 'Makima', 30),
(18, 4, 'Arthur', 30),
(19, 4, 'Killua', 30),
(20, 4, 'Deku', 30),
(21, 5, 'Juliana', 0),
(22, 5, 'Makima', 0),
(23, 5, 'Arthur', 0),
(24, 5, 'Killua', 0),
(25, 5, 'Deku', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `individuals`
--
ALTER TABLE `individuals`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `individuals`
--
ALTER TABLE `individuals`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
