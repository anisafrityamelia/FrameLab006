-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 
-- Generation Time: Jul 20, 2025 at 12:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framelab006`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `note`, `date`) VALUES
(2, 'y', 'webnya kerenn', '2025-06-28 11:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_25_080015_create_feedback', 1),
(5, '2025_06_25_080022_create_produk_partner', 1),
(6, '2025_06_25_080027_create_produk_studio', 1),
(7, '2025_06_25_082105_create_session_table', 2),
(10, '2025_06_25_085200_create_orders_table', 3),
(11, '2025_06_25_113945_create_reviews_table', 4),
(12, '2025_06_25_130328_add_customer_fields_to_orders_table', 5),
(13, '2025_06_27_085031_add_customer_details_to_orders_table', 6),
(14, '2025_06_28_121037_add_is_active_to_produk_studio_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `code_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `order_times` json NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `code_order`, `room_id`, `order_date`, `order_times`, `total_amount`, `payment_status`, `snap_token`, `customer_name`, `customer_email`, `created_at`, `updated_at`) VALUES
(50, 4, 'ORD-UA9RP8K4-1751111508', 9, '2025-06-28', '[\"11.10\"]', '35000.00', 'paid', '424f41a4-dec2-4634-8928-10a2c531cb71', 'y', 'y@gmail.com', '2025-06-28 04:51:48', '2025-06-28 04:52:19'),
(51, 4, 'ORD-0UTMUCAO-1751876477', 14, '2025-07-07', '[\"10.00\", \"05.00\"]', '70000.00', 'pending', '37e8491a-8943-47ec-929f-5bc98c28aa4c', 'y', 'y@gmail.com', '2025-07-07 01:21:17', '2025-07-07 01:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `produk_partner`
--

CREATE TABLE `produk_partner` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studio_type` enum('Studio Partner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_partner`
--

INSERT INTO `produk_partner` (`id`, `photo`, `photo1`, `photo2`, `photo3`, `room_name`, `description1`, `description2`, `description3`, `noTelepon`, `studio_type`, `created_at`, `updated_at`) VALUES
(2, '1751111059_WhatsApp Image 2025-06-24 at 12.29.14 (1).jpeg.jpg', '1751111059_1_WhatsApp Image 2025-06-24 at 12.29.14 (2).jpeg.jpg', '1751111059_2_WhatsApp Image 2025-06-24 at 12.29.14.jpeg.jpg', '1751111059_3_WhatsApp Image 2025-06-24 at 12.29.15.jpeg.jpg', 'Soomi Station', 'Soft tones and a minimalist look make Soomi Space feel warm and serene.', 'Perfect for portraits that capture calm, natural beauty.', 'Based in Batam, available for nearby areas', '08997270100', 'Studio Partner', NULL, NULL),
(3, '1751111160_WhatsApp Image 2025-06-24 at 12.38.09.jpeg.jpg', '1751111160_1_WhatsApp Image 2025-06-24 at 12.38.09 (2).jpeg.jpg', '1751111160_2_WhatsApp Image 2025-06-24 at 12.38.09 (1).jpeg.jpg', '1751111160_3_WhatsApp Image 2025-06-24 at 12.38.10.jpeg.jpg', 'Hana Station', 'Clean, structured, and professional — Hana Station is built for formal photos.', 'Ideal for graduation, ID shoots, or polished profiles.', 'Based in Batam, available for nearby areas', '08988895205', 'Studio Partner', NULL, NULL),
(4, '1751111241_WhatsApp Image 2025-06-24 at 12.45.35.jpeg.jpg', '1751111241_1_WhatsApp Image 2025-06-24 at 12.45.36 (1).jpeg.jpg', '1751111241_2_WhatsApp Image 2025-06-24 at 12.45.36.jpeg.jpg', '1751111241_3_WhatsApp Image 2025-06-24 at 12.45.35 (1).jpeg.jpg', 'Photoism', 'Bright, playful, and full of energy, Photoism brings your fun side out.', 'Great for bestie shoots, casual portraits, or colorful concepts.', 'Based in Batam, available for nearby areas', '085763621034', 'Studio Partner', NULL, NULL),
(5, '1751111310_WhatsApp Image 2025-06-24 at 12.32.32.jpeg.jpg', '1751111310_1_WhatsApp Image 2025-06-24 at 12.32.32 (1).jpeg.jpg', '1751111310_2_WhatsApp Image 2025-06-24 at 12.32.33 (1).jpeg.jpg', '1751111310_3_WhatsApp Image 2025-06-24 at 12.32.33.jpeg.jpg', 'Persona Lab', 'Simple and expressive — Persona lets your true self take center stage.', 'A blank canvas for emotional, personal, and artistic shots.', 'Based in Batam, available for nearby areas', '082272136762', 'Studio Partner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk_studio`
--

CREATE TABLE `produk_studio` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `studio_type` enum('Studio Photo','Studio Space','Studio Video','Studio Partner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_studio`
--

INSERT INTO `produk_studio` (`id`, `photo`, `room_name`, `description`, `duration`, `price`, `studio_type`, `created_at`, `updated_at`, `is_active`) VALUES
(9, 'images/1751109002_86600f3e-a34c-44c5-a131-d78c839f3c9d.jpeg', 'Photobooth', 'A stylish mini booth for quick, fun, and effortless portraits. Great for solo shoots, couple photos, or content creation with ready-to-use lighting and backdrop.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 35000, 'Studio Photo', NULL, NULL, 0),
(10, 'images/1751109293_ecac2118-4003-4c35-b519-de08adc25703.jpeg', 'Studio Pro Regular', 'A versatile photo studio with pro lighting and a clean setup — perfect for portraits, casual sessions, or simple photo shoots with a polished feel.', '10.00, 12.10, 01.30, 02.40, 04.30', 75000, 'Studio Photo', NULL, NULL, 1),
(11, 'images/1751109343_Korean photobooth.jpeg', 'High Angle', 'Shoot from above with this elevated-angle studio — ideal for seated poses, dramatic fashion shots, or creative standing compositions.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 35000, 'Studio Photo', NULL, NULL, 1),
(12, 'images/1751109389_unnamed.jpg', 'Wide Angle', 'Spacious and designed for group or full-body shots. This studio gives you room to move, pose, and play with wider framing.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 35000, 'Studio Photo', NULL, NULL, 1),
(13, 'images/1751109459_Family Potrait _ kayanaphotography.jpeg', 'Studio Pro Large', 'More space, more possibilities. Great for family shoots, creative group sessions, or wide-scene video recordings with full setup freedom.', '10.00, 12.10, 01.30, 02.40, 04.30', 130000, 'Studio Photo', NULL, NULL, 1),
(14, 'images/1751109509_Fish Eye Photobooth Seoul.jpeg', 'Fish Eye', 'A creative room with bold lens effects — perfect for edgy portraits, playful concepts, or standout social media content with a twist.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 35000, 'Studio Photo', NULL, NULL, 1),
(15, 'images/1751109552_ddf8eec3-6381-4d2b-abb5-213cc54b30eb.jpeg', 'Formal Photo', 'Clean and professional setup made for formal portraits like graduation, CV photos, or business profiles. Timeless and polished.', '10.00, 12.10, 01.30, 02.40, 04.30', 75000, 'Studio Photo', NULL, NULL, 1),
(16, 'images/1751109632_images.jpeg', 'Bird Eye', 'Top-down angle studio, designed for unique overhead portraits. Great for creative standing poses, group formations, or styled fashion shots.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 35000, 'Studio Photo', NULL, NULL, 1),
(17, 'images/1751110006_download.jpeg', 'Verdura', 'Step into Verdura — a nature-inspired studio with fresh green tones and earthy vibes. Perfect for calming portraits, dreamy fashion shoots, or any look that blends with nature and serenity.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 150000, 'Studio Space', NULL, NULL, 1),
(18, 'images/1751110043_e312c831-8058-40f3-9274-070c2413626b.jpeg', 'Y2Kraze', 'Throw it back with Y2Kraze — a colorful, nostalgic space packed with 2000s-style props and vibes. Ideal for fun, edgy portraits, fashion looks, or bold content that pops on camera.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 150000, 'Studio Space', NULL, NULL, 1),
(19, 'images/1751110087_Editorial Studio Set Up with Mylar Reflective Paper - Emilie Farris Photography.jpeg', 'Aqualoom', 'Cool, calm, and creative — Aqualoom offers soft blue palettes and a fluid atmosphere. Perfect for serene portraits, dreamy concepts, or modern fashion shots with a touch of elegance.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 150000, 'Studio Space', NULL, NULL, 1),
(20, 'images/1751110124_ecbdced8-356c-45b0-8815-5c30e44c2f9d.jpeg', 'Terrena', 'Warm, rustic, and grounded — Terrena brings earth tones and natural textures together for a cozy, timeless look. Great for lifestyle portraits, couple sessions, or heartfelt storytelling.', 'All In, 10.00, 11.10, 12.10, 12.20, 01.30, 02.20, 02.40, 03.50, 04.30, 05.00', 150000, 'Studio Space', NULL, NULL, 1),
(21, 'images/1751110246_1e850f3e-2d65-4415-82a8-8d9212a5d61b.jpeg', 'Pod Space', 'A compact, sound-treated video booth perfect for podcasts, voiceovers, or talking-head content. Clean setup, crisp audio, and camera-ready — just hit record.', '10.00', 300000, 'Studio Video', NULL, NULL, 1),
(22, 'images/1751110330_Model Studio.jpeg', 'FrameRun', 'Framerun is built for dynamic video shoots — from cinematic content to reels and skits. Spacious and flexible, it’s made to keep up with your creative motion.', '10.00', 500000, 'Studio Video', NULL, NULL, 1),
(23, 'images/1751110379_e3b4c5ba-ed91-4ff9-9475-d47f4b20d7db.jpeg', 'LoopBox', 'Loopbox is your go-to for looping content like dance, transitions, or short-form videos. With seamless backgrounds and perfect lighting, it’s made to replay-ready perfection.', '10.00', 250000, 'Studio Video', NULL, NULL, 1),
(24, 'images/1751110435_Broadcast room Interior Design Faculty Of Computer….jpeg', 'Steamline', 'Designed for smooth, uninterrupted production — Steamline is ideal for livestreams, interviews, or pro-level video sessions. Minimal setup, maximum flow.', '10.00', 550000, 'Studio Video', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `code_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int NOT NULL COMMENT '1-5 stars',
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `code_order`, `room_id`, `user_name`, `user_email`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(27, 'ORD-UA9RP8K4-1751111508', 9, 'y', 'y@gmail.com', 5, 'kerenn sihh', '2025-06-28 04:52:44', '2025-06-28 04:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qP7n72j5TQwgrelIybdYhkdkf8P391MYA104SK8p', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY01tSkE4RUxJT0VydjBOaVVTdFkyeWlIb0FxMWhLcFl1ZjJrUEwwdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmRfYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE0OiJsb2dnZWRfaW5fdXNlciI7Tzo4OiJzdGRDbGFzcyI6MTA6e3M6MjoiaWQiO2k6MjtzOjg6InVzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjE1OiJhZG1pbkBnbWFpbC5jb20iO3M6NDoicm9sZSI7czo1OiJhZG1pbiI7czo1OiJwaG90byI7czo0OiJOVUxMIjtzOjk6Im5vVGVsZXBvbiI7czo0OiJOVUxMIjtzOjQ6ImRhdGUiO3M6MTA6IjIwMjUtMDYtMjEiO3M6ODoicGFzc3dvcmQiO3M6NjA6IiQyeSQxMiRPczRhVENXYU05ZktldVFYaFJHMVdPMi9mYUU5N1dCbkVjYTJZVEx4ME9ZRjJrNXluYzNRTyI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNS0wNi0yMSAwNzowMTozNiI7czoxNDoicmVtZW1iZXJfdG9rZW4iO3M6NDoiTlVMTCI7fX0=', 1752926652);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noTelepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `photo`, `noTelepon`, `date`, `password`, `created_at`, `remember_token`) VALUES
(1, 'anantha', 'anantha@gmail.com', 'user', '1750840326_prototype.jpg', '089999999', '2025-06-25', '$2y$12$WDmMxllCAfR3Sb00tc2LAu4nx46BXuCnpPyVY8NCWMbVhQoLAU2Wu', '2025-06-25 01:31:36', NULL),
(2, 'admin', 'admin@gmail.com', 'admin', 'NULL', 'NULL', '2025-06-21', '$2y$12$Os4aTCWaM9fKeuQXhRG1WO2/faE97WBnEca2YTLx0OYF2k5ync3QO', '2025-06-21 00:01:36', 'NULL'),
(4, 'y', 'y@gmail.com', 'user', '1751099523_download (3).jpeg', '0897654321', '2025-06-25', '$2y$12$Sff4llD73jC7XeIi77o6l.cJg2K0YW8U.01VsRKRSwB1YcOWrw1Ha', '2025-06-25 02:47:15', NULL),
(5, 'Anisa', 'anisa@gmail.com', 'user', NULL, '081378780855', '2025-06-28', '$2y$12$D2DXFHwaMpUbCPEat1LlZulgh0RR3hTcuJBuY912gotUt9WLnSNtq', '2025-06-28 02:52:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD UNIQUE KEY `orders_code_order_unique` (`code_order`),
  ADD KEY `orders_room_id_foreign` (`room_id`);

--
-- Indexes for table `produk_partner`
--
ALTER TABLE `produk_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_studio`
--
ALTER TABLE `produk_studio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_code_order_foreign` (`code_order`),
  ADD KEY `reviews_room_id_foreign` (`room_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `produk_partner`
--
ALTER TABLE `produk_partner`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk_studio`
--
ALTER TABLE `produk_studio`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `produk_studio` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_code_order_foreign` FOREIGN KEY (`code_order`) REFERENCES `orders` (`code_order`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `produk_studio` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
