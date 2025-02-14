-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2025 at 04:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aims_shortlink_shortlink_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, NULL, '<h3 style=\"text-align: center;\"><span style=\"color:#006838;font-weight:bold;\">বিশ্ব জাকের মঞ্জিল সরকারি উচ্চ বিদ্যালয়</span></h3>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-size:18px;line-height:35px;\">ফরিদপুর জেলার সদরপুরে অবস্থিত বিশ্ব জাকের মঞ্জিল সরকারি উচ্চ বিদ্যালয় মানুষ গড়ার এক স্বনামধন্য বিদ্যাপীঠ। ১৯৮৪ সালে প্রতিষ্ঠার পর থেকে সময়ের সাথে সাথে শিক্ষার আলো ছড়িয়ে এই বিদ্যালয়টি সমগ্র জেলায় এক অনন্য বাতিঘরে রূপ নিয়েছে।</span></p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-size:18px;line-height:35px;\">একটি বিদ্যালয় প্রতিটি ছাত্রের কাছে পরম পবিত্র ভালোবাসার জায়গা। ছাত্রজীবন শেষ হয়ে যাওয়ার পরও তাদের রঙিন স্বপ্নবোনার প্রাঙ্গনে জমা থেকে যায় অগণন স্মৃতি, যা হ্যামিলনের জাদুর বাঁশির মতো ডাকতে থাকে বারবার। আমাদের এই প্রিয় স্কুলও তার ব্যতিক্রম নয়।</span></p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-size:18px;line-height:35px;\">হাজারো শিক্ষার্থী এই বিদ্যালয়ে পড়াশোনা করে আজ কীর্তিমান হয়েছে। জীবন-জীবিকার তাগিদে ছড়িয়ে পড়েছে দেশের নানা প্রান্তে। স্কুলের মতোই নিজ পরিবার প্রিয়জন ছেড়ে কেউবা যাপন করছে প্রবাস জীবন। কিন্তু দূরন্ত কৈশোরের মধুর স্মৃতিময় স্কুল প্রাঙ্গন, শ্রেণিকক্ষ, শিক্ষকবৃন্দ, ক্লাস সহায়ক ভাইয়েরা, সিনিয়র জুনিয়র সহপাঠী&mdash; সময়ে অসময়ে মনের দরজায় কড়া নেড়ে যায় বারবার।</span></p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-size:18px;line-height:35px;\">সমগ্র জীবন জুড়েই নিজ পরিচয়ের এক অবিচ্ছেদ্য অংশ হয়ে ওঠে হাই স্কুল। স্কুল হচ্ছে একটি বটবৃক্ষের সমতুল্য, যার শেকড় গ্রোথিত থাকে স্কুলের প্রাঙ্গনে। আর দূরবিস্তৃত প্রতিটি শাখা-প্রশাখার পত্রপল্লব হচ্ছে সেই স্কুলের ছাত্র।</span></p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-size:18px;line-height:35px;\">না পাতা, না বৃক্ষ, কেউ কাউকে ছাড়তে চায় না। তদ্রূপ আমরাও চাই না বিচ্ছিন্ন হয়ে যেতে আমাদের প্রিয় স্কুল থেকে। হৃদয়ের সে তাগিদ থেকেই এই স্কুলের প্রতিষ্ঠাকাল থেকে এ পর্যন্ত বেরিয়ে যাওয়া সকল ছাত্রকে এক সূতার বন্ধনে আবদ্ধ করার প্রয়াসে তৈরি করা হয়েছে Connect BZMGHS প্ল্যাটফর্ম। যেখানে ভাগাভাগি হবে আমাদের আনন্দ, বেদনা, উচ্ছ্বাস আর সহমর্মিতা। বাংলাদেশ এবং বহির্বিশ্বে অবস্থানরত এই স্কুলের সকল প্রাক্তন ছাত্রভাইকে Connect BZMGHS website-এ&nbsp;স্বাগত&nbsp;!</span></p>', 1, 1, '2022-03-04 10:21:48', '2023-09-26 03:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `autologins`
--

CREATE TABLE IF NOT EXISTS `autologins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `portal_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portal_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autologins`
--

INSERT INTO `autologins` (`id`, `portal_name`, `portal_link`, `username`, `password`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Arden Agent Portal', 'https://evision.arden.ac.uk/urd/sits.urd/run/siw_lgn', 'AIMSEDU1', 'Aims2024@', '<p>Reach out to Kamran for the Verification Code if it ask for varification cdoe.</p>', 1, 1, 1, '2025-01-11 11:50:59', '2025-01-11 11:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banners_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '202309260053IMG_0030-01.jpeg', 1, 1, '2022-10-25 02:21:19', '2023-09-26 04:53:12'),
(2, 'Contact Us', '202309242139contact us.jpeg', 1, 1, '2022-10-25 02:22:17', '2023-09-25 01:39:03'),
(3, 'Terms & Condition', '202309241317202309220023IMG_0030-01.jpeg', 1, 1, '2022-10-25 02:22:46', '2023-09-24 17:17:19'),
(4, 'Privacy Policy', '202309241317202309220023IMG_0030-01.jpeg', 1, 1, '2022-10-25 02:23:22', '2023-09-24 17:17:38'),
(5, 'Refund & FAQs', '202309241329202309220023IMG_0030-01.jpeg', 1, 1, '2022-10-25 02:24:38', '2023-09-24 17:29:58'),
(6, 'Services', '202309191144photo (3).jpeg', 1, 990, '2022-10-25 02:25:23', '2023-09-19 05:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '7 UP', '20220817055806_9a.jpg', 1, 1, '2022-03-04 11:24:02', '2022-09-10 05:58:53'),
(2, 'Cocacola', '20220817055802_14a.jpg', 1, 1, '2022-03-04 11:27:17', '2022-08-16 23:58:31'),
(3, 'KTC', '20220817055808_5a.jpg', 1, 1, '2022-03-04 11:29:08', '2022-08-16 23:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Food Cupboard', '202210291202food cupboard.jpg', 0, 1, 1, '2020-05-08 02:08:09', '2022-10-29 17:05:55'),
(2, 'Drink & Beverage', '202210291423drink.jpg', 1, 1, 1, '2020-05-08 03:41:38', '2022-10-29 19:23:53'),
(3, 'Fresh', '202210291427fresh.jpg', 0, 1, 1, '2020-05-16 03:46:39', '2022-10-29 19:27:52'),
(4, 'Dairy & Cheese', '202210291430milk-and-cheese.jpg', 0, 1, 1, '2022-08-16 23:47:49', '2022-10-29 19:30:33'),
(5, 'Frozen Food', '202210291433frozen foods.jpeg', 0, 1, 1, '2022-08-16 23:48:15', '2022-10-29 19:33:26'),
(6, 'Packaging & Disposable', '202210181624food packaging.jpg', 0, 1, 1, '2022-08-16 23:48:34', '2022-10-18 21:24:47'),
(7, 'Hygiene & Cleaning', '202210291437Hygiene & Cleaning.jpg', 0, 1, 1, '2022-08-16 23:49:01', '2022-10-29 19:37:52'),
(9, 'Cooking Oil & Fat', '202210291452Cooking Oil & Fat.jpg', NULL, 1, 1, '2022-10-29 17:08:24', '2022-10-29 19:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `collection_times`
--

CREATE TABLE IF NOT EXISTS `collection_times` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `collection_times_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collection_times`
--

INSERT INTO `collection_times` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '09:30 AM', NULL, NULL),
(2, '10:00 AM', NULL, NULL),
(3, '10:30 AM', NULL, NULL),
(4, '11:00 AM', NULL, NULL),
(5, '11:30 AM', NULL, NULL),
(6, '12:00 PM', NULL, NULL),
(7, '12:30 PM', NULL, NULL),
(8, '01:00 PM', NULL, NULL),
(9, '01:30 PM', NULL, NULL),
(10, '02:00 PM', NULL, NULL),
(11, '02:30 PM', NULL, NULL),
(12, '03:00 PM', NULL, NULL),
(13, '03:30 PM', NULL, NULL),
(14, '04:00 PM', NULL, NULL),
(15, '04:30 PM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `communicates`
--

CREATE TABLE IF NOT EXISTS `communicates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `address`, `mobile_no`, `email`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'BRR WholeSale', 'বিশ্ব জাকের মঞ্জিল সরকারি উচ্চ বিদ্যালয়', '+88 01817097074, 01715634324, 01712485844<br>+88 01712009728, 01755578567, 01714296529', 'info@connectbzmghs.com', 'https://www.facebook.com/groups/621105308758210/', '#', '#', '#', 1, 1, '2020-03-18 11:20:59', '2023-09-27 17:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int UNSIGNED NOT NULL,
  `division_id` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `modified_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `districts_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kishoreganj', 1, 1, '2021-02-07 02:08:59', '2021-02-07 02:12:05'),
