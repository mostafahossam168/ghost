-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 06:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghost`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ادمن', 'admin@gmail.com', '$2y$12$mfpr6XBaRCuBWeRFFO0LDeltZJUkDVVmJndZLdiv5hkrjBrqTkR6C', NULL, NULL, '2024-06-25 20:36:50', '2024-06-25 20:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `scheduled_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount_amount` decimal(8,2) NOT NULL,
  `discount_percentage` tinyint(3) UNSIGNED DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `usage_limit` int(10) UNSIGNED DEFAULT NULL,
  `used` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_users`
--

CREATE TABLE `coupon_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_01_23_152057_create_services_table', 1),
(5, '2024_01_23_152446_create_bookings_table', 1),
(6, '2024_01_25_034311_create_reviews_table', 1),
(7, '2024_01_25_042302_create_coupons_table', 1),
(8, '2024_02_04_074823_create_support_faqs_table', 1),
(9, '2024_02_04_092106_create_coupon_users_table', 1),
(10, '2024_04_22_200131_create_scooters_table', 1),
(11, '2024_04_23_171927_create_scooter_device_infos_table', 1),
(12, '2024_04_23_172009_create_scooter_g_p_s_data_table', 1),
(13, '2024_04_23_172022_create_scooter_battery_statuses_table', 1),
(14, '2024_04_23_172038_create_scooter_control_infos_table', 1),
(15, '2024_06_25_085904_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'token-name', '6103b4fa41006a70fd0ea4df08e8933e7b2c337244f94fab37e9aec048a6e101', '[\"*\"]', '2024-06-25 21:27:04', NULL, '2024-06-25 21:04:57', '2024-06-25 21:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scooters`
--

CREATE TABLE `scooters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imei` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scooters`
--

INSERT INTO `scooters` (`id`, `imei`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '11111', 1, '2024-06-25 20:36:53', '2024-06-25 20:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `scooter_battery_statuses`
--

CREATE TABLE `scooter_battery_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scooter_id` bigint(20) UNSIGNED NOT NULL,
  `battery_status_1` int(11) DEFAULT NULL,
  `battery_status_2` int(11) DEFAULT NULL,
  `battery_temperature` int(11) DEFAULT NULL,
  `battery_voltage` int(11) DEFAULT NULL,
  `battery_current` int(11) DEFAULT NULL,
  `full_charged_capacity` int(11) DEFAULT NULL,
  `battery_soc` int(11) DEFAULT NULL,
  `battery_cycle_times` int(11) DEFAULT NULL,
  `battery_data_updated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scooter_control_infos`
--

CREATE TABLE `scooter_control_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scooter_id` bigint(20) UNSIGNED NOT NULL,
  `electronic_lock` enum('LOCK_STATUS_LOCK','LOCK_STATUS_UNLOCK','LOCK_STATUS_CHECKING') NOT NULL DEFAULT 'LOCK_STATUS_LOCK',
  `front_lights_control` tinyint(1) NOT NULL DEFAULT 0,
  `cable_lock_control` enum('LOCK_STATUS_LOCK','LOCK_STATUS_UNLOCK','LOCK_STATUS_CHECKING') NOT NULL DEFAULT 'LOCK_STATUS_LOCK',
  `battery_lock_control` enum('LOCK_STATUS_LOCK','LOCK_STATUS_UNLOCK','LOCK_STATUS_CHECKING') NOT NULL DEFAULT 'LOCK_STATUS_LOCK',
  `tail_light_control` tinyint(1) NOT NULL DEFAULT 0,
  `electronic_fence` tinyint(1) NOT NULL DEFAULT 0,
  `find_car_response_time` int(11) DEFAULT NULL,
  `unlocked_state_upload_interval` int(11) DEFAULT NULL,
  `locked_state_upload_interval` int(11) DEFAULT NULL,
  `speed_mode` enum('SPEED_MODE_1','SPEED_MODE_2','SPEED_MODE_3') DEFAULT NULL,
  `speed_limit_mode_1` int(11) DEFAULT NULL,
  `speed_limit_mode_2` int(11) DEFAULT NULL,
  `speed_limit_mode_3` int(11) DEFAULT NULL,
  `cruise_control` tinyint(1) NOT NULL DEFAULT 0,
  `starting_mode` tinyint(1) NOT NULL DEFAULT 0,
  `speed_button_switch` tinyint(1) NOT NULL DEFAULT 0,
  `led_button` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scooter_device_infos`
