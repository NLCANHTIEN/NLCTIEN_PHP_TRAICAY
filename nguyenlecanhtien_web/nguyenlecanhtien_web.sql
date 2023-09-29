-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2023 lúc 03:38 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `parent`, `status`, `trash`, `created_at`) VALUES
(93, 'Trái cây nội địa', 0, 1, 0, '2022-12-12 00:02:58'),
(94, 'Trái cây nhập khẩu', 0, 1, 0, '2022-12-12 00:03:17'),
(97, 'Tất cả sản phẩm', 0, 1, 0, '2022-12-14 17:28:27'),
(98, 'Táo ', 94, 1, 0, '2022-12-14 17:48:38'),
(99, 'Dâu tây', 94, 1, 0, '2022-12-14 18:11:48'),
(100, 'Chuối', 93, 1, 0, '2022-12-14 18:22:18'),
(101, 'Dưa hấu', 93, 1, 0, '2022-12-26 13:51:05'),
(102, 'Mận', 93, 1, 0, '2022-12-26 14:41:23'),
(109, 'Vải', 93, 1, 0, '2023-01-05 23:22:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(10) DEFAULT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `order_date` datetime DEFAULT current_timestamp(),
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `delivered` tinyint(4) DEFAULT 0,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `customer_id`, `order_date`, `fullname`, `address`, `email`, `phone`, `delivered`, `trash`, `status`) VALUES
(63, NULL, 0, '2022-12-12 15:42:54', 'hung', 'efd', '123', '123456', 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trash` tinyint(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `product_detail` text NOT NULL,
  `sale` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `image`, `price`, `product_detail`, `sale`, `created_at`, `trash`, `status`) VALUES
(122, 'Táo', 98, 'tao.jpg', 30000, 'táo', 0, '2022-12-11 21:41:34', 0, 1),
(123, 'Chuối ', 100, 'chuoi.jpg', 20000, 'chuối xanh', 0, '2022-12-11 21:48:49', 0, 1),
(124, 'Cam', 0, 'cam.jpg', 10000, 'Cam vàng', 0, '2022-12-11 21:49:31', 0, 1),
(125, 'Nho xanh', 0, 'nho.jpg', 25000, 'nho xanh', 0, '2022-12-12 12:52:25', 0, 1),
(126, 'Dưa hấu', 101, 'duahau.jpg', 20000, 'dưa hấu ', 1, '2022-12-12 12:53:32', 0, 1),
(127, 'Thanh long', 0, 'thanhlong.jpg', 300000, 'thanh long', 1, '2022-12-12 13:10:10', 0, 1),
(128, 'Vải', 0, 'vai.jpg', 50000, 'vải', 1, '2022-12-12 13:10:45', 0, 1),
(129, 'Dâu tây', 99, 'dautay.jpg', 350000, 'Dâu tây', 1, '2022-12-12 13:48:47', 0, 1),
(141, 'Đào hồng', 103, 'dao.jpg', 450000, '<p>dao</p>', 0, '2023-01-04 13:49:15', 0, 1),
(142, 'Dưa hấu ruột vàng', 101, 'duahauvang.jpg', 40000, '<p>Dưa hấu ruột vàng</p>', 0, '2023-01-05 16:33:20', 0, 1),
(143, 'Dưa hấu không hạt', 101, 'duahaukhat.jpg', 30000, '<p>Dưa hấu không hạt</p>', 0, '2023-01-05 16:32:26', 0, 1),
(144, 'Táo Red Delicious', 98, 'taored.jpg', 150000, '<p>Táo Red Delicious</p>', 0, '2023-01-05 16:44:39', 0, 1),
(145, 'Táo Golden Delicious', 98, 'taovang.jpg', 184000, '<p><strong>Táo Golden Delicious</strong></p>', 0, '2023-01-05 16:48:25', 0, 1),
(146, 'Táo Gala', 98, 'taogala.jpg', 89000, '<p>Táo Gala</p>', 0, '2023-01-05 16:50:55', 0, 1),
(147, 'Táo Granny Smith', 98, 'taoxanh.jpg', 109000, '<p>Táo Granny Smith</p>', 0, '2023-01-05 16:54:34', 0, 1),
(148, 'Táo Ambrosia', 98, 'taoa.jpg', 100000, '<p>Táo Ambrosia</p>', 1, '2023-01-05 16:56:26', 0, 1),
(149, ' Dâu anh đào Nhật', 99, 'dauanhdaot.jpg', 5000000, '<p>Quả dâu anh đào Nhật</p>', 0, '2023-01-05 17:04:22', 0, 1),
(150, 'Dâu tây  Hàn Quốc', 99, 'dauhan.jpg', 600000, '<p>dâu tây của Hàn Quốc</p>', 0, '2023-01-05 17:04:35', 0, 1),
(151, 'Dâu tây  Mỹ', 99, 'daumy.jpg', 600000, '<p><strong>dâu tây của Mỹ</strong></p>', 0, '2023-01-05 17:05:56', 0, 1),
(152, ' Dâu tây New Zealand', 99, 'daunew.jpg', 200000, '<p>Dâu tây New Zealand</p>', 0, '2023-01-05 17:07:16', 0, 1),
(153, 'Chuối tây', 100, 'chuoitay.jpg', 50000, '<p>Chuối tây</p>', 0, '2023-01-05 17:11:41', 0, 1),
(154, 'Chuối cau', 100, 'chuoicau.jpg', 60000, '<p>Chuối cau</p>', 1, '2023-01-05 17:13:36', 0, 1),
(155, 'Chuối sứ', 100, 'Chuoisu.jpg', 40000, '<p>Chuối sứ</p>', 0, '2023-01-05 17:15:56', 0, 1),
(156, 'Chuối già', 100, 'chuoigia.jpg', 30000, '<p>Chuối già</p>', 1, '2023-01-05 17:18:12', 0, 1),
(157, 'Vải thiều Thanh Hà', 109, 'Vaithieu.jpg', 65000, '<p>vải thiều Thanh Hà</p>', 0, '2023-01-05 17:27:08', 0, 1),
(158, 'Mận an phước', 102, 'mana.jpg', 20000, '<p>MẬN AN PHƯỚC</p>', 0, '2023-01-05 17:29:22', 0, 1),
(159, 'Vải thiều Lục Ngạn', 109, 'vaith.png', 60000, '<p>vải thiều Lục Ngạn</p>', 0, '2023-01-05 17:31:44', 0, 1),
(160, 'Mận trắng', 102, 'mantrang.jpg', 160000, '<p>MẬN TRẮNG</p>', 0, '2023-01-05 17:33:37', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(25) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `trash` tinyint(1) DEFAULT 0,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `name`, `email`, `phone`, `address`, `created_at`, `status`, `trash`, `role`) VALUES
(29, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hung', '123@gmail.com', '789456', '12354', '2023-01-06 11:17:25', 1, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
