-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2016 at 11:43 am
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnessDiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `dac_biometric_types`
--

CREATE TABLE `dac_biometric_types` (
  `biometricType_id` int(11) NOT NULL,
  `biometricType` text NOT NULL,
  `biometricTemplate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dac_biometric_types`
--

INSERT INTO `dac_biometric_types` (`biometricType_id`, `biometricType`, `biometricTemplate`) VALUES
(6, 'BMI', 'A percentage'),
(7, 'BPM', ''),
(8, 'LMI', ''),
(9, 'Sets', ''),
(10, 'Reps', 'Number of reps'),
(11, 'Distance', 'km'),
(12, 'Kg', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `dac_data`
--

CREATE TABLE `dac_data` (
  `data_id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `dataDate` datetime NOT NULL,
  `dataValue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dac_data`
--

INSERT INTO `dac_data` (`data_id`, `master_id`, `dataDate`, `dataValue`) VALUES
(1, 4, '2016-01-10 10:22:57', 12),
(2, 5, '2016-01-10 10:23:06', 23),
(3, 4, '2016-01-10 23:26:59', 34),
(4, 4, '2016-01-10 23:30:35', 44),
(5, 10, '2016-01-11 00:05:38', 34),
(6, 11, '2016-01-11 00:06:32', 2),
(7, 11, '2016-01-11 00:09:47', 4),
(8, 5, '2016-01-11 00:46:59', 33),
(9, 11, '2016-01-11 01:35:04', 100),
(10, 11, '2016-01-11 01:35:09', 23),
(11, 5, '2016-01-11 14:21:04', 34),
(12, 4, '2016-01-12 09:44:21', 45),
(13, 4, '2016-01-12 10:36:27', 100),
(14, 5, '2016-01-12 13:18:41', 78),
(15, 4, '2016-01-12 13:21:03', 124),
(16, 12, '2016-01-12 13:21:59', 10),
(17, 13, '2016-01-12 13:26:51', 20),
(18, 12, '2016-01-12 13:35:44', 23),
(19, 12, '2016-01-12 16:01:25', 34),
(20, 11, '2016-01-12 16:01:33', 45),
(21, 5, '2016-01-12 17:57:18', 0),
(22, 12, '2016-01-13 17:47:54', 35),
(23, 14, '2016-01-16 10:52:54', 2),
(24, 14, '2016-01-18 09:03:06', 45),
(25, 14, '2016-01-18 09:03:24', 100),
(26, 15, '2016-01-18 09:05:33', 2),
(27, 15, '2016-01-18 09:05:41', 40),
(28, 14, '2016-01-19 09:47:09', 102),
(29, 16, '2016-01-25 09:49:47', 0),
(30, 17, '2016-01-25 09:50:15', 1),
(31, 16, '2016-01-25 11:22:06', 49),
(32, 16, '2016-01-25 11:22:10', 50),
(33, 16, '2016-01-25 11:22:15', 51),
(34, 17, '2016-01-25 12:02:25', 3),
(35, 22, '0000-00-00 00:00:00', 33),
(36, 22, '2016-02-08 13:25:24', 33),
(37, 17, '2016-02-08 13:39:58', 23),
(38, 14, '2016-02-08 13:42:12', 54),
(39, 14, '2016-02-08 13:42:12', 54),
(40, 14, '2016-02-08 13:42:18', 54),
(41, 14, '2016-02-08 13:42:18', 54),
(42, 14, '2016-02-08 13:42:52', 120),
(43, 14, '2016-02-08 13:42:52', 120),
(44, 14, '2016-02-08 13:45:18', 120),
(45, 14, '2016-02-08 13:45:18', 120),
(46, 14, '2016-02-08 13:45:26', 123),
(47, 14, '2016-02-08 13:45:26', 123),
(48, 14, '2016-02-08 13:50:06', 125),
(49, 14, '2016-02-08 13:50:06', 125),
(50, 14, '2016-02-08 13:50:33', 126),
(51, 14, '2016-02-08 13:50:33', 126),
(52, 14, '2016-02-08 13:51:27', 127),
(53, 14, '2016-02-08 13:53:26', 11),
(54, 13, '2016-02-08 13:57:39', 78),
(55, 14, '2016-02-08 20:48:36', 160),
(56, 14, '2016-02-08 20:51:50', 170),
(57, 14, '2016-02-08 21:00:47', 191),
(58, 19, '2016-02-09 11:55:40', 1),
(59, 20, '2016-02-09 12:51:49', 1),
(60, 21, '2016-02-09 12:52:07', 1),
(61, 21, '2016-02-09 12:52:15', 200),
(62, 20, '2016-02-09 13:31:24', 34),
(63, 22, '2016-02-09 14:16:01', 100),
(64, 23, '2016-02-09 16:23:31', 40),
(65, 20, '2016-02-09 16:35:49', 0),
(66, 24, '2016-02-09 23:40:58', 1),
(67, 25, '2016-02-10 00:10:32', 157);

-- --------------------------------------------------------

--
-- Table structure for table `dac_environment`
--

CREATE TABLE `dac_environment` (
  `environment_id` int(11) NOT NULL,
  `environment_variable_name` varchar(255) NOT NULL,
  `environment_value` varchar(80) NOT NULL,
  `environment_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dac_environment`
--

INSERT INTO `dac_environment` (`environment_id`, `environment_variable_name`, `environment_value`, `environment_note`) VALUES
(1, 'TEMPlate', 'default', ''),
(2, 'DATEFORMAT_FROM_MYSQL', '%d/%m/%Y', 'Format date in a MYSQL query into user friendly format'),
(3, 'DATEFORMAT_PHP_UKDATE', 'Y-m-d', ''),
(4, 'TAG_TITLE', 'Fit Diary', ''),
(5, 'SITE_NAME', 'Fit Diary', '');

-- --------------------------------------------------------

--
-- Table structure for table `dac_event`
--

CREATE TABLE `dac_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_user_id` int(10) UNSIGNED NOT NULL,
  `start_at` datetime NOT NULL,
  `finish_at` datetime NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dac_login_attempts`
--

CREATE TABLE `dac_login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dac_master`
--

CREATE TABLE `dac_master` (
  `master_id` int(11) NOT NULL,
  `user_id` tinyint(8) NOT NULL,
  `name` text NOT NULL,
  `metricGrouping` int(11) NOT NULL DEFAULT '0',
  `goalDate` datetime DEFAULT NULL,
  `goalValue` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'active0, paused1, complete2, hide3',
  `biometricType_id` int(11) NOT NULL,
  `infoLink` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dac_master`
--

INSERT INTO `dac_master` (`master_id`, `user_id`, `name`, `metricGrouping`, `goalDate`, `goalValue`, `status`, `biometricType_id`, `infoLink`) VALUES
(4, 1, 'bench press', 0, '2016-01-10 10:22:57', 122, 0, 6, ''),
(5, 1, 'star jumps', 0, '2016-01-10 10:23:06', 45, 0, 7, ''),
(11, 1, 'burpees', 0, '2016-01-11 00:06:32', 34, 0, 9, 'https://youtu.be/3uFcOWz9qN8'),
(12, 1, 'pushups', 0, '2016-01-12 13:21:59', 100, 0, 12, 'https://youtu.be/Eh00_rniF8E'),
(13, 1, 'breath holding', 0, '2016-01-12 13:26:51', 60, 0, 8, ''),
(14, 12, 'crab walk', 0, '2016-01-16 10:52:54', 2000, 0, 11, ''),
(15, 12, 'burpees', 0, '2016-01-18 09:05:33', 30, 0, 12, ''),
(16, 12, 'hot hands - in 1 minute', 0, '2016-01-25 09:49:47', 50, 0, 11, ''),
(17, 12, 'pull ups ( bicep )', 0, '2016-01-25 09:50:15', 12, 0, 12, ''),
(19, 0, ':name', 0, '0000-00-00 00:00:00', 0, 0, 0, ':infoLink'),
(20, 12, 'qwert', 0, '2016-01-01 00:00:00', 300, 0, 10, 'qwerty'),
(21, 12, 'qwert', 0, '2016-01-01 00:00:00', 300, 0, 12, 'ss'),
(22, 12, 'Squats', 0, '2016-01-01 00:00:00', 160, 0, 12, 'http://www.exrx.net/WeightExercises/GluteusMaximus/BBSquat.html'),
(23, 12, 'Low row 5 sets of 5 reps', 0, '2016-01-01 00:00:00', 80, 0, 12, 'http://www.exrx.net/WeightExercises/BackGeneral/LVSeatedLowRow.html'),
(24, 12, 'lunges', 0, '2016-01-01 00:00:00', 200, 0, 10, ''),
(25, 12, 'moonwalk', 0, '2016-01-01 00:00:00', 3333, 0, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `dac_users`
--

CREATE TABLE `dac_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone` tinytext COLLATE utf8_bin NOT NULL,
  `password` char(128) COLLATE utf8_bin NOT NULL,
  `salt` char(128) COLLATE utf8_bin NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `raw_password` text COLLATE utf8_bin NOT NULL,
  `lastActivity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dac_users`
--

INSERT INTO `dac_users` (`user_id`, `first_name`, `last_name`, `user_type`, `username`, `email`, `phone`, `password`, `salt`, `active`, `raw_password`, `lastActivity`) VALUES
(1, 'dave', 'clare', 0, 'dave@dave.com', 'mr.d.clare@gmail.com', '07949766033', '7827d2ceda37d666f6fbc35098799bda81860adca329b004b540b5782b5889d631706213daf8384455afa89097dd5c13e9ee422a04b537a4e13b62e7b1370fab', '624dd9145add45b664510fe89f35cdaf6d4ff316469f66b61b2949a5022761f98759fb89e72253cebce57c94539f38b29a2e94b0351847ef7d0ddc6f6407238a', 1, '', '2016-02-08 13:57:16'),
(4, 'donna', 'campbell', 0, 'qwer@g.com', 'qwer@g.com', '223232', '3cb29645f047e91bdff603df5ed630b37d79a9f84aa483e1d3157e4d8f550fd230d49ff32be28b884bed6236f8299802a71e9297b162bfa6d1ddaa4b55324d74', 'a60371f209dc0c7b15a96e3abf0094d447376fd9f4458d5dc928816e1223f026536a5a1faea9eae4c822dc8bb9267836cad6562f7930fa45663cf231f178ccbd', 0, '', '2016-01-19 09:20:37'),
(5, 'steve', 'segal', 0, 'qwer', 'qwer', '', '2c9e40df98f5b457a9a14d2a003cc17db291bb7850cb23fe9df723989106912d984f0994e92097a3ddbc48527f6bda3e22d6435f5e8d87694bee8988547c73af', '2560686cd65d4f0c7c939fcdd1145525cf043d587f32fb71a71af00f68f057f03c2b1dc8ddab09731269bcd857ceadf56c793cdb7465bc72c7889b4005ed882c', 0, '', '2016-01-19 09:20:37'),
(12, 'tony', 'tony', 0, 'tony', 'tony@tony.com', '', '07b9c39e39a8e1a813ad406f7d2e91dfd52646f7e869ac28d8c318a4b4f046b7fb3a26b901ec71fe6c4e6d1a52bcf9af34b4d337a507c5eb13a8090e88d5aa8f', '2124e5c0708e86e2ce4bf5d2d767f900924b57f76c98b2ddc90f9b673cdb10c57c33cac8a3e2677f30d34e9438907c40c558ba3c82f01c6fc9197f3b1d0bceb2', 1, 'tony', '2016-02-10 10:16:08'),
(13, 'donald', 'trump', 0, 'donald', 'donald@trump.com', '', '4f1148fb4c8353314d8c00e23ef5f1df155b32d055cff7072b8d46ac4b1ce5b208f562059a70fc33b006ac8731ddb3c34bea47c3291b3a9c2215aba60a78a743', '7004b9242d946c4f763396e22615e49151f1ef3ce544ed0be8579dd4968b87396a30e32786593fbb06e404d6d467da4556c549984c9692c4c140b46aa26d6b99', 1, 'donald', '2016-01-19 09:20:37'),
(14, 'terry', 'wogan', 0, 'terry', 'terry', '', '11d58db3f438a92ae3d7fda81e7c2c0f7d4a8390ceeac3eab11186213edba0c49fc8ea194af724f1276b636e44fb560c76c1b8625d16c735dabcb7b8e8819e0e', '86a26a5d6aa2c071c2447efdb88c5b0eed1097bb26fc6fc07e1cb29f4fad29d7d39f9b3838c3f1037a4606fd5185486b8c54e25ad832a8fe2849fa2fb6261a88', 1, 'terry', '2016-01-20 09:56:02'),
(15, 'aaa', 'bbb', 0, 'qeqweq', 'qweqwe', 'qweqwe', 'eqeqw', 'qqweqwe', 0, '', '2016-02-03 11:56:11'),
(16, 'john', 'wayne', 0, 'john', 'john@wayne.com', '1234', '13c3450d86627f7f4288187ad6ed34ded98c6de3ac82cc3c8333fd635500e5c2d007b9b2e3c18db49dff8fb07e632d26d2a8067e65d78fe03335e571981ead9b', '98b4e8d79573c1b31316e46002faa5ae5712a777502865ea86192115c5cbe04cde10c7c46b5b7813bff60159aaa5ddc4751bc2ef0d44d05e8e127fddd45118a9', 1, '', '2016-02-03 12:06:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dac_biometric_types`
--
ALTER TABLE `dac_biometric_types`
  ADD PRIMARY KEY (`biometricType_id`);

--
-- Indexes for table `dac_data`
--
ALTER TABLE `dac_data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `dac_environment`
--
ALTER TABLE `dac_environment`
  ADD PRIMARY KEY (`environment_id`),
  ADD UNIQUE KEY `setting_value` (`environment_variable_name`,`environment_value`);

--
-- Indexes for table `dac_event`
--
ALTER TABLE `dac_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `start_at` (`start_at`),
  ADD KEY `finish_at` (`finish_at`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `dac_master`
--
ALTER TABLE `dac_master`
  ADD PRIMARY KEY (`master_id`);

--
-- Indexes for table `dac_users`
--
ALTER TABLE `dac_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dac_biometric_types`
--
ALTER TABLE `dac_biometric_types`
  MODIFY `biometricType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dac_data`
--
ALTER TABLE `dac_data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `dac_environment`
--
ALTER TABLE `dac_environment`
  MODIFY `environment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dac_event`
--
ALTER TABLE `dac_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dac_master`
--
ALTER TABLE `dac_master`
  MODIFY `master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `dac_users`
--
ALTER TABLE `dac_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
