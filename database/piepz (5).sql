-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piepz`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Toys > Ronde ballenbak zonder ballen - 90x30 &amp', NULL, '1', '2023-08-22 06:00:54', '2023-08-22 06:00:54', NULL),
(2, ' 90x40', NULL, '1', '2023-08-22 06:00:54', '2023-08-22 06:00:54', NULL),
(3, 'Toys > Ballenbak Bestseller - 90x30 cm', NULL, '1', '2023-08-22 06:01:12', '2023-08-22 06:01:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `product_id`, `category_id`, `product_sku`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'B001001', '2023-08-22 06:00:54', NULL),
(2, 1, 2, 'B001001', '2023-08-22 06:00:54', NULL),
(3, 2, 1, 'B001002', '2023-08-22 06:00:55', NULL),
(4, 2, 2, 'B001002', '2023-08-22 06:00:55', NULL),
(5, 3, 1, 'B001003', '2023-08-22 06:00:56', NULL),
(6, 3, 2, 'B001003', '2023-08-22 06:00:56', NULL),
(7, 4, 1, 'B001004', '2023-08-22 06:00:59', NULL),
(8, 4, 2, 'B001004', '2023-08-22 06:00:59', NULL),
(9, 5, 1, 'B001005', '2023-08-22 06:01:01', NULL),
(10, 5, 2, 'B001005', '2023-08-22 06:01:01', NULL),
(11, 6, 3, 'B001006', '2023-08-22 06:01:13', NULL),
(12, 7, 3, 'B001007', '2023-08-22 06:01:24', NULL),
(13, 8, 3, 'B001008', '2023-08-22 06:01:40', NULL),
(14, 9, 3, 'B001009', '2023-08-22 06:01:41', NULL),
(15, 10, 3, 'B001010', '2023-08-22 06:01:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_name`, `website_url`, `created_at`, `updated_at`) VALUES
(1, 221, 'Vendor c1', '#', '2023-08-22 06:00:51', '2023-08-22 06:00:51');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(255) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `media_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `module`, `module_id`, `sku`, `media_url`, `created_at`, `updated_at`) VALUES
(1, 'products', '1', 'B001001', 'products/169270205364e49565343bb.jpg', '2023-08-22 06:00:54', '2023-08-22 06:00:54'),
(2, 'products', '2', 'B001002', 'products/169270205564e4956782aa3.jpg', '2023-08-22 06:00:55', '2023-08-22 06:00:55'),
(3, 'products', '3', 'B001003', 'products/169270205664e49568b7452.jpg', '2023-08-22 06:00:56', '2023-08-22 06:00:56'),
(4, 'products', '4', 'B001004', 'products/169270205964e4956b555de.jpg', '2023-08-22 06:00:59', '2023-08-22 06:00:59'),
(5, 'products', '5', 'B001005', 'products/169270206164e4956d3fdf8.jpg', '2023-08-22 06:01:01', '2023-08-22 06:01:01'),
(6, 'products', '6', 'B001006', 'products/169270207264e49578ec7f3.jpg', '2023-08-22 06:01:13', '2023-08-22 06:01:13'),
(7, 'products', '7', 'B001007', 'products/169270208464e49584acdfd.jpg', '2023-08-22 06:01:24', '2023-08-22 06:01:24'),
(8, 'products', '8', 'B001008', 'products/169270210064e4959412092.jpg', '2023-08-22 06:01:40', '2023-08-22 06:01:40'),
(9, 'products', '9', 'B001009', 'products/169270210164e495951cfca.jpg', '2023-08-22 06:01:41', '2023-08-22 06:01:41'),
(10, 'products', '10', 'B001010', 'products/169270210364e495970e86e.jpg', '2023-08-22 06:01:43', '2023-08-22 06:01:43');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2023_08_02_081108_create_companies_table', 1),
(15, '2023_08_03_172906_create_packages_table', 2),
(17, '2023_08_04_145531_create_purchase_package_marketplaces_table', 3),
(18, '2023_08_04_145809_create_purchase_package_functionalities_table', 3),
(19, '2023_08_04_150314_create_purchase_package_addons_table', 4),
(20, '2023_08_03_173346_create_purchase_packages_table', 5),
(21, '2023_08_03_1646142_create_categories_table', 6),
(22, '2023_08_03_1646144_create_products_table', 6),
(23, '2023_08_06_093941_create_user_transactions_table', 6),
(24, '2023_08_11_153205_create_category_products_table', 7),
(25, '2023_08_11_164918_create_images_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_title` varchar(255) DEFAULT NULL,
  `package_description` text DEFAULT NULL,
  `package_price` int(11) DEFAULT NULL,
  `durations` varchar(255) DEFAULT NULL,
  `duration_price` varchar(211) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_title`, `package_description`, `package_price`, `durations`, `duration_price`, `created_at`, `updated_at`) VALUES
(1, 'Standard', '<ul><li>op1</li><li>op2</li><li>op3</li></ul>', 50, '1 month,6 month,12 month', '50,44,37.5', NULL, '2023-08-15 13:19:07'),
(2, 'Companies', '<ul><li>Max 25k Revenue</li><li>Max 5000 SKUs</li><li>30 dealers</li></ul>', 100, '1 month,6 month,12 month', '100,88,75', NULL, '2023-08-16 08:36:09'),
(3, 'Enterprice', '<ul><li>Max 35k Revenue</li><li>Max 15000 SKUs</li></ul>', 200, '1 month,6 month,12 month', '200,176,150', NULL, '2023-08-16 08:36:29'),
(4, 'Free', '<ul class=\"ps-3 my-4 pt-2\">\r\n                <li class=\"mb-2\">Max 35k Revenue</li>\r\n                <li class=\"mb-2\">Max 15000 SKUs</li>\r\n                <li class=\"mb-2\">50 dealers</li>\r\n                <li class=\"mb-2\">Automate own dealers (max 150) </li>\r\n                <li class=\"mb-0\">onboarding </li>\r\n                <li class=\"mb-0\">Support</li>\r\n                <li class=\"mb-0\">Open Api</li>\r\n              </ul>', 300, '14 days', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('yakckr@ail.com', 'yz1tMwR6dfyGJzPQAEX9G8u1ILvgWG9bXuBEW4XeJGCNesDxNs66NKzWxwdFznCr', '2023-08-15 16:11:28'),
('yakckr@ail.com', 'Dsy8dcEz1YjGfMsOCWUFvIr8xP8LxJpBabsMKknjbikOLMXljCmJLUtAz23m4ZOv', '2023-08-15 16:15:55'),
('yakckr@ail.com', 'eo8r7V7j48vLVxQwu21LGexijdrOzQrX9GoLJsqwjMJSqTDabys74yXg91G7K9Ac', '2023-08-15 16:19:41'),
('yakckr@ail.com', '20bSJ77MojdodYACxmMALxc2gCLeh3fmFwu2TcMuOY9ohtjZZ8Ek0pONa4dwNpsJ', '2023-08-15 16:24:24'),
('admin@pakjanwar.com', 'wG9cSzgyhXdxP6aSE96xEZWAnCSC2saCbjl06Zqz1iBg4JAB9g2YUEePJN4F7uaP', '2023-08-18 04:33:00');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `in_stock` int(11) NOT NULL DEFAULT 0,
  `low_stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_featured` enum('0','1') NOT NULL DEFAULT '0',
  `is_approved` enum('0','1','2') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `sku`, `slug`, `name`, `type`, `price`, `stock`, `in_stock`, `low_stock`, `image`, `description`, `short_description`, `status`, `is_featured`, `is_approved`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 221, NULL, 'B001004', '64e4956b611c01692702059', 'Ronde Ballenbak zonder ballen - 90x30 cm - Mint', NULL, 26.00, 999, 1, 0, 'products/169270205964e4956b555de.jpg', NULL, '26', '1', '0', '0', '2023-08-22 06:00:59', '2023-08-22 06:00:59', NULL),
(5, 221, NULL, 'B001005', '64e4956d40b531692702061', 'Ronde Ballenbak zonder ballen - 90x30 cm - Zwart', NULL, 26.00, 998, 1, 0, 'products/169270206164e4956d3fdf8.jpg', NULL, '26', '1', '0', '0', '2023-08-22 06:01:01', '2023-08-22 06:01:01', NULL),
(6, 221, NULL, 'B001006', '64e49578edc021692702072', 'BESTSELLER 30cm - Cupcake Set', NULL, 48.00, 999, 1, 0, 'products/169270207264e49578ec7f3.jpg', NULL, '48', '1', '0', '0', '2023-08-22 06:01:12', '2023-08-22 06:01:12', NULL),
(7, 221, NULL, 'B001007', '64e49584b39411692702084', 'BESTSELLER 30cm - Little Swan Set', NULL, 48.00, 993, 1, 0, 'products/169270208464e49584acdfd.jpg', NULL, '48', '1', '0', '0', '2023-08-22 06:01:24', '2023-08-22 06:01:24', NULL),
(8, 221, NULL, 'B001008', '64e49594130ca1692702100', 'BESTSELLER 30cm - Glamour Set', NULL, 48.00, 985, 1, 0, 'products/169270210064e4959412092.jpg', NULL, '48', '1', '0', '0', '2023-08-22 06:01:40', '2023-08-22 06:01:40', NULL),
(9, 221, NULL, 'B001009', '64e495951e9051692702101', 'VELVET BESTSELLER 30cm - Teddy Beer Set', NULL, 53.00, 972, 1, 0, 'products/169270210164e495951cfca.jpg', NULL, '53', '1', '0', '0', '2023-08-22 06:01:41', '2023-08-22 06:01:41', NULL),
(10, 221, NULL, 'B001010', '64e49597184c11692702103', 'BESTSELLER 30cm - Dreams Set', NULL, 48.00, 999, 1, 0, 'products/169270210364e495970e86e.jpg', NULL, '48', '1', '0', '0', '2023-08-22 06:01:43', '2023-08-22 06:01:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_packages`
--

