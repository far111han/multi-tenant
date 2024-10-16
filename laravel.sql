-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 05:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `name`, `email`, `age`, `phone_number`, `image`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'pro1 pro1', 'programmer1.techybirds1@gmail.com', '28', '88882828', '1715431773.jpg', 'https://darlin.com.au/', '2024-05-11 07:19:34', '2024-05-11 07:19:34', NULL),
(4, 'pro1 pro1132ffe', 'programmer1.techybirds1@gmail.com', '28', '09033932986', '1715437003.jpg', 'https://darlin.com.au/', '2024-05-11 08:46:43', '2024-05-11 08:52:43', NULL),
(5, 'pro1 pro111', 'programmer1.techybirds1@gmail.com', '28', '09033932986', '1715441004.jpg', 'https://darlin.com.au/', '2024-05-11 09:53:24', '2024-05-11 10:03:44', NULL),
(6, 'test', 'f@gmail.com', '29', '90339329986', '1715442490.jpg', 'test', '2024-05-11 10:18:10', '2024-05-11 10:19:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `institutes` varchar(255) DEFAULT NULL,
  `course_from` varchar(255) DEFAULT NULL,
  `course_to` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `course`, `institutes`, `course_from`, `course_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 'ererer', 'eeer', '2017', '2018', '2024-05-11 05:28:34', '2024-05-11 05:28:34', NULL),
(2, 11, NULL, NULL, '2016', '2016', '2024-05-11 05:40:18', '2024-05-11 05:40:18', NULL),
(3, 12, NULL, NULL, '2016', '2016', '2024-05-11 05:41:13', '2024-05-11 05:41:13', NULL),
(4, 13, NULL, NULL, '2016', '2016', '2024-05-11 05:45:54', '2024-05-11 05:45:54', NULL),
(5, 14, NULL, NULL, '2016', '2016', '2024-05-11 05:46:52', '2024-05-11 05:46:52', NULL),
(6, 15, NULL, NULL, '2016', '2016', '2024-05-11 05:47:19', '2024-05-11 05:47:19', NULL),
(7, 16, NULL, NULL, '2016', '2016', '2024-05-11 05:49:14', '2024-05-11 05:49:14', NULL),
(8, 17, NULL, NULL, '2016', '2016', '2024-05-11 05:49:44', '2024-05-11 05:49:44', NULL),
(9, 1, 'sddsd', 'dsdsd', '2017', '2018', '2024-05-11 05:56:23', '2024-05-11 05:56:23', NULL),
(10, 2, 'fff', 'fdfddf', '2017', '2016', '2024-05-11 06:06:56', '2024-05-11 06:06:56', NULL),
(11, 3, NULL, NULL, '2016', '2016', '2024-05-11 07:19:34', '2024-05-11 07:19:34', NULL),
(12, 4, 'ererer33', 'efef', '2018', '2018', '2024-05-11 08:46:43', '2024-05-11 08:54:46', NULL),
(13, 5, ',j,jhmhmd', ',j,mmh', '2016', '2016', '2024-05-11 09:53:24', '2024-05-11 09:57:53', NULL),
(14, 6, 'BCAf', 'SRIMCAf', '2016', '2016', '2024-05-11 10:18:10', '2024-05-11 10:19:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `edu_from` varchar(255) DEFAULT NULL,
  `edu_to` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `user_id`, `degree`, `school`, `edu_from`, `edu_to`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:05:20', '2024-05-11 05:05:20', NULL),
(2, 8, 'feefef', 'fefefe', '2018', '2019', 'efefef', '2024-05-11 05:08:46', '2024-05-11 05:08:46', NULL),
(3, 9, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:17:07', '2024-05-11 05:17:07', NULL),
(4, 10, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:28:34', '2024-05-11 05:28:34', NULL),
(5, 11, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:40:18', '2024-05-11 05:40:18', NULL),
(6, 12, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:41:13', '2024-05-11 05:41:13', NULL),
(7, 13, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:45:54', '2024-05-11 05:45:54', NULL),
(8, 14, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:46:52', '2024-05-11 05:46:52', NULL),
(9, 15, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:47:19', '2024-05-11 05:47:19', NULL),
(10, 16, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:49:14', '2024-05-11 05:49:14', NULL),
(11, 17, NULL, NULL, '2016', '2016', NULL, '2024-05-11 05:49:44', '2024-05-11 05:49:44', NULL),
(12, 1, 'dsdsds', 'sdsds', '2016', '2018', 'sdsd', '2024-05-11 05:56:23', '2024-05-11 05:56:23', NULL),
(13, 2, 'ddd', 'dsds', '2017', '2016', 'ddd', '2024-05-11 06:06:56', '2024-05-11 06:06:56', NULL),
(14, 3, NULL, NULL, '2016', '2016', NULL, '2024-05-11 07:19:34', '2024-05-11 07:19:34', NULL),
(15, 4, 'fefef333', 'fef33ef', '2016', '2016', 'fefef', '2024-05-11 08:46:43', '2024-05-11 08:54:46', NULL),
(16, 5, 'j,,jhmhmd', 'j,hmhm', '2016', '2016', ',j,mhmh', '2024-05-11 09:53:24', '2024-05-11 09:57:53', NULL),
(17, 6, 'MCAf', 'MCAf', '2016', '2016', 'SURATf', '2024-05-11 10:18:10', '2024-05-11 10:19:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employments`
--

CREATE TABLE `employments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `emp_from` varchar(255) DEFAULT NULL,
  `emp_to` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employments`
--

INSERT INTO `employments` (`id`, `user_id`, `job_title`, `employer`, `emp_from`, `emp_to`, `city`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 'erer', 'rerer', '2017', '2017', 'New York', 'ththtth', '2024-05-11 05:17:07', '2024-05-11 05:17:07', NULL),
(2, 10, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:28:34', '2024-05-11 05:28:34', NULL),
(3, 11, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:40:18', '2024-05-11 05:40:18', NULL),
(4, 12, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:41:13', '2024-05-11 05:41:13', NULL),
(5, 13, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:45:54', '2024-05-11 05:45:54', NULL),
(6, 14, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:46:52', '2024-05-11 05:46:52', NULL),
(7, 15, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:47:19', '2024-05-11 05:47:19', NULL),
(8, 16, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:49:14', '2024-05-11 05:49:14', NULL),
(9, 17, NULL, NULL, '2016', '2016', NULL, NULL, '2024-05-11 05:49:44', '2024-05-11 05:49:44', NULL),
(10, 1, 'dsdsd', 'sdsds', '2016', '2017', 'dsdsd', 'dss', '2024-05-11 05:56:23', '2024-05-11 05:56:23', NULL),
(11, 2, 'fffg', 'gfgfg', '2017', '2016', 'fgg', 'gfgfgf', '2024-05-11 06:06:56', '2024-05-11 06:06:56', NULL),
(12, 3, NULL, NULL, '2017', '2016', NULL, NULL, '2024-05-11 07:19:34', '2024-05-11 07:19:34', NULL),
(13, 4, 'erer12', 'rerer33', '2016', '2016', 'navs', 'fefefef', '2024-05-11 08:46:43', '2024-05-11 08:54:46', NULL),
(14, 5, ',jmhhd', ',j,mh', '2016', '2016', 'j,mhm', ',j', '2024-05-11 09:53:24', '2024-05-11 09:57:53', NULL),
(15, 6, 'Testf', 'testf', '2016', '2018', 'navsf', 'testf', '2024-05-11 10:18:10', '2024-05-11 10:19:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `field_name`, `user_id`, `time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Profession details added', 5, '03:23:24', '2024-05-11 09:53:24', '2024-05-11 09:53:24', NULL),
(2, 'Education details added', 5, '03:23:24', '2024-05-11 09:53:24', '2024-05-11 09:53:24', NULL),
(3, 'Employment details added', 5, '03:23:24', '2024-05-11 09:53:24', '2024-05-11 09:53:24', NULL),
(4, 'Course details added', 5, '03:23:24', '2024-05-11 09:53:24', '2024-05-11 09:53:24', NULL),
(5, 'applicants created', 5, '03:23:24', '2024-05-11 09:53:24', '2024-05-11 09:53:24', NULL),
(6, 'Profession details updated with fieldsjob_titleexperiance_yearshourly_wageexpected_distancelicenseis_own_carnotesuser_id', 1, '03:24:12', '2024-05-11 09:54:12', '2024-05-11 09:54:12', NULL),
(7, 'Education details updated with fieldsdegreeschooledu_fromedu_tocityuser_id', 1, '03:24:12', '2024-05-11 09:54:12', '2024-05-11 09:54:12', NULL),
(8, 'Employment details updated with fieldsjob_titleemployeremp_fromemp_tocitydescriptionuser_id', 1, '03:24:12', '2024-05-11 09:54:12', '2024-05-11 09:54:12', NULL),
(9, 'Course details updated with fieldscourseinstitutescourse_fromcourse_touser_id', 1, '03:24:12', '2024-05-11 09:54:12', '2024-05-11 09:54:12', NULL),
(10, 'Profession details updated with jobtitle,experianceyears,hourlywage,expecteddistance,license,isowncar,notes,userid', 1, '03:27:53', '2024-05-11 09:57:53', '2024-05-11 09:57:53', NULL),
(11, 'Education details updated with degree,school,edufrom,eduto,city,userid', 1, '03:27:53', '2024-05-11 09:57:53', '2024-05-11 09:57:53', NULL),
(12, 'Employment details updated with jobtitle,employer,empfrom,empto,city,description,userid', 1, '03:27:53', '2024-05-11 09:57:53', '2024-05-11 09:57:53', NULL),
(13, 'Course details updated with  course,institutes,coursefrom,courseto,userid', 1, '03:27:53', '2024-05-11 09:57:53', '2024-05-11 09:57:53', NULL),
(14, 'Profession details updated with jobtitle,experianceyears,hourlywage,expecteddistance,license,isowncar,notes,userid', 5, '03:33:44', '2024-05-11 10:03:44', '2024-05-11 10:03:44', NULL),
(15, 'Education details updated with degree,school,edufrom,eduto,city,userid', 5, '03:33:45', '2024-05-11 10:03:45', '2024-05-11 10:03:45', NULL),
(16, 'Employment details updated with jobtitle,employer,empfrom,empto,city,description,userid', 5, '03:33:45', '2024-05-11 10:03:45', '2024-05-11 10:03:45', NULL),
(17, 'Course details updated with  course,institutes,coursefrom,courseto,userid', 5, '03:33:45', '2024-05-11 10:03:45', '2024-05-11 10:03:45', NULL),
(18, 'Profession details added', 1, '03:48:10', '2024-05-11 10:18:10', '2024-05-11 10:18:10', NULL),
(19, 'Education details added', 1, '03:48:10', '2024-05-11 10:18:10', '2024-05-11 10:18:10', NULL),
(20, 'Employment details added', 1, '03:48:10', '2024-05-11 10:18:10', '2024-05-11 10:18:10', NULL),
(21, 'Course details added', 1, '03:48:10', '2024-05-11 10:18:10', '2024-05-11 10:18:10', NULL),
(22, 'applicants created', 6, '03:48:10', '2024-05-11 10:18:10', '2024-05-11 10:18:10', NULL),
(23, 'Profession details updated with jobtitle,experianceyears,hourlywage,expecteddistance,license,isowncar,notes,userid', 6, '03:49:08', '2024-05-11 10:19:08', '2024-05-11 10:19:08', NULL),
(24, 'Education details updated with degree,school,edufrom,eduto,city,userid', 6, '03:49:08', '2024-05-11 10:19:08', '2024-05-11 10:19:08', NULL),
(25, 'Employment details updated with jobtitle,employer,empfrom,empto,city,description,userid', 6, '03:49:08', '2024-05-11 10:19:08', '2024-05-11 10:19:08', NULL),
(26, 'Course details updated with  course,institutes,coursefrom,courseto,userid', 6, '03:49:08', '2024-05-11 10:19:08', '2024-05-11 10:19:08', NULL),
(27, 'Profession details updated with jobtitle,experianceyears,hourlywage,expecteddistance,license,isowncar,notes,userid', 6, '03:49:36', '2024-05-11 10:19:36', '2024-05-11 10:19:36', NULL),
(28, 'Education details updated with degree,school,edufrom,eduto,city,userid', 6, '03:49:36', '2024-05-11 10:19:36', '2024-05-11 10:19:36', NULL),
(29, 'Employment details updated with jobtitle,employer,empfrom,empto,city,description,userid', 6, '03:49:36', '2024-05-11 10:19:36', '2024-05-11 10:19:36', NULL),
(30, 'Course details updated with  course,institutes,coursefrom,courseto,userid', 6, '03:49:36', '2024-05-11 10:19:36', '2024-05-11 10:19:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_05_11_063109_create_applicants_table', 2),
(9, '2024_05_11_100118_create_professioanls_table', 3),
(11, '2024_05_11_102756_create_education_table', 4),
(12, '2024_05_11_104110_create_employments_table', 5),
(13, '2024_05_11_105143_create_courses_table', 6),
(14, '2024_05_11_110007_create_resumes_table', 7),
(15, '2024_05_11_143644_create_histories_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professioanls`
--

CREATE TABLE `professioanls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `experiance_years` varchar(255) DEFAULT NULL,
  `hourly_wage` varchar(255) DEFAULT NULL,
  `expected_distance` varchar(255) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `is_own_car` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professioanls`
--

INSERT INTO `professioanls` (`id`, `user_id`, `job_title`, `experiance_years`, `hourly_wage`, `expected_distance`, `license`, `is_own_car`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '0', '0', 'eree', '1', '1', 0, 'dfff', '2024-05-11 04:50:09', '2024-05-11 04:50:09', NULL),
(2, NULL, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 04:51:53', '2024-05-11 04:51:53', NULL),
(3, NULL, '0', '0', 'ggg', '1', '1', 0, 'rgrgr', '2024-05-11 04:52:27', '2024-05-11 04:52:27', NULL),
(4, 6, '0', '0', 'eree1', '0', NULL, 0, 'rtf', '2024-05-11 04:54:12', '2024-05-11 10:19:36', NULL),
(5, 7, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:05:20', '2024-05-11 05:05:20', NULL),
(6, 8, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:08:46', '2024-05-11 05:08:46', NULL),
(7, 9, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:17:07', '2024-05-11 05:17:07', NULL),
(8, 10, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:28:34', '2024-05-11 05:28:34', NULL),
(9, 11, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:40:18', '2024-05-11 05:40:18', NULL),
(10, 12, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:41:13', '2024-05-11 05:41:13', NULL),
(11, 13, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:45:54', '2024-05-11 05:45:54', NULL),
(12, 14, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:46:52', '2024-05-11 05:46:52', NULL),
(13, 15, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:47:19', '2024-05-11 05:47:19', NULL),
(14, 16, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:49:14', '2024-05-11 05:49:14', NULL),
(15, 17, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 05:49:44', '2024-05-11 05:49:44', NULL),
(16, 1, '0', '0', 'eree', '0', '1', 0, 'sdsdsd', '2024-05-11 05:56:23', '2024-05-11 05:56:23', NULL),
(17, 2, '1', '1', '1', '1', '1', 0, 'bffbf', '2024-05-11 06:06:56', '2024-05-11 06:06:56', NULL),
(18, 3, NULL, NULL, NULL, '0', NULL, 0, NULL, '2024-05-11 07:19:34', '2024-05-11 07:19:34', NULL),
(19, 4, '0', '0', 'eree', '1', '1', 0, 'ffdfdf', '2024-05-11 08:46:43', '2024-05-11 08:46:43', NULL),
(20, 5, '0', '1', '1hhmd', '0', '1', 0, 'jj,jmmd', '2024-05-11 09:53:24', '2024-05-11 09:57:53', NULL),
(21, 6, '0', '0', '1', '1', '1', 1, 'Hi', '2024-05-11 10:18:10', '2024-05-11 10:18:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `resume`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 17, '17_Farhan_Laravel_5_Years (1).pdf', '2024-05-11 05:49:44', '2024-05-11 05:49:44', NULL),
(4, 3, '1_Farhan_cv_php_5+yr_ (1).pdf', '2024-05-11 05:56:23', '2024-05-11 05:56:23', NULL),
(5, 2, '2_images.jpg', '2024-05-11 06:06:56', '2024-05-11 06:06:56', NULL),
(6, 1, '3_images.jpg', '2024-05-11 07:19:34', '2024-05-11 07:19:34', NULL),
(7, 4, '4_Profile.pdf', '2024-05-11 08:46:43', '2024-05-11 08:46:43', NULL),
(8, 4, '4_Profile.pdf', '2024-05-11 08:56:15', '2024-05-11 08:56:15', NULL),
(9, 5, 'download.jpg', '2024-05-11 09:53:24', '2024-05-11 09:53:24', NULL),
(10, 6, 'images.jpg', '2024-05-11 10:18:10', '2024-05-11 10:18:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pro1 pro1', 'programmer1.techybirds1@gmail.com', NULL, '$2y$10$dSbG.UEgqMnl0jKfh0l7/ekrgNGLbgenqL5Vbvakm6t1212sQNDUi', NULL, '2024-05-10 00:18:43', '2024-05-10 00:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employments`
--
ALTER TABLE `employments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `professioanls`
--
ALTER TABLE `professioanls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employments`
--
ALTER TABLE `employments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professioanls`
--
ALTER TABLE `professioanls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
