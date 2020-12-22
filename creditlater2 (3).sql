-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2020 at 07:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creditlater2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `date_joined` datetime NOT NULL DEFAULT '2020-12-14 16:50:15',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `phone`, `state`, `address`, `city`, `country`, `about`, `token`, `active`, `last_login`, `date_joined`, `created_at`, `updated_at`) VALUES
(11, 'anonye', 'charles', 'admin@gmail.com', '$2y$10$2Jft1clSkiDLgEOHz9HRj.5bqMDRfVe/3jx8rFMiiS5ybSuRBEERO', NULL, '09022222222', 'Lagos', 'sun,onu along', 'ikotun', 'Nigeria', 'i love to code', '5fd885bfb548711', 1, '2020-12-22 06:25:59', '2020-12-14 16:50:15', '2020-12-15 08:45:35', '2020-12-22 05:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_date_added` datetime NOT NULL,
  `brand_last_modified` datetime DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `is_feature` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_date_added`, `brand_last_modified`, `is_approved`, `is_feature`, `created_at`, `updated_at`) VALUES
(1, 'levis', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(2, 'addidass', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(3, 'shantel', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(4, 'gucci', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 0, 1, NULL, NULL),
(5, 'vassarette', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(6, 'Versace ', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 0, 1, NULL, NULL),
(7, 'chinos', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(8, 'levis', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(9, 'Microsoft', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 0, 1, NULL, NULL),
(10, 'Toyota', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(11, 'Samsung', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 0, 1, NULL, NULL),
(12, 'McDonald', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(13, 'Disney ', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(14, 'Oracle', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 0, 1, NULL, NULL),
(15, 'Cisco', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(16, 'Audi', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(17, 'Nescafe', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(18, 'eBay ', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(19, 'Nissan', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 0, 1, NULL, NULL),
(20, 'Allianz', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `total` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` text COLLATE utf8mb4_unicode_ci,
  `round_cat_image` text COLLATE utf8mb4_unicode_ci,
  `date_added` datetime NOT NULL DEFAULT '2020-12-14 16:50:14',
  `last_modified` datetime DEFAULT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`, `round_cat_image`, `date_added`, `last_modified`, `is_feature`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 'fashions', '/vendors/images/category_image/01.png', '/vendors/images/round_category/1.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 0, 1, NULL, NULL),
(2, 'book', '/vendors/images/category_image/02.png', '/vendors/images/round_category/2.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 0, NULL, NULL),
(3, 'sports', '/vendors/images/category_image/03.png', '/vendors/images/round_category/3.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(4, 'electronics', '/vendors/images/category_image/04.png', '/vendors/images/round_category/4.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(5, 'toys', '/vendors/images/category_image/05.png', '/vendors/images/round_category/5.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(6, 'footwares', '/vendors/images/category_image/06.png', '/vendors/images/round_category/6.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 0, NULL, NULL),
(7, 'games', '/vendors/images/category_image/07.png', '/vendors/images/round_category/1.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL),
(8, 'adventure', '/vendors/images/category_image/08.png', '/vendors/images/round_category/3.png', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_brand`
--

DROP TABLE IF EXISTS `category_brand`;
CREATE TABLE IF NOT EXISTS `category_brand` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_brand`
--

INSERT INTO `category_brand` (`id`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 2, 7, NULL, NULL),
(8, 2, 8, NULL, NULL),
(9, 2, 9, NULL, NULL),
(10, 2, 10, NULL, NULL),
(11, 3, 11, NULL, NULL),
(12, 3, 12, NULL, NULL),
(13, 3, 13, NULL, NULL),
(14, 3, 14, NULL, NULL),
(15, 3, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

DROP TABLE IF EXISTS `cookies`;
CREATE TABLE IF NOT EXISTS `cookies` (
  `cookie_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cookie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantors`
--

DROP TABLE IF EXISTS `guarantors`;
CREATE TABLE IF NOT EXISTS `guarantors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `state_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_registered` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installments`
--

DROP TABLE IF EXISTS `installments`;
CREATE TABLE IF NOT EXISTS `installments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `installment_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `installment` int(11) NOT NULL,
  `installment_count` int(11) NOT NULL,
  `initial_payment` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0',
  `is_delivered` tinyint(1) NOT NULL DEFAULT '0',
  `paid_date` datetime NOT NULL DEFAULT '2020-12-14 16:50:15',
  `date_delivered` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installments`
--

INSERT INTO `installments` (`id`, `installment_user_id`, `reference`, `unique_key`, `first_name`, `last_name`, `email`, `phone`, `state`, `address`, `city`, `country`, `postal_code`, `shipping`, `total_price`, `installment`, `installment_count`, `initial_payment`, `balance`, `is_complete`, `is_delivered`, `paid_date`, `date_delivered`, `created_at`, `updated_at`) VALUES
(4, '1', '17772050', '365fda553eeac96', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'Lagos', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'local pickup', 20000, 2, 2, 8000, 12000, 1, 0, '2020-12-14 16:50:15', NULL, '2020-12-16 17:43:10', '2020-12-18 09:50:55'),
(3, '1', '136446351', '365fd9da1bebab5', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'Lagos', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'local pickup', 38000, 4, 3, 13500, 14500, 0, 0, '2020-12-14 16:50:15', NULL, '2020-12-16 08:57:47', '2020-12-16 08:59:56'),
(11, '1', '1364463511', '365fdc8f0f3f4d9', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'Lagos', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'local pickup', 60000, 4, 4, 22000, 38000, 0, 0, '2020-12-14 16:50:15', NULL, '2020-12-18 10:14:23', '2020-12-18 10:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `installment_balance`
--

DROP TABLE IF EXISTS `installment_balance`;
CREATE TABLE IF NOT EXISTS `installment_balance` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `balance_user_id` int(11) NOT NULL,
  `balance_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_unique_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_total_price` int(11) NOT NULL,
  `balance_paid` int(11) NOT NULL,
  `balance_balance` int(11) NOT NULL,
  `balance_paid_date` datetime NOT NULL DEFAULT '2020-12-14 16:50:15',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installment_balance`
--

INSERT INTO `installment_balance` (`id`, `balance_user_id`, `balance_reference`, `balance_unique_key`, `balance_total_price`, `balance_paid`, `balance_balance`, `balance_paid_date`, `created_at`, `updated_at`) VALUES
(2, 1, '136446351', '365fd9da1bebab5', 38000, 10000, 14500, '2020-12-14 16:50:15', NULL, NULL),
(4, 1, '1364463511', '365fdc8ad0eae7e', 60000, 22000, 38000, '2020-12-14 16:50:15', NULL, NULL),
(6, 1, '1364463511', '365fdc8f0f3f4d9', 60000, 22000, 38000, '2020-12-14 16:50:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `installment_methods`
--

DROP TABLE IF EXISTS `installment_methods`;
CREATE TABLE IF NOT EXISTS `installment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `range` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installment_methods`
--

INSERT INTO `installment_methods` (`id`, `range`, `count`, `date_added`, `created_at`, `updated_at`) VALUES
(1, 20000, 2, '2020-12-14 16:17:50', NULL, NULL),
(2, 30000, 3, '2020-12-14 16:17:50', NULL, NULL),
(3, 50000, 4, '2020-12-14 16:17:50', NULL, NULL),
(4, NULL, 6, '2020-12-14 16:17:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `installment_products`
--

DROP TABLE IF EXISTS `installment_products`;
CREATE TABLE IF NOT EXISTS `installment_products` (
  `installment_product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_date` datetime NOT NULL DEFAULT '2020-12-14 16:50:15',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`installment_product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installment_products`
--

INSERT INTO `installment_products` (`installment_product_id`, `user_id`, `product_id`, `reference_number`, `price`, `quantity`, `total`, `size`, `paid_date`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '136446351', 75000, 1, 75000, 'unspecified', '2020-12-14 16:50:15', '2020-12-16 08:43:44', '2020-12-16 08:43:44'),
(2, 1, 13, '136446351', 16000, 1, 16000, 'small', '2020-12-14 16:50:15', '2020-12-15 12:35:36', '2020-12-15 12:35:36'),
(4, 1, 7, '1364463511', 38000, 1, 38000, 'small', '2020-12-14 16:50:15', '2020-12-16 08:57:47', '2020-12-16 08:57:47'),
(5, 1, 1, '136446351', 20000, 1, 20000, 'unspecified', '2020-12-14 16:50:15', '2020-12-16 17:43:10', '2020-12-16 17:43:10'),
(6, 1, 8, '1364463511', 60000, 1, 60000, 'unspecified', '2020-12-14 16:50:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_13_094734_create_products_table', 1),
(2, '2020_10_13_142133_create_categories_table', 1),
(3, '2020_10_14_074129_create_sliders_table', 1),
(4, '2020_10_14_144710_create_brands_table', 1),
(5, '2020_10_15_092539_create_product_solds_table', 1),
(6, '2020_10_16_104540_create_payment_methods_table', 1),
(7, '2020_10_16_121120_create_category_brand_table', 1),
(8, '2020_10_18_123519_create_ratings_table', 1),
(9, '2020_10_20_102718_create_price_ranges_table', 1),
(10, '2020_10_23_094910_create_carts_table', 1),
(11, '2020_10_31_164219_create_users_table', 1),
(12, '2020_11_01_073822_create_wishlists_table', 1),
(13, '2020_11_02_113921_create_product_reviews_table', 1),
(14, '2020_11_04_071928_create_guarantors_table', 1),
(15, '2020_11_04_113637_create_verifications_table', 1),
(16, '2020_11_05_123432_create_paids_table', 1),
(17, '2020_11_06_071748_create_paid_buyers_table', 1),
(18, '2020_11_06_131656_create_installments_table', 1),
(19, '2020_11_08_001659_create_installment_products_table', 1),
(20, '2020_11_08_163739_create_installment_balance_table', 1),
(21, '2020_11_10_153825_create_return_products_table', 1),
(22, '2020_11_10_200959_create_installment_methods_table', 1),
(23, '2020_11_12_093055_create_vendors_table', 1),
(24, '2020_12_14_161753_create_admins_table', 1),
(25, '2020_12_16_121717_create_cookies_table', 2),
(26, '2020_12_16_124203_create_visitors_table', 3),
(27, '2020_12_16_155323_create_p_reviews_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `paids`
--

DROP TABLE IF EXISTS `paids`;
CREATE TABLE IF NOT EXISTS `paids` (
  `paid_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`paid_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paids`
--

INSERT INTO `paids` (`paid_id`, `buyer_user_id`, `product_id`, `reference_number`, `price`, `quantity`, `total`, `size`, `paid_date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '460431635', 75000, 1, 75000, '0', '2020-12-14 16:50:14', '2020-12-15 11:06:54', '2020-12-15 11:06:54'),
(2, 1, 2, '482780662', 75000, 1, 75000, '0', '2020-12-14 16:50:14', '2020-12-15 12:18:08', '2020-12-15 12:18:08'),
(5, 1, 8, '415305944', 60000, 1, 60000, '0', '2020-12-14 16:50:14', '2020-12-15 14:38:31', '2020-12-15 14:38:31'),
(6, 1, 9, '682472996', 50000, 1, 50000, '0', '2020-12-14 16:50:14', '2020-12-15 14:42:58', '2020-12-15 14:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `paid_buyers`
--

DROP TABLE IF EXISTS `paid_buyers`;
CREATE TABLE IF NOT EXISTS `paid_buyers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `is_delivered` tinyint(1) NOT NULL DEFAULT '0',
  `paid_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_delivered` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_buyers`
--

INSERT INTO `paid_buyers` (`id`, `user_id`, `reference`, `first_name`, `last_name`, `email`, `phone`, `state`, `address`, `city`, `country`, `postal_code`, `shipping`, `amount`, `is_delivered`, `paid_date`, `date_delivered`, `created_at`, `updated_at`) VALUES
(1, '1', '460431635', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'ikotun', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'free shipping', 75000, 1, '2020-12-14 16:50:14', NULL, '2020-12-15 11:06:54', '2020-12-15 11:06:54'),
(2, '1', '482780662', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'ikotun', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'free shipping', 95000, 0, '2020-12-15 16:50:14', NULL, '2020-12-15 12:18:08', '2020-12-15 12:18:08'),
(6, '1', '897893329', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'ikotun', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'local pickup', 20000, 0, '2020-12-16 19:40:41', NULL, '2020-12-16 17:40:41', '2020-12-16 17:40:41'),
(4, '1', '415305944', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'ikotun', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'local pickup', 60000, 0, '2020-12-14 16:50:14', NULL, '2020-12-15 14:38:31', '2020-12-15 14:38:31'),
(5, '1', '682472996', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'ikotun', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'local pickup', 50000, 0, '2020-12-15 16:42:58', NULL, '2020-12-15 14:42:58', '2020-12-15 14:42:58'),
(7, '1', '897893327', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'Lagos', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'free shipping', 40000, 0, '2020-12-18 08:21:22', NULL, '2020-12-18 06:21:22', '2020-12-18 06:21:22'),
(8, '1', '8978933210', 'anonye', 'charles', 'anonyecharles@gmail.com', '09022222222', 'Lagos', 'sun,onu along', 'ikotun', 'Nigeria', '123', 'local pickup', 115000, 0, '2020-12-18 08:37:47', NULL, '2020-12-18 06:37:47', '2020-12-18 06:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method_name`, `payment_link`, `payment_method_image`, `active`, `date_added`, `created_at`, `updated_at`) VALUES
(1, 'visa', '', 'web/images/layout-1/pay/1.png', 1, '2020-12-14 16:17:50', NULL, NULL),
(2, 'mmaster card', '', 'web/images/layout-1/pay/2.png', 1, '2020-12-14 16:17:50', NULL, NULL),
(3, 'pay pal', '', 'web/images/layout-1/pay/3.png', 1, '2020-12-14 16:17:50', NULL, NULL),
(4, 'unkown', '', 'web/images/layout-1/pay/4.png', 1, '2020-12-14 16:17:50', NULL, NULL),
(5, 'unkown', '', 'web/images/layout-1/pay/5.png', 1, '2020-12-14 16:17:50', NULL, NULL),
(6, 'erfgh', '', 'web/images/pay/image_5fe0887c5e7d0.jpg', 0, '2020-12-21 11:35:24', '2020-12-21 11:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `price_ranges`
--

DROP TABLE IF EXISTS `price_ranges`;
CREATE TABLE IF NOT EXISTS `price_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price_from` int(11) NOT NULL,
  `price_to` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_ranges`
--

INSERT INTO `price_ranges` (`id`, `price_from`, `price_to`, `created_at`, `updated_at`) VALUES
(1, 1000, 2000, NULL, NULL),
(2, 3000, 4000, NULL, NULL),
(3, 6000, 8000, NULL, NULL),
(4, 10000, 12000, NULL, NULL),
(5, 14000, 16000, NULL, NULL),
(6, 18000, 20000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `products_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_quantity` int(11) NOT NULL,
  `quantity_sold` int(255) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `products_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_image` text COLLATE utf8mb4_unicode_ci,
  `products_price` int(11) NOT NULL,
  `products_price_slash` int(11) DEFAULT NULL,
  `products_date_added` datetime NOT NULL,
  `products_last_modified` datetime DEFAULT NULL,
  `products_date_available` datetime DEFAULT NULL,
  `products_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_video_link` text COLLATE utf8mb4_unicode_ci,
  `products_status` tinyint(1) NOT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approve` tinyint(1) NOT NULL DEFAULT '0',
  `is_special` tinyint(4) NOT NULL DEFAULT '1',
  `manufacturers_id` int(11) DEFAULT NULL,
  `products_ordered` int(11) NOT NULL DEFAULT '0',
  `products_liked` int(11) NOT NULL,
  `is_product_feature` tinyint(1) NOT NULL DEFAULT '0',
  `products_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_views` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `products_name`, `products_quantity`, `quantity_sold`, `category_id`, `brand_id`, `products_model`, `products_image`, `products_price`, `products_price_slash`, `products_date_added`, `products_last_modified`, `products_date_available`, `products_weight`, `products_detail`, `products_description`, `products_type`, `products_video_link`, `products_status`, `warranty`, `is_approve`, `is_special`, `manufacturers_id`, `products_ordered`, `products_liked`, `is_product_feature`, `products_slug`, `product_views`, `created_at`, `updated_at`) VALUES
(1, 4, 'phone', 8, 4, 1, 1, '', 'web/images/layout-1/product/1.jpg,web/images/layout-1/product/1.jpg', 20000, 5000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'fashion', 50, NULL, '2020-12-18 06:37:47'),
(2, 5, 'laptop', 7, 1, 2, 2, '', 'web/images/layout-1/product/a2.jpg,web/images/layout-1/product/2.jpg', 75000, 10000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, 'one year', 1, 1, 1, 0, 8, 1, 'book', 100, NULL, '2020-12-18 06:37:47'),
(3, 3, 'ladies gown', 9, 0, 3, 3, '', 'web/images/layout-1/product/3.jpg,web/images/layout-1/product/a3.jpg', 30000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '3 months', 1, 1, 1, 0, 8, 0, 'sport', 60, NULL, NULL),
(4, 4, 'bag', 4, 0, 4, 4, '', 'web/images/layout-1/product/4.jpg,web/images/layout-1/product/a4.jpg', 20000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'electronics', 300, NULL, NULL),
(5, 4, 'men shoe', 10, 0, 5, 5, '', 'web/images/layout-1/product/5.jpg,web/images/layout-1/product/a5.jpg', 10000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '9 months', 1, 1, 1, 0, 8, 1, 'toys', 0, NULL, NULL),
(6, 4, 'necklace', 11, 0, 6, 6, '', 'web/images/layout-1/product/6.jpg,web/images/layout-1/product/a6.jpg', 80000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '5 months', 1, 1, 1, 0, 8, 1, 'footwares', 20, NULL, NULL),
(7, 4, 'speaker', 16, 0, 1, 7, '', 'web/images/layout-1/product/7.jpg,web/images/layout-1/product/a7.jpg', 38000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, 'one year', 1, 1, 1, 0, 8, 1, 'games', 0, NULL, NULL),
(8, 4, 'freezer', 49, 1, 2, 8, '', 'web/images/layout-1/product/8.jpg,web/images/layout-1/product/a8.jpg', 60000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'adventure', 10, NULL, '2020-12-18 10:14:23'),
(9, 4, 'phone', 18, 0, 3, 1, '', 'web/images/layout-1/product/7.jpg,web/images/layout-1/product/a7.jpg', 50000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '9 months', 1, 1, 1, 0, 8, 1, 'fashion', 0, NULL, NULL),
(10, 4, 'necklace', 12, 0, 4, 2, '', 'web/images/layout-1/product/6.jpg,web/images/layout-1/product/a6.jpg', 120000, 0, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,large,xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '3 months', 1, 1, 1, 0, 8, 1, 'book', 57, NULL, NULL),
(11, 4, 'bag', 17, 0, 5, 5, '', 'web/images/layout-1/product/a4.jpg,web/images/layout-1/product/4.jpg', 20000, 10000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'sports', 0, NULL, NULL),
(12, 4, 'laptop', 44, 0, 6, 4, '', 'web/images/layout-1/product/2.jpg,web/images/layout-1/product/a2.jpg', 13000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'electronics', 88, NULL, NULL),
(13, 2, 'dress', 22, 0, 1, 6, '', 'web/images/layout-1/product/3.jpg,web/images/layout-1/product/a3.jpg', 16000, 7000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'toys', 0, NULL, NULL),
(14, 4, 'shoes', 10, 0, 2, 7, '', 'web/images/layout-1/product/5.jpg,web/images/layout-1/product/a5.jpg', 18000, 9000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'games', 38, NULL, NULL),
(15, 4, 'sound system', 30, 0, 3, 8, '', 'web/images/layout-1/product/7.jpg,web/images/layout-1/product/a7.jpg', 90000, 5000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'adventure', 47, NULL, NULL),
(16, 4, 'freezer', 26, 0, 4, 3, '', 'web/images/layout-1/product/8.jpg,web/images/layout-1/product/a8.jpg', 17000, 8500, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'fashion', 10, NULL, NULL),
(17, 4, 'laptop', 19, 0, 5, 5, '', 'web/images/layout-1/product/2.jpg,web/images/layout-1/product/a2.jpg', 15000, 8000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'book', 0, NULL, NULL),
(18, 4, 'ladies dress', 35, 0, 6, 6, '', 'web/images/layout-1/product/3.jpg,web/images/layout-1/product/a3.jpg', 9000, 4500, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'sports', 57, NULL, NULL),
(19, 4, 'bag', 37, 0, 1, 8, '', 'web/images/layout-1/product/4.jpg,web/images/layout-1/product/a4.jpg', 11000, 6000, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large, xtra large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'electronics', 0, NULL, NULL),
(20, 4, 'necklace', 15, 0, 8, 2, '', 'web/images/layout-1/product/6.jpg,web/images/layout-1/product/a6.jpg', 17000, 8500, '2020-12-14 16:50:17', '2020-12-14 16:50:17', '2020-12-14 16:50:17', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n\r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make\r\n                                \r\n                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\n                                Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'small,medium, large', 'https://www.youtube.com/embed/BUWzX78Ye_8', 1, '6 months', 1, 1, 1, 0, 8, 1, 'toys', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `review_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_solds`
--

DROP TABLE IF EXISTS `product_solds`;
CREATE TABLE IF NOT EXISTS `product_solds` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `products_qty_sold` int(11) NOT NULL,
  `products_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `product_sold_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_solds`
--

INSERT INTO `product_solds` (`id`, `product_id`, `products_qty_sold`, `products_price`, `total_price`, `product_sold_date`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 5000, 400000, '2020-12-14 16:17:50', NULL, NULL),
(2, 2, 6, 10000, 470000, '2020-12-14 16:17:50', NULL, NULL),
(3, 3, 2, 6000, 50000, '2020-12-14 16:17:50', NULL, NULL),
(4, 4, 10, 8000, 300000, '2020-12-14 16:17:50', NULL, NULL),
(5, 5, 5, 90000, 200000, '2020-12-14 16:17:50', NULL, NULL),
(6, 6, 7, 9000, 300000, '2020-12-14 16:17:50', NULL, NULL),
(7, 7, 5, 10000, 200000, '2020-12-14 16:17:50', NULL, NULL),
(8, 8, 10, 9000, 300000, '2020-12-14 16:17:50', NULL, NULL),
(9, 9, 8, 7000, 200000, '2020-12-14 16:17:50', NULL, NULL),
(10, 10, 10, 9000, 90000, '2020-12-14 16:17:50', NULL, NULL),
(11, 11, 5, 10000, 89000, '2020-12-14 16:17:50', NULL, NULL),
(12, 12, 10, 3000, 570000, '2020-12-14 16:17:50', NULL, NULL),
(13, 13, 5, 2000, 220000, '2020-12-14 16:17:50', NULL, NULL),
(14, 14, 10, 4000, 390000, '2020-12-14 16:17:50', NULL, NULL),
(15, 15, 5, 6000, 240000, '2020-12-14 16:17:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_views`
--

DROP TABLE IF EXISTS `p_views`;
CREATE TABLE IF NOT EXISTS `p_views` (
  `p_view_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`p_view_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_views`
--

INSERT INTO `p_views` (`p_view_id`, `value`, `view_date`, `created_at`, `updated_at`) VALUES
(1, '5fda2f966ce3b', '2020-12-16 16:02:30', '2020-12-16 15:02:30', '2020-12-16 15:02:30'),
(2, 'ed34er234wer234', '2020-12-02 17:04:13', NULL, NULL),
(3, 'ed34er234er234', '2020-12-16 17:04:13', NULL, NULL),
(4, 'ed34r234wer234', '2020-12-02 17:05:11', NULL, NULL),
(5, 'e34er234wer234', '2020-12-16 17:05:11', NULL, NULL),
(6, 'ed34er234wer23', '2020-12-07 17:05:11', NULL, NULL),
(7, 'ed34er234wr234', '2020-12-16 17:05:11', NULL, NULL),
(8, 'ed34er234der234', '2020-12-11 17:05:11', NULL, NULL),
(9, 'ed34er234er234', '2020-12-16 17:05:11', NULL, NULL),
(10, 'ed34e234wer234', '2020-12-02 17:05:11', NULL, NULL),
(11, 'ed4er234wer234', '2020-12-16 17:05:11', NULL, NULL),
(12, '5fda3248d090f', '2020-12-16 16:14:00', '2020-12-16 15:14:00', '2020-12-16 15:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating_count` int(11) NOT NULL,
  `rating_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `products_name`, `product_id`, `rating_count`, `rating_total`, `created_at`, `updated_at`) VALUES
(1, 'phone', 1, 7, 20, NULL, NULL),
(2, 'laptop', 2, 6, 15, NULL, NULL),
(3, 'ladies gown', 3, 5, 14, NULL, NULL),
(4, 'bag', 4, 4, 12, NULL, NULL),
(5, 'men shoe', 5, 8, 27, NULL, NULL),
(6, 'necklace', 6, 8, 24, NULL, NULL),
(7, 'speaker', 7, 6, 23, NULL, NULL),
(8, 'freezer', 8, 5, 20, NULL, NULL),
(9, 'phone', 9, 4, 17, NULL, NULL),
(10, 'necklace', 10, 3, 12, NULL, NULL),
(11, 'bag', 11, 29, 10, NULL, NULL),
(12, 'laptop', 12, 9, 28, NULL, NULL),
(13, 'dress', 13, 8, 26, NULL, NULL),
(14, 'shoes', 14, 7, 24, NULL, NULL),
(15, 'sound system', 15, 6, 21, NULL, NULL),
(16, 'freezer', 16, 7, 20, NULL, NULL),
(17, 'laptop', 17, 6, 15, NULL, NULL),
(18, 'ladies dress', 18, 5, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

DROP TABLE IF EXISTS `return_products`;
CREATE TABLE IF NOT EXISTS `return_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty_slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` datetime NOT NULL DEFAULT '2020-12-14 16:50:15',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text,
  `logo` varchar(255) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `copy_rights` text,
  `top_banner` text,
  `top_nav_amount` varchar(100) DEFAULT NULL,
  `payment_method_header` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `about`, `logo`, `contact`, `copy_rights`, `top_banner`, `top_nav_amount`, `payment_method_header`) VALUES
(1, 'It\'s An Ideal Resource To Promote Your Professional Brand And Yourself As An Authority , Here Are Creditlater We Offer The Best. we are the beast', 'web/images/logo/logo_5fe1f387ac7eb.jpeg', '08063472653', '2019 - 20 COPY RIGHT BY ONYX DATA SYSTEMS ALL RIGHTS RESERVED', 'Free Shipping On Order Over', '1000', '100% SECURE PAYMENT');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_three` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `is_feature` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `header_one`, `header_two`, `header_three`, `date_added`, `last_modified`, `is_feature`, `created_at`, `updated_at`) VALUES
(1, 'camera', 'web/images/layout-1/slider/1.2.png', 'the best', 'omega camera', 'minimum 20% off', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, NULL, NULL),
(2, 'shoes', 'web/images/layout-1/slider/1.1.png', 'the best', 'loffers shoes', 'minimum 30% off', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, NULL, NULL),
(3, 'bags', 'web/images/layout-1/slider/1.3.png', 'the best', 'classic bags', 'minimum 40% off', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, NULL, NULL),
(4, 'shoes', 'web/images/layout-1/slider/1.1.png', 'the best', 'loffer shoes', 'minimum 20% off', '2020-12-14 16:17:50', '2020-12-14 16:17:50', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `token`, `active`, `date_joined`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'anonye', 'charles', 'anonyecharles@gmail.com', '$2y$10$QTTV60iNsjnKlhPRlAgny.wgF3mY3Eeh242r4ZaA8o/LDakFor8za', NULL, 1, '2020-12-15 16:50:14', '2020-12-14 16:50:14', '2020-12-15 11:06:27', '2020-12-15 11:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deactivate` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `date_joined` datetime NOT NULL DEFAULT '2020-12-14 16:50:15',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `phone`, `state`, `address`, `city`, `country`, `about`, `token`, `is_deactivate`, `active`, `last_login`, `date_joined`, `created_at`, `updated_at`) VALUES
(4, 'anonye', 'charles', 'vendor@gmail.com', '$2y$10$9o32/TJ0rZsxKgj7R0hTnuekHYiI8K5f0c1Z77v4GDqvKhSeKAhTS', 'vendors/images/vendor_image/vendor_5fe1f26b93d09.jpg', '09022222222', 'Lagos', 'number 32 akinremi street computer village ikeja', 'ikotun', 'Nigeria', 'i  love code , coding make me happy in a way i cant explain..', '5fd887477b8a74', 0, 0, '2020-12-22 13:20:46', '2020-12-14 16:50:15', '2020-12-15 08:52:07', '2020-12-22 12:46:20'),
(6, 'emeka', 'chinedu', 'emeka@gmail.com', '$2y$10$Q7LP/L4fR1zW4p2bNj4S0OaSfucLL5A0S1sCSuol55S4vRAInqnO.', NULL, '09022222222', 'Lagos', 'sun,onu along', 'ikotun', 'Nigeria', 'i love to code alot', '5fe1f8ad235746', 0, 0, '2020-12-22 13:46:43', '2020-12-14 16:50:15', '2020-12-22 12:46:21', '2020-12-22 12:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

DROP TABLE IF EXISTS `verifications`;
CREATE TABLE IF NOT EXISTS `verifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof_of_employment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporting_documents` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_date_of_birth` datetime NOT NULL,
  `guarantor_national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT '2020-12-14 16:50:14',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `date_approved` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `date_of_birth`, `national_id`, `status`, `occupation`, `proof_of_employment`, `supporting_documents`, `address`, `guarantor_first_name`, `guarantor_last_name`, `guarantor_phone`, `guarantor_date_of_birth`, `guarantor_national_id`, `guarantor_status`, `guarantor_occupation`, `guarantor_relationship`, `guarantor_address`, `date_registered`, `is_approved`, `date_approved`, `created_at`, `updated_at`) VALUES
(1, 1, 'charles', 'anonye', '0805678909', '2020-12-14 16:17:50', '123456789876', 'single', 'business man', 'example', NULL, 'alone street iyanapaja', 'sule', 'garba', '0801234567', '2020-12-14 16:17:50', '1234567789', 'married', 'business man', 'unknown', 'klhflsvhbkrvkurgbvku,gbvubgfr', '2020-12-14 16:17:50', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `visitor_cookie_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`visitor_cookie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_cookie_id`, `value`, `visit_date`, `created_at`, `updated_at`) VALUES
(5, '5fda28019e708', '2020-12-16 16:37:22', '2020-12-16 14:30:09', '2020-12-16 14:30:09'),
(6, '5fda28019e704', '2020-12-16 16:37:22', '2020-12-16 15:31:29', '2020-12-16 15:31:29'),
(7, '5fda28019e703', '2020-12-16 16:37:22', '2020-12-16 15:31:29', '2020-12-16 15:31:29'),
(8, '5fda28019e702', '2020-12-16 16:37:22', '2020-12-16 15:31:58', '2020-12-16 15:31:58'),
(9, '5fda28419e708', '2020-12-16 16:37:22', '2020-12-16 15:32:14', '2020-12-16 15:32:14'),
(10, '5fda2s419e708', '2020-12-08 16:39:39', '2020-12-17 15:39:39', '2020-12-15 15:39:39'),
(11, '5fda28419es708', '2020-12-06 16:39:39', '2020-12-22 15:39:39', '2020-12-10 15:39:39'),
(12, '5fda2841ee708', '2020-12-03 16:40:43', '2020-12-16 15:40:43', '2020-12-16 15:40:43'),
(13, '5fda28412e708', '2020-12-01 16:40:43', '2020-12-16 15:40:43', '2020-12-16 15:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `wishlist_user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '2020-12-14 16:50:14',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