CREATE TABLE `purchase_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_duration_price` int(11) DEFAULT NULL,
  `package_duration` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `addons` varchar(255) DEFAULT NULL,
  `marketplaces` varchar(255) DEFAULT NULL,
  `functionalities` varchar(255) DEFAULT NULL,
  `webshops` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_package_addons`
--

CREATE TABLE `purchase_package_addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_package_addons`
--

INSERT INTO `purchase_package_addons` (`id`, `title`, `description`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Extra Manufactorer', NULL, 15, NULL, NULL, NULL),
(2, 'Extra SKUs', NULL, 20, NULL, NULL, NULL),
(3, 'No Limit Order Automation', NULL, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_package_functionalities`
--

CREATE TABLE `purchase_package_functionalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_package_functionalities`
--

INSERT INTO `purchase_package_functionalities` (`id`, `title`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Email And Invoice', 400, 'Monthly Payment', NULL, NULL),
(2, 'Accounting Tool', 400, 'Monthly Payment', NULL, NULL),
(3, 'Profit calculator', 200, 'Monthly Payment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_package_marketplaces`
--

CREATE TABLE `purchase_package_marketplaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_package_marketplaces`
--

INSERT INTO `purchase_package_marketplaces` (`id`, `title`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Shopify', 150, 'Single Payment', NULL, NULL),
(2, 'Woocommerce\r\n', 250, 'Single Payment', NULL, NULL),
(3, 'Bol.com', 200, 'Single Payment', NULL, NULL),
(4, 'Amazon', 200, 'Single Payment', NULL, NULL),
(5, 'Etsy.com', 300, 'Single Payment', NULL, NULL),
(6, 'Kaufland.de', 190, 'Single Payment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(211) DEFAULT NULL,
  `type` varchar(211) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip` varchar(211) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `coc_number` varchar(255) DEFAULT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `type`, `first_name`, `last_name`, `address`, `zip`, `phone`, `country`, `coc_number`, `tax_number`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(184, 'admin', NULL, 'Piepz', 'Admin', NULL, NULL, '1-8882051816', NULL, NULL, NULL, 'piepz@getnada.com', NULL, '$2y$10$hU7dBj43wyllTOQiCbiHNezuA./ahQQo20990hkipNa9TFgVAohlG', NULL, 2, '2023-08-19 13:11:41', '2023-08-19 17:32:02'),
(221, 'vendor', NULL, 'Vendor', 'john', 'address', NULL, '5418956094', 'country', '6327501102', '3557791199', 'yas@getnada.com', NULL, '$2y$10$qPypWKl/kNmCMUywgXqvHeIgJ7jRyOmnPgnLc9AdyU/BXBSkXcokq', NULL, 1, '2023-08-22 06:00:51', '2023-08-22 06:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE `user_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `module` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  `total_charges` decimal(8,2) NOT NULL DEFAULT 0.00,
  `gateway_fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `net_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `platform_fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `gateway_transaction_id` varchar(255) NOT NULL,
  `gateway` enum('stripe','paypal') NOT NULL DEFAULT 'stripe',
  `gateway_response` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_name_index` (`name`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_name_category_id_price_user_id_index` (`name`,`category_id`,`price`,`user_id`);

--
-- Indexes for table `purchase_packages`
--
ALTER TABLE `purchase_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_package_addons`
--
ALTER TABLE `purchase_package_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_package_functionalities`
--
ALTER TABLE `purchase_package_functionalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_package_marketplaces`
--
ALTER TABLE `purchase_package_marketplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_transactions_sender_id_foreign` (`sender_id`),
  ADD KEY `user_transactions_receiver_id_foreign` (`receiver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_packages`
--
ALTER TABLE `purchase_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `purchase_package_addons`
--
ALTER TABLE `purchase_package_addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_package_functionalities`
--
ALTER TABLE `purchase_package_functionalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_package_marketplaces`
--
ALTER TABLE `purchase_package_marketplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `user_transactions`
--
ALTER TABLE `user_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_transactions`
--
ALTER TABLE `user_transactions`
  ADD CONSTRAINT `user_transactions_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_transactions_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
