-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 07:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Admin',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `question_id` int(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `exam_status` int(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `end_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`question_id`, `file_name`, `exam_status`, `created_at`, `end_at`) VALUES
(8, 'ct-1.pdf', 0, '2021-08-19 02:28:29', '2021-08-19 03:17:02'),
(9, '1.docx', 0, '2021-08-19 02:31:16', '2021-08-19 05:33:43'),
(10, '2.docx', 0, '2021-08-19 02:41:28', '2021-08-19 09:36:09'),
(11, 'Daraz.pdf', 1, '2021-08-19 06:39:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `n_id` int(10) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `n_name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `n_image` varchar(255) NOT NULL,
  `n_file` varchar(255) NOT NULL,
  `datetime` datetime(6) DEFAULT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`n_id`, `s_id`, `n_name`, `course`, `dept`, `description`, `n_image`, `n_file`, `datetime`, `approval`) VALUES
(48, 'CSE190283', 'chemistry24', 'chemistry', 'chemistry', 'chemistry isd edfjehfjef', 'd8e5f6dc60fead732d37cacadf192e50.jpg', '', '2021-04-20 02:05:05.000000', 1),
(49, 'CSE190283', 'Economics2', 'Economics121', 'CSE', 'Economics is based on ...........', 'picture (1) (1).jfif', 'physics-formulas.pdf', '2021-04-07 08:08:00.000000', 1),
(50, 'BBA1232123', 'physics2', 'Physics214', 'CSE', 'Circuits base....', 'picture_picture (1).jfif', 'physics-formulas.pdf', '2021-04-07 08:09:00.000000', 1),
(52, '', 'physics24675', 'physics1', 'science', 'esfgydfhygf', 'eX3.gif', '', '2020-04-07 08:08:00.000000', 1),
(53, 'CSE190283', 'physics24675', 'physics1', 'science', 'esfgydfhygf', 'eX3.gif', '', '2021-08-07 08:08:00.000000', 1),
(54, 'CSE190283', 'biochemistry', 'chem5', 'chemistry', 'chemistry isd edfjehfjef', '3d-illustration-molecule-model-science-260nw-626488493.webp', 'physics-formulas.pdf', '2021-04-07 08:08:00.000000', 1),
(55, 'CSE190283', 'chemistry24', 'C101', 'chemistry', 'chemistry isd edfjehfjef', '3d-illustration-molecule-model-science-260nw-626488493.webp', 'physics-formulas.pdf', '2021-09-07 08:08:00.000000', 0),
(56, '', 'chemistry24', 'C101', 'CSE', 'chemistry isd edfjehfjef', 'wp5615561.jpg', '', '2021-04-24 00:00:00.000000', 0),
(57, '', 'physics2', 'rgersgr', 'chemistry', 'chemistry isd edfjehfjef', 'picture.png', '', '2021-04-24 01:39:43.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_name`, `student_id`, `dept`, `u_name`, `address`, `email`, `password`, `approval`) VALUES
(12, 'Farhana sumi', 'ECE24718', 'Math', 'AIUB', '3/3uttara,dhaka', 'sumi@gmail.com', 'a52eb3f5da9d81b0d010bc83ad95c9dc', 1),
(14, 'Lamia Akter', 'EEE34545', 'EEE', 'AIUB', '34/3chawkbajar,Dhaka', 'lamia@gmail.com', 'c02ed5247c2361f229d150d0f0d5caf7', 1),
(15, 'Emran Hossain', 'CSE12334', 'CSE', 'AIUB', 'a/c Banasree,Dhaka', 'emran@gmail.com', '02c2ec1e3f21e97dd5ac747147a141e0', 1),
(16, 'Farjana', 'ECE2363', 'ECE', 'uits', 'panthapath,Dhaka', 'farjana@gmail.com', '812df2b03649824758333a931d930d5c', 1),
(17, 'Rakib ', 'EEE23429', 'EEE', 'uits', '33/3uttara,dhaka', 'rakib@gmail.com', 'c6a12dd17a3aa185b3d23b77b36e8a80', 1),
(21, 'Sajib dewan', 'EEE67676', 'EEE', 'uits', '34/2Dhanmondi', 'sajib@gmail.com', '1622d00ad661038a57592db7959a1da8', 1),
(22, 'Nabila', 'CSE387276', 'CSE', 'uits', '45/1dhanmondi', 'nabila@gmail.com', '9c8aaad368f10f55699450d759a72501', 1),
(24, 'Alamin', 'CSE190283', 'CSE', 'AIUB', 'r/a panthapath,Dhaka', 'alamin@gmail.com', '2513141d3dae5213d9a78e748a76ee45', 1),
(25, 'Arnab Hasan', 'ECE23637', 'ECE', 'uits', 'a/9 Banasree,Dhaka', 'arnab@gmail.com', '5a2ab1c31e56a86d224d567249461990', 1),
(26, 'Kobir', 'CSE192393', 'CSE', 'uits', '2/3banasree,dhaka', 'kobir@gmail.com', '75708129c87db59c25e31243c2d01139', 1),
(27, 'limon', 'EEE24465', 'EEE', 'uits', '33/3uttara,dhaka', 'limon@gmail.com', 'df80f33867bde01b50824cf77c9ab592', 1),
(28, 'Motaleb', 'bba', 'BBA', 'uits', '33/3uttara,dhaka', 'motaleb@gmail.com', '5cf50507699392d7c153f5953af0f0a0', 1),
(29, 'Mahin', 'BBA1232123', 'BBA', 'uits', '33/3uttara,dhaka', 'mahin@gmail.com', '8254691054c7657c5ac92a20eafbb6f6', 1),
(31, 'Sajib dewan', 'EEE67676f5', 'science', 'uits', '33/3uttara,dhaka', 'sajib2@gmail.com', '1622d00ad661038a57592db7959a1da8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_answer`
--

CREATE TABLE `students_answer` (
  `answer_id` int(10) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `submitted_at` datetime NOT NULL,
  `question_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_answer`
--

INSERT INTO `students_answer` (`answer_id`, `student_id`, `file_name`, `submitted_at`, `question_id`) VALUES
(37, 'bba', 'Report on Daraz.pdf', '2021-08-19 02:13:47', 2),
(38, 'bba', 'market analysis.docx', '2021-08-19 02:45:54', 9),
(39, 'bba', 'include.docx', '2021-08-19 06:57:23', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students_answer`
--
ALTER TABLE `students_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `n_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `students_answer`
--
ALTER TABLE `students_answer`
  MODIFY `answer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
