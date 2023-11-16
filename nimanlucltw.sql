-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2023 lúc 06:18 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nimanlucltw`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_banner`
--

CREATE TABLE `0696_banner` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã Slider',
  `name` varchar(255) NOT NULL COMMENT 'Tên Slider',
  `link` varchar(255) NOT NULL COMMENT 'Liên kết',
  `position` varchar(100) NOT NULL COMMENT 'Vị trí',
  `image` varchar(100) NOT NULL COMMENT 'Hình ảnh',
  `sort_order` int(10) UNSIGNED NOT NULL COMMENT 'Thứ tự',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_banner`
--

INSERT INTO `0696_banner` (`id`, `name`, `link`, `position`, `image`, `sort_order`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Khuyễn mãi hè 2021', 'http://domain.com/index.php?option=page&cat=khuyen-mai-he', '', '.jpg', 1, '2020-06-30 17:12:13', 1, '2023-10-26 19:54:36', 6, 1),
(2, 'Khuyễn mãi mùa khai giảng', 'http://domain.com/index.php?option=page&cat=khuyen-mai-mua-khai-giang', 'slideshow', 'slider_2.jpg', 2, '2020-06-30 17:12:13', 1, '2022-09-02 19:07:08', 1, 1),
(3, 'Khuyễn mãi giáng sinh', 'http://domain.com/index.php?option=page&cat=khuyen-giang-sinh', 'slideshow', 'slider_3.jpg', 3, '2020-06-30 17:12:13', 1, '2020-06-30 17:12:13', 1, 1),
(4, 'Khuyễn mãi Covid', 'http://domain.com/index.php?option=page&cat=khuyen-mai-covid', 'slideshow', 'slider_1.jpg', 4, '2020-06-30 17:12:13', 1, '2022-11-20 04:24:40', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_brand`
--

CREATE TABLE `0696_brand` (
  `id` int(11) NOT NULL COMMENT 'Mã Loại',
  `name` varchar(255) NOT NULL COMMENT 'Tên loại SP',
  `slug` varchar(255) NOT NULL COMMENT 'SLug Loại SP',
  `sort_order` int(11) NOT NULL DEFAULT 1 COMMENT 'Thứ tự',
  `image` varchar(255) DEFAULT '' COMMENT 'Hình đại diện',
  `description` varchar(255) DEFAULT NULL COMMENT 'Từ khóa SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người tạo',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) DEFAULT NULL COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_brand`
--

INSERT INTO `0696_brand` (`id`, `name`, `slug`, `sort_order`, `image`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Việt Nam', 'viet-nam', 1, 'viet-nam.jpeg', 'Từ khóa SEO', '2023-10-27 05:56:28', 6, '2023-11-15 10:50:56', 7, 1),
(2, 'Hàn Quốc', 'han-quoc', 0, '', 'Từ khóa SEO', '2020-07-03 02:06:19', 1, '2022-11-19 00:54:31', 1, 1),
(3, 'Thái Lan', 'thai-lan', 0, '', 'Từ khóa SEO', '2020-07-03 02:06:19', 1, '2022-11-19 00:54:36', 1, 1),
(5, 'Quảng Châu', 'quang-chau', 0, '', 'Từ khóa SEO', '2020-07-03 02:06:19', 1, '2023-10-27 12:21:24', 6, 2),
(15, '123', 'sdfdsfsdfdsfds-loi', 1, 'sdfdsfsdfdsfds-loi.jpeg', 'dsfsdfdsfdsfdsf', '2023-07-30 11:43:56', 1, '2023-11-13 22:53:51', 7, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_category`
--

CREATE TABLE `0696_category` (
  `id` int(11) NOT NULL COMMENT 'Mã Loại',
  `name` varchar(255) NOT NULL COMMENT 'Tên loại SP',
  `slug` varchar(255) NOT NULL COMMENT 'SLug Loại SP',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `sort_order` int(11) NOT NULL COMMENT 'Thứ tự',
  `image` varchar(255) DEFAULT NULL COMMENT 'Hình đại diện',
  `description` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người tạo',
  `updated_at` datetime DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) DEFAULT 0 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_category`
--

INSERT INTO `0696_category` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `image`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Đồ nam', 'do-nam', 0, 0, 'do-nam.webp', 'Đồ nam', '2022-11-22 18:17:31', 1, '2023-10-29 04:12:03', 6, 1),
(2, 'Đồ nữ ', 'do-nu', 0, 0, 'do-nu.webp', 'Đồ nữ 123', '2022-11-22 18:18:00', 1, '2023-11-16 04:58:48', 7, 1),
(3, 'Áo thun nam', 'ao-thun-nam', 1, 0, 'NULL', 'Áo thun nam 1', '2022-11-22 18:18:27', 1, '2023-11-01 06:25:32', 7, 1),
(4, 'Áo sơ mi nam', 'ao-so-mi-nam', 1, 0, NULL, 'Áo sơ mi nam', '2022-11-22 18:18:53', 1, '2022-11-22 18:18:53', 0, 1),
(5, 'Quần short nam', 'quan-short-nam', 1, 0, NULL, 'Quần short nam', '2022-11-22 18:19:32', 1, '2022-11-22 18:19:32', 0, 1),
(6, 'Quần dài nam', 'quan-dai-nam', 1, 0, NULL, 'Quần dài nam', '2022-11-22 18:19:57', 1, '2022-11-22 18:19:57', 0, 1),
(7, 'Áo thun nữ', 'ao-thun-nu', 2, 0, NULL, 'Áo thun nữ', '2022-11-22 18:21:27', 1, '2022-11-22 18:21:27', 0, 1),
(8, 'Áo sơ mi nữ', 'ao-so-mi-nu', 2, 0, NULL, 'Áo sơ mi nữ', '2022-11-22 18:21:43', 1, '2022-11-22 18:21:43', 0, 1),
(9, 'Áo kiểu', 'ao-kieu', 2, 0, NULL, 'Áo kiểu', '2022-11-22 18:22:00', 1, '2022-11-22 18:22:00', 0, 1),
(10, 'Quần short nữ', 'quan-short-nu', 2, 0, NULL, 'Quần short nữ', '2022-11-22 18:22:14', 1, '2022-11-22 18:22:14', 0, 1),
(11, 'Quần dài nữ', 'quan-dai-nu', 2, 0, NULL, 'Quần dài nữ', '2022-11-22 18:22:48', 1, '2022-11-22 18:22:48', 0, 1),
(12, 'Chân váy', 'chan-vay', 2, 0, NULL, 'Chân vay1', '2022-11-22 18:23:07', 1, '2023-11-15 05:50:16', 7, 1),
(14, 'Thầy lợi mói nhập', 'thay-loi-moi-nhap', 2, 1, NULL, 'sad', '2023-07-27 06:49:37', 1, '2023-11-01 18:25:53', 7, 0),
(15, 'thay loi dep zdai', 'thay-loi-dep-zdai', 0, 1, 'thay-loi-dep-zdai.png', 'cxzcxz', '2023-07-27 07:01:37', 1, '2023-11-15 17:50:33', 7, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_contact`
--

