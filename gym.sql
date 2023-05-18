-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 18, 2023 at 09:12 PM
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
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `cardio` tinyint(1) NOT NULL,
  `jacuzzi` tinyint(1) NOT NULL,
  `recovery` tinyint(1) NOT NULL,
  `machines` tinyint(1) NOT NULL,
  `weights` tinyint(1) NOT NULL,
  `onetoone` tinyint(1) NOT NULL,
  `nutrition` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

CREATE TABLE `trainee` (
  `id` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `gender` bit(1) NOT NULL,
  `subscribed` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainee`
--

INSERT INTO `trainee` (`id`, `email`, `pw`, `first_name`, `last_name`, `phone_number`, `gender`, `subscribed`, `age`, `birth_date`) VALUES
(18, 'amro.alaa2003@gmail.com', '$2y$10$95HDnxqbR4v9ZopOw8Z5SOVxGfponK0wn5vXemqQy9QjpYFw6gxa2', 'amr', 'alaa', '01016519947', b'1', 0, 20, '2023-05-22'),
(19, 'emad2@gmail.com', '$2y$10$kXP2kYMhg/NjwlTCsgetK.4JVO7C2xQHuAFPECgQQNIrit6R/mL.a', '3omda', '3omda', '01016519944', b'1', 0, 20, '2023-05-01'),
(20, 'moatasemno20@gmail.com', '$2y$10$a4EDceIAOLilhFKoLKIgY.AwQ4CSaTXIGKIx46riYUD8f4Hw.ul.u', 'Moatasem', 'Mohamed', '01110090244', b'1', 0, 20, '2023-05-25'),
(21, 'tayseerbasha@gmail.com', '$2y$10$W8EZV.gTScXzcJH/tCk1xeKxD356KYhTD.dJtBS.CBB/JOedg3T2C', 'Ahmed', 'basha', '01119450425', b'1', 0, 20, '2023-05-12'),
(22, 'karimgad@gmail.com', '$2y$10$2lbdqmm9Ff0p6DB/UznqTuZh/hB2D2DfMrDpKf.nrT9pl0Fs9C5Yy', 'Karim', 'Gad', '01157281010', b'1', 0, 20, '2002-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `trainee_subscription`
--

CREATE TABLE `trainee_subscription` (
  `traineeid` int(11) NOT NULL,
  `subscriptionid` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pw` (`pw`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pw` (`pw`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `trainee_subscription`
--
ALTER TABLE `trainee_subscription`
  ADD KEY `traineeid` (`traineeid`),
  ADD KEY `subscriptionid` (`subscriptionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainee`
--
ALTER TABLE `trainee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trainee_subscription`
--
ALTER TABLE `trainee_subscription`
  ADD CONSTRAINT `trainee_subscription_ibfk_1` FOREIGN KEY (`traineeid`) REFERENCES `trainee` (`id`),
  ADD CONSTRAINT `trainee_subscription_ibfk_2` FOREIGN KEY (`subscriptionid`) REFERENCES `subscription` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
