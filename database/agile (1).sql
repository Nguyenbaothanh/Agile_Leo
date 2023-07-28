-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 27, 2023 lúc 12:55 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `agile`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan_laptop`
--

CREATE TABLE `binh_luan_laptop` (
  `id` int(11) NOT NULL,
  `id_nguoi_dung` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `rating` enum('5','4','3','2','1') NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan_laptop`
--

INSERT INTO `binh_luan_laptop` (`id`, `id_nguoi_dung`, `laptop_id`, `ten_nguoi_dung`, `rating`, `noi_dung`, `ngay_binh_luan`) VALUES
(1, 11, 0, '', '1', '', '2023-07-27'),
(2, 11, 0, '', '1', '', '2023-07-27'),
(3, 11, 16, '', '1', 'd', '2023-07-27'),
(4, 11, 17, '', '1', 'd', '2023-07-27'),
(5, 11, 17, '', '1', 'd', '2023-07-27'),
(6, 11, 17, '', '1', 'd', '2023-07-27'),
(7, 11, 17, '', '1', 'm', '2023-07-27'),
(8, 11, 17, '', '1', 'd', '2023-07-27'),
(9, 11, 17, '', '1', 'dd', '2023-07-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `laptop_name` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `screen_size` varchar(20) NOT NULL,
  `graphics_card` varchar(100) NOT NULL,
  `ram` varchar(10) NOT NULL,
  `storage_capacity` varchar(50) NOT NULL,
  `operating_system` varchar(50) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `status` enum('Còn hàng','Liên hệ') NOT NULL,
  `price_range` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `laptops`
--

INSERT INTO `laptops` (`id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url`) VALUES
(12, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(13, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(14, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(15, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(16, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(17, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(18, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(19, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(20, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-12.jpg'),
(24, '1231l', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-con-mua-dep-9.jpg'),
(25, '1231l', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 1.00, 'Còn hàng', 0.01, 'img/hinh-nen-dep-may-tinh-89.jpg'),
(35, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'HP', 'Core i3', '14.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.10, 'Còn hàng', 1000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(36, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.10, 'Còn hàng', 40000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(37, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 999.99, 'Còn hàng', 6000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(38, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 999.99, 'Còn hàng', 6000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(39, '6000', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 999.99, 'Còn hàng', 6000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(40, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 999.99, 'Còn hàng', 6000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(41, 'Laptop Lenovo IdeaPad 3 14ITL6 82H701G0US', 'Lenovo', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 6000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(42, 'Laptop MSI Modern 15 B7M 099VN | 231VN', 'MSI', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.10, 'Còn hàng', 2000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(43, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 6000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(44, 'ms', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.10, 'Còn hàng', 1000.00, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rating_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `rating_value`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `user_id`, `laptop_id`, `quantity`, `timestamp`) VALUES
(4, 2, 13, 1, '2023-07-27 08:27:24'),
(5, 2, 12, 1, '2023-07-27 08:46:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `sex`, `email`, `address`, `type`) VALUES
(2, 'admin123', 'adminpassword', 'Admin Smith1', 'Male', 'admin@example.com', '456 Admin Avenue', 'admin'),
(11, 'user123', 'userpassword', 'ggggggggggggggg', 'Male', 'ghenho1222@gmail.com2', 'ghenhot12@gmail.com', 'user'),
(12, 'user123222', 'userpassword', 'ggggggggggggggg', 'Male', 'ghenho12@gmail.com222', '295 Phạm Thế Hiển Phường 3 Quận 8', 'user'),
(13, 'user12333', 'userpassword', 'ggggggggggggggg', 'Male', 'ghenho12@gmail.com', 'ghenhot12@gmail.com', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan_laptop`
--
ALTER TABLE `binh_luan_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_laptop_id` (`laptop_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan_laptop`
--
ALTER TABLE `binh_luan_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `fk_laptop_id` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
