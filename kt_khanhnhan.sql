-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 23, 2018 lúc 04:48 PM
-- Phiên bản máy phục vụ: 5.7.23
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kt_khanhnhan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi`
--

DROP TABLE IF EXISTS `don_vi`;
CREATE TABLE IF NOT EXISTS `don_vi` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `don_vi_ten_unique` (`ten`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi`
--

INSERT INTO `don_vi` (`id`, `ten`, `id_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 1, NULL, '2018-10-12 21:08:44', '2018-10-12 21:08:44'),
(2, 'Chay', 1, NULL, '2018-10-12 21:08:48', '2018-10-12 21:08:48'),
(3, 'Lít', 1, NULL, '2018-10-12 21:09:00', '2018-10-12 21:09:00'),
(4, 'Sản phẩm', 1, NULL, '2018-10-12 21:09:07', '2018-10-12 21:09:07'),
(5, 'Chai', 1, NULL, '2018-10-13 19:43:20', '2018-10-13 19:43:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

DROP TABLE IF EXISTS `loai_san_pham`;
CREATE TABLE IF NOT EXISTS `loai_san_pham` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_04_115854_nhap_vao', 1),
(4, '2018_10_04_120005_xuat_ra', 1),
(5, '2018_10_04_120021_san_pham', 1),
(6, '2018_10_04_120030_loai_san_pham', 1),
(7, '2018_10_11_070502_don_vi', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhap_vao`
--

DROP TABLE IF EXISTS `nhap_vao`;
CREATE TABLE IF NOT EXISTS `nhap_vao` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thanh_toan` tinyint(1) NOT NULL,
  `tra_truoc` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhap_vao`
--

INSERT INTO `nhap_vao` (`id`, `ten`, `ghi_chu`, `so_luong`, `gia`, `id_san_pham`, `id_user`, `thanh_toan`, `tra_truoc`, `remember_token`, `created_at`, `updated_at`) VALUES
(78, 'Sài gòn', NULL, 3, 9000, 2, 1, 0, 0, NULL, '2018-10-19 20:18:28', '2018-10-19 20:18:28'),
(79, 'Sài gòn', NULL, 3, 9000, 2, 1, 1, 27000, NULL, '2018-10-19 20:18:28', '2018-10-19 20:18:28'),
(66, 'Trà xanh', NULL, 10, 7000, 5, 1, 1, 70000, NULL, '2018-10-17 22:32:40', '2018-10-17 22:32:40'),
(5, 'Heniken', 'Thanh toan hoan tat', 10, 13000, 3, 1, 1, 130000, NULL, '2018-10-14 04:23:10', '2018-10-14 04:23:10'),
(65, 'Litton', NULL, 2, 12000, 4, 1, 1, 24000, NULL, '2018-10-17 22:32:15', '2018-10-17 22:32:15'),
(8, 'Heniken', NULL, 1, 13000, 3, 1, 1, 13000, NULL, '2018-10-14 04:47:36', '2018-10-15 08:50:01'),
(9, 'Sài gòn', NULL, 2, 9000, 2, 1, 1, 18000, NULL, '2018-10-14 04:48:09', '2018-10-16 20:53:12'),
(53, 'Sting', NULL, 12, 6000, 6, 1, 1, 72000, NULL, '2018-10-15 07:55:26', '2018-10-15 07:55:33'),
(54, 'Lavie', 'Nước suối', 100, 3000, 8, 1, 1, 300000, NULL, '2018-10-15 08:20:22', '2018-10-16 08:05:14'),
(63, 'Tiger Nâu', NULL, 2, 10000, 1, 1, 1, 20000, NULL, '2018-10-17 08:39:23', '2018-10-17 08:39:23'),
(14, 'Litton', NULL, 2, 12000, 4, 1, 1, 24000, NULL, '2018-10-14 04:55:34', '2018-10-14 04:55:34'),
(64, 'Tiger Nâu', NULL, 120, 10000, 1, 1, 1, 1200000, NULL, '2018-10-17 21:02:44', '2018-10-17 21:02:44'),
(67, 'Bò cụng', NULL, 10, 10000, 7, 1, 1, 100000, NULL, '2018-10-17 22:33:03', '2018-10-23 08:12:14'),
(70, 'Litton', 'ghi chú', 2, 12000, 4, 1, 1, 24000, NULL, '2018-10-18 10:13:16', '2018-10-18 10:13:16'),
(69, 'Trà xanh', 'ghi chú..... dsafa', 10, 7000, 5, 1, 1, 70000, NULL, '2018-10-18 10:01:07', '2018-10-18 10:02:42'),
(74, 'Tiger Nâu', NULL, 2, 10000, 1, 1, 1, 20000, NULL, '2018-10-19 19:54:14', '2018-10-19 19:54:14'),
(75, 'Khô bò', NULL, 1, 230000, 9, 1, 1, 230000, NULL, '2018-10-19 19:57:57', '2018-10-19 19:57:57'),
(73, 'Heniken', NULL, 1, 13000, 3, 1, 1, 13000, NULL, '2018-10-19 19:43:40', '2018-10-19 19:43:40'),
(76, 'Tiger Nâu', NULL, 1, 10000, 1, 1, 1, 10000, NULL, '2018-10-19 20:00:03', '2018-10-23 08:45:45'),
(77, 'Heniken', NULL, 2, 13000, 3, 1, 1, 26000, NULL, '2018-10-19 20:08:15', '2018-10-23 08:14:18'),
(80, 'Trà xanh', NULL, 1, 7000, 5, 1, 1, 7000, NULL, '2018-10-20 19:28:50', '2018-10-20 19:28:50'),
(81, 'Litton', NULL, 20, 12000, 4, 1, 1, 240000, NULL, '2018-10-21 20:52:05', '2018-10-21 20:52:05'),
(82, 'Heniken', NULL, 60, 13000, 3, 1, 1, 780000, NULL, '2018-10-23 08:24:35', '2018-10-23 08:24:35'),
(83, 'Khô bò', NULL, 10, 230000, 9, 1, 1, 2300000, NULL, '2018-10-23 08:24:51', '2018-10-23 08:24:51'),
(84, 'Tiger Nâu', NULL, 100, 10000, 1, 1, 1, 1000000, NULL, '2018-10-23 08:24:58', '2018-10-23 09:22:52'),
(85, 'Litton', 'ghi chú', 10, 12000, 4, 1, 1, 120000, NULL, '2018-10-23 08:46:24', '2018-10-23 08:46:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE IF NOT EXISTS `san_pham` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_nhap_vao` int(11) NOT NULL,
  `gia_xuat_ra` int(11) NOT NULL,
  `id_don_vi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `san_pham_ten_unique` (`ten`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `ghi_chu`, `gia_nhap_vao`, `gia_xuat_ra`, `id_don_vi`, `id_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tiger Nâu', 'Cũng được', 10000, 13000, 2, 1, NULL, '2018-10-12 21:09:41', '2018-10-12 21:09:41'),
(2, 'Sài gòn', 'Ngon bổ rẻ', 9000, 12000, 2, 1, NULL, '2018-10-12 21:10:05', '2018-10-12 21:10:05'),
(3, 'Heniken', 'Mắc quá', 13000, 17000, 2, 1, NULL, '2018-10-12 21:10:41', '2018-10-12 21:10:41'),
(4, 'Litton', 'Ghi chú gzfsasđgsagáđg', 12000, 20000, 5, 1, NULL, '2018-10-13 19:43:43', '2018-10-13 19:43:43'),
(5, 'Trà xanh', 'Oke trà xanh luôn men ơi', 7000, 11000, 5, 1, NULL, '2018-10-15 01:58:11', '2018-10-15 02:01:09'),
(6, 'Sting', 'Ghi chú', 6000, 10000, 2, 1, NULL, '2018-10-15 02:00:18', '2018-10-15 02:01:01'),
(7, 'Bò cụng', 'Ghi chú', 10000, 13000, 5, 1, NULL, '2018-10-15 08:18:56', '2018-10-15 08:18:56'),
(8, 'Lavie', NULL, 3000, 5000, 5, 1, NULL, '2018-10-15 08:19:28', '2018-10-15 08:19:28'),
(9, 'Khô bò', 'Nhậu ngon đây', 230000, 300000, 1, 1, NULL, '2018-10-15 08:41:26', '2018-10-15 08:41:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anh', 'anh@gmail.com', '$2y$10$u79haMfoQp4DGwFt06XjtujoAwPe1f4MAr8GU9OPtZjJr8SKoE8Ba', 1, 'KvH11GukfFoXiriYKrrRGHwxL34MY5wQp9qb2xx9RlBtY6z34kHX11FzqGu0', '2018-10-12 21:08:09', '2018-10-12 21:08:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuat_ra`
--

DROP TABLE IF EXISTS `xuat_ra`;
CREATE TABLE IF NOT EXISTS `xuat_ra` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thanh_toan` tinyint(1) NOT NULL,
  `tra_truoc` int(11) NOT NULL,
  `hang_hong` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xuat_ra`
--

INSERT INTO `xuat_ra` (`id`, `ten`, `ghi_chu`, `so_luong`, `gia`, `id_san_pham`, `id_user`, `thanh_toan`, `tra_truoc`, `hang_hong`, `remember_token`, `created_at`, `updated_at`) VALUES
(69, 'Trà xanh', NULL, 10, 11000, 5, 1, 1, 110000, 0, NULL, '2018-10-21 20:52:35', '2018-10-21 20:52:35'),
(68, 'Sài gòn', NULL, 5, 12000, 2, 1, 1, 60000, 0, NULL, '2018-10-21 08:54:29', '2018-10-21 08:54:29'),
(67, 'Tiger Nâu', NULL, 1, 13000, 1, 1, 1, 13000, 0, NULL, '2018-10-20 19:29:20', '2018-10-20 19:29:20'),
(66, 'Khô bò', NULL, 1, 300000, 9, 1, 1, 300000, 0, NULL, '2018-10-19 20:02:01', '2018-10-23 08:40:24'),
(51, 'Bò cụng', NULL, 1, 0, 7, 1, 1, 0, 1, NULL, '2018-10-18 00:47:16', '2018-10-18 00:47:16'),
(50, 'Heniken', NULL, 3, 17000, 3, 1, 1, 51000, 0, NULL, '2018-10-17 22:34:56', '2018-10-21 20:55:19'),
(54, 'Heniken', NULL, 1, 17000, 3, 1, 1, 17000, 0, NULL, '2018-10-18 09:37:09', '2018-10-18 09:37:09'),
(53, 'Tiger Nâu', NULL, 12, 13000, 1, 1, 1, 156000, 0, NULL, '2018-10-18 09:36:58', '2018-10-18 09:36:58'),
(46, 'Lavie', NULL, 12, 5000, 8, 1, 1, 60000, 0, NULL, '2018-10-17 08:39:48', '2018-10-23 08:45:39'),
(18, 'Tiger Nâu', NULL, 1, 0, 1, 1, 1, 0, 1, NULL, '2018-10-16 06:25:48', '2018-10-16 06:25:48'),
(65, 'Litton', NULL, 1, 20000, 4, 1, 0, 0, 0, NULL, '2018-10-19 19:59:28', '2018-10-23 07:49:52'),
(19, 'Litton', NULL, 1, 20000, 4, 1, 1, 20000, 0, NULL, '2018-10-16 06:26:56', '2018-10-16 06:26:56'),
(20, 'Tiger Nâu', NULL, 1, 13000, 1, 1, 1, 13000, 0, NULL, '2018-10-15 06:27:35', '2018-10-23 08:20:34'),
(21, 'Litton', NULL, 3, 20000, 4, 1, 1, 60000, 0, NULL, '2018-10-15 06:27:52', '2018-10-16 20:44:22'),
(23, 'Bò cụng', 'tốt', 1, 13000, 7, 1, 1, 13000, 0, NULL, '2018-10-15 06:33:36', '2018-10-23 07:52:03'),
(24, 'Heniken', NULL, 1, 17000, 3, 1, 1, 17000, 0, NULL, '2018-10-14 06:35:35', '2018-10-23 08:22:48'),
(25, 'Heniken', NULL, 1, 17000, 3, 1, 1, 17000, 0, NULL, '2018-10-14 06:42:08', '2018-10-23 09:22:31'),
(26, 'Trà xanh', NULL, 2, 11000, 5, 1, 1, 22000, 0, NULL, '2018-10-13 06:49:11', '2018-10-16 06:49:11'),
(52, 'Tiger Nâu', NULL, 3, 0, 1, 1, 1, 0, 1, NULL, '2018-10-18 02:27:37', '2018-10-18 02:27:37'),
(55, 'Tiger Nâu', NULL, 100, 13000, 1, 1, 1, 1300000, 0, NULL, '2018-10-18 09:38:47', '2018-10-18 09:38:47'),
(56, 'Lavie', NULL, 30, 5000, 8, 1, 1, 150000, 0, NULL, '2018-10-18 09:39:12', '2018-10-23 08:24:05'),
(57, 'Heniken', NULL, 10, 17000, 3, 1, 1, 170000, 0, NULL, '2018-10-18 09:39:49', '2018-10-18 09:39:49'),
(58, 'Tiger Nâu', 'ghi chú', 3, 13000, 1, 1, 1, 39000, 0, NULL, '2018-10-18 10:04:31', '2018-10-18 10:04:31'),
(59, 'Tiger Nâu', NULL, 3, 13000, 1, 1, 0, 0, 0, NULL, '2018-10-18 10:15:34', '2018-10-18 10:15:34'),
(60, 'Tiger Nâu', NULL, 1, 13000, 1, 1, 1, 13000, 0, NULL, '2018-10-19 19:25:34', '2018-10-19 19:25:34'),
(62, 'Litton', 'xuất có nợ', 1, 20000, 4, 1, 1, 20000, 0, NULL, '2018-10-19 19:30:28', '2018-10-19 19:30:28'),
(63, 'Bò cụng', NULL, 1, 13000, 7, 1, 1, 13000, 0, NULL, '2018-10-19 19:37:16', '2018-10-23 08:10:10'),
(64, 'Tiger Nâu', NULL, 1, 13000, 1, 1, 1, 13000, 0, NULL, '2018-10-19 19:58:48', '2018-10-19 19:58:48'),
(70, 'Litton', NULL, 5, 20000, 4, 1, 1, 100000, 0, NULL, '2018-10-21 21:37:07', '2018-10-23 08:10:14'),
(71, 'Tiger Nâu', 'miss you', 10, 13000, 1, 1, 1, 0, 0, NULL, '2018-10-23 08:47:40', '2018-10-23 08:47:40'),
(72, 'Heniken', NULL, 1, 17000, 3, 1, 1, 17000, 0, NULL, '2018-10-23 08:51:24', '2018-10-23 08:51:33'),
(79, 'Heniken', NULL, 3, 17000, 3, 1, 0, 0, 0, NULL, '2018-10-23 09:21:23', '2018-10-23 09:21:23'),
(78, 'Litton', NULL, 1, 20000, 4, 1, 1, 20000, 0, NULL, '2018-10-23 09:19:33', '2018-10-23 09:19:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