CREATE TABLE `0696_contact` (
  `id` int(11) NOT NULL COMMENT 'Mã liên hệ',
  `name` varchar(255) NOT NULL COMMENT 'Họ và tên',
  `email` varchar(100) NOT NULL COMMENT 'Email',
  `phone` varchar(100) NOT NULL COMMENT 'Điện thoại',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề',
  `content` mediumtext NOT NULL COMMENT 'Chi tiết',
  `replay_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Nội dung liên hệ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày liên hệ',
  `updated_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày trả lời',
  `updated_by` tinyint(4) DEFAULT 0 COMMENT 'Người trả lời',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Tráng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_contact`
--

INSERT INTO `0696_contact` (`id`, `name`, `email`, `phone`, `title`, `content`, `replay_id`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'fdsfg', 'fsgfdg', 'fdgfds', 'fdgfd', 'dffdgfd', NULL, '2023-11-01 17:04:45', '2023-11-01 17:04:45', 0, 1),
(2, 'gfd', 'gff', 'rtgrtgtr', 'gtrgrw', 'gtrwgrtgwrtg', NULL, '2023-11-01 17:05:40', '2023-11-13 13:05:53', 7, 1),
(8, 'fgfdg', 'minimchi0@gmail.com', 'fdgfdg', 'gfgd', 'sdgrg', 0, '2023-11-13 02:24:26', '2023-11-13 14:24:26', 0, 0),
(9, 'saf', 'minimchi0@gmail.com', '03213324', '123456', 'fef', NULL, '2023-11-15 01:39:22', '2023-11-15 01:39:22', 0, 0),
(10, 'fsa', 'frege', 'vdsfe', 'gergre', 'vffrer', NULL, '2023-11-15 01:44:55', '2023-11-15 01:44:55', 0, 0),
(11, 'dsf', 'minimchi0@gmail.com', 'fsd', 'dsf', 'efwfe', NULL, '2023-11-15 02:09:48', '2023-11-15 02:09:48', 0, 0),
(12, 'vvfx', 'fxbf', 'fxfbv', 'bfc', 'bfcbf', NULL, '2023-11-15 02:16:15', '2023-11-15 02:16:15', 0, 0),
(13, '', '', '03213324', '', '', NULL, '2023-11-14 22:59:08', '2023-11-15 10:59:08', 0, 0),
(14, '', '', '03213324', '', '', NULL, '2023-11-14 22:59:24', '2023-11-15 10:59:24', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_menu`
--

CREATE TABLE `0696_menu` (
  `id` int(11) NOT NULL COMMENT 'Mã Menu',
  `name` varchar(255) NOT NULL COMMENT 'Tên Menu',
  `link` varchar(255) NOT NULL COMMENT 'Liên kết',
  `type` varchar(50) NOT NULL COMMENT 'Kiểu Menu',
  `table_id` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã trong bảng',
  `sort_order` int(11) NOT NULL DEFAULT 0 COMMENT 'Thứ tự',
  `position` varchar(255) NOT NULL COMMENT 'Vị trí',
  `level` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL COMMENT 'Mã cấp cha',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày Tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_menu`
--

INSERT INTO `0696_menu` (`id`, `name`, `link`, `type`, `table_id`, `sort_order`, `position`, `level`, `parent_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Trang chủ', 'http://localhost/NimAnLuc_2122170696/', 'custom', 0, 2, 'mainmenu', 1, 0, '2022-11-22 05:36:05', 1, '2023-07-31 23:17:16', 1, 1),
(2, 'Giới thiệu', 'index.php?option=page&cat=gioi-thieu', 'page', 39, 2, 'mainmenu', 1, 0, '2022-11-22 06:13:46', 1, '2022-11-22 06:18:22', 1, 1),
(4, 'Chân váy', 'index.php?option=product&cat=chan-vay', 'category', 12, 8, 'mainmenu', 2, 14, '2022-11-22 06:14:09', 1, '2022-11-22 06:18:22', 1, 1),
(5, 'Quần dài nữ', 'index.php?option=product&cat=quan-dai-nu', 'category', 11, 7, 'mainmenu', 2, 14, '2022-11-22 06:14:09', 1, '2022-11-22 06:18:22', 1, 1),
(6, 'Quần short nữ', 'index.php?option=product&cat=quan-short-nu', 'category', 10, 6, 'mainmenu', 2, 14, '2022-11-22 06:14:09', 1, '2022-11-22 06:18:22', 1, 1),
(7, 'Áo kiểu', 'index.php?option=product&cat=ao-kieu', 'category', 9, 5, 'mainmenu', 2, 14, '2022-11-22 06:14:09', 1, '2022-11-22 06:18:22', 1, 1),
(8, 'Áo sơ mi nữ', 'index.php?option=product&cat=ao-so-mi-nu', 'category', 8, 4, 'mainmenu', 2, 14, '2022-11-22 06:14:09', 1, '2022-11-22 06:18:22', 1, 1),
(9, 'Áo thun nữ', 'index.php?option=product&cat=ao-thun-nu', 'category', 7, 3, 'mainmenu', 2, 14, '2022-11-22 06:14:09', 1, '2022-11-22 06:18:22', 1, 1),
(10, 'Quần dài nam', 'index.php?option=product&cat=quan-dai-nam', 'category', 6, 13, 'mainmenu', 2, 15, '2022-11-22 06:14:09', 1, '2022-11-22 06:19:04', 1, 1),
(11, 'Quần short nam', 'index.php?option=product&cat=quan-short-nam', 'category', 5, 12, 'mainmenu', 2, 15, '2022-11-22 06:14:09', 1, '2022-11-22 06:19:04', 1, 1),
(12, 'Áo sơ mi nam', 'index.php?option=product&cat=ao-so-mi-nam', 'category', 4, 11, 'mainmenu', 2, 15, '2022-11-22 06:14:09', 1, '2022-11-22 06:19:04', 1, 1),
(13, 'Áo thun nam', 'index.php?option=product&cat=ao-thun-nam', 'category', 3, 10, 'mainmenu', 2, 15, '2022-11-22 06:14:09', 1, '2022-11-22 06:19:04', 1, 1),
(14, 'Đồ nữ', 'index.php?option=product&cat=do-nu', 'category', 2, 4, 'mainmenu', 1, 0, '2022-11-22 06:14:09', 1, '2022-11-22 06:19:41', 1, 1),
(15, 'Đồ nam', 'index.php?option=product&cat=do-nam', 'category', 1, 3, 'mainmenu', 1, 0, '2022-11-22 06:14:09', 1, '2022-11-22 06:19:41', 1, 1),
(16, 'Giới thiệu', 'index.php?option=page&cat=gioi-thieu', 'page', 39, 1, 'footermenu', 1, 0, '2022-11-22 06:55:36', 1, '2022-11-29 19:31:59', 1, 0),
(17, 'Chính Sách Hoàn Tiền', 'index.php?option=page&cat=chinh-sach-hoan-tien', 'page', 38, 1, 'footermenu', 1, 0, '2022-11-22 06:55:36', 1, '2022-11-22 06:55:42', 1, 1),
(18, 'Chính sách bảo hành', 'index.php?option=page&cat=chinh-sach-bao-hanh', 'page', 37, 2, 'footermenu', 1, 0, '2022-11-22 06:55:36', 1, '2023-07-31 23:17:16', 1, 1),
(19, 'Chính sách đổi hàng', 'index.php?option=page&cat=chinh-sach-doi-hang', 'page', 36, 2, 'footermenu', 1, 0, '2022-11-22 06:55:36', 1, '2023-07-31 23:17:16', 1, 1),
(20, 'Quần dài nữ', 'index.php?option=product&cat=quan-dai-nu', 'category', 11, 2, 'mainmenu', 1, 0, '2023-07-31 23:16:31', 1, '2023-07-31 23:17:16', 1, 2),
(21, 'Quần short nữ', 'index.php?option=product&cat=quan-short-nu', 'category', 10, 1, 'mainmenu', 1, 0, '2023-07-31 23:16:31', 1, '2023-07-31 23:16:31', 1, 2),
(22, 'Áo kiểu', 'index.php?option=product&cat=ao-kieu', 'category', 9, 1, 'mainmenu', 1, 0, '2023-07-31 23:16:31', 1, '2023-07-31 23:16:31', 1, 2),
(23, 'Áo sơ mi nữ', 'index.php?option=product&cat=ao-so-mi-nu', 'category', 8, 1, 'mainmenu', 1, 0, '2023-07-31 23:16:31', 1, '2023-07-31 23:16:31', 1, 2),
(24, 'Áo thun nữ', 'index.php?option=product&cat=ao-thun-nu', 'category', 7, 1, 'mainmenu', 1, 0, '2023-07-31 23:16:31', 1, '2023-07-31 23:16:31', 1, 2),
(25, 'Quần short nữ', 'index.php?option=product&cat=quan-short-nu', 'category', 10, 1, 'mainmenu', 1, 0, '2023-08-17 05:53:49', 1, '2023-08-17 05:53:49', 1, 2),
(26, 'Áo kiểu', 'index.php?option=product&cat=ao-kieu', 'category', 9, 1, 'mainmenu', 1, 0, '2023-08-17 05:53:49', 1, '2023-08-17 05:53:49', 1, 2),
(27, 'Áo sơ mi nữ', 'index.php?option=product&cat=ao-so-mi-nu', 'category', 8, 1, 'mainmenu', 1, 0, '2023-08-17 05:53:49', 1, '2023-08-17 05:53:49', 1, 2),
(28, 'Áo thun nữ', 'index.php?option=product&cat=ao-thun-nu', 'category', 7, 1, 'mainmenu', 1, 0, '2023-08-17 05:53:49', 1, '2023-08-17 05:53:49', 1, 2),
(29, 'Đồ nam', 'index.php?option=product&cat=do-nam', 'category', 1, 1, 'mainmenu', 0, 0, '2023-11-03 00:31:10', 1, '2023-11-12 12:29:31', 7, 0),
(30, 'Đồ nam', 'index.php?option=product&cat=do-nam', 'category', 1, 1, 'mainmenu', 0, 0, '2023-11-03 00:31:23', 1, '2023-11-03 15:07:23', 7, 0),
(31, 'Đồ nữ', 'index.php?option=product&cat=do-nu', 'category', 2, 1, 'mainmenu', 0, 0, '2023-11-03 00:51:47', 1, '2023-11-15 21:59:36', 7, 2),
(32, 'Áo thun nam', 'index.php?option=product&cat=ao-thun-nam', 'category', 3, 1, 'mainmenu', 0, 0, '2023-11-03 00:51:47', 1, '2023-11-03 15:07:21', 7, 0),
(33, 'Hàn Quốc', 'index.php?option=brand&cat=han-quoc', 'brand', 2, 1, 'mainmenu', 0, 0, '2023-11-03 14:38:40', 1, '2023-11-15 09:55:19', 7, 2),
(37, 'Đồ nam 1', 'index.php?option=product&cat=do-nam', 'category', 1, 1, 'mainmenu', 0, 0, '2023-11-15 10:26:06', 1, '2023-11-15 21:56:55', 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_order`
--

CREATE TABLE `0696_order` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `user_id` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `deliveryaddress` varchar(255) NOT NULL COMMENT 'Địa chỉ người nhận',
  `deliveryname` varchar(100) NOT NULL COMMENT 'Tên người nhận',
  `deliveryphone` varchar(120) NOT NULL COMMENT 'Điện thoại người nhận',
  `deliveryemail` varchar(120) NOT NULL COMMENT 'Email ngươig nhận',
  `note` varchar(1000) NOT NULL COMMENT 'Code đơn hàng',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày cập nhật',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người cập nhật',
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_order`
--

INSERT INTO `0696_order` (`id`, `user_id`, `deliveryaddress`, `deliveryname`, `deliveryphone`, `deliveryemail`, `note`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(17, 7, 'Phố 3', 'Nìm An Lực', '0329428959', 'min', 'Không đáng chú ý', '2023-11-13 22:16:45', '2023-11-13 22:16:45', NULL, 1),
(18, 7, 'Phố 3', 'Nìm An Lực', '0329428959', 'min', 'Không đáng chú ý', '2023-11-13 22:17:31', '2023-11-13 22:17:31', NULL, 1),
(19, 7, 'Phố 3', 'Nìm An Lực', '0329428959', 'min', 'Không đáng chú ý', '2023-11-13 22:18:09', '2023-11-13 22:18:09', NULL, 1),
(20, 7, 'Phố 3', 'Nìm An Lực', '0329428959', 'min', 'Không đáng chú ý', '2023-11-13 22:18:13', '2023-11-13 22:18:13', NULL, 1),
(21, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 13:34:18', '2023-11-14 13:34:18', NULL, 1),
(22, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 13:38:55', '2023-11-14 13:38:55', NULL, 1),
(23, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 13:40:07', '2023-11-14 13:40:07', NULL, 1),
(24, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 13:41:01', '2023-11-14 13:41:01', NULL, 1),
(25, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 13:43:26', '2023-11-14 13:43:26', NULL, 1),
(26, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 13:48:30', '2023-11-14 13:48:30', NULL, 1),
(27, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:13:36', '2023-11-14 22:13:36', NULL, 1),
(28, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:14:46', '2023-11-14 22:14:46', NULL, 1),
(29, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:16:16', '2023-11-14 22:16:16', NULL, 1),
(30, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:16:23', '2023-11-14 22:16:23', NULL, 1),
(31, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:16:34', '2023-11-14 22:16:34', NULL, 1),
(32, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:17:26', '2023-11-14 22:17:26', NULL, 1),
(33, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:17:47', '2023-11-14 22:17:47', NULL, 1),
(34, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:18:05', '2023-11-14 22:18:05', NULL, 1),
(35, 7, 'Phố 4', 'Nìm An Lực', '0329428959', 'min', 'Không chú ý', '2023-11-14 22:29:56', '2023-11-14 22:29:56', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_orderdetail`
--

CREATE TABLE `0696_orderdetail` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã CT Đơn hàng',
  `order_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `product_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `price` float(12,2) NOT NULL COMMENT 'Giá sản phẩm',
  `qty` int(10) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `amount` float(12,2) NOT NULL COMMENT 'Thành tiền',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_orderdetail`
--

INSERT INTO `0696_orderdetail` (`id`, `order_id`, `product_id`, `price`, `qty`, `amount`, `created_at`, `updated_at`) VALUES
(5, 35, 19, 10000.00, 1, 10000.00, '2023-11-15', '2023-11-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_post`
--

CREATE TABLE `0696_post` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã bài viết',
  `topic_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Mã chủ đề',
  `title` varchar(1000) NOT NULL COMMENT 'Tiêu đề bài viết',
  `slug` varchar(1000) NOT NULL COMMENT 'Slug tiêu đề',
  `detail` longtext NOT NULL COMMENT 'Chi tiết bài viết',
  `image` varchar(1000) NOT NULL COMMENT 'Hình ảnh',
  `type` varchar(10) NOT NULL DEFAULT 'post' COMMENT 'Kiểu bài viết',
  `description` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_post`
--

INSERT INTO `0696_post` (`id`, `topic_id`, `title`, `slug`, `detail`, `image`, `type`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(36, 4, 'Chính Sách Hoàn Tiền', 'chinh-sach-hoan-tien', 'dsgfdlskngjdsngljndflksgnhljh', 'fsaf.jpg', 'page', 'fdgsfdgregregregre', '2023-11-12 01:35:51', 7, '2023-11-12 01:35:51', 1, 1),
(37, 4, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', 'dfewfewfrew', 'vvfss.jpg', 'page', 'dsfdasfsfwe', '2023-11-12 01:36:11', 7, '2023-11-12 01:36:11', 1, 1),
(38, 5, 'Chính sách đổi hàng', 'chinh-sach-doi-hang', 'fewfewf', 'fdsdsfew.jpg', 'page', 'dsafqwefwegfgre', '2023-11-12 01:36:30', 7, '2023-11-12 01:36:30', 1, 1),
(39, 0, 'Giới Thiệu', 'gioi-thieu', '32r54253345435', '11232.jpeg', 'page', '', '2023-10-31 22:59:58', 7, '2023-11-01 00:02:19', 7, 1),
(40, 5, '123411111', 'fsaf1', '', 'fsaf.webp', 'post', '', '2023-10-27 07:56:15', 6, '2023-10-30 01:04:26', 7, 1),
(41, 4, 'ta nói nè 123', '123', '', '123.webp', 'post', '', '2023-10-29 13:02:41', 6, '2023-11-15 10:53:04', 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_product`
--

CREATE TABLE `0696_product` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `category_id` int(10) UNSIGNED NOT NULL COMMENT 'Mã loại sản phẩm',
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL COMMENT 'Tên sản phẩm',
  `slug` varchar(1000) NOT NULL COMMENT 'Slug tên sản phẩm',
  `image` varchar(255) NOT NULL COMMENT 'Hình ảnh',
  `detail` mediumtext NOT NULL COMMENT 'Chi tiết',
  `qty` smallint(5) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `price` float(12,2) NOT NULL COMMENT 'Giá',
  `pricesale` float(12,3) NOT NULL COMMENT 'Giá khuyến mãi',
  `description` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_product`
--

INSERT INTO `0696_product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `image`, `detail`, `qty`, `price`, `pricesale`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC LỚN MÀU', 'ao-len-nam-totoday-ao-len-soc-lon-mau', '123.webp', '<p>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN SỌC LỚN M&Agrave;U</p>\r\n', 3, 378000.00, 378000.000, 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC LỚN MÀU', '2022-11-22 04:40:37', 1, '2022-11-22 04:40:37', 1, 1),
(2, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC PHỐI MÀU', 'ao-len-nam-totoday-ao-len-soc-phoi-mau', '123.webp', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN SỌC PHỐI M&Agrave;U</h1>\r\n', 1, 378000.00, 378000.000, 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC PHỐI MÀU', '2022-11-22 04:42:49', 1, '2022-11-22 04:42:49', 1, 1),
(3, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN TRAFFIC', 'ao-len-nam-totoday-ao-len-traffic', '123.webp', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN TRAFFIC</h1>\r\n', 1, 378000.00, 378000.000, 'ÁO LEN NAM - TOTODAY - ÁO LEN TRAFFIC', '2022-11-22 04:48:35', 1, '2022-11-22 04:48:35', 1, 1),
(4, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN NHIỀU MÀU', 'ao-len-nam-totoday-ao-len-nhieu-mau', '123.webp', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN NHIỀU M&Agrave;U</h1>\r\n', 1, 10000.00, 10000.000, 'ÁO LEN NAM - TOTODAY - ÁO LEN NHIỀU MÀU', '2022-11-22 04:49:40', 1, '2022-11-22 04:49:40', 1, 1),
(5, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - THE BASIC', 'ao-so-mi-nam-totoday-the-basic', 'alo2.webp', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - THE BASIC</h1>\r\n', 1, 10000.00, 10000.000, 'ÁO SƠ MI NAM - TOTODAY - THE BASIC', '2022-11-22 05:11:51', 1, '2022-11-22 05:15:16', 1, 1),
(6, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - COOL SHIRT', 'ao-so-mi-nam-totoday-cool-shirt', 'alo2.webp', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - THE BASIC</h1>\r\n', 1, 10000.00, 10000.000, 'ÁO SƠ MI NAM - TOTODAY - COOL SHIRT', '2022-11-22 05:11:51', 1, '2022-11-22 05:14:52', 1, 1),
(7, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - SIMPLE SHIRT', 'ao-so-mi-nam-totoday-simple-shirt', 'alo2.webp', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - SIMPLE SHIRT</h1>\r\n', 1, 10000.00, 10000.000, 'ÁO SƠ MI NAM - TOTODAY - SIMPLE SHIRT', '2022-11-22 05:16:17', 1, '2022-11-22 05:16:17', 1, 1),
(8, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - FORMAT', 'ao-so-mi-nam-totoday-format', 'alo2.webp', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - FORMAT</h1>\r\n', 1, 10000.00, 10000.000, 'ÁO SƠ MI NAM - TOTODAY - FORMAT', '2022-11-22 05:16:51', 1, '2022-11-22 05:16:51', 1, 1),
(9, 5, 1, 'SHORTS JEAN NAM - TOTODAY - 11203', 'shorts-jean-nam-totoday-11203', 'shopping.webp', '<h1>SHORTS JEAN NAM - TOTODAY - 11203</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS JEAN NAM - TOTODAY - 11203', '2022-11-22 05:17:53', 1, '2022-11-22 05:17:53', 1, 1),
(10, 5, 1, 'SHORTS JEAN NAM - TOTODAY - 11202', 'shorts-jean-nam-totoday-11202', 'shopping.webp', '<h1>SHORTS JEAN NAM - TOTODAY - 11202</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS JEAN NAM - TOTODAY - 11202', '2022-11-22 05:19:09', 1, '2022-11-22 05:19:09', 1, 1),
(11, 5, 1, 'SHORTS JEAN NAM - TOTODAY - 11201', 'shorts-jean-nam-totoday-11201', 'alo.webp', '<h1>SHORTS JEAN NAM - TOTODAY - 11201</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS JEAN NAM - TOTODAY - 11201', '2022-11-22 05:19:43', 1, '2022-11-22 05:19:43', 1, 1),
(12, 5, 1, 'SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY', 'shorts-thun-nam-totoday-freedom-totoday', 'shopping.webp', '<h1>SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY', '2022-11-22 05:20:53', 1, '2022-11-22 05:20:53', 1, 1),
(13, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206', 'quan-jean-nam-slimfit-totoday-10206', 'thoi-trang-nam-1.jpg', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206', '2022-11-22 05:21:58', 1, '2022-11-22 05:21:58', 1, 1),
(14, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205', 'quan-jean-nam-slimfit-totoday-10205', 'thoi-trang-nam-1.jpg', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205', '2022-11-22 05:22:27', 1, '2022-11-22 05:22:27', 1, 1),
(15, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204', 'quan-jean-nam-slimfit-totoday-10204', 'thoi-trang-nam-1.jpg', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204', '2022-11-22 05:22:56', 1, '2022-11-22 05:22:56', 1, 1),
(16, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203', 'quan-jean-nam-slimfit-totoday-10203', 'thoi-trang-nam-1.jpg', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203', '2022-11-22 05:23:18', 1, '2022-11-22 05:23:18', 1, 1),
(17, 3, 2, 'ÁO THUN W2ATN09203FOSHT', 'ao-thun-w2atn09203fosht', 'ao-thun-w2atn09203fosht.webp', 'dfrsf', 17, 1000000.00, 10000.000, 'erfrew', '2022-11-22 05:24:58', 1, '2023-11-13 22:31:24', 7, 1),
(18, 3, 2, 'ÁO THUN W2ATN09201FOSHT', 'ao-thun-w2atn09201fosht', 'ao-thun-w2atn09201fosht.webp', 'fderwfrw', 18, 1000000.00, 10000.000, 'ferfer', '2022-11-22 05:26:02', 1, '2023-11-13 22:30:47', 7, 1),
(19, 3, 1, 'ÁO THUN W2ATN08213BOSHT', 'ao-thun-w2atn08213bosht', 'ao-thun-w2atn08213bosht.webp', '', 19, 10000.00, 10000.000, '', '2022-11-22 05:26:25', 1, '2023-11-13 22:29:40', 7, 1),
(20, 7, 1, 'ÁO THUN W2ATN08210BOSBA', 'ao-thun-w2atn08210bosba', 'ao-thun-w2atn08210bosba.webp', 'rerdsfvfrger', 20, 100010.00, 10000.000, 'grgrergerg', '2022-11-22 05:26:44', 1, '2023-11-13 22:25:51', 7, 1),
(21, 8, 1, 'ÁO SƠMI W2SMD05204BOSTR', 'ao-somi-w2smd05204bostr', 'ao-somi-w2smd05204bostr.jpeg', '', 21, 10000.00, 10000.000, '', '2022-11-22 05:29:53', 1, '2023-11-13 22:51:54', 7, 1),
(22, 8, 1, 'ÁO SƠMI W2SMN05201BOSTR', 'ao-somi-w2smn05201bostr', 'ao-somi-w2smn05201bostr.jpeg', '', 22, 10000.00, 10000.000, '', '2022-11-22 05:30:23', 1, '2023-11-13 22:51:41', 7, 1),
(23, 8, 2, 'ÁO SƠMI W2SMD05203BOSTR', 'ao-somi-w2smd05203bostr', 'ao-somi-w2smd05203bostr.jpeg', '', 23, 10000.00, 10000.000, '', '2022-11-22 05:30:45', 1, '2023-11-13 22:51:26', 7, 1),
(24, 8, 1, 'SET SƠMI W2SET05201FOSCR', 'set-somi-w2set05201foscr', 'alo1.jpeg', '<h1>SET SƠMI W2SET05201FOSCR</h1>\r\n', 1, 10000.00, 10000.000, 'SET SƠMI W2SET05201FOSCR', '2022-11-22 05:31:09', 1, '2022-11-22 05:31:09', 1, 1),
(25, 10, 1, 'SHORTS JEAN NỮ WASH - TOTODAY - 10205', 'shorts-jean-nu-wash-totoday-10205', 'alo.jpeg', '<h1>SHORTS JEAN NỮ WASH - TOTODAY - 10205</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS JEAN NỮ WASH - TOTODAY - 10205', '2022-11-22 05:34:00', 1, '2022-11-22 05:34:00', 1, 1),
(26, 10, 1, 'SHORTS JEAN NỮ - TOTODAY - 10205', 'shorts-jean-nu-totoday-10205', 'alo.jpeg', '<h1>SHORTS JEAN NỮ - TOTODAY - 10205</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS JEAN NỮ - TOTODAY - 10205', '2022-11-22 05:34:21', 1, '2022-11-22 05:34:21', 1, 1),
(27, 10, 1, 'SHORTS JEAN NỮ - TOTODAY - 10203', 'shorts-jean-nu-totoday-10203', 'alo.jpeg', '<h1>SHORTS JEAN NỮ - TOTODAY - 10203</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS JEAN NỮ - TOTODAY - 10203', '2022-11-22 05:34:52', 1, '2022-11-22 05:34:52', 1, 1),
(28, 10, 1, 'SHORTS JEAN NỮ RÁCH - TOTODAY - 10202', 'shorts-jean-nu-rach-totoday-10202', 'alo.jpeg', '<h1>SHORTS JEAN NỮ R&Aacute;CH - TOTODAY - 10202</h1>\r\n', 1, 10000.00, 10000.000, 'SHORTS JEAN NỮ RÁCH - TOTODAY - 10202', '2022-11-22 05:35:13', 1, '2022-11-22 05:35:13', 1, 1),
(29, 11, 1, 'QUẦN JEAN W2QJN05203FBGTR', 'quan-jean-w2qjn05203fbgtr', 'alo.jpeg', '<h1>QUẦN JEAN W2QJN05203FBGTR</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN W2QJN05203FBGTR', '2022-11-22 05:38:14', 1, '2022-11-22 05:38:15', 1, 1),
(30, 11, 1, 'QUẦN JEAN W2QJN05202FBGTR', 'quan-jean-w2qjn05202fbgtr', 'alo.jpeg', '<h1>QUẦN JEAN W2QJN05202FBGTR</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN W2QJN05202FBGTR', '2022-11-22 05:38:39', 1, '2022-11-22 05:38:39', 1, 1),
(31, 11, 1, 'QUẦN JEAN W2QJN05201FBGTR', 'quan-jean-w2qjn05201fbgtr', 'alo.jpeg', '<h1>QUẦN JEAN W2QJN05201FBGTR</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN W2QJN05201FBGTR', '2022-11-22 05:38:59', 1, '2022-11-22 05:38:59', 1, 1),
(32, 11, 1, 'QUẦN JEAN W2QJN04208FBGTR', 'quan-jean-w2qjn04208fbgtr', 'alo.jpeg', '<h1>QUẦN JEAN W2QJN04208FBGTR</h1>\r\n', 1, 10000.00, 10000.000, 'QUẦN JEAN W2QJN04208FBGTR', '2022-11-22 05:39:47', 1, '2022-11-22 05:39:48', 1, 1),
(33, 12, 1, 'CHÂN VÁY JEAN NỮ - TOTODAY - 10201', 'chan-vay-jean-nu-totoday-10201', '123.jpeg', '<h1>CH&Acirc;N V&Aacute;Y JEAN NỮ - TOTODAY - 10201</h1>\r\n', 1, 10000.00, 10000.000, 'CHÂN VÁY JEAN NỮ - TOTODAY - 10201', '2022-11-22 05:41:15', 1, '2022-11-22 05:41:15', 1, 1),
(34, 12, 1, 'CHÂN VÁY W2CNV06203FOSXL', 'chan-vay-w2cnv06203fosxl', '123.jpeg', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06203FOSXL</h1>\r\n', 1, 10000.00, 10000.000, 'CHÂN VÁY W2CNV06203FOSXL', '2022-11-22 05:41:36', 1, '2022-11-22 05:41:36', 1, 1),
(35, 12, 1, 'CHÂN VÁY W2CNV06202FOSXL', 'chan-vay-w2cnv06202fosxl', '123.jpeg', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06202FOSXL</h1>\r\n', 1, 10000.00, 10000.000, 'CHÂN VÁY W2CNV06202FOSXL', '2022-11-22 05:41:58', 1, '2023-11-04 20:28:49', 7, 2),
(36, 2, 2, 'CHÂN VÁY W2CNV06201FOSCR', 'chan-vay-w2cnv06201foscr', 'chan-vay-w2cnv06201foscr.webp', 'do dep', 36, 10060.00, 10000.000, 'fdferdferfw', '2022-11-22 05:42:21', 1, '2023-11-13 22:23:44', 7, 1),
(38, 7, 1, 'Áo thun nữ chất lượng cao', 'ao-thun-nu', 'ao-thun-nu.webp', 'gerg', 20, 100000.00, 100.000, 'ergrtgererf', '2023-11-13 22:27:07', 7, '2023-11-13 22:27:07', 1, 1),
(39, 7, 1, 'Áo thun nữ chất lượng cao 1 1', 'a1', 'a1.webp', 'dsf', 39, 1000000.00, 100.000, 'sfdfdsafds', '2023-11-13 22:27:45', 7, '2023-11-15 10:49:46', 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_topic`
--

CREATE TABLE `0696_topic` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã chủ đề',
  `name` varchar(255) NOT NULL COMMENT 'Tên chủ đề',
  `slug` varchar(255) NOT NULL COMMENT 'Slug tên chủ đề',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Sắp xếp',
  `metakey` varchar(255) NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_topic`
--

INSERT INTO `0696_topic` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(4, 'fsa', 'afs', 0, 1, 'fsa', 'fas', '2023-10-29 01:12:11', 6, '2023-10-29 13:27:35', 6, 2),
(5, 'fas', 'fsaf', 0, 1, 'fffffffffas', 'sfaaaaaaaaa', '2023-10-29 01:12:28', 6, '2023-11-15 10:55:49', 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `0696_user`
--

CREATE TABLE `0696_user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã tài khoản',
  `name` varchar(100) NOT NULL COMMENT 'Họ và tên',
  `username` varchar(100) NOT NULL COMMENT 'Tên đăng nhâp',
  `password` varchar(64) NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(100) NOT NULL COMMENT 'Email',
  `gender` tinyint(3) UNSIGNED NOT NULL COMMENT 'Giới tính',
  `phone` varchar(11) NOT NULL COMMENT 'Điện thoại',
  `image` varchar(100) NOT NULL COMMENT 'Hình',
  `roles` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quyền truy cập',
  `address` varchar(255) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `0696_user`
--

INSERT INTO `0696_user` (`id`, `name`, `username`, `password`, `email`, `gender`, `phone`, `image`, `roles`, `address`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(6, 'Hồ Diên Lợi', 'admin', '123456', 'hodienloi@gmail.com', 1, '098888', 'hodienloi.jpg', 1, 'Bình Dương', '2023-10-13 10:34:44', 1, '2023-10-13 10:34:44', 1, 1),
(7, 'Nìm An Lực', 'Anluc', '12345', 'min', 0, '0329428959', '.jpeg', 1, 'Phố 4', '2023-10-30 12:02:14', 6, '2023-11-15 01:31:49', 7, 1),
(9, 'fewf 123', 'wrew', '', 'wrew', 0, 'ewfew', '.jpeg', 1, 'rewrw', '2023-11-01 00:38:38', 7, '2023-11-01 00:54:23', 7, 1),
(10, 'feasf 1234', 'fasf', '', 'fsaf', 1, 'afa', '.jpeg', 2, 'fsaf', '2023-11-01 00:53:51', 7, '2023-11-13 13:06:22', 7, 1),
(11, 'fsa', 'sv2122170696@hitu.edu.vn', '', 'minimchi0@gmail.com', 0, '03213324', '', 2, 'fsaff', '2023-11-12 01:18:45', 1, '2023-11-12 13:18:45', 1, 2),
(12, 'sdaf', 'dsf', 'ewfew', 'ewf@gmail.com', 0, 'sadf', '', 2, 'sadf', '2023-11-12 01:25:03', 1, '2023-11-12 13:25:03', 1, 2),
(13, 'fsa', '32r423', '2133', 'minhluc107@gmail.com', 0, '234', '', 2, '32', '2023-11-12 01:27:13', 1, '2023-11-12 13:27:13', 1, 2),
(14, 'fsa', 'Thoi', '8cb2237d0679ca88db6464eac60da96345513964', 'minimchi0@gmail.com', 0, '03213324', '', 2, 'fdsdfer', '2023-11-14 00:11:59', 1, '2023-11-14 12:11:59', 1, 1),
(15, 'saf', 'regreg', '123', 'minhluc107@gmail.com', 0, '0329428959', '', 2, 'fsdf', '2023-11-15 01:30:58', 1, '2023-11-15 01:30:59', 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `0696_banner`
--
ALTER TABLE `0696_banner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_brand`
--
ALTER TABLE `0696_brand`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_category`
--
ALTER TABLE `0696_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_contact`
--
ALTER TABLE `0696_contact`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_menu`
--
ALTER TABLE `0696_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_order`
--
ALTER TABLE `0696_order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_orderdetail`
--
ALTER TABLE `0696_orderdetail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_post`
--
ALTER TABLE `0696_post`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_product`
--
ALTER TABLE `0696_product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_topic`
--
ALTER TABLE `0696_topic`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `0696_user`
--
ALTER TABLE `0696_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `0696_banner`
--
ALTER TABLE `0696_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã Slider', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `0696_brand`
--
ALTER TABLE `0696_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Loại', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `0696_category`
--
ALTER TABLE `0696_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Loại', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `0696_contact`
--
ALTER TABLE `0696_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã liên hệ', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `0696_menu`
--
ALTER TABLE `0696_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Menu', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `0696_order`
--
ALTER TABLE `0696_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `0696_orderdetail`
--
ALTER TABLE `0696_orderdetail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã CT Đơn hàng', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `0696_post`
--
ALTER TABLE `0696_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã bài viết', AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `0696_product`
--
ALTER TABLE `0696_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `0696_topic`
--
ALTER TABLE `0696_topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã chủ đề', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `0696_user`
--
ALTER TABLE `0696_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã tài khoản', AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
