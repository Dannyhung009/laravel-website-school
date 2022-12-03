-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2022-04-23 13:33:08
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `web1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acc` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`id`, `acc`, `pw`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'password', '2022-03-13 15:56:01', '2022-03-13 15:56:01'),
(5, 'test', '$2y$10$.QkMhReFr9WLNiFEg3Vol.hUAE/GKOXCVlSDWmFZy/w4SIizHdvQm', '2022-03-24 17:31:19', '2022-03-24 17:31:19'),
(6, 'root', '$2y$10$y4MhTv0N6ozTzZYWXGlfQu1ZX4.1G8wMzJ.eymmv5cvbu744IFSPi', '2022-03-24 17:41:15', '2022-03-24 17:41:15');

-- --------------------------------------------------------

--
-- 資料表結構 `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(127) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `ads`
--

INSERT INTO `ads` (`id`, `text`, `img`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '轉知台北科技大學', NULL, 1, '2022-03-12 14:52:55', '2022-03-12 14:34:56', '2022-03-12 14:52:55'),
(2, '轉知法務部辦理', NULL, 1, '2022-03-12 14:53:05', '2022-03-12 14:36:16', '2022-03-12 14:53:05'),
(3, '轉知台北科技大學', NULL, 1, '2022-03-12 15:00:20', '2022-03-12 14:53:14', '2022-03-12 15:00:20'),
(4, '轉知台北科技大學', NULL, 1, '2022-03-12 15:08:00', '2022-03-12 15:01:06', '2022-03-12 15:08:00'),
(5, '轉知法務部辦理', NULL, 1, '2022-03-12 15:03:01', '2022-03-12 15:02:58', '2022-03-12 15:03:01'),
(6, '轉知台北科技大學', NULL, 1, NULL, '2022-03-12 15:08:10', '2022-03-12 15:19:16');

-- --------------------------------------------------------

--
-- 資料表結構 `bottoms`
--

CREATE TABLE `bottoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bottom` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottoms`
--

INSERT INTO `bottoms` (`id`, `bottom`, `created_at`, `updated_at`) VALUES
(1, '2022 科技大學版權所有', '2022-03-12 15:58:13', '2022-03-13 03:15:33');

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
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
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `img`, `sh`, `created_at`, `updated_at`) VALUES
(1, '01C05.gif', 1, '2022-03-13 05:08:26', '2022-03-20 16:32:08'),
(2, '01C06.gif', 1, '2022-03-13 05:11:16', '2022-03-20 16:32:27'),
(4, '01C05.gif', 1, '2022-03-13 05:11:24', '2022-03-20 17:24:16'),
(7, '01D01.jpg', 1, '2022-03-20 17:24:28', '2022-03-20 17:24:28'),
(8, '01D03.jpg', 1, '2022-03-20 17:27:38', '2022-03-20 17:27:38'),
(9, '01D02.jpg', 1, '2022-03-20 17:30:41', '2022-03-20 17:30:41'),
(10, '01D03.jpg', 1, '2022-03-20 17:44:11', '2022-03-20 17:44:11'),
(13, '01D10.jpg', 1, '2022-03-21 02:15:08', '2022-03-21 02:15:08'),
(15, '01D04.jpg', 1, '2022-03-21 05:24:44', '2022-03-21 05:24:44'),
(16, '01D08.jpg', 1, '2022-03-28 00:33:25', '2022-03-28 00:33:25'),
(17, '01D07.jpg', 1, '2022-03-28 00:33:33', '2022-03-28 00:33:33');

-- --------------------------------------------------------

--
-- 資料表結構 `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menus`
--

