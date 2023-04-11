-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 10:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `namebrand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `namebrand`) VALUES
(5, 'Safeplanet'),
(6, 'Whal & Dolph'),
(11, 'DEPT');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_02_10_165251_create_users_table', 2),
(10, '2023_02_28_113618_create_orders_table', 2),
(11, '2023_02_28_113740_create_order_details_table', 2),
(12, '2023_03_16_104717_create_statuses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) UNSIGNED NOT NULL,
  `u_id` int(11) NOT NULL,
  `ordernumber` varchar(255) NOT NULL,
  `tracking` varchar(255) NOT NULL DEFAULT '-',
  `status` int(255) NOT NULL,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `slip` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `u_id`, `ordernumber`, `tracking`, `status`, `total`, `slip`, `created_at`, `updated_at`) VALUES
(2040, 3, 'TB-202303317508', '1761823786502442.png', 3, '5265.00', '1761823259295939.png', '2023-03-31 02:42:27', '2023-03-31 02:46:32'),
(2041, 3, 'TB-202303319398', '1761825635224944.png', 3, '955.00', '1761824329864373.png', '2023-03-31 03:03:23', '2023-03-31 03:03:33'),
(2042, 3, 'TB-202303318135', '1762008725034685.png', 3, '2010.00', '1762008686417907.png', '2023-03-31 03:51:50', '2023-04-02 03:53:49'),
(2043, 5, 'TB-202304026260', '1762059081306030.png', 3, '500.00', '1762059025624529.png', '2023-04-02 17:13:04', '2023-04-02 17:13:56'),
(2044, 3, 'TB-202304027839', '1762094406708336.png', 3, '2775.00', '1762066571640899.png', '2023-04-02 19:13:12', '2023-04-02 19:13:53'),
(2053, 3, 'TB-202304039077', '1762239210819897.png', 3, '5050.00', '1762092770878327.png', '2023-04-03 01:54:30', '2023-04-03 02:10:18'),
(2054, 3, 'TB-202304032118', '1762287439329138.png', 3, '2000.00', '1762161768991459.png', '2023-04-03 20:26:38', '2023-04-03 20:27:00'),
(2058, 3, 'TB-202304054838', '1762354083095507.png', 3, '1150.00', '1762287618418504.png', '2023-04-05 05:47:08', '2023-04-05 05:47:19'),
(2059, 3, 'TB-202304055939', '1762413928940397.png', 3, '1820.00', '1762413838567536.png', '2023-04-05 17:37:14', '2023-04-06 15:13:32'),
(2060, 3, 'TB-202304065097', '1762586480934728.png', 2, '1435.00', '1762429440992908.png', '2023-04-06 18:10:20', '2023-04-06 19:21:32'),
(2061, 3, 'TB-202304065793', '1762586626229095.png', 2, '1090.00', '1762507592327913.png', '2023-04-06 23:44:25', '2023-04-07 16:03:43'),
(2062, 3, 'TB-202304071394', '1762577941088725.png', 2, '6085.00', '1762549119370465.png', '2023-04-07 16:04:09', '2023-04-08 03:03:46'),
(2063, 3, 'TB-202304087927', '1762575029685010.png', 3, '455.00', '1762574992941276.png', '2023-04-08 09:54:52', '2023-04-08 09:55:01'),
(2064, 3, 'TB-202304082568', '1762586606463448.png', 2, '910.00', '1762578580195313.png', '2023-04-08 10:50:42', '2023-04-08 10:52:02'),
(2065, 3, 'TB-202304083717', '1762586743427931.png', 2, '455.00', '1762586682248405.png', '2023-04-08 10:52:40', '2023-04-08 13:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_size`, `product_price`, `amount`, `created_at`, `updated_at`) VALUES
(200, 2040, 33, 'T-Pound รุ่น Contour', 'L', '455.00', 1, '2023-03-30 19:42:27', '2023-03-30 19:42:27'),
(201, 2040, 34, 'Safeboy The Cats', 'L', '500.00', 2, '2023-03-30 19:42:28', '2023-03-30 19:43:54'),
(202, 2040, 35, 'T_047', 'M', '455.00', 2, '2023-03-30 19:42:31', '2023-03-30 19:43:35'),
(203, 2040, 37, 'YEWTOPIA', 'L', '550.00', 2, '2023-03-30 19:42:37', '2023-03-30 19:43:37'),
(204, 2040, 36, 'Whal & Dolph', 'L', '600.00', 3, '2023-03-30 19:42:40', '2023-03-30 19:43:46'),
(205, 2041, 35, 'T_047', 'M', '455.00', 1, '2023-03-30 20:03:23', '2023-03-30 20:03:23'),
(206, 2041, 34, 'Safeboy The Cats', 'L', '500.00', 1, '2023-03-30 20:03:25', '2023-03-30 20:03:25'),
(207, 2042, 35, 'T_047', 'M', '455.00', 2, '2023-03-30 20:51:50', '2023-04-01 20:53:40'),
(208, 2042, 37, 'YEWTOPIA', 'L', '550.00', 2, '2023-03-30 20:51:53', '2023-04-01 20:53:39'),
(209, 2043, 34, 'Safeboy The Cats', 'L', '500.00', 1, '2023-04-02 10:13:04', '2023-04-02 10:13:04'),
(210, 2044, 33, 'T-Pound รุ่น Contour', 'L', '455.00', 4, '2023-04-02 12:13:12', '2023-04-02 12:13:20'),
(211, 2044, 34, 'Safeboy The Cats', 'L', '500.00', 1, '2023-04-02 12:13:15', '2023-04-02 12:13:15'),
(212, 2044, 35, 'T_047', 'M', '455.00', 1, '2023-04-02 12:13:17', '2023-04-02 12:13:17'),
(213, 2045, 33, 'T-Pound รุ่น Contour', 'L', '455.00', 5, '2023-04-02 12:19:40', '2023-04-02 12:19:57'),
(215, 2045, 34, 'Safeboy The Cats', 'L', '500.00', 1, '2023-04-02 16:37:43', '2023-04-02 16:37:43'),
(217, 2046, 35, 'T_047', 'M', '455.00', 1, '2023-04-02 16:38:25', '2023-04-02 16:38:25'),
(221, 2047, 35, 'T_047', 'M', '455.00', 1, '2023-04-02 16:41:33', '2023-04-02 16:41:33'),
(224, 2048, 36, 'Whal & Dolph', 'L', '600.00', 1, '2023-04-02 16:42:19', '2023-04-02 16:42:19'),
(236, 2052, 34, 'Safeboy The Cats', 'L', '500.00', 1, '2023-04-02 18:46:52', '2023-04-02 18:46:52'),
(238, 2053, 34, 'Safeboy The Cats', 'L', '500.00', 1, '2023-04-02 18:54:30', '2023-04-02 18:54:30'),
(239, 2053, 33, 'T-Pound รุ่น Contour', 'L', '455.00', 10, '2023-04-02 18:56:46', '2023-04-02 18:57:08'),
(240, 2054, 34, 'Safeboy The Cats', 'L', '500.00', 4, '2023-04-03 13:26:38', '2023-04-03 13:26:41'),
(245, 2058, 36, 'Whal & Dolph', 'L', '600.00', 1, '2023-04-04 22:47:08', '2023-04-04 22:47:08'),
(246, 2058, 37, 'YEWTOPIA', 'L', '550.00', 1, '2023-04-04 22:47:10', '2023-04-04 22:47:10'),
(247, 2059, 35, 'T_047', 'M', '455.00', 2, '2023-04-05 10:37:14', '2023-04-05 15:44:21'),
(248, 2059, 33, '33', 'L', '455.00', 2, '2023-04-05 15:44:26', '2023-04-05 15:50:04'),
(249, 2060, 35, 'T_047', 'M', '455.00', 1, '2023-04-06 11:10:20', '2023-04-06 11:10:20'),
(250, 2060, 41, 'THUNDER DEPT', 'L', '490.00', 2, '2023-04-06 12:20:07', '2023-04-06 12:20:46'),
(251, 2061, 36, 'Whal & Dolph', 'L', '600.00', 1, '2023-04-06 16:44:25', '2023-04-07 09:03:35'),
(252, 2061, 41, 'THUNDER DEPT', 'L', '490.00', 1, '2023-04-06 16:57:44', '2023-04-07 09:03:32'),
(253, 2062, 36, 'Whal & Dolph', 'L', '600.00', 1, '2023-04-07 09:04:09', '2023-04-07 09:04:09'),
(254, 2062, 35, 'T_047', 'M', '455.00', 2, '2023-04-07 17:38:44', '2023-04-07 17:47:32'),
(255, 2062, 40, 'DEPT จะครองโลก', 'M', '590.00', 1, '2023-04-07 17:38:46', '2023-04-07 17:38:46'),
(256, 2062, 42, 'Dept T-Shirt', 'L', '500.00', 4, '2023-04-07 17:38:49', '2023-04-07 17:58:34'),
(257, 2062, 41, 'THUNDER DEPT', 'L', '490.00', 2, '2023-04-07 17:38:52', '2023-04-07 17:47:27'),
(258, 2062, 33, '33', 'L', '455.00', 1, '2023-04-07 17:38:55', '2023-04-07 17:38:55'),
(259, 2062, 37, 'YEWTOPIA', 'L', '550.00', 1, '2023-04-07 17:47:35', '2023-04-07 17:47:35'),
(260, 2063, 35, 'T_047', 'M', '455.00', 1, '2023-04-08 02:54:52', '2023-04-08 02:54:52'),
(261, 2064, 33, 'พราว', 'L', '455.00', 2, '2023-04-08 03:50:42', '2023-04-08 03:51:50'),
(262, 2065, 35, 'T_047', 'M', '455.00', 1, '2023-04-08 03:52:40', '2023-04-08 03:52:40');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `festival` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand` int(255) NOT NULL,
  `size` varchar(10) NOT NULL,
  `chest` varchar(10) NOT NULL,
  `lenght` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `festival`, `price`, `brand`, `size`, `chest`, `lenght`, `color`, `picture`, `stock`) VALUES
(34, 'Safeboy The Cats', 'Cat T-Shirt 6', '500.00', 5, 'L', '44', '30', 'black', '1761811811020649.png', 0),
(36, 'Whal & Dolph', 'Cat T-Shirt 6', '600.00', 6, 'L', '42', '29', 'black', '1761812017913595.jpg', 6),
(40, 'DEPT จะครองโลก', 'CAT T-SHIRT7', '590.00', 11, 'M', '40', '29', 'white', '1762415628277051.jpg', 19),
(41, 'THUNDER DEPT', '-', '490.00', 11, 'L', '44', '30', 'black', '1762415746154837.jpg', 5),
(42, 'Dept T-Shirt', 'Cat Expo 5', '500.00', 11, 'L', '42', '30', 'white', '1762415915576555.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `idst` int(20) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`idst`, `detail`) VALUES
(1, 'ยังไม่ได้จัดส่ง'),
(2, 'จัดส่งแล้ว'),
(3, 'ได้รับสินค้าเรียบร้อย');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `urole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phonenumber`, `username`, `password`, `address`, `province`, `district`, `postcode`, `picture`, `urole`) VALUES
(2, 'admin', 'admin', '0000000', 'admin', '$2y$10$JS3A1RmZkzRb7iVVVbg6eO6Cm014fX1csSAFwrFEJ8I4Q.q/zwS/W', '20/20 ต.แสนสุข', '-', '-', '-', NULL, 'admin'),
(3, 'frameqq', 'tee', '0999991111', 'framee', '$2y$10$SvMIP2yZReeuq6Em.YnTJONueuuneNpWSRYoZthn3vukl0uDyrYA2', '20/1 ต.แสนสุข', 'ชลบุรี', 'เมืองชลบุรี', '20001', '1762574962599746.jpg', 'user'),
(5, 'องอาจ', 'อาจอง', '0889997777', 'NuJErD', '$2y$10$WKh/G/GSqQBkWCFlWT5GOeLcFj5OeYMRdqYFHdHVpWNdbO.OxGzg6', '20/20 ต.แสนสุข', 'ชลบุรี', 'เมือง', '2000', '1762059205067580.jpg', 'user'),
(6, 'มานอน', 'หลงหลง', '0889997777', 'nujerdzzzzzzzz', '$2y$10$QAIeSrS/SlDYgunOMYSYM.Xh75aN8jtNSX.LLRknBAfoTXAOw/x62', '20/20 ต.แสนสุข', 'ชลบุรี', 'เมืองชลบุรี', '20003', '1762065026789563.jpg', 'user'),
(7, 'abcd', 'หลงหลง', '0889997777', 'nujerd2', '$2y$10$JZZsvF/srphWg6TY11nnY.Zny.WmS3jWPLgXsuuMWNRkIo.4SzLAG', '20/20 ต.แสนสุข', 'ชลบุรี', 'เมืองชลบุรี', '20003', '1762491284780537.jpg', 'user'),
(8, 'frame', 'nunnu', '0999999999', 'frame', '$2y$10$Hq/QyG3d7qQlaEU99j7ykerMSCd02iDhTYcUxdxQs.6kGcujclk6G', '20/1', 'ชลบุรี', 'พานทอง', '20160', '1762578427166666.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`idst`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2066;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `idst` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `statuses` (`idst`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
