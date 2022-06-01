-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 10:28 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazine_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'University', '2022-03-03 15:00:02', '2022-03-03 15:00:02'),
(2, 'Outing', '2022-03-03 15:00:14', '2022-03-03 15:00:14'),
(3, 'Military', '2022-03-03 15:00:21', '2022-03-03 15:00:21'),
(4, 'Family', '2022-03-03 15:00:27', '2022-03-03 15:00:27'),
(5, 'Travel', '2022-03-03 15:01:57', '2022-03-03 15:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_01_03_172142_create_posts_table', 2),
(6, '2022_01_03_172257_create_categories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category_id`, `image`, `content`, `created_at`, `updated_at`, `slag`) VALUES
(1, 'Dahab Day 1', 5, 'dAp5zmBBh3H8BVdBbDldEQDujK3VGyjoV46xHuz2.jpg', '<h1 style=\"text-align: center;\"><span style=\"background-color: rgb(0, 255, 255);\">First Day In Dahab</span></h1><h1 style=\"text-align: center;\"><span style=\"background-color: rgb(0, 255, 255);\"><br></span></h1><h1 style=\"text-align: center;\">Morning</h1><h1 style=\"text-align: center;\"><span style=\"background-color: rgb(0, 255, 0);\"></span></h1><h1 style=\"text-align: center;\"><img src=\"//////uploads/base_64_OUvpHc85FM8isplGTLQXq5CXgoBaVCkL8KlS0Z6fQMZpC1tm5h.jpg\" style=\"width: 100%;\" data-filename=\"download.jpg\"><span style=\"background-color: rgb(0, 255, 255);\"><br></span></h1><h1 style=\"text-align: center;\"><span style=\"background-color: rgb(0, 255, 255);\"><br></span></h1><h1 style=\"text-align: center;\"><span style=\"background-color: rgb(0, 255, 255);\"><br></span></h1><h1 style=\"text-align: center;\">Mid Day</h1><h1 style=\"text-align: center;\"><img src=\"//////uploads/base_64_2GMNNgRLvD2j5Z9MB3l654tAOnJ06tr8eQBvGao8zHNW5UUQVR.jpg\" style=\"width: 100%;\" data-filename=\"20200811_113432.jpg\"><span style=\"background-color: rgb(255, 156, 0);\"><br></span></h1><h1 style=\"text-align: center;\"><span style=\"background-color: rgb(255, 156, 0);\"><br></span></h1><h1 style=\"text-align: center;\">Night</h1><h1 style=\"text-align: center;\"><img src=\"//////uploads/base_64_uuCRx93fHouG0WrS6jQjHHEXKTyxNW1tUGq9ZnQlvoKQb9bBt7.jpg\" style=\"width: 50%;\" data-filename=\"IMG_20200810_204446.jpg\"><span style=\"background-color: rgb(206, 198, 206);\"><br></span></h1>', '2022-03-03 15:07:12', '2022-04-12 07:22:26', 'dahab-day-1'),
(2, 'Graduation project', 1, 'Tax7CsHQCM4UvPeYhVA1gGsooSAf35vjyX6GBE0c.jpg', '<h1 style=\"text-align: center; \"><span style=\"background-color: rgb(0, 255, 255);\">العبد لله&nbsp;</span></h1><h1 style=\"text-align: center; \"><span style=\"background-color: rgb(0, 255, 255);\"><img src=\"//uploads/base_64_aZx2XausfzvWY7w70ibBUQY5eDOMazVDGB4x4ZeCVof7PcazDH.jpg\" style=\"width: 100%;\" data-filename=\"IMG_20200719_190756.jpg\"></span></h1>', '2022-03-03 15:58:45', '2022-03-08 08:40:52', 'graduation-project'),
(3, 'Dahab day 2', 5, 'ardzQMU8q850ghTIPC9hDxgAme0seWpFZXiIpAvM.jpg', '<h1 style=\"text-align: center; \"><span style=\"background-color: rgb(0, 255, 255);\">Morning Blue hole</span></h1><h1 style=\"text-align: center; \"><img src=\"/////uploads/base_64_muCeRxGIiQF3Bh0CAskcsXaYG2BWgrJaYOyjeLEOl4KzBQPH5A.jpg\" style=\"width: 814px;\" data-filename=\"20200811_113432.jpg\"><font style=\"background-color: rgb(0, 255, 255);\"><br></font></h1><h1 style=\"text-align: center; \"><font style=\"background-color: rgb(255, 255, 0);\">Mid day </font></h1><h1 style=\"text-align: center; \"><img src=\"/////uploads/base_64_KyEwmz0G6QFZNH1CQ6qvrq2GZVcnmPDlwqtpvHBasfuG75yT7Z.jpg\" style=\"width: 814px;\" data-filename=\"20200811_121858.jpg\"></h1>', '2022-03-08 08:11:53', '2022-03-21 06:53:35', 'dahab-day-2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'khlaed', 'keltaweel25@gmail.com', NULL, '$2y$10$l1wjvI64TTils8ohG2.W2uTPnWo.9at1Uwl4DH8/lotyHu8b2m/W6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_category_index` (`category`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `created_at_2` (`created_at`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_index` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
