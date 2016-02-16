-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 08:57 am
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fitnessDiary`
--
CREATE DATABASE IF NOT EXISTS `fitnessDiary` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fitnessDiary`;

-- --------------------------------------------------------

--
-- Table structure for table `smvc_environment`
--

DROP TABLE IF EXISTS `smvc_environment`;
CREATE TABLE `smvc_environment` (
  `environment_id` int(11) NOT NULL,
  `environment_variable_name` varchar(255) NOT NULL,
  `environment_value` varchar(80) NOT NULL,
  `environment_note` text NOT NULL,
  `environment_default` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smvc_environment`
--

INSERT INTO `smvc_environment` (`environment_id`, `environment_variable_name`, `environment_value`, `environment_note`, `environment_default`) VALUES
(1, 'TEMPlate', 'default', '', 'default'),
(2, 'DATEFORMAT_FROM_MYSQL', '%d/%m/%Y', 'Format date in a MYSQL query into user friendly format', '%d/%m/%Y'),
(3, 'DATEFORMAT_PHP_UKDATE', 'Y-m-d', '', 'Y-m-d'),
(4, 'TITLE TAG', 'Fit Diary', '', 'Fit Diary'),
(5, 'SITE_NAME', 'Fit Diary', '', 'Fit Diary'),
(6, 'mailchimp_apikey', 'a6db84dc204d4720c0c450a0bbac5b4f', '', 'a6db84dc204d4720c0c450a0bbac5b4f'),
(7, 'site_email_address', '', 'Email address for site generated sent emails. Not the ''webmaster'' address', '');

-- --------------------------------------------------------

--
-- Table structure for table `smvc_login_attempts`
--

DROP TABLE IF EXISTS `smvc_login_attempts`;
CREATE TABLE `smvc_login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `smvc_users`
--

DROP TABLE IF EXISTS `smvc_users`;
CREATE TABLE `smvc_users` (
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
-- Dumping data for table `smvc_users`
--

INSERT INTO `smvc_users` (`user_id`, `first_name`, `last_name`, `user_type`, `username`, `email`, `phone`, `password`, `salt`, `active`, `raw_password`, `lastActivity`) VALUES
(1, 'dave', 'clare', 0, 'dave@dave.com', 'mr.d.clare@gmail.com', '07949766033', '7827d2ceda37d666f6fbc35098799bda81860adca329b004b540b5782b5889d631706213daf8384455afa89097dd5c13e9ee422a04b537a4e13b62e7b1370fab', '624dd9145add45b664510fe89f35cdaf6d4ff316469f66b61b2949a5022761f98759fb89e72253cebce57c94539f38b29a2e94b0351847ef7d0ddc6f6407238a', 1, '', '2016-02-08 13:57:16'),
(4, 'donna', 'campbell', 0, 'qwer@g.com', 'qwer@g.com', '223232', '3cb29645f047e91bdff603df5ed630b37d79a9f84aa483e1d3157e4d8f550fd230d49ff32be28b884bed6236f8299802a71e9297b162bfa6d1ddaa4b55324d74', 'a60371f209dc0c7b15a96e3abf0094d447376fd9f4458d5dc928816e1223f026536a5a1faea9eae4c822dc8bb9267836cad6562f7930fa45663cf231f178ccbd', 0, '', '2016-01-19 09:20:37'),
(5, 'steve', 'segal', 0, 'qwer', 'qwer', '', '2c9e40df98f5b457a9a14d2a003cc17db291bb7850cb23fe9df723989106912d984f0994e92097a3ddbc48527f6bda3e22d6435f5e8d87694bee8988547c73af', '2560686cd65d4f0c7c939fcdd1145525cf043d587f32fb71a71af00f68f057f03c2b1dc8ddab09731269bcd857ceadf56c793cdb7465bc72c7889b4005ed882c', 0, '', '2016-01-19 09:20:37'),
(12, 'tony', 'tony', 0, 'tony', 'tony@tony.com', '', '07b9c39e39a8e1a813ad406f7d2e91dfd52646f7e869ac28d8c318a4b4f046b7fb3a26b901ec71fe6c4e6d1a52bcf9af34b4d337a507c5eb13a8090e88d5aa8f', '2124e5c0708e86e2ce4bf5d2d767f900924b57f76c98b2ddc90f9b673cdb10c57c33cac8a3e2677f30d34e9438907c40c558ba3c82f01c6fc9197f3b1d0bceb2', 1, 'tony', '2016-02-16 07:52:57'),
(13, 'donald', 'trump', 0, 'donald', 'donald@trump.com', '', '4f1148fb4c8353314d8c00e23ef5f1df155b32d055cff7072b8d46ac4b1ce5b208f562059a70fc33b006ac8731ddb3c34bea47c3291b3a9c2215aba60a78a743', '7004b9242d946c4f763396e22615e49151f1ef3ce544ed0be8579dd4968b87396a30e32786593fbb06e404d6d467da4556c549984c9692c4c140b46aa26d6b99', 1, 'donald', '2016-01-19 09:20:37'),
(14, 'terry', 'wogan', 0, 'terry', 'terry', '', '11d58db3f438a92ae3d7fda81e7c2c0f7d4a8390ceeac3eab11186213edba0c49fc8ea194af724f1276b636e44fb560c76c1b8625d16c735dabcb7b8e8819e0e', '86a26a5d6aa2c071c2447efdb88c5b0eed1097bb26fc6fc07e1cb29f4fad29d7d39f9b3838c3f1037a4606fd5185486b8c54e25ad832a8fe2849fa2fb6261a88', 1, 'terry', '2016-01-20 09:56:02'),
(15, 'aaa', 'bbb', 0, 'qeqweq', 'qweqwe', 'qweqwe', 'eqeqw', 'qqweqwe', 0, '', '2016-02-03 11:56:11'),
(16, 'john', 'wayne', 0, 'john', 'john@wayne.com', '1234', '13c3450d86627f7f4288187ad6ed34ded98c6de3ac82cc3c8333fd635500e5c2d007b9b2e3c18db49dff8fb07e632d26d2a8067e65d78fe03335e571981ead9b', '98b4e8d79573c1b31316e46002faa5ae5712a777502865ea86192115c5cbe04cde10c7c46b5b7813bff60159aaa5ddc4751bc2ef0d44d05e8e127fddd45118a9', 1, '', '2016-02-03 12:06:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smvc_environment`
--
ALTER TABLE `smvc_environment`
  ADD PRIMARY KEY (`environment_id`),
  ADD UNIQUE KEY `setting_value` (`environment_variable_name`,`environment_value`);

--
-- Indexes for table `smvc_users`
--
ALTER TABLE `smvc_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smvc_environment`
--
ALTER TABLE `smvc_environment`
  MODIFY `environment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `smvc_users`
--
ALTER TABLE `smvc_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;