INSERT INTO `menus` (`id`, `text`, `href`, `sh`, `created_at`, `updated_at`) VALUES
(1, '網站首頁/', '/', 1, '2022-03-13 17:32:06', '2022-03-13 17:34:33'),
(2, '更多消息', '/news', 1, '2022-03-13 17:34:27', '2022-03-13 17:34:27'),
(3, '管理登入', '/login', 1, '2022-03-20 21:09:32', '2022-03-20 21:09:32');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_03_09_145338_create_titles_table', 1),
(12, '2022_03_12_113942_create_ads_table', 2),
(13, '2022_03_12_234056_create_totals_table', 3),
(14, '2022_03_12_234125_create_bottoms_table', 3),
(15, '2022_03_13_112735_create_images_table', 4),
(16, '2022_03_13_113532_create_mvims_table', 4),
(17, '2022_03_13_113604_create_news_table', 4),
(18, '2022_03_13_113616_create_admins_table', 4),
(19, '2022_03_13_113630_create_menus_table', 4),
(20, '2022_03_13_113649_create_sub_menus_table', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `mvims`
--

CREATE TABLE `mvims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mvims`
--

INSERT INTO `mvims` (`id`, `img`, `sh`, `created_at`, `updated_at`) VALUES
(8, '01C01.gif', 1, '2022-03-21 02:38:30', '2022-03-21 02:38:30'),
(10, '01C03.gif', 1, '2022-03-21 05:19:25', '2022-03-21 05:19:25');

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `text`, `sh`, `created_at`, `updated_at`) VALUES
(1, '最新消息測試訊息\r\n傳達教育部', 1, '2022-03-13 17:05:35', '2022-03-13 17:05:35'),
(2, '最新消息測試訊息2', 1, '2022-03-23 07:07:15', '2022-03-23 07:07:15'),
(3, '最新消息測試訊息3', 1, '2022-03-23 07:07:20', '2022-03-23 07:07:20'),
(4, '最新消息測試訊息4', 1, '2022-03-23 07:07:45', '2022-03-23 07:07:45'),
(5, '最新消息測試訊息5', 1, '2022-03-23 07:07:50', '2022-03-23 07:07:50'),
(6, '最新消息測試訊息6', 1, '2022-03-23 07:07:55', '2022-03-23 07:07:55');

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
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
-- 資料表結構 `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `text`, `href`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, '更多消息', '/news', 1, '2022-03-14 07:37:46', '2022-03-21 02:06:00'),
(3, '今日最新', '/todayNews', 1, '2022-03-15 06:16:33', '2022-03-15 06:16:33'),
(4, '全部新聞', '/allNews', 1, '2022-03-15 06:16:48', '2022-03-15 06:16:48'),
(5, 'asdasfasf', '/asfasff', 2, '2022-03-27 20:57:02', '2022-03-27 20:57:02'),
(6, 'afsadfasfsfsad', '/12133424', 2, '2022-03-27 20:57:11', '2022-03-27 20:57:11');

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(127) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sh` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `titles`
--

INSERT INTO `titles` (`id`, `text`, `img`, `sh`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '台北科技大學校園資訊系統', '01B04.jpg', 1, '2022-03-11 18:34:54', '2022-03-09 16:28:39', '2022-03-11 18:34:54'),
(2, '科技大學校園資訊系統', '01B02.jpg', 0, '2022-03-11 18:34:53', '2022-03-09 16:32:20', '2022-03-11 18:34:53'),
(3, '拉拉大學', '01B01.jpg', 0, '2022-03-11 18:34:51', '2022-03-10 07:44:04', '2022-03-11 18:34:51'),
(4, '拉拉大學', '01B03.jpg', 0, '2022-03-11 18:34:50', '2022-03-10 07:49:47', '2022-03-11 18:34:50'),
(5, '科技大學校園資訊系統', '01B04.jpg', 0, '2022-03-11 18:34:37', '2022-03-10 07:53:38', '2022-03-11 18:34:37'),
(6, '亞洲大學', '01B01.jpg', 0, '2022-03-11 18:32:21', '2022-03-11 06:40:37', '2022-03-11 18:32:21'),
(7, '123', '01B01.jpg', 0, '2022-03-11 10:14:50', '2022-03-11 07:09:55', '2022-03-11 10:14:50'),
(8, '台北科技大學', '01B01.jpg', 0, '2022-03-11 19:37:14', '2022-03-11 18:35:07', '2022-03-11 19:37:14'),
(9, '桃園科技大學', '01B02.jpg', 1, '2022-03-11 19:38:02', '2022-03-11 18:35:22', '2022-03-11 19:38:02'),
(10, '新竹科技大學', '01B03.jpg', 0, NULL, '2022-03-11 19:36:19', '2022-03-24 23:24:45'),
(11, '台北科技大學', '01B01.jpg', 0, NULL, '2022-03-11 19:38:16', '2022-03-24 23:24:49'),
(12, '桃園科技大學', '01B02.jpg', 1, NULL, '2022-03-11 19:38:46', '2022-03-24 23:24:49'),
(13, '123', '01B04.jpg', 0, NULL, '2022-03-16 05:53:40', '2022-03-21 02:04:23'),
(14, '1132', '01B01.jpg', 0, NULL, '2022-03-20 17:43:59', '2022-03-21 02:04:24');

-- --------------------------------------------------------

--
-- 資料表結構 `totals`
--

CREATE TABLE `totals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `totals`
--

INSERT INTO `totals` (`id`, `total`, `created_at`, `updated_at`) VALUES
(1, 48, '2022-03-12 15:58:13', '2022-04-14 19:18:59');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottoms`
--
ALTER TABLE `bottoms`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvims`
--
ALTER TABLE `mvims`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 資料表索引 `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `totals`
--
ALTER TABLE `totals`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottoms`
--
ALTER TABLE `bottoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvims`
--
ALTER TABLE `mvims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `totals`
--
ALTER TABLE `totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