--

CREATE TABLE `scooter_device_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scooter_id` bigint(20) UNSIGNED NOT NULL,
  `iccid` varchar(255) DEFAULT NULL,
  `iot_hw` int(11) DEFAULT NULL,
  `iot_sw` int(11) DEFAULT NULL,
  `ecu_hw` int(11) DEFAULT NULL,
  `ecu_sw` int(11) DEFAULT NULL,
  `ota` int(11) DEFAULT NULL,
  `soc` int(11) DEFAULT NULL,
  `iot_battery` int(11) DEFAULT NULL,
  `iot_voltage` int(11) DEFAULT NULL,
  `config_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scooter_device_infos`
--

INSERT INTO `scooter_device_infos` (`id`, `scooter_id`, `iccid`, `iot_hw`, `iot_sw`, `ecu_hw`, `ecu_sw`, `ota`, `soc`, `iot_battery`, `iot_voltage`, `config_count`, `created_at`, `updated_at`) VALUES
(1, 1, '2313', 1, 1, 1, 455, 23, 23, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scooter_g_p_s_data`
--

CREATE TABLE `scooter_g_p_s_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scooter_id` bigint(20) UNSIGNED NOT NULL,
  `scroll_serial_number` int(11) DEFAULT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  `altitude` int(11) DEFAULT NULL,
  `number_of_satellites` int(11) DEFAULT NULL,
  `gps_validity` enum('GPS_VALIDITY_BAD',' GPS_VALIDITY_POSITION_2D',' GPS_VALIDITY_POSITION_3D') NOT NULL DEFAULT 'GPS_VALIDITY_BAD',
  `signal_strength` int(11) DEFAULT NULL,
  `trip_time_seconds` int(11) DEFAULT NULL,
  `trip_distance_km` double(8,2) DEFAULT NULL,
  `current_speed_kmh` double(8,2) DEFAULT NULL,
  `iot_fault_code` int(11) DEFAULT NULL,
  `cot_fault_code` int(11) DEFAULT NULL,
  `iot_temperature` int(11) DEFAULT NULL,
  `cot_temperature` int(11) DEFAULT NULL,
  `motor_temperature` int(11) DEFAULT NULL,
  `battery_temperature` int(11) DEFAULT NULL,
  `battery_level` int(11) DEFAULT NULL,
  `front_light_status` tinyint(1) NOT NULL DEFAULT 0,
  `tail_light_status` tinyint(1) NOT NULL DEFAULT 0,
  `cable_lock_status` enum('CABLE_LOCK_STATUS_OFF',' CABLE_LOCK_STATUS_ON',' CABLE_LOCK_STATUS_OFFLINE') NOT NULL DEFAULT 'CABLE_LOCK_STATUS_OFF',
  `battery_lock_status` enum('BATTERY_LOCK_STATUS_OFF',' BATTERY_LOCK_STATUS_ON',' BATTERY_LOCK_STATUS_OFFLINE') NOT NULL DEFAULT 'BATTERY_LOCK_STATUS_OFF',
  `iot_alarm_information` enum('IOT_ALARM_INFORMATION_UNSPECIFIED',' IOT_ALARM_INFORMATION_IOT_REMOVED',' IOT_ALARM_INFORMATION_LOW_POWER') NOT NULL DEFAULT 'IOT_ALARM_INFORMATION_UNSPECIFIED',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `duration`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'animi', 'Et est eum aperiam qui.', 26, '203.88', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(2, 'est', 'Maxime dolores inventore sit beatae molestiae pariatur.', 114, '171.54', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(3, 'fuga', 'Debitis quaerat in cumque illo illo qui vel ipsum.', 64, '351.97', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(4, 'ea', 'Harum ea qui est molestias animi sunt.', 34, '420.96', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(5, 'libero', 'Ut et doloremque dicta.', 38, '162.53', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(6, 'architecto', 'Numquam tenetur alias ratione laboriosam illo itaque veniam.', 32, '53.81', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(7, 'nostrum', 'Corrupti tenetur quia asperiores vero non nostrum.', 58, '176.13', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(8, 'aut', 'Ducimus voluptate enim hic sit ipsa consequatur velit.', 30, '175.96', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(9, 'est', 'Consequatur labore a atque.', 84, '101.74', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50'),
(10, 'deleniti', 'Dolor adipisci ea reprehenderit consequatur cumque ea.', 105, '156.08', 1, '2024-06-25 20:36:50', '2024-06-25 20:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `support_faqs`
--

CREATE TABLE `support_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support_faqs`
--

INSERT INTO `support_faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'odio', 'Quae at.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(2, 'amet', 'Est.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(3, 'beatae', 'Doloremque ut.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(4, 'nostrum', 'Sint.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(5, 'accusantium', 'Architecto.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(6, 'dolorem', 'Illum.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(7, 'ut', 'Aut.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(8, 'numquam', 'Rerum.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(9, 'omnis', 'Eos.', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(10, 'et', 'Accusamus qui.', '2024-06-25 20:36:53', '2024-06-25 20:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country_code` varchar(60) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `notifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{\n                    "email": true,\n                    "sms": false\n                }' CHECK (json_valid(`notifications`)),
  `privacy` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{\n                    "profile_visibility": "Friends",\n                    "last_seen": "Nobody"\n                }' CHECK (json_valid(`privacy`)),
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `country_code`, `phone`, `otp`, `status`, `email_verified_at`, `password`, `notifications`, `privacy`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oleta Stoltenberg', 'geovanny46@example.com', '', '(704) 844-2912', NULL, 1, '2024-06-25 20:36:50', '$2y$12$tAlS3P46eQpwmPVHIBBd/uNyUFu5ku2bMI.g80Qpi0uOpUxFJNOc6', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', '1vdQajG4E2', '2024-06-25 20:36:53', '2024-06-25 21:04:57'),
(2, 'Creola Goldner', 'aauer@example.net', '', '+18435464496', '0000', 1, '2024-06-25 20:36:50', '$2y$12$XzsMFQDDcwJqefaeJqLUJu/xBz5ET5SW5FYV7Ns1ctwoz7x9Smc9W', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', 'dFTaHLVe6C', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(3, 'Mrs. Fanny Padberg Sr.', 'turner43@example.net', '', '+1 (832) 243-9989', '0000', 1, '2024-06-25 20:36:51', '$2y$12$rzGKRaEvka1rP7UuqHx/f.Ed0PEQmfJ9h3AII5ZkVODwzMn1QsBvW', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', 'cVHUKWQ6NO', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(4, 'Lera Purdy', 'santos58@example.org', '', '+1-618-559-7235', '0000', 1, '2024-06-25 20:36:51', '$2y$12$nnKnm54f8OHmkVAVH.86JOFx1W1gn0N6ftoxzEtwsXh8ZxC4iLnim', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', 'T9XXwqYwku', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(5, 'Dino Huels', 'alvena.white@example.org', '', '+1-510-485-2347', '0000', 1, '2024-06-25 20:36:51', '$2y$12$KgMSXkvSVcJmL/mnSac62O/2Yp/WSPz/Nr9PHc4todtUrLz4LYAsG', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', 'Mwyf6w2Lee', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(6, 'Aubrey Crooks', 'klein.boyd@example.net', '', '616-883-4785', '0000', 1, '2024-06-25 20:36:52', '$2y$12$0gd1rj0.2leyqGFCDuraquWQl/EDGGtZDqvGlYfFqV7DkpNIE.xVy', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', '7CGfIbIOlZ', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(7, 'Aiden Price I', 'imogene90@example.net', '', '1-254-274-9629', '0000', 1, '2024-06-25 20:36:52', '$2y$12$pKZV5RCa5WYJ0bJ8rNirTeGLy/14VMKIC0guyHulsyUfQZWDxq3lu', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', 'ryRb1WXNam', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(8, 'Alford Huels', 'fadel.jevon@example.net', '', '574.727.6201', '0000', 1, '2024-06-25 20:36:52', '$2y$12$yHyJptUoijVGZBnZMB9o8O1mGCmLOeL9.ClMHs/0qkzwIln4NJjI2', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', 'qkaW2A4drx', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(9, 'Leda Senger', 'kelton.carter@example.net', '', '+1 (573) 427-6752', '0000', 1, '2024-06-25 20:36:53', '$2y$12$LqI1QJCSIpytcQT9f90Oz.lDT5tEXWZFnfUFIYbwXg4npSXyaJcKi', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', '5UTYdyjTwR', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(10, 'Meda Lesch', 'rheller@example.net', '', '907.971.2827', '0000', 1, '2024-06-25 20:36:53', '$2y$12$pj.6GSZs9RATnoR.q5tHNuSpbCFc4/yS/rD1HqmdlFWgw3/QUx0dW', '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', 'APxc6wBOv3', '2024-06-25 20:36:53', '2024-06-25 20:36:53'),
(11, 'Mostafa', NULL, '+20', '1064564850', '0000', 1, NULL, NULL, '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', NULL, '2024-06-25 21:04:41', '2024-06-25 21:04:41'),
(12, 'Mostafa', NULL, '+20', '1064564855', '0000', 1, NULL, NULL, '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', NULL, '2024-06-25 21:36:03', '2024-06-25 21:36:03'),
(13, 'Mostafa', NULL, '+20', '1064564854', '0000', 1, NULL, NULL, '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', NULL, '2024-06-25 21:42:57', '2024-06-25 21:42:57'),
(14, 'Mostafa', NULL, '+20', '1064564859', '0000', 1, NULL, NULL, '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', NULL, '2024-06-25 21:44:16', '2024-06-25 21:44:16'),
(15, 'Mostafa', 'mo@gmail.com', '+20', '1064564858', '0000', 1, NULL, NULL, '{\n                    \"email\": true,\n                    \"sms\": false\n                }', '{\n                    \"profile_visibility\": \"Friends\",\n                    \"last_seen\": \"Nobody\"\n                }', NULL, '2024-06-25 21:44:58', '2024-06-25 21:44:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_users_coupon_id_user_id_unique` (`coupon_id`,`user_id`),
  ADD KEY `coupon_users_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_service_id_foreign` (`service_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `scooters`
--
ALTER TABLE `scooters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scooters_user_id_foreign` (`user_id`);

--
-- Indexes for table `scooter_battery_statuses`
--
ALTER TABLE `scooter_battery_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scooter_battery_statuses_scooter_id_foreign` (`scooter_id`);

--
-- Indexes for table `scooter_control_infos`
--
ALTER TABLE `scooter_control_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scooter_control_infos_scooter_id_foreign` (`scooter_id`);

--
-- Indexes for table `scooter_device_infos`
--
ALTER TABLE `scooter_device_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scooter_device_infos_scooter_id_foreign` (`scooter_id`);

--
-- Indexes for table `scooter_g_p_s_data`
--
ALTER TABLE `scooter_g_p_s_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scooter_g_p_s_data_scooter_id_foreign` (`scooter_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_faqs`
--
ALTER TABLE `support_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_users`
--
ALTER TABLE `coupon_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scooters`
--
ALTER TABLE `scooters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scooter_battery_statuses`
--
ALTER TABLE `scooter_battery_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scooter_control_infos`
--
ALTER TABLE `scooter_control_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scooter_device_infos`
--
ALTER TABLE `scooter_device_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scooter_g_p_s_data`
--
ALTER TABLE `scooter_g_p_s_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `support_faqs`
--
ALTER TABLE `support_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD CONSTRAINT `coupon_users_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scooters`
--
ALTER TABLE `scooters`
  ADD CONSTRAINT `scooters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scooter_battery_statuses`
--
ALTER TABLE `scooter_battery_statuses`
  ADD CONSTRAINT `scooter_battery_statuses_scooter_id_foreign` FOREIGN KEY (`scooter_id`) REFERENCES `scooters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scooter_control_infos`
--
ALTER TABLE `scooter_control_infos`
  ADD CONSTRAINT `scooter_control_infos_scooter_id_foreign` FOREIGN KEY (`scooter_id`) REFERENCES `scooters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scooter_device_infos`
--
ALTER TABLE `scooter_device_infos`
  ADD CONSTRAINT `scooter_device_infos_scooter_id_foreign` FOREIGN KEY (`scooter_id`) REFERENCES `scooters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scooter_g_p_s_data`
--
ALTER TABLE `scooter_g_p_s_data`
  ADD CONSTRAINT `scooter_g_p_s_data_scooter_id_foreign` FOREIGN KEY (`scooter_id`) REFERENCES `scooters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
