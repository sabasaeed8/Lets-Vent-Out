-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 12:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsa_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `username`, `answer`) VALUES
(11, 35, 'saba', 'hghjgj');

-- --------------------------------------------------------

--
-- Table structure for table `carecorner`
--

CREATE TABLE `carecorner` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `city` varchar(300) NOT NULL,
  `type` varchar(3000) NOT NULL,
  `ex` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carecorner`
--

INSERT INTO `carecorner` (`id`, `name`, `city`, `type`, `ex`) VALUES
(1, 'Ramzan Malik', 'Bahawalpur, Punjab', 'Trainer, Psychologist, Psychotherapist, Counselor (Child and Adolescent Services)', 3),
(2, 'Ayyaz Mazari\r\n', 'Bahawalpur, Punjab', 'Psychologist, Child Therapist', 8),
(3, 'Malik Shahid Abbas', 'Kahror Pacca, Punjab', 'Psychologist, Social worker', 9),
(4, 'Hafsa Farrukh', 'Faisalabad, Punjab', 'Psychologist\r\n', 7),
(5, 'Shah Hussain\r\n', 'Peshawar, KPK', 'Psychologist, Pychotherapist', 1),
(6, 'Mohsin Ayub  ', 'Lahore, Punjab', 'Clinical Psychologist, Hypnotherapist', 5),
(7, 'Naima Nisar\r\n', 'Lahore, Punjab', 'Psychologist\r\n', 4),
(8, 'Ambreen Waheed\r\n', 'Lahore, Punjab', 'Pychotherapist, Psychologist', 2),
(9, 'Irshad Ali Shar ', 'Karachi, Sindh', 'Psychologist', 11),
(10, 'Zahra Bakht  Msc, PMDCP\r\n', 'Karachi, Sindh', 'Psychologist, Clinical Psychologist', 6),
(11, 'Muryam Nawaz\r\n', 'Rawalpindi, Punjab', 'Psychologist\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Anxiety'),
(2, 'Depression'),
(3, 'Family issues'),
(4, 'Studies'),
(6, 'Relationships'),
(7, 'Self-Confidence'),
(10, 'Failure'),
(12, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `category_id`, `title`, `body`, `created_at`) VALUES
(37, 30, 0, 'What is Depression?', 'Depression is classified as a mood disorder. It may be described as feelings of sadness, loss, or anger that interfere with a person’s everyday activities.', '2021-07-02 14:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `gender` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `full_name`, `email`, `password`, `c_password`, `dob`, `gender`, `token`, `status`) VALUES
(30, 'saba', 'ce805@gmail.com', '$2y$10$FjXrptGx816zjcAAyh.ByuJLtISKjtDI1GZwCVdSbKsLEGBvY8LcC', '$2y$10$frKaxdvF5Ez89ActwJ2m5Ocu/rkeS6Pbr1JPw/8fYbf7yyQ8g.lr2', '2000-01-23', 'Female', 'a7e0aacbbb8aa858a85c5d61428f29', 'active'),
(31, 'alia', 'alia@gmail.com', '$2y$10$RdKA.4.j27kWOBDFDtlxheS5BfEaayIHscvOYLogEsRynzzswRNde', '$2y$10$yt4n6vhwAsOCs5r5xLUBf.An8WD04b1tOgkMzQCTkA//p57NvTxoK', '2021-07-30', 'Female', '5ebd70359add1cc17e7d6b74f42b1e', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `videogallery`
--

CREATE TABLE `videogallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vid1` varchar(10000) NOT NULL,
  `vid2` varchar(10000) NOT NULL,
  `vid3` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videogallery`
--

INSERT INTO `videogallery` (`id`, `name`, `vid1`, `vid2`, `vid3`) VALUES
(1, 'Anxiety', 'https://www.youtube.com/embed/WWloIAQpMcQ', 'https://www.youtube.com/embed/Du2l-wkfaVw', 'https://www.youtube.com/embed/IiSQQ5XV__w'),
(2, 'Depression', 'https://www.youtube.com/embed/AvjMa9kqlCM', 'https://www.youtube.com/embed/yOx0Q273AsQ', 'https://www.youtube.com/embed/QT2KNvzovHM'),
(3, 'Family issues', 'https://www.youtube.com/embed/NIpYmJzFRZQ', 'https://www.youtube.com/embed/kCuhKMeGpYs', 'https://www.youtube.com/embed/sKns1kTSUrE'),
(4, 'Studies', 'https://www.youtube.com/embed/C2aigfiAFDA', 'https://www.youtube.com/embed/c2PI8fB2VKk', 'https://www.youtube.com/embed/N5R-RX4fbbk'),
(6, 'Relationships', 'https://www.youtube.com/embed/xS9XqOhBCwQ', 'https://www.youtube.com/embed/eCLk-2iArYc', 'https://www.youtube.com/embed/0uLLuodEFhE'),
(7, 'Self-Confidence', 'https://www.youtube.com/embed/7XCHS2Tx_z0', 'https://www.youtube.com/embed/3gqQevdM7xM', 'https://www.youtube.com/embed/hLtxKNgBzUg'),
(10, 'Failure', 'https://www.youtube.com/embed/Df3ysUkdB38', 'https://www.youtube.com/embed/dww3Oo8ropA', 'https://www.youtube.com/embed/8SN9Kj8SdgE'),
(12, 'Other', 'https://www.youtube.com/embed/N8tjj9wf9VI', 'https://www.youtube.com/embed/90cPXpE8iLs', 'https://www.youtube.com/embed/jVKaRNkW2pg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carecorner`
--
ALTER TABLE `carecorner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videogallery`
--
ALTER TABLE `videogallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carecorner`
--
ALTER TABLE `carecorner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `videogallery`
--
ALTER TABLE `videogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