(2, 1, 'Gazipur', 1, 1, '2021-02-07 02:12:16', '2021-02-07 02:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `modified_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `divisions_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, 1, '2021-02-07 02:04:17', '2021-02-07 02:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_category_id` int DEFAULT NULL,
  `question` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_category_id`, `question`, `answer`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'What do you provide?', 'You will provide your school information for register. Once you register you will be our member. There is no refund after successful registration.', 1, 1, '2021-07-26 04:51:02', '2023-09-24 17:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE IF NOT EXISTS `faq_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ORDER INFORMATION', NULL, NULL, NULL, NULL),
(2, 'SHIPPING', NULL, NULL, NULL, NULL),
(3, 'RETURN & CANCELLATION', NULL, 1, NULL, '2022-09-10 06:01:18'),
(5, 'PAYMENT INFO', 1, NULL, '2022-10-24 20:25:07', '2022-10-24 20:25:07'),
(6, 'Others', 1, NULL, '2022-10-26 20:38:40', '2022-10-26 20:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `lbs_log`
--

CREATE TABLE IF NOT EXISTS `lbs_log` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_json` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lbs_log`
--

INSERT INTO `lbs_log` (`id`, `provider`, `request_json`, `response_json`, `created_at`, `updated_at`) VALUES
(1, 'Xenon\\LaravelBDSms\\Provider\\GreenWeb', '{\"config\":{\"token\":\"99582247521693414072ff81801d3067da01b2b9863f35350c5b\"},\"mobile\":\"01789862904\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Member ID:BZMGHS10 SSC Batch: \\u09e8\\u09e6\\u09e6\\u09eb shift\"}', '\"Ok: SMS Sent Successfully To +8801789862904<\\/br>\"', '2023-09-25 21:29:30', '2023-09-25 21:29:30'),
(2, 'Xenon\\LaravelBDSms\\Provider\\GreenWeb', '{\"config\":{\"token\":\"99582247521693414072ff81801d3067da01b2b9863f35350c5b\"},\"mobile\":\"01750015256\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Member ID:BZMGHS11 SSC Batch: \\u09e8\\u09e6\\u09e6\\u09eb JEWEL\"}', '\"Ok: SMS Sent Successfully To +8801750015256<\\/br>\"', '2023-09-25 21:32:43', '2023-09-25 21:32:43'),
(3, 'Xenon\\LaravelBDSms\\Provider\\GreenWeb', '{\"config\":{\"token\":\"99582247521693414072ff81801d3067da01b2b9863f35350c5b\"},\"mobile\":\"01789862904\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Member ID:BZMGHS12, Name: Shaon, Batch: \\u09e8\\u09e6\\u09e6\\u09eb\"}', '\"Ok: SMS Sent Successfully To +8801789862904<\\/br>\"', '2023-09-25 22:01:42', '2023-09-25 22:01:42'),
(4, 'Xenon\\LaravelBDSms\\Provider\\GreenWeb', '{\"config\":{\"token\":\"99582247521693414072ff81801d3067da01b2b9863f35350c5b\"},\"mobile\":\"01714296529\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Member ID:BZMGHS13, Name: Mahfuz, Batch: \\u09e8\\u09e6\\u09e6\\u09ec\"}', '\"Ok: SMS Sent Successfully To +8801714296529<\\/br>\"', '2023-09-26 02:32:22', '2023-09-26 02:32:22'),
(5, 'Xenon\\LaravelBDSms\\Provider\\GreenWeb', '{\"config\":{\"token\":\"99582247521693414072ff81801d3067da01b2b9863f35350c5b\"},\"mobile\":\"01727533566\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Member ID:BZMGHS14, Name: Muhammad Delowar Hossain, Batch: \\u09e7\\u09ef\\u09ef\\u09e6\"}', '\"Error: You Don\'t Have Enough Balance ! Please Recharge Your Account ! Your Balance: 2.220446049250313e-16 BDT, SMS Cost: 0.6 BDT\"', '2023-09-26 02:35:03', '2023-09-26 02:35:03'),
(6, 'Xenon\\LaravelBDSms\\Provider\\GreenWeb', '{\"config\":{\"token\":\"99582247521693414072ff81801d3067da01b2b9863f35350c5b\"},\"mobile\":\"01727533566\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Member ID:BZMGHS15, Name: Muhammad Delowar Hossain, Batch: \\u09e7\\u09ef\\u09ef\\u09e6\"}', '\"Error: You Don\'t Have Enough Balance ! Please Recharge Your Account ! Your Balance: 2.220446049250313e-16 BDT, SMS Cost: 0.6 BDT\"', '2023-09-26 02:42:06', '2023-09-26 02:42:06'),
(7, 'Xenon\\LaravelBDSms\\Provider\\BulkSmsBD', '{\"config\":{\"api_key\":\"6ksTy72ySeJRw9H2cfSZ\",\"senderid\":\"8809617612516\"},\"mobile\":\"01714296529\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Registration No: BZMGHS16, Name: \\u09b6\\u09be\\u09b9\\u09bf\\u09a8 \\u09ae\\u09be\\u09b9\\u09ab\\u09c1\\u099c, Batch: \\u09e8\\u09e6\\u09e6\\u09ec\"}', '\"{\\\"response_code\\\":202,\\\"message_id\\\":5588027,\\\"success_message\\\":\\\"SMS Submitted Successfully 3\\\",\\\"error_message\\\":\\\"\\\"}\"', '2023-09-26 16:52:11', '2023-09-26 16:52:11'),
(8, 'Xenon\\LaravelBDSms\\Provider\\BulkSmsBD', '{\"config\":{\"api_key\":\"6ksTy72ySeJRw9H2cfSZ\",\"senderid\":\"8809617612516\"},\"mobile\":\"01714296529\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Registration No: BZMGHS17, Name: \\u09b6\\u09be\\u09b9\\u09bf\\u09a8 \\u09ae\\u09be\\u09b9\\u09ab\\u09c1\\u099c, Batch: \\u09e8\\u09e6\\u09e6\\u09ec\"}', '\"{\\\"response_code\\\":202,\\\"message_id\\\":5590657,\\\"success_message\\\":\\\"SMS Submitted Successfully 3\\\",\\\"error_message\\\":\\\"\\\"}\"', '2023-09-26 18:47:09', '2023-09-26 18:47:09'),
(9, 'Xenon\\LaravelBDSms\\Provider\\BulkSmsBD', '{\"config\":{\"api_key\":\"6ksTy72ySeJRw9H2cfSZ\",\"senderid\":\"8809617612516\"},\"mobile\":\"01521515988\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Registration No: BZMGHS18, Name: \\u0995\\u09be\\u099c\\u09c0 \\u09a4\\u09be\\u0993\\u09b9\\u09c0\\u09a6, Batch: \\u09e8\\u09e6\\u09e7\\u09eb\"}', '\"{\\\"response_code\\\":202,\\\"message_id\\\":5601916,\\\"success_message\\\":\\\"SMS Submitted Successfully 3\\\",\\\"error_message\\\":\\\"\\\"}\"', '2023-09-27 01:43:15', '2023-09-27 01:43:15'),
(10, 'Xenon\\LaravelBDSms\\Provider\\BulkSmsBD', '{\"config\":{\"api_key\":\"6ksTy72ySeJRw9H2cfSZ\",\"senderid\":\"8809617612516\"},\"mobile\":\"01789862904\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Registration No: BZMGHS20, Name: shefat islam, Batch: \\u09e8\\u09e6\\u09e6\\u09eb\"}', '\"{\\\"response_code\\\":202,\\\"message_id\\\":5615749,\\\"success_message\\\":\\\"SMS Submitted Successfully 3\\\",\\\"error_message\\\":\\\"\\\"}\"', '2023-09-27 17:32:32', '2023-09-27 17:32:32'),
(11, 'Xenon\\LaravelBDSms\\Provider\\BulkSmsBD', '{\"config\":{\"api_key\":\"6ksTy72ySeJRw9H2cfSZ\",\"senderid\":\"8809617612516\"},\"mobile\":\"01789862904\",\"message\":\"Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS\"}', '\"{\\\"response_code\\\":202,\\\"message_id\\\":5616265,\\\"success_message\\\":\\\"SMS Submitted Successfully 1\\\",\\\"error_message\\\":\\\"\\\"}\"', '2023-09-27 17:59:22', '2023-09-27 17:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE IF NOT EXISTS `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, '202412132221AIMS-Education.png', 1, 1, '2020-05-08 01:00:18', '2024-12-13 16:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '0',
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `parent`, `url`, `status`, `sort`, `icon`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Manage Users', 0, 'users', 1, 1, 'fa-user', NULL, NULL, NULL, NULL),
(2, 'View Role', 1, 'users.role.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(3, 'View User', 1, 'users.view', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(4, 'Menu Permission', 1, 'users.menu_permission', 1, 3, 'fa-copy', NULL, NULL, NULL, NULL),
(5, 'Manage Profile', 0, 'profiles', 1, 2, 'fa-user', NULL, NULL, NULL, NULL),
(6, 'Your Profile', 5, 'profiles.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(7, 'Password Change', 5, 'profiles.passowrd.view', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(51, 'Reviews', 48, 'communicates.review.view', 1, 3, 'fa-copy', NULL, NULL, NULL, NULL),
(50, 'Contactors', 48, 'communicates.contactor.view', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(49, 'Subscribers', 48, 'communicates.subscriber.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(48, 'Manage Contact', 0, 'communicates', 1, 16, 'fa-copy', NULL, NULL, NULL, NULL),
(13, 'Site Settings', 0, 'site-setting', 1, 3, 'fa-copy', NULL, NULL, NULL, NULL),
(14, 'View Logo', 13, 'site-setting.logo.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(16, 'View Contact', 13, 'site-setting.contact.view', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(18, 'View Slider', 13, 'site-setting.slider.view', 1, 3, 'fa-copy', NULL, NULL, NULL, NULL),
(19, 'Manage Category', 0, 'categories', 1, 7, 'fa-copy', NULL, NULL, NULL, NULL),
(20, 'View Category', 19, 'categories.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(21, 'Manage Product', 0, 'products', 1, 12, 'fa-copy', NULL, NULL, NULL, NULL),
(22, 'View Product', 21, 'products.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(23, 'Manage Order', 0, 'orders', 1, 13, 'fa-copy', NULL, NULL, NULL, NULL),
(24, 'Pending Order', 23, 'orders.pending.list', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(25, 'Approved Order', 23, 'orders.approved.list', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(26, 'Manage Vendor', 0, 'vendors', 0, 10, 'fa-copy', NULL, NULL, NULL, NULL),
(27, 'View Vendor', 26, 'vendors.view', 0, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(28, 'Manage Customer', 0, 'customers', 1, 15, 'fa-copy', NULL, NULL, NULL, NULL),
(29, 'View Customer', 28, 'customers.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(30, 'Refunded Order', 23, 'orders.refund.list', 0, 3, 'fa-copy', NULL, NULL, NULL, NULL),
(31, 'View About', 13, 'site-setting.about.view', 1, 4, 'fa-copy', NULL, NULL, NULL, NULL),
(32, 'View FAQ', 13, 'site-setting.faq.view', 1, 6, 'fa-copy', NULL, NULL, NULL, NULL),
(33, 'Privacy Policy', 13, 'site-setting.privacy-policy.view', 1, 7, 'fa-copy', NULL, NULL, NULL, NULL),
(34, 'Terms & Condition', 13, 'site-setting.terms-condition.view', 1, 8, 'fa-copy', NULL, NULL, NULL, NULL),
(35, 'View Sub-Category', 19, 'categories.sub.category.view', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(36, 'Manage Setup', 0, 'setups', 1, 9, 'fa-copy', NULL, NULL, NULL, NULL),
(37, 'View Brand', 36, 'setups.brands.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(39, 'View Size', 36, 'setups.sizes.view', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(41, 'View Unit', 36, 'setups.units.view', 1, 3, 'fa-copy', NULL, NULL, NULL, NULL),
(42, 'Promotional', 13, 'site-setting.promotion.view', 1, 8, 'fa-copy', NULL, NULL, NULL, NULL),
(43, 'Our Offer', 13, 'site-setting.offer.view', 1, 9, 'fa-copy', NULL, NULL, NULL, NULL),
(44, 'View Service', 13, 'services.view', 1, 11, 'fa-copy', NULL, NULL, NULL, NULL),
(45, 'FAQ Category', 13, 'site-setting.faq.category.view', 1, 5, 'fa-copy', NULL, NULL, NULL, NULL),
(46, 'Banner', 0, 'banners', 1, 4, 'fa-copy', NULL, NULL, NULL, NULL),
(47, 'View Banner', 46, 'banners.banner.view', 1, 1, 'fa-copy', NULL, NULL, NULL, NULL),
(52, 'View Customers Editor', 28, 'customers.editor.view', 1, 2, 'fa-copy', NULL, NULL, NULL, NULL),
(53, 'View Customers Viewer', 28, 'customers.viewer.view', 1, 3, 'fa-copy', NULL, NULL, NULL, NULL),
(54, 'Manage Members', 0, 'members', 1, 17, NULL, NULL, NULL, NULL, NULL),
(55, 'View Members', 54, 'members.view', 1, 1, NULL, NULL, NULL, NULL, NULL),
(56, 'Manage Autologins', 0, 'autologins', 1, 18, NULL, NULL, NULL, NULL, NULL),
(57, 'View Autologins', 56, 'autologins.view', 1, 1, NULL, NULL, NULL, NULL, NULL),
(58, 'Admin View Autologins', 56, 'autologins.admin.view', 1, 2, NULL, NULL, NULL, NULL, NULL),
(59, 'Manage QR Codes', 0, 'qrcodes', 1, 19, NULL, NULL, NULL, NULL, NULL),
(60, 'View QR Codes', 59, 'qrcodes.view', 1, 2, NULL, NULL, NULL, NULL, NULL),
(61, 'Manage Shortlinks', 0, 'shortlinks', 1, 20, NULL, NULL, NULL, NULL, NULL),
(62, 'View Shortlinks', 61, 'shortlinks.view', 1, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_permissions`
--

CREATE TABLE IF NOT EXISTS `menu_permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2089 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_permissions`
--

INSERT INTO `menu_permissions` (`id`, `menu_id`, `role_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2088, 62, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2087, 61, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2086, 60, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2085, 59, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2084, 58, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2083, 57, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2082, 56, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2081, 55, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2080, 54, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2079, 51, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2078, 50, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2077, 49, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2076, 48, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2075, 53, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2074, 52, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(996, 25, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(995, 24, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(994, 23, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(993, 29, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(992, 28, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(991, 27, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(990, 26, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(989, 22, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(988, 21, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(987, 8, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(986, 7, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(985, 6, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(984, 5, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(997, 30, 3, 0, 1, NULL, '2021-06-08 06:17:20', '2021-06-08 06:17:20'),
(2073, 29, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2072, 28, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2071, 25, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2070, 24, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2069, 23, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2068, 22, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2067, 21, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2066, 41, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2065, 39, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2064, 37, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2063, 36, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2062, 35, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2061, 20, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2060, 19, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2059, 47, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2058, 46, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2057, 44, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2056, 43, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2055, 42, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2054, 34, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2053, 33, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2052, 32, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2051, 45, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2050, 31, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(1519, 28, 2, 0, 1, NULL, '2023-06-27 13:20:56', '2023-06-27 13:20:56'),
(1520, 29, 2, 0, 1, NULL, '2023-06-27 13:20:56', '2023-06-27 13:20:56'),
(1521, 28, 5, 0, 1, NULL, '2023-06-27 13:21:13', '2023-06-27 13:21:13'),
(1522, 29, 5, 0, 1, NULL, '2023-06-27 13:21:13', '2023-06-27 13:21:13'),
(1988, 60, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(1987, 59, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(2049, 18, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2048, 16, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2047, 14, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2046, 13, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(1986, 7, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(1985, 6, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(1984, 5, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(1983, 4, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(1982, 3, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(1649, 7, 6, 0, 1, NULL, '2024-12-13 23:31:10', '2024-12-13 23:31:10'),
(1648, 6, 6, 0, 1, NULL, '2024-12-13 23:31:10', '2024-12-13 23:31:10'),
(1647, 5, 6, 0, 1, NULL, '2024-12-13 23:31:10', '2024-12-13 23:31:10'),
(2045, 7, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2044, 6, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2043, 5, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2042, 4, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2041, 3, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(1981, 2, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(1980, 1, 4, 0, 1, NULL, '2025-01-13 09:04:57', '2025-01-13 09:04:57'),
(2040, 2, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36'),
(2039, 1, 1, 0, 1, NULL, '2025-01-27 11:57:36', '2025-01-27 11:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_03_13_111441_create_logos_table', 3),
(8, '2020_03_13_151500_create_sliders_table', 4),
(14, '2020_03_18_164701_create_contacts_table', 9),
(15, '2020_03_19_181516_create_abouts_table', 10),
(16, '2020_03_28_180613_create_communicates_table', 11),
(17, '2020_05_08_074955_create_categories_table', 12),
(18, '2020_05_08_094756_create_brands_table', 13),
(19, '2020_05_08_111429_create_colors_table', 14),
(20, '2020_05_10_132831_create_sizes_table', 15),
(27, '2020_05_13_114606_create_product_sizes_table', 16),
(28, '2020_05_13_114638_create_product_colors_table', 16),
(30, '2020_06_08_195618_create_shippings_table', 17),
(31, '2020_06_08_195700_create_payments_table', 17),
(32, '2020_06_08_195726_create_orders_table', 17),
(33, '2020_06_08_195905_create_order_details_table', 17),
(34, '2020_12_02_071951_create_reviews_table', 18),
(35, '2021_01_20_121735_create_services_table', 19),
(36, '2019_10_28_120538_create_divisions_table', 20),
(37, '2019_10_28_120626_create_districts_table', 20),
(38, '2019_10_28_120652_create_upazilas_table', 20),
(39, '2019_10_28_120730_create_unions_table', 20),
(40, '2014_10_12_000000_create_users_table', 21),
(41, '2020_07_23_143137_create_menus_table', 22),
(42, '2020_07_23_143203_create_menu_permissions_table', 22),
(43, '2020_07_23_143223_create_roles_table', 22),
(46, '2021_04_02_142125_create_product_sub_images_table', 24),
(47, '2021_07_20_071846_create_faq_categories_table', 25),
(48, '2021_07_20_072352_create_faqs_table', 25),
(49, '2021_07_28_054923_create_privacy_policies_table', 26),
(50, '2021_07_28_055301_create_term_conditions_table', 26),
(51, '2022_03_04_164445_create_sub_categories_table', 27),
(52, '2022_03_04_172031_create_brands_table', 28),
(53, '2022_03_04_172058_create_sizes_table', 28),
(54, '2022_03_05_041651_create_product_sizes_table', 29),
(55, '2022_03_05_041746_create_product_brands_table', 29),
(56, '2020_05_13_114527_create_products_table', 30),
(58, '2022_03_05_041746_create_units_table', 31),
(59, '2022_08_17_041520_create_promotions_table', 32),
(60, '2022_08_17_043635_create_offers_table', 33),
(61, '2022_09_22_091313_create_sale_types_table', 34),
(62, '2022_09_24_062059_create_recent_products_table', 35),
(63, '2022_09_29_032858_create_collection_times_table', 36),
(64, '2022_10_25_074959_create_banners_table', 37),
(67, '2023_06_30_143021_create_users_table', 38),
(68, '2023_07_29_184821_create_temporary_users_table', 39),
(69, '2023_08_01_045844_add_fields_to_orders_table', 40),
(70, '2023_08_27_003425_add_tshirt_batch_to_users_table', 42),
(71, '2023_08_22_074353_create_laravelbd_sms_table', 43),
(72, '2024_12_13_175356_add_vcard_fields_to_users_table', 44),
(73, '2023_08_27_011827_add_tshirt_batch_to_orders_table', 45),
(75, '2025_01_10_171842_create_autologins_table', 46),
(76, '2025_01_13_130442_create_qrcodes_table', 47),
(78, '2025_01_27_171125_create_shortlinks_table', 48);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `link`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'New Arrival', 'http://popularsoftbd.com', '202208170500promotion_01.jpg', 1, 1, '2022-08-16 23:00:19', '2022-08-16 23:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL COMMENT 'user_id=customer_id',
  `shipping_id` int DEFAULT NULL,
  `sale_type_id` int DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `order_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_total` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_vat` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_time` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_expertise` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_qualification` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `sale_type_id`, `payment_id`, `order_no`, `message`, `order_total`, `order_vat`, `order_delivery_time`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `membership_type`, `district`, `division`, `country`, `other_expertise`, `profession`, `education_qualification`, `blood_group`, `gender`, `nid`, `date_of_birth`, `image`, `last_name`, `first_name`, `created_at`, `updated_at`) VALUES
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'shefat islam', 'ishefat@gmail.com', '01789862904', 10, 'Mirpur, Dhaka, Bangladesh', 'Processing', '6513da541b51f', 'BDT', '', '', '', '', '', 'Web Developer, Dhaka', '', 'এ+', '', 'AHE45673ET', '', '202309271331WhatsApp Image 2023-06-26 at 12.18.47.jpg', 'Shaon', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `vat`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 5, '13', '20', '2022-10-11 23:36:02', '2022-10-11 23:36:02'),
(2, 1, 6, 2, '15', '15', '2022-10-11 23:36:02', '2022-10-11 23:36:02'),
(3, 1, 12, 3, '11', '15', '2022-10-11 23:36:02', '2022-10-11 23:36:02'),
(4, 2, 12, 2, '11', '0', '2022-10-14 07:07:56', '2022-10-14 07:07:56'),
(5, 2, 8, 3, '35', '0', '2022-10-14 07:07:56', '2022-10-14 07:07:56'),
(6, 2, 6, 2, '15', '0', '2022-10-14 07:07:56', '2022-10-14 07:07:56'),
(7, 3, 11, 3, '13', '20', '2022-10-16 07:48:37', '2022-10-16 07:48:37'),
(8, 3, 14, 2, '56', '0', '2022-10-16 07:48:37', '2022-10-16 07:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `transaction_no`, `created_at`, `updated_at`) VALUES
(1, 'Hand Cash', NULL, '2022-10-11 23:36:02', '2022-10-11 23:36:02'),
(2, 'Hand Cash', NULL, '2022-10-14 07:07:56', '2022-10-14 07:07:56'),
(3, 'Hand Cash', NULL, '2022-10-16 07:48:37', '2022-10-16 07:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`(191),`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE IF NOT EXISTS `privacy_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(0, '<p>We are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, and safeguard the information you provide to us when accessing or using our website or engaging with our services. By using our website or services, you consent to the practices described in this policy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;Information We Collect</strong></p>\r\n\r\n<p><strong>&nbsp;Personal Information:</strong> When you interact with us, we may collect personal information such as your name, email address, phone number, and company details. This information is voluntarily provided by you when submitting forms, making inquiries, or engaging in business transactions.<br />\r\n<strong>&nbsp;Usage Data: </strong>We may automatically collect certain information about your interactions with our website, such as your IP address, browser type, referring/exit pages, and operating system. This data helps us analyze trends, administer the site, track user movements, and gather demographic information.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;How We Use Your Information</strong></p>\r\n\r\n<p><strong>&nbsp; Provide Services:</strong> We use the information you provide to deliver the requested services, communicate with you, and fulfill your inquiries or requests. This includes responding to your messages, providing customer support, and delivering updates or notifications related to our services.<br />\r\n<strong>&nbsp; Improve User Experience:</strong> We may use the information we collect to enhance your experience on our website, personalize your interactions, and optimize the content and functionality of our services. This may include analyzing user preferences, identifying trends, and making improvements based on feedback and user behavior.<br />\r\n&nbsp;<strong>&nbsp; Marketing and Communication: </strong>With your consent, we may use your personal information to send you promotional materials, newsletters, or marketing communications regarding our products, services, or special offers. You can opt-out of receiving such communications at any time by following the unsubscribe instructions provided in the email or contacting us directly.<br />\r\n&nbsp;&nbsp;&nbsp; Legal Obligations: We may process your information to comply with applicable laws, regulations, legal processes, or enforceable governmental requests. This includes responding to legal claims, protecting our rights, and ensuring the safety and security of our users and the public.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 1, NULL, '2023-09-24 17:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` int DEFAULT NULL COMMENT 'vendor_id=user_id',
  `category_id` int DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL,
  `unit_id` int DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_collective_price` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `current_collective_price` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_delivery_price` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `current_delivery_price` varchar(51) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `product_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `product_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `stock_status` varchar(91) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occation_remeaning` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occation_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ingredient` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nutrition_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `allergy_advice` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `delivery_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `category_id`, `sub_category_id`, `unit_id`, `name`, `slug`, `old_collective_price`, `current_collective_price`, `old_delivery_price`, `current_delivery_price`, `product_status`, `quantity`, `product_code`, `discount`, `vat`, `product_tag`, `stock_status`, `image`, `occation_remeaning`, `occation_description`, `ingredient`, `nutrition_value`, `allergy_advice`, `delivery_time`, `tags`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, NULL, 1, 1, 1, 'Cornboat Holders', 'cornboat-holders2893932720221014090147', '0', '20.00', '25.00', '19.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817070201_16a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:02:30', '2022-10-14 03:01:47'),
(4, NULL, 1, 2, 1, 'Saute Pan Silver', 'saute-pan-silver103983320221014070937', '30.00', '28.00', '30.00', '29.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817070408_5a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:04:24', '2022-10-14 01:09:37'),
(5, NULL, 2, 3, 1, 'Crock Pot Slow Cooker', 'crock-pot-slow-cooker9317639420221014090110', '15.00', '14.00', '0', '15.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817070606_9a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:06:36', '2022-10-14 03:01:10'),
(6, NULL, 2, 4, 1, 'Crock Pot Slow Cooker 2', 'crock-pot-slow-cooker-2499993520221014090039', '0', '14.00', '0', '15.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817070702_14a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:07:12', '2022-10-14 03:00:39'),
(7, NULL, 3, 5, 1, 'Emoticon Cookie', 'emoticon-cookie4497935420221014070840', '24.00', '23.00', '22.00', '21.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817070904_2a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:09:59', '2022-10-14 01:08:40'),
(8, NULL, 3, 6, 1, 'Emoticon Cookie 2', 'emoticon-cookie-21178989620221014090018', '0', '37.00', '38.00', '35.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817071205_2a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:12:04', '2022-10-14 03:00:18'),
(9, NULL, 4, 7, 1, 'Broccoli Crowns', 'broccoli-crowns882066820221014085919', '11.00', '10.00', '0', '9.00', 'New Arrival,Popular,Best Seller', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817071303_6a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:13:50', '2022-10-14 02:59:19'),
(10, NULL, 4, 8, 1, 'Broccoli Crowns 2', 'broccoli-crowns-25906378820221014070812', '8.00', '7.00', '9.00', '8.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817071407_1a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:14:23', '2022-10-14 01:08:12'),
(11, NULL, 5, 9, 1, 'BrocArla Organic Free Range Milk', 'brocarla-organic-free-range-milk1886784720221014085901', '0', '15.00', '16.00', '13.00', 'New Arrival,Popular', NULL, '25000', NULL, 20, 'meat organic food, beet, healthy, foody', 'Out of Stock', '20220817071509_11a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:15:47', '2022-10-14 02:59:01'),
(12, NULL, 5, 10, 1, 'BrocArla Organic Free Range Milk 2', 'brocarla-organic-free-range-milk-26411697420221014085845', '14.00', '12.00', '0', '11.00', 'New Arrival,Popular', NULL, '25000', NULL, 0, NULL, 'In Stock', '20220817071602_19a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 01:16:16', '2022-10-14 02:58:45'),
(13, NULL, 7, 13, 1, 'Saute Pan Silver 3', 'saute-pan-silver-32370958120221014070745', '50.00', '45.00', '47.00', '44.00', 'New Arrival,Popular,Best Seller', NULL, '2600', NULL, 0, NULL, 'In Stock', '20220817082309_2a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 02:23:02', '2022-10-14 01:07:45'),
(14, NULL, 7, 14, 1, 'Saute Pan Silver 4', 'saute-pan-silver-44094685520221014085826', '0', '54.00', '0', '56.00', 'New Arrival,Popular,Best Seller', NULL, '2600', NULL, 0, NULL, 'In Stock', '20220817082409_1a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 02:24:48', '2022-10-14 02:58:26'),
(15, NULL, 7, 13, 1, 'Saute Pan Silver 6', 'saute-pan-silver-64935125420221014070730', '50.00', '56.00', '60.00', '57.00', 'New Arrival,Popular,Best Seller', NULL, '2600', NULL, 0, NULL, 'In Stock', '20220817082506_11a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 02:25:47', '2022-10-14 01:07:30'),
(16, NULL, 7, 13, 1, 'Saute Pan Silver 7', 'saute-pan-silver-79369720420221014070717', '70.00', '69.00', '75.00', '64.00', 'New Arrival,Popular,Best Seller', NULL, '2600', NULL, 20, 'Good Product, Healty Product', 'Out of Stock', '20220817082609_5a.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 1, 1, 1, '2022-08-17 02:26:50', '2022-10-14 01:07:17'),
(26, NULL, 6, 11, 1, '7\" Pizza Box- 50 Pcs', '7-pizza-box-50-pcs3582852420221029124323', '19.99', '18.99', '21.99', '21.49', 'New Arrival,Popular,Best Seller', NULL, 'FPA0012', NULL, 20, 'pizza box, Pizza', 'In Stock', '202210181624pizza2.jpg', NULL, '<p>In addition, we pride ourselves on our local heart. We get to know all of our customers well, so we can understand the problems they face. We see ourselves as supply partners and use our regional structure and local depots to meet our customer&#39;s needs in the most efficient and effective way.</p>', '<p>In addition, we pride ourselves on our local heart. We get to know all of our customers well, so we can understand the problems they face. We see ourselves as supply partners and use our regional structure and local depots to meet our customer&#39;s needs in the most efficient and effective way.</p>', '<p>In addition, we pride ourselves on our local heart. We get to know all of our customers well, so we can understand the problems they face. We see ourselves as supply partners and use our regional structure and local depots to meet our customer&#39;s needs in the most efficient and effective way.</p>', '<p>In addition, we pride ourselves on our local heart. We get to know all of our customers well, so we can understand the problems they face. We see ourselves as supply partners and use our regional structure and local depots to meet our customer&#39;s needs in the most efficient and effective way.</p>', NULL, NULL, 1, 1, 1, '2022-10-18 21:24:01', '2022-10-29 17:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE IF NOT EXISTS `product_brands` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `product_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(133, 3, 2, '2022-10-14 03:01:47', '2022-10-14 03:01:47'),
(132, 3, 1, '2022-10-14 03:01:47', '2022-10-14 03:01:47'),
(96, 4, 2, '2022-10-14 01:09:37', '2022-10-14 01:09:37'),
(95, 4, 1, '2022-10-14 01:09:37', '2022-10-14 01:09:37'),
(131, 5, 2, '2022-10-14 03:01:10', '2022-10-14 03:01:10'),
(130, 5, 1, '2022-10-14 03:01:10', '2022-10-14 03:01:10'),
(129, 6, 2, '2022-10-14 03:00:39', '2022-10-14 03:00:39'),
(128, 6, 1, '2022-10-14 03:00:39', '2022-10-14 03:00:39'),
(90, 7, 2, '2022-10-14 01:08:40', '2022-10-14 01:08:40'),
(89, 7, 1, '2022-10-14 01:08:40', '2022-10-14 01:08:40'),
(127, 8, 2, '2022-10-14 03:00:18', '2022-10-14 03:00:18'),
(126, 8, 1, '2022-10-14 03:00:18', '2022-10-14 03:00:18'),
(125, 9, 2, '2022-10-14 02:59:19', '2022-10-14 02:59:19'),
(124, 9, 1, '2022-10-14 02:59:19', '2022-10-14 02:59:19'),
(84, 10, 2, '2022-10-14 01:08:12', '2022-10-14 01:08:12'),
(83, 10, 1, '2022-10-14 01:08:12', '2022-10-14 01:08:12'),
(123, 11, 2, '2022-10-14 02:59:01', '2022-10-14 02:59:01'),
(122, 11, 1, '2022-10-14 02:59:01', '2022-10-14 02:59:01'),
(121, 12, 2, '2022-10-14 02:58:45', '2022-10-14 02:58:45'),
(120, 12, 1, '2022-10-14 02:58:45', '2022-10-14 02:58:45'),
(78, 13, 3, '2022-10-14 01:07:45', '2022-10-14 01:07:45'),
(77, 13, 2, '2022-10-14 01:07:45', '2022-10-14 01:07:45'),
(76, 13, 1, '2022-10-14 01:07:45', '2022-10-14 01:07:45'),
(119, 14, 3, '2022-10-14 02:58:26', '2022-10-14 02:58:26'),
(118, 14, 2, '2022-10-14 02:58:26', '2022-10-14 02:58:26'),
(117, 14, 1, '2022-10-14 02:58:26', '2022-10-14 02:58:26'),
(72, 15, 3, '2022-10-14 01:07:30', '2022-10-14 01:07:30'),
(71, 15, 2, '2022-10-14 01:07:30', '2022-10-14 01:07:30'),
(70, 15, 1, '2022-10-14 01:07:30', '2022-10-14 01:07:30'),
(69, 16, 3, '2022-10-14 01:07:17', '2022-10-14 01:07:17'),
(68, 16, 2, '2022-10-14 01:07:17', '2022-10-14 01:07:17'),
(67, 16, 1, '2022-10-14 01:07:17', '2022-10-14 01:07:17'),
(134, 26, 1, '2022-10-29 17:43:23', '2022-10-29 17:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int DEFAULT NULL,
  `size_id` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, '2022-03-16 23:03:17', '2022-03-16 23:03:17'),
(2, 1, 2, NULL, NULL, '2022-03-16 23:03:17', '2022-03-16 23:03:17'),
(18, 2, 3, NULL, NULL, '2022-03-16 23:35:01', '2022-03-16 23:35:01'),
(17, 2, 2, NULL, NULL, '2022-03-16 23:35:01', '2022-03-16 23:35:01'),
(16, 2, 1, NULL, NULL, '2022-03-16 23:35:01', '2022-03-16 23:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE IF NOT EXISTS `product_sub_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int DEFAULT NULL,
  `gallery_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(49, 4, '20220817070408_5a.jpg', '2022-08-17 01:04:25', '2022-08-17 01:04:25'),
(48, 4, '20220817070405_2a.jpg', '2022-08-17 01:04:25', '2022-08-17 01:04:25'),
(45, 3, '20220817070203_6a.jpg', '2022-08-17 01:02:30', '2022-08-17 01:02:30'),
(46, 3, '20220817070207_1a.jpg', '2022-08-17 01:02:31', '2022-08-17 01:02:31'),
(47, 3, '20220817070201_16a.jpg', '2022-08-17 01:02:31', '2022-08-17 01:02:31'),
(50, 5, '20220817070602_14a.jpg', '2022-08-17 01:06:37', '2022-08-17 01:06:37'),
(51, 5, '20220817070606_9a.jpg', '2022-08-17 01:06:37', '2022-08-17 01:06:37'),
(52, 6, '20220817070702_14a.jpg', '2022-08-17 01:07:12', '2022-08-17 01:07:12'),
(53, 6, '20220817070706_9a.jpg', '2022-08-17 01:07:12', '2022-08-17 01:07:12'),
(54, 7, '20220817070904_2a.jpg', '2022-08-17 01:09:59', '2022-08-17 01:09:59'),
(55, 7, '20220817070905_2a.jpg', '2022-08-17 01:09:59', '2022-08-17 01:09:59'),
(56, 8, '20220817071204_2a.jpg', '2022-08-17 01:12:04', '2022-08-17 01:12:04'),
(57, 8, '20220817071205_2a.jpg', '2022-08-17 01:12:04', '2022-08-17 01:12:04'),
(58, 9, '20220817071308_5a.jpg', '2022-08-17 01:13:50', '2022-08-17 01:13:50'),
(59, 9, '20220817071303_6a.jpg', '2022-08-17 01:13:50', '2022-08-17 01:13:50'),
(60, 10, '20220817071408_5a.jpg', '2022-08-17 01:14:23', '2022-08-17 01:14:23'),
(61, 10, '20220817071403_6a.jpg', '2022-08-17 01:14:23', '2022-08-17 01:14:23'),
(62, 11, '20220817071509_11a.jpg', '2022-08-17 01:15:47', '2022-08-17 01:15:47'),
(63, 11, '20220817071508_5a.jpg', '2022-08-17 01:15:48', '2022-08-17 01:15:48'),
(64, 12, '20220817071609_11a.jpg', '2022-08-17 01:16:17', '2022-08-17 01:16:17'),
(65, 12, '20220817071602_19a.jpg', '2022-08-17 01:16:17', '2022-08-17 01:16:17'),
(66, 13, '20220817082309_2a.jpg', '2022-08-17 02:23:02', '2022-08-17 02:23:02'),
(67, 13, '20220817082309_1a.jpg', '2022-08-17 02:23:02', '2022-08-17 02:23:02'),
(68, 14, '20220817082409_2a.jpg', '2022-08-17 02:24:48', '2022-08-17 02:24:48'),
(69, 14, '20220817082409_1a.jpg', '2022-08-17 02:24:48', '2022-08-17 02:24:48'),
(70, 15, '20220817082509_1a.jpg', '2022-08-17 02:25:47', '2022-08-17 02:25:47'),
(71, 15, '20220817082506_11a.jpg', '2022-08-17 02:25:47', '2022-08-17 02:25:47'),
(72, 16, '20220817082609_5a.jpg', '2022-08-17 02:26:50', '2022-08-17 02:26:50'),
(73, 16, '20220817082609_2a.jpg', '2022-08-17 02:26:50', '2022-08-17 02:26:50'),
(80, 26, '202210181624pizza 1.jpg', '2022-10-18 21:24:01', '2022-10-18 21:24:01'),
(81, 26, '202210181624pizza 3.jpeg', '2022-10-18 21:24:01', '2022-10-18 21:24:01'),
(82, 26, '202210181624pizza2.jpg', '2022-10-18 21:24:01', '2022-10-18 21:24:01'),
(83, 26, '202210181624pizza4.jpg', '2022-10-18 21:24:01', '2022-10-18 21:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'Prokriti O Jibon Foundation (POJF)', 'https://www.pojf.org/', 1, 990, '2022-08-21 09:09:07', '2023-07-03 20:08:15'),
(3, 'Shastho Sheba Kendro', 'https://www.pojf.org/shastho-sheba-kendro/', 1, 990, '2022-08-16 22:31:50', '2023-07-03 20:08:53'),
(5, 'E-SHOP', '#', 1, 990, '2022-08-16 22:33:59', '2023-07-03 20:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `qrcodes`
--

CREATE TABLE IF NOT EXISTS `qrcodes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `portal_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portal_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qrcodes`
--

INSERT INTO `qrcodes` (`id`, `portal_name`, `portal_link`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'aims education', 'https://aimseducation.co.uk', '<p>follow the link</p>', 1, 1, 1, '2025-01-13 09:06:29', '2025-01-13 09:44:07'),
(2, 'AIMS English', 'https://aims-english.com', '<p>AIMS English Bangladesh site</p>', 1, 1002, NULL, '2025-01-15 10:16:26', '2025-01-15 10:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `recent_products`
--

CREATE TABLE IF NOT EXISTS `recent_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` varchar(91) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=inactive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_role_name_unique` (`role_name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, NULL, 1, NULL, '2023-06-27 12:59:11'),
(2, 'Editor', 1, NULL, 1, NULL, '2023-06-27 12:59:20'),
(4, 'Administrator', 1, 1, 1, '2023-06-27 12:56:34', '2023-06-27 12:58:41'),
(5, 'Viewer', 1, 1, NULL, '2023-06-27 12:59:34', '2023-06-27 12:59:34'),
(6, 'customer', 1, 1, 1, '2024-12-13 22:52:56', '2024-12-13 23:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `sale_types`
--

CREATE TABLE IF NOT EXISTS `sale_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sale_types_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_types`
--

INSERT INTO `sale_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Collection', NULL, NULL),
(2, 'Delivery', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `title`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '202210250927blog_chicken.jpg', 'Fast Delivery', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 1, 1, '2021-01-20 09:24:18', '2022-10-25 03:28:09'),
(2, '202210261535WhatsApp Image 2022-10-26 at 21.32.46.jpeg', 'Restaurant Service', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 1, 1, '2022-10-25 03:30:41', '2022-10-26 20:35:23'),
(3, '202210250931blog_default_8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 1, NULL, '2022-10-25 03:31:11', '2022-10-25 03:31:11'),
(5, '202210250932home-dark-02.jpg', 'Lorem ipsum dolor sit amet,', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Ut eniad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 1, NULL, '2022-10-25 03:32:45', '2022-10-25 03:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL COMMENT 'user_id=customer_id',
  `sale_type_id` int DEFAULT NULL,
  `dalivery_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dalivery_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `collection_time_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `sale_type_id`, `dalivery_date`, `dalivery_time`, `date`, `collection_time_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Delivery date is tomorrow', 'Delivery time is tomorrow 12:00 pm', NULL, NULL, '2022-10-08 09:07:45', '2022-10-08 09:07:45'),
(2, 2, 1, NULL, NULL, '2022-10-10', 1, '2022-10-09 06:13:21', '2022-10-09 06:13:21'),
(3, 2, 2, 'Delivery date is tomorrow', 'Delivery time is tomorrow 12:00 pm', NULL, NULL, '2022-10-09 22:59:15', '2022-10-09 22:59:15'),
(4, 2, 2, 'Delivery date is tomorrow', 'Delivery time is tomorrow 12:00 pm', NULL, NULL, '2022-10-11 22:57:06', '2022-10-11 22:57:06'),
(5, 2, 1, NULL, NULL, '2022-10-13', 1, '2022-10-12 04:40:22', '2022-10-12 04:40:22'),
(6, 2, 2, 'Delivery date is tomorrow', 'Delivery time is tomorrow 12:00 pm', NULL, NULL, '2022-10-14 01:41:41', '2022-10-14 01:41:41'),
(7, 2, 2, 'Delivery date is tomorrow', 'Delivery time is tomorrow 12:00 pm', NULL, NULL, '2022-10-14 06:16:14', '2022-10-14 06:16:14'),
(8, 2, 2, 'Delivery date is tomorrow', 'Delivery time is tomorrow 12:00 pm', NULL, NULL, '2022-10-16 07:38:31', '2022-10-16 07:38:31'),
(9, 7, 1, NULL, NULL, '2022-10-27', 11, '2022-10-26 20:18:32', '2022-10-26 20:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `shortlinks`
--

CREATE TABLE IF NOT EXISTS `shortlinks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shortlinks`
--

INSERT INTO `shortlinks` (`id`, `code`, `link`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'AgeeRs', 'https://aimseducation.co.uk/why-uk-is-the-best-study-abroad-destination/', '<p>follow the lik</p>', 1, 1, NULL, '2025-01-27 12:37:37', '2025-01-27 12:37:37'),
(2, 'dLEWzy', 'https://www.aims-academy.com/othm-level-7-diploma-in-strategic-management-and-leadership/', '<p>AIMS Academy</p>', 1, 1, NULL, '2025-01-27 12:46:34', '2025-01-27 12:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sizes_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Large', 1, 1, '2022-03-04 11:31:03', '2022-03-04 11:31:07'),
(2, 'Small', 1, NULL, '2022-03-04 11:31:21', '2022-03-04 11:31:21'),
(3, '1.5 L', 1, NULL, '2022-03-04 11:31:32', '2022-03-04 11:31:32'),
(4, '2 L', 1, NULL, '2022-03-04 11:31:43', '2022-03-04 11:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_title` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `link`, `short_title`, `long_title`, `button_text`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, '202309220023IMG_0030-01.jpeg', NULL, NULL, NULL, NULL, 990, 990, '2023-08-24 18:33:37', '2023-09-21 18:23:04'),
(11, '202308250034photo (3).jpeg', NULL, NULL, NULL, NULL, 990, 990, '2023-08-24 18:33:49', '2023-08-24 18:34:15'),
(12, '202309220022IMG_0015-01.jpeg', NULL, NULL, NULL, NULL, 990, 990, '2023-08-24 18:34:01', '2023-09-21 18:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_categories_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rice, Flour & Breading', '202210291630bread.jpg', 0, 1, 1, '2022-03-04 11:10:05', '2022-10-29 21:30:21'),
(2, 1, 'Spice & Ingredients', '202210291225Spice & Ingredients.png', 0, 1, 1, '2022-03-04 11:10:21', '2022-10-29 17:25:09'),
(3, 2, 'Soft Drink', '20220817055206_9a.jpg', 0, 1, 1, '2022-08-16 23:52:46', '2022-10-29 17:19:24'),
(4, 2, 'Water', '202210291237water.jpg', 0, 1, 1, '2022-08-16 23:52:59', '2022-10-29 17:37:36'),
(5, 3, 'Fresh Vegetables', '202210291624fresh.jpg', 0, 1, 1, '2022-08-16 23:53:57', '2022-10-29 21:24:25'),
(6, 3, 'Fresh Meat & Poultry', '202210291625meat & poultry.jpg', 0, 1, 1, '2022-08-16 23:54:05', '2022-10-29 21:25:09'),
(7, 4, 'Butter & Spread', '202210291545butter.jpg', 0, 1, 1, '2022-08-16 23:54:32', '2022-10-29 20:45:27'),
(8, 4, 'Milk & Chesses', '202210291536milk & cheese.jpg', 0, 1, 1, '2022-08-16 23:54:40', '2022-10-29 20:36:49'),
(9, 5, 'Frozen Meat & Poultry', '202210291522meat & poultry.jpg', 0, 1, 1, '2022-08-16 23:55:14', '2022-10-29 20:22:17'),
(10, 5, 'Ice cream & Deserts', '202210291531ice cream.jpg', 0, 1, 1, '2022-08-16 23:55:28', '2022-10-29 20:31:03'),
(11, 6, 'Packaging & Disposable', '202210291238food packaging.jpg', 0, 1, 1, '2022-08-16 23:56:00', '2022-10-29 17:38:00'),
(13, 7, 'Hygiene & Cleaning', '202210291230cleaning.jpg', 0, 1, 1, '2022-08-16 23:56:32', '2022-10-29 17:30:17'),
(15, 9, 'Solid oil & Ghee', '202210291500solid oil.jpg', 0, 1, NULL, '2022-10-29 20:00:21', '2022-10-29 20:00:21'),
(16, 9, 'Cooking Oil', '202210291506cooking oil.jpg', 0, 1, NULL, '2022-10-29 20:06:45', '2022-10-29 20:06:45'),
(17, 5, 'Frozen Bakery', '202210291512frozen bakery.jpeg', 0, 1, NULL, '2022-10-29 20:12:16', '2022-10-29 20:12:16'),
(18, 5, 'Burger & cooked Meat', '202210291529cooked meat.jpg', 0, 1, NULL, '2022-10-29 20:29:02', '2022-10-29 20:29:02'),
(19, 4, 'Youghurt', '202210291550yoghart.jpg', 0, 1, NULL, '2022-10-29 20:50:04', '2022-10-29 20:50:04'),
(20, 5, 'Frozen Fish', '202210291559fish.jpg', 0, 1, NULL, '2022-10-29 20:59:15', '2022-10-29 20:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_users`
--

CREATE TABLE IF NOT EXISTS `temporary_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_qualification` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_expertise` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `temporary_users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term_conditions`
--

CREATE TABLE IF NOT EXISTS `term_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_conditions`
--

INSERT INTO `term_conditions` (`id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '<p><strong>Third-Party Disclosure </strong></p>\r\n\r\n<p>We do not sell, trade, or transfer your personal information to third parties without your explicit consent, except as necessary for the provision of our services or as required by law. We may engage trusted third-party service providers who assist us in operating our website, conducting business, or servicing you, as long as they agree to keep your information confidential.</p>\r\n\r\n<p><strong>Data Retention</strong></p>\r\n\r\n<p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.</p>\r\n\r\n<p><strong>Your Rights</strong></p>\r\n\r\n<p>You have the right to access, update, correct, or delete your personal information in our possession. If you would like to exercise any of these rights or have any concerns about the handling of your data, please contact us using the information provided below.</p>\r\n\r\n<p><strong>&nbsp;Changes to this Privacy Policy</strong></p>\r\n\r\n<p>We reserve the right to modify or update this Privacy Policy from time to time. Any changes will be effective upon posting the revised policy on our website. We encourage you to review this policy periodically for any updates.</p>', 1, 1, '2021-07-28 00:41:30', '2023-09-24 17:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE IF NOT EXISTS `unions` (
  `id` int UNSIGNED NOT NULL,
  `division_id` int NOT NULL,
  `district_id` int NOT NULL,
  `upazila_id` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `modified_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `division_id`, `district_id`, `upazila_id`, `name`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Gundor', 1, 1, '2021-02-07 02:41:16', '2021-02-07 02:41:21'),
(2, 1, 1, 1, 'Zafrabadh', 1, 1, '2021-02-07 02:41:16', '2021-02-07 02:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `units_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Pcs', 1, 1, '2022-03-16 22:46:49', '2022-03-16 22:46:53'),
(2, 'Ltr', 1, NULL, '2022-03-16 22:47:02', '2022-03-16 22:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE IF NOT EXISTS `upazilas` (
  `id` int UNSIGNED NOT NULL,
  `division_id` int NOT NULL,
  `district_id` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `modified_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `division_id`, `district_id`, `name`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Korimganj', 1, 1, '2021-02-07 02:36:52', '2021-02-07 02:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messenger_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_qualification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_expertise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tshirt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `image`, `email`, `mobile`, `company_logo`, `mobile2`, `facebook_link`, `twitter_link`, `whatsapp_link`, `linkedin_link`, `instagram_link`, `youtube_link`, `messenger_link`, `fathers_name`, `mothers_name`, `date_of_birth`, `nid`, `gender`, `blood_group`, `education_qualification`, `profession`, `other_expertise`, `country`, `division`, `district`, `upazila`, `union`, `address`, `membership_type`, `member_id`, `order_id`, `username`, `password`, `batch`, `tshirt`, `usertype`, `role`, `role_id`, `email_verified_at`, `code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shefat ', 'Islam', 'shefat', '202308172056WhatsApp Image 2023-06-26 at 12.18.47.jpg', 'shefat.global@gmail.com', '1789862904', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'shefat.global@gmail.com', '$2y$10$v8dFtn2z8kRxM6lBuZPBn.4Aww.V26JZOHZOHVogO6kMAeNjVeowm', NULL, NULL, 'admin', 'admin', 1, NULL, NULL, 1, NULL, NULL, '2024-12-13 07:02:11'),
(1002, NULL, NULL, NULL, NULL, 'ishefat@outlook.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ishefat@outlook.com', '$2y$10$dlGFmY.g11XNzPyf6fCFZufflQ6TUgPnMBqagDhu9MLAR82Nrf4V2', NULL, NULL, 'admin', 'admin', 4, NULL, NULL, 1, NULL, '2024-12-13 16:19:05', '2024-12-16 19:05:12'),
(1003, NULL, NULL, 'Rahim Rahman', '202412150204UK Embassy Fees for International Students.jpg', 'rahim@gmail.com', '01700000976', '202412150204AIMS-Education-logo.png', '01800000653', 'fb', 'tw', 'wa', 'll', 'ii', 'yt', 'mt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'web developer', NULL, 'bangladesh', NULL, NULL, 'Dhaka#1216', NULL, 'dhaka, bangladesh', NULL, NULL, NULL, 'rahim@gmail.com', '$2y$10$Aq0DKxaxXDeUvEOJJdITCeIuwNYTpfSFcu1sLXxhdxET/Vt.KV0Ja', NULL, NULL, 'customer', 'customer', 0, NULL, '720340', 1, NULL, '2024-12-13 20:10:17', '2024-12-16 18:48:44'),
(1004, NULL, NULL, 'Habibur Rahman', NULL, 'habib@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HabinRah123456789', NULL, NULL, NULL, NULL, NULL, 'habib@gmail.com', '$2y$10$if.rzgdIU7deFipAfj3B9ujdIbfd0FPQIoONdc1JTAVb3FI2dHlNm', NULL, NULL, 'customer', 'customer', 0, NULL, '712381', 1, NULL, '2024-12-13 21:03:18', '2024-12-13 21:03:18'),
(1005, NULL, NULL, 'abrar ahmed', NULL, 'abrar@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abrar12345678', NULL, NULL, NULL, NULL, NULL, 'abrar@gmail.com', '$2y$10$YG1uAXydBMyKHDzcaicFe.AZL0zV7wfrbqbBBLidc0jqIraYCZ/4.', NULL, NULL, 'customer', 'customer', 0, NULL, '158199', 0, NULL, '2024-12-13 21:26:43', '2024-12-13 21:26:43'),
(1006, NULL, NULL, 'rocky', NULL, 'rocky@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rocky123456789', NULL, NULL, NULL, NULL, NULL, 'rocky@gmail.com', '$2y$10$Kssn/flIZLdN6UU8z2CLdeOoqkBuYrwT7UKoEZ51J2r4BFoOWXn86', NULL, NULL, 'customer', 'customer', 0, NULL, '234053', 0, NULL, '2024-12-14 20:27:35', '2024-12-14 20:27:35'),
(1007, NULL, NULL, 'william', NULL, 'will@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Will123456789', NULL, NULL, NULL, NULL, NULL, '01789862904', '$2y$10$IJht9vTdn3PMsd7XNs6cdeUBrJqJRh/5GCddGfBvFm6Qudlh0O0UW', NULL, NULL, 'customer', 'customer', 0, NULL, '87550', 0, NULL, '2024-12-14 20:32:54', '2024-12-14 20:32:54'),
(1011, NULL, NULL, 'Sonia Farzana', NULL, 'sonia@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dhaka1216', NULL, NULL, NULL, NULL, NULL, 'sonia@gmail.com', '$2y$10$bPIT95DgIcvRoEZ7yIlleOnkWKPUeqkzmW.T8MITHaTzYw6JTZNEi', NULL, NULL, 'customer', 'customer', 0, NULL, '446679', 1, NULL, '2024-12-15 05:37:09', '2024-12-15 05:37:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
