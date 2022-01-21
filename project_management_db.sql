-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2022 at 07:10 AM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `role_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_slug` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active_status` tinyint DEFAULT '1' COMMENT 'Active = 1, Inactive = 0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_slug`, `role_detail`, `active_status`, `created_at`) VALUES
(1, 'super admin', 'super_admin', NULL, 1, '2022-01-07 15:10:55'),
(2, 'general user', 'general_user', NULL, 1, '2022-01-07 15:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint DEFAULT '1',
  `is_visible` tinyint DEFAULT '1',
  `mobile_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `active_status`, `is_visible`, `mobile_number`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$DMHbH9wvY.ypRfZVyPiYJu0hnNbCdJIqoeuj2l20.OaIAeMc/dSJS', NULL, '2022-01-07 08:09:09', '2022-01-07 08:09:09', 'Account', 1, 1, ''),
(2, 'Shea', 'g@gmail.com', NULL, '$2y$10$J.KrAZL9nyUK5aGPs3M6mOK4A4Zpg/tLyp0L8D6qeep4ibeEOP9lu', NULL, '2022-01-07 09:42:22', '2022-01-08 05:05:50', 'Mejia', 1, 1, '1212121212121'),
(3, 'manager', 'manager@gmail.com', NULL, '$2y$10$84uLoEG15wskDNji3iJ3bu2oIwklk9sxCBJGWVXxnOo0qhgOnZnDa', NULL, '2022-01-07 09:46:55', '2022-01-08 05:04:03', 'account', 1, 1, '01776214864'),
(4, 'Scarlet', 'tuqy@mailinator.com', NULL, '$2y$10$Qz6bgQy9EbW6fwWkaz.Lgedy7YZ5w5rHMIP54RzBwirh2xP3Q3bJa', NULL, '2022-01-07 20:53:59', '2022-01-07 23:55:09', 'Holman', 1, 0, ''),
(5, 'Jordan', 'cuqexida@mailinator.com', NULL, '$2y$10$cZPPwbsXrzROn/gLQXni5uPGbP4rYGozD67l0DFasjwWs1poJ7hIm', NULL, '2022-01-07 20:54:54', '2022-01-07 23:52:36', 'Dominguez', 1, 0, ''),
(6, 'Randall', 'mutyv@mailinator.com', NULL, '$2y$10$XN/q6cNbm7oTlGoJ0Du9ru9JrTgJAIq2Wsaa.vDvqwNsoDavmOU/C', NULL, '2022-01-07 20:55:02', '2022-01-07 20:55:02', 'Alford', 1, 1, ''),
(7, 'Philip', 'pavaq@mailinator.com', NULL, '$2y$10$9yQF8NgoswBwJJ3gDuqlYeK589YLku2/2VilXZh6T49muioYzNYrW', NULL, '2022-01-07 20:55:13', '2022-01-07 20:55:13', 'Garrett', 1, 1, ''),
(8, 'Tobias', 'loxutumim@mailinator.com', NULL, '$2y$10$k9QYRqlynJDMleoyVlIbfuM3skSesi91Cia5/xYVcdAUVy93wxH2K', NULL, '2022-01-07 20:55:17', '2022-01-07 23:57:24', 'Hahn', 1, 0, ''),
(9, 'Shelby', 'paluwidozo@mailinator.com', NULL, '$2y$10$z4wHQZhZDI/nFIX4F8TOE.V.Snx30nXRmaPFHmOQWeq.GRn6SEi22', NULL, '2022-01-07 20:55:21', '2022-01-07 20:55:21', 'Barrett', 1, 1, ''),
(10, 'Katelyn', 'qaqun@mailinator.com', NULL, '$2y$10$yet.q6d9oJVaJoc4mLk5qejsrbc95jdvIMJM8EUh9vxHpUjLq0x8y', NULL, '2022-01-07 20:55:26', '2022-01-08 00:07:31', 'Burnett', 1, 0, ''),
(11, 'Ori', 'fyjyfet@mailinator.com', NULL, '$2y$10$K3m2dRei9msy6Ljr09gX6Oat.0bdNWnnisjf6bj5msh7Y7L/0NoU6', NULL, '2022-01-07 20:55:32', '2022-01-08 00:07:44', 'Campbell', 2, 0, ''),
(12, 'Keith', 'nokybu@mailinator.com', NULL, '$2y$10$d6XcRolB5wuw0PP1LtDy.uwQlqCP1rlYHc3UIyWU4f90z2Tof6nO.', NULL, '2022-01-07 20:55:37', '2022-01-07 20:55:37', 'Gardner', 1, 1, ''),
(13, 'Ciaran', 'hagopuzo@mailinator.com', NULL, '$2y$10$ELzOPRucdCrjPdTPi/0VmOZr7BahpYeWvwfGNDYQ5Vc7gXifVCEy.', NULL, '2022-01-07 23:30:36', '2022-01-07 23:30:36', 'William', 1, 1, ''),
(14, 'Kevin', 'somifo@mailinator.com', NULL, '$2y$10$RC8DW5MpmAV2z0bEVYf9M.MYgXo9/bjhULMu24Q/AphJUl0.gTwde', NULL, '2022-01-07 23:39:01', '2022-01-08 00:04:56', 'Serrano', 2, 0, ''),
(15, 'Robin', 'mepeso@mailinator.com', NULL, '$2y$10$qTwYC1euX6JrZ1Vy3G67lef3vPyomuxzn869Tk.1hexNorZjyEhzC', NULL, '2022-01-07 23:39:33', '2022-01-08 00:05:04', 'Barlow', 1, 0, ''),
(16, 'Hilda', 'togugufov@mailinator.com', NULL, '$2y$10$RYprkBqpCRxEpbFbIdYIv.vOUKIsSBnhUrcIcw3cwgHGfNDKcw946', NULL, '2022-01-08 01:49:29', '2022-01-08 01:49:44', 'Randolph', 2, 0, ''),
(17, 'Quon', 'gituqyr@mailinator.com', NULL, '$2y$10$xEhRrcQymKIRt6LchpQFmO4zKR4fOKNUuKTHY9Vfutl0hv9nDipOG', NULL, '2022-01-08 04:51:08', '2022-01-08 04:51:08', 'Oliver', 1, 1, '994');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `active_status` tinyint DEFAULT '1' COMMENT 'Active = 1, Inactive = 0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `active_status`, `created_at`) VALUES
(1, 1, 1, 1, '2022-01-07 15:12:23'),
(2, 2, 2, 1, '2022-01-07 15:43:59'),
(3, 3, 2, 1, '2022-01-07 15:47:27'),
(4, 4, 2, 1, '2022-01-07 20:53:59'),
(5, 5, 2, 1, '2022-01-07 20:54:54'),
(6, 6, 2, 1, '2022-01-07 20:55:02'),
(7, 7, 2, 1, '2022-01-07 20:55:13'),
(8, 8, 2, 1, '2022-01-07 20:55:17'),
(9, 9, 2, 1, '2022-01-07 20:55:21'),
(10, 10, 2, 1, '2022-01-07 20:55:26'),
(11, 11, 2, 1, '2022-01-07 20:55:32'),
(12, 12, 2, 1, '2022-01-07 20:55:37'),
(13, 13, 2, 1, '2022-01-07 23:30:36'),
(14, 14, 2, 1, '2022-01-07 23:39:01'),
(15, 15, 2, 1, '2022-01-07 23:39:33'),
(16, 16, 2, 1, '2022-01-08 01:49:29'),
(17, 17, 2, 1, '2022-01-08 04:51:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
