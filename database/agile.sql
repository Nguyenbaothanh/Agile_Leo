-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2023 lúc 07:18 AM
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
(1, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(2, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/bellingrath-gardens-alabama-landscape-scenic-158028.jpeg'),
(3, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(4, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(5, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(6, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(7, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(8, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(9, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(10, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(11, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.00, 'Còn hàng', 2.00, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
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
(25, '1231l', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 1.00, 'Còn hàng', 0.01, 'img/hinh-nen-dep-may-tinh-89.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `sex`, `email`, `address`, `type`) VALUES
(2, 'admin123', 'adminpassword', 'Admin Smith1', 'Male', 'admin@example.com', '456 Admin Avenue', 'admin'),
(6, 'user1233', 'userpassword', 'John Doe1', 'Male', 'ghenho12@gmail.com', '295 Phạm Thế Hiển Phường 3 Quận 8', 'user'),
(8, 'user12322', '123456', 'ggggggggggggggg', 'Male', 'ghenho12@gmail.com2', 'ghenhot12@gmail.com', 'user'),
(9, 'admin12333', 'adminpassword', 'ggggggggggggggg', 'Male', 'ghenho12@gmail.com33', 'ghenhot12@gmail.com', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
