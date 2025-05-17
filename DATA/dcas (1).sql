-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2025 at 05:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcas`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `dentist_id` bigint UNSIGNED NOT NULL,
  `appointment_status_id` bigint UNSIGNED NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `dentist_id`, `appointment_status_id`, `appointment_date`, `appointment_time`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, '2025-05-20', '15:00:00', '2025-05-16 18:42:36', '2025-05-16 18:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_services`
--

CREATE TABLE `appointment_services` (
  `id` bigint UNSIGNED NOT NULL,
  `appointment_id` bigint UNSIGNED NOT NULL,
  `dental_service_id` bigint UNSIGNED NOT NULL,
  `treatment_status_id` bigint UNSIGNED NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_services`
--

INSERT INTO `appointment_services` (`id`, `appointment_id`, `dental_service_id`, `treatment_status_id`, `total_cost`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 1, '1000.00', '2025-05-16 19:39:13', '2025-05-16 19:39:13'),
(6, 2, 4, 1, '25000.00', '2025-05-16 19:39:25', '2025-05-16 19:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_statuses`
--

CREATE TABLE `appointment_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_statuses`
--

INSERT INTO `appointment_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(2, 'Confirmed', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(3, 'Completed', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(4, 'Cancelled', '2025-05-09 10:55:53', '2025-05-09 10:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `dental_services`
--

CREATE TABLE `dental_services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dental_services`
--

INSERT INTO `dental_services` (`id`, `name`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'Teeth Cleaning', '1000.00', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(2, 'Tooth Extraction', '1500.00', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(3, 'Dental Filling', '1200.00', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(4, 'Braces Installation', '25000.00', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(5, 'Root Canal Treatment', '5000.00', '2025-05-09 10:55:53', '2025-05-09 10:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `dentists`
--

CREATE TABLE `dentists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dentists`
--

INSERT INTO `dentists` (`id`, `user_id`, `specialization`, `created_at`, `updated_at`) VALUES
(2, 6, 'General Dentistry', '2025-05-09 18:44:11', '2025-05-09 18:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2025_05_09_080134_create_roles_table', 1),
(5, '2025_05_09_080154_create_user_statuses_table', 1),
(6, '2025_05_09_080160_create_users_table', 1),
(7, '2025_05_09_152501_create_patients_table', 1),
(8, '2025_05_09_152518_create_dentists_table', 1),
(9, '2025_05_09_160114_create_dental_services_table', 1),
(10, '2025_05_09_160130_create_appointment_statuses_table', 1),
(11, '2025_05_09_160132_create_appointments_table', 1),
(12, '2025_05_09_175340_create_treatment_statuses_table', 1),
(13, '2025_05_09_175341_create_appointment_services_table', 1),
(14, '2025_05_09_184247_create_payment_statuses_table', 1),
(15, '2025_05_09_184249_create_payments_table', 1);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `phone_number`, `address`, `birthdate`, `gender`, `created_at`, `updated_at`) VALUES
(2, 5, '09123456789', 'Brgy. Vito Minglanilla', '2000-10-02', 'Female', '2025-05-09 15:49:20', '2025-05-09 16:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `appointment_id` bigint UNSIGNED NOT NULL,
  `payment_status_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `appointment_id`, `payment_status_id`, `amount`, `payment_date`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '26000.00', '2025-05-16', '2025-05-16 20:12:17', '2025-05-16 20:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_statuses`
--

INSERT INTO `payment_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(2, 'Completed', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(3, 'Failed', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(4, 'Cancelled', '2025-05-09 10:55:53', '2025-05-09 10:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(7, 'App\\Models\\User', 1, 'auth_token', '59b0ced826a700fe93cab8e4b4733a01b111479f3166729cf4377db1c4ea743c', '[\"*\"]', NULL, NULL, '2025-05-14 02:31:34', '2025-05-14 02:31:34'),
(8, 'App\\Models\\User', 1, 'auth_token', '274ddfe6a9ea54051939d46dc74c6facc0f8226e25f74c4e7da3fc15b371d117', '[\"*\"]', '2025-05-16 19:44:37', NULL, '2025-05-16 16:25:36', '2025-05-16 19:44:37'),
(9, 'App\\Models\\User', 1, 'auth_token', '7aa563b721770c2f70710f06a6d5cac49aac5171a137dc2bd550b85ed8464eb2', '[\"*\"]', '2025-05-16 20:17:30', NULL, '2025-05-16 20:09:48', '2025-05-16 20:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2025-05-09 10:55:52', '2025-05-09 10:55:52'),
(2, 'Patient', '2025-05-09 10:55:52', '2025-05-09 10:55:52'),
(3, 'Dentist', '2025-05-09 10:55:52', '2025-05-09 10:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_statuses`
--

CREATE TABLE `treatment_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatment_statuses`
--

INSERT INTO `treatment_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(2, 'Ongoing', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(3, 'Completed', '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(4, 'Cancelled', '2025-05-09 10:55:53', '2025-05-09 10:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `user_status_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `user_status_id`, `first_name`, `middle_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Admin', NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$l.AHea7XNOMlJEPqBaUm0eQwZ5NqSGjG1Axxy8lUrS6P9yheas6Pa', NULL, NULL, '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(3, 3, 1, 'Rasheed', 'Paradela', 'Tapales', 'rasheed@gmail.com', NULL, '$2y$10$3/CjtVvQgSizHoiv6FKA/On3jKwB4dH59y4IeqxbcPD0u/Fbpjo0O', NULL, NULL, '2025-05-09 10:55:53', '2025-05-09 10:55:53'),
(4, 1, 1, 'Admin', NULL, 'Admin', 'admin123@gmail.com', NULL, '$2y$10$SXYuFDeKrQ5mfsR.IvwJlea/TmXBOP9/OccFM0Vghwa2WsPDNTezu', NULL, NULL, '2025-05-09 14:39:21', '2025-05-09 14:39:21'),
(5, 2, 1, 'Mica', 'Sellote', 'Lariosa', 'mica@gmail.com', NULL, '$2y$10$pVxm8ys5MsSTtuoqwSNwTOz8sT5HjmnKTuernNXu59LSlc91wADk2', NULL, NULL, '2025-05-09 15:46:37', '2025-05-09 15:56:15'),
(6, 3, 1, 'Necka', NULL, 'Payao', 'necka@gmail.com', NULL, '$2y$10$ty8efP3MjbYYZxW84KVHuu6NKy06FH0b/fCZdTfZkNf/aQyhXdkgC', NULL, NULL, '2025-05-09 18:44:00', '2025-05-09 18:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2025-05-09 10:55:52', '2025-05-09 10:55:52'),
(2, 'Inactive', '2025-05-09 10:55:52', '2025-05-09 10:55:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_dentist_id_foreign` (`dentist_id`),
  ADD KEY `appointments_appointment_status_id_foreign` (`appointment_status_id`);

--
-- Indexes for table `appointment_services`
--
ALTER TABLE `appointment_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_services_appointment_id_foreign` (`appointment_id`),
  ADD KEY `appointment_services_dental_service_id_foreign` (`dental_service_id`),
  ADD KEY `appointment_services_treatment_status_id_foreign` (`treatment_status_id`);

--
-- Indexes for table `appointment_statuses`
--
ALTER TABLE `appointment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dental_services`
--
ALTER TABLE `dental_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentists`
--
ALTER TABLE `dentists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentists_user_id_foreign` (`user_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_payment_status_id_foreign` (`payment_status_id`),
  ADD KEY `payments_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment_statuses`
--
ALTER TABLE `treatment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_user_status_id_foreign` (`user_status_id`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment_services`
--
ALTER TABLE `appointment_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment_statuses`
--
ALTER TABLE `appointment_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dental_services`
--
ALTER TABLE `dental_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dentists`
--
ALTER TABLE `dentists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `treatment_statuses`
--
ALTER TABLE `treatment_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_appointment_status_id_foreign` FOREIGN KEY (`appointment_status_id`) REFERENCES `appointment_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_dentist_id_foreign` FOREIGN KEY (`dentist_id`) REFERENCES `dentists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_services`
--
ALTER TABLE `appointment_services`
  ADD CONSTRAINT `appointment_services_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_services_dental_service_id_foreign` FOREIGN KEY (`dental_service_id`) REFERENCES `dental_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_services_treatment_status_id_foreign` FOREIGN KEY (`treatment_status_id`) REFERENCES `treatment_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dentists`
--
ALTER TABLE `dentists`
  ADD CONSTRAINT `dentists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `payments_payment_status_id_foreign` FOREIGN KEY (`payment_status_id`) REFERENCES `payment_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_user_status_id_foreign` FOREIGN KEY (`user_status_id`) REFERENCES `user_statuses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
