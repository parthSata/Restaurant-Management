-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantmanagement`
--
CREATE DATABASE IF NOT EXISTS `restaurantmanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `restaurantmanagement`;

-- --------------------------------------------------------

--
-- Table structure for table `added_items`
--

CREATE TABLE `added_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_on_items`
--

CREATE TABLE `add_on_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_added` tinyint(1) NOT NULL DEFAULT 0,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_on_items`
--

INSERT INTO `add_on_items` (`id`, `name`, `description`, `price`, `category_id`, `image`, `created_at`, `updated_at`, `is_added`, `menu_id`) VALUES
(4, 'Sydnee Moran', 'Numquam eaque qui re', 614.00, 8, 'addOnItems/sydnee-moran_1728997179.png', '2024-10-15 07:29:39', '2024-10-22 13:50:18', 0, NULL),
(5, 'Brianna Mays', 'Animi enim ipsam as', 847.00, 10, 'addOnItems/brianna-mays_1728997189.jpg', '2024-10-15 07:29:49', '2024-10-22 13:50:15', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Pizza Marghrita', 'Best Pizza Ever', 'Categories/pizza_1728563448.png', '2024-10-10 07:00:48', '2024-10-10 07:01:06'),
(10, 'Burger', 'Vitae id impedit s', 'Categories/burger_1728630347.png', '2024-10-11 01:35:47', '2024-10-11 01:35:47'),
(11, 'Xander Austin', 'Soluta animi sequi', 'Categories/xander-austin_1729520616.png', '2024-10-21 08:53:36', '2024-10-21 08:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('percentage','fixed') NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` enum('draft','publish') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `discount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'FLATE40OFF', 'fixed', 53.00, '1973-05-26', 'draft', '2024-09-20 07:37:36', '2024-10-05 08:51:20'),
(3, 'ABCDEF0007', 'percentage', 5.00, '2023-05-18', 'publish', '2024-09-20 07:37:36', '2024-09-20 07:37:36'),
(4, 'FLAT20', 'fixed', 64.00, '1973-01-20', 'publish', '2024-09-20 07:37:36', '2024-10-05 09:31:18'),
(7, 'Julian Burgess', 'percentage', 82.00, '1992-10-21', 'draft', '2024-10-21 08:52:29', '2024-10-21 08:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `orders_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Customer','Seller','Admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`id`, `name`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(10, 'Fast Food', NULL, 'Menu_Images/1729174885.jpg', '2024-10-17 08:51:25', '2024-10-17 08:51:25'),
(11, 'Gujrati Food', 10, 'Menu_Images/1729174902.png', '2024-10-17 08:51:42', '2024-10-17 08:51:42'),
(12, 'Australian Food', 11, 'Menu_Images/1729174960.png', '2024-10-17 08:52:40', '2024-10-17 08:52:40'),
(13, 'Elmo Moore', NULL, 'Menu_Images/1729515324.png', '2024-10-21 07:25:24', '2024-10-21 07:25:24');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_05_133403_create_registrations_table', 1),
(6, '2024_09_05_135610_create_logins_table', 2),
(7, '2024_09_05_142239_add_role_to_users_table', 3),
(8, '2024_09_05_142648_add_role_to_registrations_table', 4),
(9, '2024_09_10_121910_create_restaurant_table', 5),
(20, '2024_09_22_051039_add_new_columns_to_restaurants_table', 6),
(21, '2024_09_19_131341_create_transactions_table', 7),
(23, '2024_09_19_132536_create_customers_table', 8),
(24, '2024_09_22_053244_create_restaurants_table', 9),
(25, '2024_09_28_115949_create_restaurants__table', 10),
(26, '2024_10_06_130521_create_categories_table', 11),
(27, '2024_10_10_040346_create_add_on_items_table', 12),
(28, '2024_10_16_122858_create_menu_types_table', 13),
(32, '2024_10_18_075249_add_is_added_to_add_on_items_table', 14),
(33, '2024_10_18_134011_add_menu_id_to_add_on_items_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(10, 'Jakeem', 'Caldwell', 'zenone@mailinator.com', '$2y$12$h4O9nHmF...', 'customer', '2024-09-22 07:37:36', '2024-09-22 07:37:36'),
(11, 'Ciara', 'Torres', 'pekyzugil@mailinator.com', '$2y$12$fTWmPD5.40gIcOY.YfHyYueLAXiw8U73AFkZNQmKpfigssWbSGOzO', 'admin', '2024-09-28 00:31:56', '2024-09-28 00:31:56'),
(12, 'Hakeem', 'Cunningham', 'dizexavaci@mailinator.com', '$2y$12$9gMLaP3pHIzp9/kcqQCzFeuZ.1zb/RgIBFZJhBIw9eMJsZJX/xMP.', 'admin', '2024-09-28 00:32:13', '2024-09-28 00:32:13'),
(13, 'Parth', 'Sata', 'Parth1709@gmail.com', '$2y$12$20ounjj15p5zgi3yA34DbO7o.fdx.ZxBYmcCtWf1GaMP8m/7oZuEC', 'admin', '2024-09-30 07:10:36', '2024-09-30 07:10:36'),
(14, 'Harsh', 'Tankariya', 'h1@gmail.com', '$2y$12$5nAF0tQdfIWiLIl2yVrq8OzqcI9slFCA1qudpFzuuNpN76U60D1uy', 'seller', '2024-10-03 06:21:05', '2024-10-03 06:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_slug` varchar(255) NOT NULL,
  `contact_first_name` varchar(255) NOT NULL,
  `contact_last_name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about_us` text NOT NULL,
  `short_about` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `restaurant_type` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `restaurant_slug`, `contact_first_name`, `contact_last_name`, `contact_phone`, `contact_email`, `password`, `about_us`, `short_about`, `service_type`, `status`, `currency`, `restaurant_type`, `logo`, `favicon`, `feature_image`, `created_at`, `updated_at`) VALUES
(10, 'Yuri Bauer', 'Dolor est enim ea al', 'Kaye', 'Mcconnell', '71', 'doqor@mailinator.com', 'Pa$$w0rd!', 'Ullamco est ipsum fu', 'Nostrum earum dolor', 'Delivery', 'active', 'EUR', 'FastFood', '1727795060-Food-delivery-logo-with-bike-man-on-transparent-background-PNG.png', '1727766301-Food-delivery-logo-with-bike-man-on-transparent-background-PNG.png', '1727766301-Restaurant.jpeg', '2024-10-01 01:33:47', '2024-10-01 09:34:20'),
(11, 'Gajanan Resort', 'gajanan-resort', 'Parth', 'Sata', '7778945754', 'gajananresort@gmail.com', '12345678', 'Balaji BhelBalaji Bhel CentreRavechi HotelRadhe Kathiyavadi RestaurantKshemankari RestaurantJay Jalaram KhamanVerai HotelMandavrayji RestaurantBharat HotelI Shree Khodiyar Maa Hotel & Garden RestaurantGayatri HotelFcs Restro CafeMurlidhar RestaurantHotel PratikshaAai Shree Khodiyar HotelHimalay Soda & Softy Cold DrinksRamraj HotelBhagvati Food ZoneShreenath Pav Bhaji Paneer Pulav Centre', 'Balaji BhelBalaji Bhel CentreRavechi HotelRadhe Kathiyavadi RestaurantKshemankari RestaurantJay Jalaram KhamanVerai HotelMandavrayji ZoneShreenath Pav Bhaji Paneer Pulav Centre', 'Delivery', 'active', 'USD', 'CasualDining', '1727795606-Logo.jpg', '1727795606-Logo.jpg', '1727795606-Rectangle 75.png', '2024-10-01 09:43:26', '2024-10-01 09:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_gateway` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_status` enum('pending','paid') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `payment_gateway`, `amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'ABCDEF0007', 'Paypal', 55.00, 'paid', '2024-09-20 07:37:36', '2024-09-20 07:37:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_items`
--
ALTER TABLE `added_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_on_items`
--
ALTER TABLE `add_on_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `add_on_items_category_id_foreign` (`category_id`),
  ADD KEY `add_on_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_types_parent_id_foreign` (`parent_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurants_restaurant_slug_unique` (`restaurant_slug`),
  ADD UNIQUE KEY `restaurants_contact_email_unique` (`contact_email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_items`
--
ALTER TABLE `added_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_on_items`
--
ALTER TABLE `add_on_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_on_items`
--
ALTER TABLE `add_on_items`
  ADD CONSTRAINT `add_on_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `add_on_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD CONSTRAINT `menu_types_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
