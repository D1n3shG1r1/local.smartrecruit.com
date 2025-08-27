-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2025 at 03:06 PM
-- Server version: 8.0.43-0ubuntu0.22.04.1
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartrecruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_general_ci,
  `expiration` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidateResumeData`
--

CREATE TABLE `candidateResumeData` (
  `id` bigint NOT NULL,
  `candidateId` bigint NOT NULL COMMENT 'id from customers table',
  `profSummary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `workExperience` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skills` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `languages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Proficiency(1-Beginner,2-Intermediate,3-Advanced)',
  `degree` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `certifications` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `submit` int NOT NULL DEFAULT '0' COMMENT '0 means draft, 1 means submit',
  `videolink` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'interview video link',
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='candidate acedmic professional skills';

--
-- Dumping data for table `candidateResumeData`
--

INSERT INTO `candidateResumeData` (`id`, `candidateId`, `profSummary`, `workExperience`, `skills`, `languages`, `degree`, `certifications`, `submit`, `videolink`, `createdDateTime`, `updatedDateTime`) VALUES
(1748701699633070, 1748701699633070, 'Work as Sr. Software Developer', '[{\"jobtitle\":\"Sr. php developer\",\"companyname\":\"krecent\",\"startdate\":\"2021-05-01\",\"enddate\":\"2023-01-01\",\"responsibilities\":\"Team, client & project handling\",\"achievements\":\"Award of best Team Leader\"}]', '[\"IT Support\",\"Cybersecurity\",\"Cloud Computing\",\"UI\\/UX Design\",\"Graphic Design\",\"Software Development\"]', '[{\"language\":\"Hindi\",\"proficiency\":\"1\"}]', '[{\"degree\":\"MCA\",\"schoolinstitution\":\"Punjab University\",\"startdate\":\"2011-02-01\",\"enddate\":\"2013-01-01\",\"fieldofstudy\":\"Masters in computer applications\"},{\"degree\":\"MCA2\",\"schoolinstitution\":\"Punjab University2\",\"startdate\":\"2025-08-21\",\"enddate\":\"2025-08-29\",\"fieldofstudy\":\"Masters in computer applications2\"}]', '[{\"title\":\"c# .dont\",\"organization\":\"bcs infotech\",\"date\":\"2010-01-01\"}]', 1, 'https://files.cliptakes.com/smartrecruit/49e834f5-c852-440a-9670-ff13129429531.mp4', '2025-06-24 07:02:58', '2025-08-26 14:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `changePasswordRequest`
--

CREATE TABLE `changePasswordRequest` (
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createdDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `changePasswordRequest`
--

INSERT INTO `changePasswordRequest` (`token`, `createdDateTime`) VALUES
('0b32a0f581e86078dba60ebf9ea6b42c', '2025-08-06 05:54:19'),
('fc395865f22201f1f8e3037c5278c98f9ee15c4c0874e42d8af1cd527a430f45', '2025-08-07 11:22:15'),
('fc395865f22201f1f8e3037c5278c98f9ee15c4c0874e42d8af1cd527a430f45', '2025-08-07 11:25:03'),
('fc395865f22201f1f8e3037c5278c98f9ee15c4c0874e42d8af1cd527a430f45', '2025-08-07 11:37:05'),
('fc395865f22201f1f8e3037c5278c98f9ee15c4c0874e42d8af1cd527a430f45', '2025-08-07 13:11:28'),
('fc395865f22201f1f8e3037c5278c98f9ee15c4c0874e42d8af1cd527a430f45', '2025-08-07 13:15:21'),
('fc395865f22201f1f8e3037c5278c98f9ee15c4c0874e42d8af1cd527a430f45', '2025-08-07 13:19:25'),
('fc395865f22201f1f8e3037c5278c98f9ee15c4c0874e42d8af1cd527a430f45', '2025-08-07 13:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint NOT NULL,
  `referral_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'unique alphanumeric string for multi purpose',
  `companyname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `companysize` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` int NOT NULL DEFAULT '0' COMMENT '0-none, 1-male, 2-female, 3-other',
  `dob` date DEFAULT NULL COMMENT 'date of birth',
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'verified/active/inactive by admin',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'active inactive by user',
  `role` tinyint(1) NOT NULL COMMENT '1 candidate, 2 company/employer, 3 admin',
  `address_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `address_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zipcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profilephoto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `createdDateTime` datetime NOT NULL,
  `updatedDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `referral_code`, `companyname`, `position`, `industry`, `companysize`, `website`, `fname`, `lname`, `gender`, `dob`, `email`, `password`, `verified`, `active`, `role`, `address_1`, `address_2`, `city`, `state`, `country`, `zipcode`, `phone`, `profilephoto`, `createdDateTime`, `updatedDateTime`) VALUES
(174870193925313, '123pqr', 'xyz company', 'hr', 'Technology', '11-50', 'mywebsite.com', 'john deo', 'john deo', 0, NULL, 'johndeo@example.com', 'e20f517179e9cd52ae29dae43c121b95', 0, 0, 2, '123', '456', 'mohali', NULL, 'india', '', '1111111111', NULL, '2025-08-11 14:32:19', '2025-08-11 14:32:19'),
(1748701699633070, '456xyz', NULL, NULL, NULL, NULL, NULL, 'dinesh', 'kumar', 1, '1985-12-18', 'dinesh@example.com', 'e20f517179e9cd52ae29dae43c121b95', 1, 1, 1, '123', '456', 'chandigarh', NULL, 'india', '160011', '1234567890', NULL, '2025-08-13 14:28:19', '2025-08-11 16:48:17'),
(1755778321453165, 'fbUuVQ', NULL, NULL, NULL, NULL, NULL, 'christian', 'nmah', 0, NULL, 'zubbycom@gmail.com', 'e20f517179e9cd52ae29dae43c121b95', 0, 0, 1, '', '', '', '', '', '', '', '', '2025-08-21 12:12:01', '2025-08-21 12:12:01'),
(1755778421704112, 'JGV6Mb', NULL, NULL, NULL, NULL, NULL, 'christian', 'nmah', 0, NULL, 'zubbycom@yahoo.com', 'e20f517179e9cd52ae29dae43c121b95', 0, 0, 1, '', '', '', '', '', '', '', '', '2025-08-21 12:13:41', '2025-08-21 12:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `featuredcandidate`
--

CREATE TABLE `featuredcandidate` (
  `userId` bigint NOT NULL COMMENT 'id from customers table',
  `active` tinyint(1) NOT NULL,
  `starton` date NOT NULL,
  `expireon` date NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featuredcandidate`
--

INSERT INTO `featuredcandidate` (`userId`, `active`, `starton`, `expireon`, `expired`, `createDateTime`, `updateDateTime`) VALUES
(1748701699633070, 1, '2025-08-26', '2025-09-26', 0, '2025-08-09 13:21:09', '2025-08-26 14:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `receiver` bigint NOT NULL,
  `sender` bigint NOT NULL,
  `dateTime` datetime NOT NULL,
  `isRead` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reference` bigint NOT NULL COMMENT 'regarding candidate, package or etc..'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `receiver`, `sender`, `dateTime`, `isRead`, `type`, `reference`) VALUES
(175389417280299, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 16:49:32', 1, 'recruiter', 174870193925313),
(175467755669251, 'Your profile has caught a recruiter’s attention.', 1748701699633070, 174870193925313, '2025-08-08 18:25:56', 0, 'candidate', 1748701699633070),
(175480397622712, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 05:32:56', 1, 'recruiter', 174870193925313),
(175480397843294, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 05:32:58', 1, 'recruiter', 174870193925313),
(175480405856726, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 05:34:18', 1, 'recruiter', 174870193925313),
(1753709727632846, 'Your profile has caught a recruiter’s attention.', 1748701699633070, 174870193925313, '2025-07-28 13:35:27', 0, 'candidate', 1748701699633070),
(1753709727632847, 'A recruiter has expressed strong interest in your profile.', 1748701699633070, 1748701699633070, '2025-07-29 17:21:42', 1, 'candidate', 1748701699633070),
(1753892576131413, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 16:22:56', 1, 'recruiter', 174870193925313),
(1753893736741143, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 16:42:16', 1, 'recruiter', 174870193925313),
(1753893868941271, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 16:44:28', 1, 'recruiter', 174870193925313),
(1753894087362658, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 16:48:07', 1, 'recruiter', 174870193925313),
(1753894844209651, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 17:00:44', 1, 'recruiter', 174870193925313),
(1753895017985907, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 17:03:37', 1, 'recruiter', 174870193925313),
(1753895229648522, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-07-30 17:07:09', 1, 'recruiter', 174870193925313),
(1754659167900926, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-08 13:19:27', 1, 'recruiter', 174870193925313),
(1754799356473342, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 04:15:56', 1, 'recruiter', 174870193925313),
(1754799394134307, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 04:16:34', 1, 'recruiter', 174870193925313),
(1754800316285209, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 04:31:56', 1, 'recruiter', 174870193925313),
(1754800341300921, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 04:32:21', 1, 'recruiter', 174870193925313),
(1754801211261219, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 04:46:51', 1, 'recruiter', 174870193925313),
(1754801237276918, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 04:47:17', 1, 'recruiter', 174870193925313),
(1754801627251770, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 04:53:47', 1, 'recruiter', 174870193925313),
(1754804056721410, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 05:34:16', 1, 'recruiter', 174870193925313),
(1754804673177855, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-10 05:44:33', 1, 'recruiter', 174870193925313),
(1755004957481316, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-12 13:22:37', 1, 'recruiter', 174870193925313),
(1755776548460318, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 11:42:28', 1, 'recruiter', 174870193925313),
(1755776590494707, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 11:43:10', 1, 'recruiter', 174870193925313),
(1755776905610546, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 11:48:25', 1, 'recruiter', 174870193925313),
(1755778731687883, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 12:18:51', 0, 'recruiter', 174870193925313),
(1755778802597652, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 12:20:02', 0, 'recruiter', 174870193925313),
(1755778996111483, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 12:23:16', 0, 'recruiter', 174870193925313),
(1755779333137503, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 12:28:53', 0, 'recruiter', 174870193925313),
(1755779422677543, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 12:30:22', 0, 'recruiter', 174870193925313),
(1755779429263168, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-21 12:30:29', 0, 'recruiter', 174870193925313),
(1756219181647192, 'The profile of Dinesh Kumar was recently updated. Please review the changes to stay informed.', 174870193925313, 1748701699633070, '2025-08-26 14:39:41', 0, 'recruiter', 174870193925313);

-- --------------------------------------------------------

--
-- Table structure for table `packagepayments`
--

CREATE TABLE `packagepayments` (
  `id` bigint NOT NULL,
  `gatewayTransId` bigint DEFAULT NULL,
  `transactionId` bigint DEFAULT NULL,
  `userId` bigint DEFAULT NULL COMMENT 'id column of customers table',
  `package` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` bigint DEFAULT NULL COMMENT 'amount in kobo, 100 kobo = 1 Naira (NGN)',
  `currency` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `gatewayResponse` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `createDateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packagepayments`
--

INSERT INTO `packagepayments` (`id`, `gatewayTransId`, `transactionId`, `userId`, `package`, `amount`, `currency`, `status`, `payment`, `paid_at`, `gatewayResponse`, `createDateTime`, `updateDateTime`) VALUES
(1752735087196207, 5153924120, 1752735087196207, 174870193925313, 'payasyougo', 700000, 'NGN', 'success', 'y', '2025-07-17 06:51:35', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":5153924120,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1752735087196207\",\"receipt_number\":null,\"amount\":700000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-07-17T06:51:35.000Z\",\"created_at\":\"2025-07-17T06:51:27.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.30.206\",\"metadata\":{\"userId\":\"174870193925313\",\"transactionId\":\"1752735087196207\",\"package\":\"payasyougo\",\"cancel_action\":\"http:\\/\\/local.smartrecruit.com\\/recruiter\\/payment\\/cancel\",\"referrer\":\"http:\\/\\/local.smartrecruit.com\\/\"},\"log\":{\"start_time\":1752735090,\"time_spent\":5,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":4},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":5}]},\"fees\":20500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_6kxi9pjqxd\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_P8Pr7dPc79R5bB1jbw2u\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":292724074,\"first_name\":null,\"last_name\":null,\"email\":\"johndeo@example.com\",\"customer_code\":\"CUS_pb9kffellonsi4u\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-07-17T06:51:35.000Z\",\"createdAt\":\"2025-07-17T06:51:27.000Z\",\"requested_amount\":700000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-07-17T06:51:27.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-08-11 06:51:37', '2025-07-17 06:51:37'),
(1753709808981151, 5186940399, 1753709808981151, 174870193925313, 'basicaccess', 3000000, 'NGN', 'success', 'y', '2025-07-28 13:37:01', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":5186940399,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1753709808981151\",\"receipt_number\":null,\"amount\":3000000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-07-28T13:37:01.000Z\",\"created_at\":\"2025-07-28T13:36:49.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.25.212\",\"metadata\":{\"userId\":\"174870193925313\",\"transactionId\":\"1753709808981151\",\"package\":\"basicaccess\",\"cancel_action\":\"http:\\/\\/local.smartrecruit.com\\/recruiter\\/payment\\/cancel\",\"referrer\":\"http:\\/\\/local.smartrecruit.com\\/\"},\"log\":{\"start_time\":1753709815,\"time_spent\":6,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":5},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":6}]},\"fees\":55000,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_ml87qusdfz\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_P8Pr7dPc79R5bB1jbw2u\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":292724074,\"first_name\":null,\"last_name\":null,\"email\":\"johndeo@example.com\",\"customer_code\":\"CUS_pb9kffellonsi4u\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-07-28T13:37:01.000Z\",\"createdAt\":\"2025-07-28T13:36:49.000Z\",\"requested_amount\":3000000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-07-28T13:36:49.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-08-15 13:37:03', '2025-07-28 13:37:03'),
(1754586991644417, 5217836588, 1754586991644417, 174870193925313, 'payasyougo', 700000, 'NGN', 'success', 'y', '2025-08-07 17:17:00', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":5217836588,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1754586991644417\",\"receipt_number\":null,\"amount\":700000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-08-07T17:17:00.000Z\",\"created_at\":\"2025-08-07T17:16:32.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.27.194\",\"metadata\":{\"userId\":\"174870193925313\",\"transactionId\":\"1754586991644417\",\"package\":\"payasyougo\",\"cancel_action\":\"http:\\/\\/local.smartrecruit.com\\/recruiter\\/payment\\/cancel\",\"referrer\":\"http:\\/\\/local.smartrecruit.com\\/\"},\"log\":{\"start_time\":1754587016,\"time_spent\":5,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":4},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":5}]},\"fees\":20500,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_g87s6bgww4\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_P8Pr7dPc79R5bB1jbw2u\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":292724074,\"first_name\":null,\"last_name\":null,\"email\":\"johndeo@example.com\",\"customer_code\":\"CUS_pb9kffellonsi4u\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-08-07T17:17:00.000Z\",\"createdAt\":\"2025-08-07T17:16:32.000Z\",\"requested_amount\":700000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-08-07T17:16:32.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-08-12 17:17:03', '2025-08-07 17:17:03'),
(1754745655403196, 5223230475, 1754745655403196, 1748701699633070, 'featureprofile', 200000, 'NGN', 'success', 'y', '2025-08-09 13:21:06', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":5223230475,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1754745655403196\",\"receipt_number\":null,\"amount\":200000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-08-09T13:21:06.000Z\",\"created_at\":\"2025-08-09T13:20:56.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.28.125\",\"metadata\":{\"userId\":\"1748701699633070\",\"transactionId\":\"1754745655403196\",\"package\":\"featureprofile\",\"cancel_action\":\"http:\\/\\/local.smartrecruit.com\\/candidate\\/payment\\/cancel\"},\"log\":{\"start_time\":1754745660,\"time_spent\":6,\"attempts\":1,\"errors\":0,\"success\":false,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":6}]},\"fees\":3000,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_8au22l1d5m\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_P8Pr7dPc79R5bB1jbw2u\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":255869633,\"first_name\":null,\"last_name\":null,\"email\":\"dinesh@example.com\",\"customer_code\":\"CUS_nyixtfc4p58pfip\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-08-09T13:21:06.000Z\",\"createdAt\":\"2025-08-09T13:20:56.000Z\",\"requested_amount\":200000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-08-09T13:20:56.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-08-11 13:21:09', '2025-08-09 13:21:09'),
(1756218012144748, 5276882413, 1756218012144748, 1748701699633070, 'featureprofile', 200000, 'NGN', 'success', 'y', '2025-08-26 14:20:53', '{\"status\":true,\"message\":\"Verification successful\",\"data\":{\"id\":5276882413,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"1756218012144748\",\"receipt_number\":null,\"amount\":200000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2025-08-26T14:20:53.000Z\",\"created_at\":\"2025-08-26T14:20:13.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"122.173.24.28\",\"metadata\":{\"userId\":\"1748701699633070\",\"transactionId\":\"1756218012144748\",\"package\":\"featureprofile\",\"cancel_action\":\"http:\\/\\/local.smartrecruit.com\\/candidate\\/payment\\/cancel\",\"referrer\":\"http:\\/\\/local.smartrecruit.com\\/\"},\"log\":{\"start_time\":1756218018,\"time_spent\":36,\"attempts\":3,\"errors\":2,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":12},{\"type\":\"error\",\"message\":\"Error: Declined\",\"time\":13},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":28},{\"type\":\"error\",\"message\":\"Error: Declined\",\"time\":28},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":35},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":36}]},\"fees\":3000,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_nqxynd4hd7\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2030\",\"channel\":\"card\",\"card_type\":\"visa \",\"bank\":\"TEST BANK\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_P8Pr7dPc79R5bB1jbw2u\",\"account_name\":null,\"receiver_bank_account_number\":null,\"receiver_bank\":null},\"customer\":{\"id\":255869633,\"first_name\":null,\"last_name\":null,\"email\":\"dinesh@example.com\",\"customer_code\":\"CUS_nyixtfc4p58pfip\",\"phone\":null,\"metadata\":null,\"risk_action\":\"default\",\"international_format_phone\":null},\"plan\":null,\"split\":[],\"order_id\":null,\"paidAt\":\"2025-08-26T14:20:53.000Z\",\"createdAt\":\"2025-08-26T14:20:13.000Z\",\"requested_amount\":200000,\"pos_transaction_data\":null,\"source\":null,\"fees_breakdown\":null,\"connect\":null,\"transaction_date\":\"2025-08-26T14:20:13.000Z\",\"plan_object\":[],\"subaccount\":[]}}', '2025-08-26 14:20:55', '2025-08-26 14:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasedCandidates`
--

CREATE TABLE `purchasedCandidates` (
  `recruiterId` bigint NOT NULL,
  `candidateId` bigint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='candidates purchased by recruiter';

--
-- Dumping data for table `purchasedCandidates`
--

INSERT INTO `purchasedCandidates` (`recruiterId`, `candidateId`, `created_at`) VALUES
(174870193925313, 1748701699633070, '2025-08-07 19:05:27'),
(174870193925313, 1748701699633070, '2025-08-07 19:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `recruiterpackage`
--

CREATE TABLE `recruiterpackage` (
  `userId` bigint NOT NULL COMMENT 'id from customers table',
  `package` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'package name',
  `active` tinyint(1) NOT NULL,
  `starton` date NOT NULL,
  `expireon` date NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `candidatePurchaseLimit` int NOT NULL,
  `candidatePurchased` int NOT NULL,
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruiterpackage`
--

INSERT INTO `recruiterpackage` (`userId`, `package`, `active`, `starton`, `expireon`, `expired`, `candidatePurchaseLimit`, `candidatePurchased`, `createDateTime`, `updateDateTime`) VALUES
(174870193925313, 'payasyougo', 1, '2025-08-07', '2025-09-07', 0, 1, 0, '2025-07-17 06:51:37', '2025-08-07 17:17:03'),
(1748701699633070, 'featureprofile', 1, '2025-08-09', '2025-09-09', 0, 0, 0, '2025-08-09 13:21:09', '2025-08-09 13:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shortlistCandidates`
--

CREATE TABLE `shortlistCandidates` (
  `recruiterId` bigint NOT NULL,
  `candidateId` bigint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='bookmarked or selected candidates';

--
-- Dumping data for table `shortlistCandidates`
--

INSERT INTO `shortlistCandidates` (`recruiterId`, `candidateId`, `created_at`) VALUES
(174870193925313, 1748701699633070, '2025-08-08 23:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `subadminassets`
--

CREATE TABLE `subadminassets` (
  `subadminId` bigint NOT NULL,
  `subadmintext` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subadminassets`
--

INSERT INTO `subadminassets` (`subadminId`, `subadmintext`) VALUES
(1756022332409913, 'Subadmin@123');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` bigint NOT NULL,
  `fname` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-candidate, 2-recruiter, 3-admin, 4-subadmin',
  `otp` int DEFAULT NULL,
  `otpExpired` int DEFAULT NULL,
  `otpSentDateTime` datetime DEFAULT NULL,
  `paystack` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `smtp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `specialAccessKey` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'special key to delete or update sensitive records',
  `adActive` int NOT NULL DEFAULT '0',
  `adImages` text COLLATE utf8mb4_unicode_ci,
  `createDateTime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `fname`, `lname`, `email`, `password`, `role`, `otp`, `otpExpired`, `otpSentDateTime`, `paystack`, `smtp`, `specialAccessKey`, `adActive`, `adImages`, `createDateTime`, `updateDateTime`) VALUES
(1, 'system', 'admin', 'admin@example.com', '0e7517141fb53f21ee439b355b5a1d0a', 3, 0, 0, '2025-02-22 11:28:41', '{\"secretkey\":\"sk_test_6f5c37e50bc827af2a06a0916288ac127c7c88d5\",\"publickey\":\"sk_test_6f5c37e50bc827af2a06a0916288ac127c7c88d5\"}', '{\"host\":\"sandbox.smtp.mailtrap.io\",\"port\":\"587\",\"username\":\"924c19c0485b20\",\"password\":\"27b10f8c5c0f06\",\"encryption\":null,\"from_email\":\"info@smartrecruit.ng\",\"from_name\":\"smartrecruit\",\"replyTo_email\":\"info@smartrecruit.ng\",\"replyTo_name\":\"smartrecruit\"}', '17v50VH7T68u42S95pzMN7', 1, '[\"ad_1756304996568_33089.jpg\",\"ad_1756305010181_18477.jpg\"]', '2025-02-22 11:28:41', '2025-08-21 11:15:06'),
(1756022332409913, 'subadmin', 'subadmin', 'subadmin@example.com', 'f602612dcf6dbdd929e654001f92d998', 4, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2025-08-24 07:58:52', '2025-08-24 07:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `candidateResumeData`
--
ALTER TABLE `candidateResumeData`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featuredcandidate`
--
ALTER TABLE `featuredcandidate`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagepayments`
--
ALTER TABLE `packagepayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `recruiterpackage`
--
ALTER TABLE `recruiterpackage`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subadminassets`
--
ALTER TABLE `subadminassets`
  ADD PRIMARY KEY (`subadminId`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
