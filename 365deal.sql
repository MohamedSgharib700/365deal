-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2017 at 11:38 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `365deal`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `addresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_p` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `addresse`, `id_p`, `created_at`, `updated_at`) VALUES
(1, 'a', 0, NULL, NULL),
(2, 'aa', 1, NULL, NULL),
(3, 'aaa', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catags`
--

CREATE TABLE `catags` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catags_lans`
--

CREATE TABLE `catags_lans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_catags` int(11) NOT NULL,
  `id_language` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_offers`
--

CREATE TABLE `comment_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `ar`, `en`, `icon`, `id_address`, `created_at`, `updated_at`) VALUES
(1, 'ewe', 'ww', 'wwwe', 'ewwewe', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `created_at`, `updated_at`) VALUES
(1, 'ar', NULL, NULL),
(2, 'en', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logomarkets`
--

CREATE TABLE `logomarkets` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_market_main` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logomarkets`
--

INSERT INTO `logomarkets` (`id`, `logo`, `id_market_main`, `created_at`, `updated_at`) VALUES
(1, ';klj;l;', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `magazin_offers`
--

CREATE TABLE `magazin_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `shareurl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numOfpage` int(11) NOT NULL,
  `numOfshare` int(11) NOT NULL,
  `Rate` double(8,2) NOT NULL,
  `views` int(11) NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataAppear` timestamp NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `id_market` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `flagcomment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `magazin_offers`
--

INSERT INTO `magazin_offers` (`id`, `shareurl`, `numOfpage`, `numOfshare`, `Rate`, `views`, `des`, `dataAppear`, `from`, `to`, `id_market`, `flag`, `flagcomment`, `created_at`, `updated_at`) VALUES
(1, 'jhgjghj', 5, 5, 5.00, 5, 'hghgfhfgh', '2017-11-19 11:19:47', '2017-11-02', '2017-11-16', 1, 1, 1, '2017-10-31 22:00:00', NULL),
(2, 'ljkjl', 4, 4, 4.00, 4, 'fhnjgfhgf', '2017-11-19 11:20:36', '2017-11-01', '2017-11-02', 1, 1, 1, '2017-10-31 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_address` int(11) NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_market_mains` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `id_address`, `lat`, `lan`, `email`, `phone`, `id_market_mains`, `created_at`, `updated_at`) VALUES
(1, 3, '11', '11', 'fhgdfhf', '011', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `market_mains`
--

CREATE TABLE `market_mains` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_mains`
--

INSERT INTO `market_mains` (`id`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `market_mains_lans`
--

CREATE TABLE `market_mains_lans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_language` int(11) NOT NULL,
  `id_market_mains` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_mains_lans`
--

INSERT INTO `market_mains_lans` (`id`, `name`, `id_language`, `id_market_mains`, `created_at`, `updated_at`) VALUES
(1, 'aa', 1, 1, NULL, NULL),
(2, 'ssss', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_29_092550_create_markets_table', 1),
(4, '2017_10_29_114100_create_market_mains_table', 1),
(5, '2017_10_29_114622_create_logomarkets_table', 1),
(6, '2017_10_29_120545_create_languages_table', 1),
(7, '2017_10_29_122005_create_magazin_offers_table', 1),
(8, '2017_10_29_122813_create_pages_table', 1),
(9, '2017_10_29_123345_create_catags_table', 1),
(10, '2017_10_29_124533_create_catags_lans_table', 1),
(11, '2017_10_29_125100_create_rateing_offers_table', 1),
(12, '2017_10_29_132444_create_comment_offers_table', 1),
(13, '2017_10_30_112318_create_market_mains_lans_table', 1),
(14, '2017_10_31_123348_create_addresses_table', 1),
(15, '2017_11_13_111430_create_services_mains_table', 1),
(16, '2017_11_13_111720_create_services_main_langs_table', 1),
(17, '2017_11_13_111944_create_services_subs_table', 1),
(18, '2017_11_13_112036_create_services_icans_table', 1),
(19, '2017_11_13_112056_create_services_sub_images_table', 1),
(20, '2017_11_13_112127_create_services_mainlabels_table', 1),
(21, '2017_11_13_112205_create_services_mainlab__vals_table', 1),
(22, '2017_11_13_112231_create_services_sub_rates_table', 1),
(23, '2017_11_13_112254_create_services_subcomments_table', 1),
(24, '2017_11_13_113054_create_services_mainclasses_table', 1),
(25, '2017_11_13_115815_create_services_maincolors_table', 1),
(26, '2017_11_14_072110_create_rang_prices_table', 1),
(27, '2017_11_14_072248_create_currencies_table', 1),
(28, '2017_11_14_074338_create_services_mainlabel_rs_table', 1),
(29, '2017_11_14_143239_create_services_main_categories_table', 1),
(30, '2017_11_14_143549_create_services_mainlabal_attributs_table', 1),
(31, '2017_11_14_152728_create_services_mainlabal_attributvalues_table', 1),
(32, '2017_11_15_081251_create_services_val_texts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `id_magazin_offers` int(11) NOT NULL,
  `id_catags` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rang_prices`
--

CREATE TABLE `rang_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` double(8,2) NOT NULL,
  `to` double(8,2) NOT NULL,
  `id_currencies` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rateing_offers`
--

CREATE TABLE `rateing_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` double(8,2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_icans`
--

CREATE TABLE `services_icans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_services` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_icans`
--

INSERT INTO `services_icans` (`id`, `name`, `icon`, `id_services`, `created_at`, `updated_at`) VALUES
(1, 'ddd', 'dddd', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_mainclasses`
--

CREATE TABLE `services_mainclasses` (
  `id` int(10) UNSIGNED NOT NULL,
  `className` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weborapi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_maincolors`
--

CREATE TABLE `services_maincolors` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_mainlabal_attributs`
--

CREATE TABLE `services_mainlabal_attributs` (
  `id` int(10) UNSIGNED NOT NULL,
  `namear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_label` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_mainlabal_attributs`
--

INSERT INTO `services_mainlabal_attributs` (`id`, `namear`, `nameen`, `id_label`, `created_at`, `updated_at`) VALUES
(1, 'ww', 'ww', 2, NULL, NULL),
(2, 'hghgfh', 'hgfhfg', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_mainlabal_attributvalues`
--

CREATE TABLE `services_mainlabal_attributvalues` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_attribut` int(11) NOT NULL,
  `id_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_mainlabal_attributvalues`
--

INSERT INTO `services_mainlabal_attributvalues` (`id`, `id_attribut`, `id_value`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_mainlabels`
--

CREATE TABLE `services_mainlabels` (
  `id` int(10) UNSIGNED NOT NULL,
  `labelar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labelen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_mainlabels`
--

INSERT INTO `services_mainlabels` (`id`, `labelar`, `labelen`, `type`, `created_at`, `updated_at`) VALUES
(1, 'aa', 'aa', 'text', NULL, NULL),
(2, 'ee', 'ee', 'select', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_mainlabel_rs`
--

CREATE TABLE `services_mainlabel_rs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_services_categories` int(11) NOT NULL,
  `id_services_mainlabels` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_mainlabel_rs`
--

INSERT INTO `services_mainlabel_rs` (`id`, `id_services_categories`, `id_services_mainlabels`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_mainlab__vals`
--

CREATE TABLE `services_mainlab__vals` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_services_main` int(11) NOT NULL,
  `id_label` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_mainlab__vals`
--

INSERT INTO `services_mainlab__vals` (`id`, `id_services_main`, `id_label`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_mains`
--

CREATE TABLE `services_mains` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_main_categories`
--

CREATE TABLE `services_main_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `namear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_servicesMain` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_main_categories`
--

INSERT INTO `services_main_categories` (`id`, `namear`, `nameen`, `id_servicesMain`, `created_at`, `updated_at`) VALUES
(1, 'aa', 'ee', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_main_langs`
--

CREATE TABLE `services_main_langs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_services_main` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_subcomments`
--

CREATE TABLE `services_subcomments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_servicesSub` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_subs`
--

CREATE TABLE `services_subs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Describe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `flag` int(11) NOT NULL,
  `Rate` double(8,2) NOT NULL,
  `views` int(11) NOT NULL,
  `shareurl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataAppear` timestamp NOT NULL,
  `numdayAppear` int(11) NOT NULL,
  `lan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OfferedRequired` int(11) NOT NULL,
  `id_address` int(11) NOT NULL,
  `id_servicesMain` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ican` int(11) NOT NULL,
  `id_rang_prices` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_subs`
--

INSERT INTO `services_subs` (`id`, `title`, `Describe`, `price`, `flag`, `Rate`, `views`, `shareurl`, `dataAppear`, `numdayAppear`, `lan`, `lat`, `OfferedRequired`, `id_address`, `id_servicesMain`, `id_user`, `id_ican`, `id_rang_prices`, `id_categories`, `created_at`, `updated_at`) VALUES
(1, 'hgfh', 'hgfh', 100, 1, 5.00, 5, '555', '2017-11-09 08:17:51', 55, '55', '55', 1, 3, 1, 1, 1, 1, 1, '2017-11-06 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_sub_images`
--

CREATE TABLE `services_sub_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_services_sub` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_sub_images`
--

INSERT INTO `services_sub_images` (`id`, `image`, `order`, `alt`, `id_services_sub`, `created_at`, `updated_at`) VALUES
(1, ';l;', 1, '\';l\'', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_sub_rates`
--

CREATE TABLE `services_sub_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` double(8,2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_servicesSub` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_val_texts`
--

CREATE TABLE `services_val_texts` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_val_texts`
--

INSERT INTO `services_val_texts` (`id`, `text`, `id_value`, `created_at`, `updated_at`) VALUES
(1, 'rwerewrewrewr', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_id_p_index` (`id_p`);

--
-- Indexes for table `catags`
--
ALTER TABLE `catags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catags_lans`
--
ALTER TABLE `catags_lans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catags_lans_id_catags_index` (`id_catags`),
  ADD KEY `catags_lans_id_language_index` (`id_language`);

--
-- Indexes for table `comment_offers`
--
ALTER TABLE `comment_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_offers_id_user_index` (`id_user`),
  ADD KEY `comment_offers_id_offer_index` (`id_offer`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logomarkets`
--
ALTER TABLE `logomarkets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logomarkets_id_market_main_index` (`id_market_main`);

--
-- Indexes for table `magazin_offers`
--
ALTER TABLE `magazin_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazin_offers_id_market_index` (`id_market`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `markets_id_market_mains_index` (`id_market_mains`);

--
-- Indexes for table `market_mains`
--
ALTER TABLE `market_mains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_mains_id_user_index` (`id_user`);

--
-- Indexes for table `market_mains_lans`
--
ALTER TABLE `market_mains_lans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_mains_lans_id_language_index` (`id_language`),
  ADD KEY `market_mains_lans_id_market_mains_index` (`id_market_mains`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_id_magazin_offers_index` (`id_magazin_offers`),
  ADD KEY `pages_id_catags_index` (`id_catags`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rang_prices`
--
ALTER TABLE `rang_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rang_prices_id_currencies_index` (`id_currencies`);

--
-- Indexes for table `rateing_offers`
--
ALTER TABLE `rateing_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rateing_offers_id_user_index` (`id_user`),
  ADD KEY `rateing_offers_id_offer_index` (`id_offer`);

--
-- Indexes for table `services_icans`
--
ALTER TABLE `services_icans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_icans_id_services_index` (`id_services`);

--
-- Indexes for table `services_mainclasses`
--
ALTER TABLE `services_mainclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_maincolors`
--
ALTER TABLE `services_maincolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_mainlabal_attributs`
--
ALTER TABLE `services_mainlabal_attributs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_mainlabal_attributs_id_label_index` (`id_label`);

--
-- Indexes for table `services_mainlabal_attributvalues`
--
ALTER TABLE `services_mainlabal_attributvalues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_mainlabal_attributvalues_id_attribut_index` (`id_attribut`),
  ADD KEY `services_mainlabal_attributvalues_id_value_index` (`id_value`);

--
-- Indexes for table `services_mainlabels`
--
ALTER TABLE `services_mainlabels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_mainlabel_rs`
--
ALTER TABLE `services_mainlabel_rs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_mainlabel_rs_id_services_categories_index` (`id_services_categories`),
  ADD KEY `services_mainlabel_rs_id_services_mainlabels_index` (`id_services_mainlabels`);

--
-- Indexes for table `services_mainlab__vals`
--
ALTER TABLE `services_mainlab__vals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_mainlab__vals_id_services_main_index` (`id_services_main`),
  ADD KEY `services_mainlab__vals_id_label_index` (`id_label`);

--
-- Indexes for table `services_mains`
--
ALTER TABLE `services_mains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_mains_id_class_index` (`id_class`),
  ADD KEY `services_mains_id_color_index` (`id_color`);

--
-- Indexes for table `services_main_categories`
--
ALTER TABLE `services_main_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_main_categories_id_servicesmain_index` (`id_servicesMain`);

--
-- Indexes for table `services_main_langs`
--
ALTER TABLE `services_main_langs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_main_langs_id_services_main_index` (`id_services_main`),
  ADD KEY `services_main_langs_id_lang_index` (`id_lang`);

--
-- Indexes for table `services_subcomments`
--
ALTER TABLE `services_subcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_subcomments_id_user_index` (`id_user`),
  ADD KEY `services_subcomments_id_servicessub_index` (`id_servicesSub`);

--
-- Indexes for table `services_subs`
--
ALTER TABLE `services_subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_subs_id_address_index` (`id_address`),
  ADD KEY `services_subs_id_servicesmain_index` (`id_servicesMain`),
  ADD KEY `services_subs_id_user_index` (`id_user`),
  ADD KEY `services_subs_id_ican_index` (`id_ican`),
  ADD KEY `services_subs_id_rang_prices_index` (`id_rang_prices`),
  ADD KEY `services_subs_id_categories_index` (`id_categories`);

--
-- Indexes for table `services_sub_images`
--
ALTER TABLE `services_sub_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_sub_images_id_services_sub_index` (`id_services_sub`);

--
-- Indexes for table `services_sub_rates`
--
ALTER TABLE `services_sub_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_sub_rates_id_user_index` (`id_user`),
  ADD KEY `services_sub_rates_id_servicessub_index` (`id_servicesSub`);

--
-- Indexes for table `services_val_texts`
--
ALTER TABLE `services_val_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_val_texts_id_value_index` (`id_value`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `catags`
--
ALTER TABLE `catags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catags_lans`
--
ALTER TABLE `catags_lans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_offers`
--
ALTER TABLE `comment_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logomarkets`
--
ALTER TABLE `logomarkets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `magazin_offers`
--
ALTER TABLE `magazin_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `market_mains`
--
ALTER TABLE `market_mains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `market_mains_lans`
--
ALTER TABLE `market_mains_lans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rang_prices`
--
ALTER TABLE `rang_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rateing_offers`
--
ALTER TABLE `rateing_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_icans`
--
ALTER TABLE `services_icans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services_mainclasses`
--
ALTER TABLE `services_mainclasses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_maincolors`
--
ALTER TABLE `services_maincolors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_mainlabal_attributs`
--
ALTER TABLE `services_mainlabal_attributs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services_mainlabal_attributvalues`
--
ALTER TABLE `services_mainlabal_attributvalues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services_mainlabels`
--
ALTER TABLE `services_mainlabels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services_mainlabel_rs`
--
ALTER TABLE `services_mainlabel_rs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services_mainlab__vals`
--
ALTER TABLE `services_mainlab__vals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `services_mains`
--
ALTER TABLE `services_mains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_main_categories`
--
ALTER TABLE `services_main_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services_main_langs`
--
ALTER TABLE `services_main_langs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_subcomments`
--
ALTER TABLE `services_subcomments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_subs`
--
ALTER TABLE `services_subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services_sub_images`
--
ALTER TABLE `services_sub_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services_sub_rates`
--
ALTER TABLE `services_sub_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services_val_texts`
--
ALTER TABLE `services_val_texts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
