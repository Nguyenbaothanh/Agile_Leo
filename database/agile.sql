-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2023 lúc 06:49 PM
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
  `rating` int(5) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan_laptop`
--

INSERT INTO `binh_luan_laptop` (`id`, `id_nguoi_dung`, `laptop_id`, `rating`, `noi_dung`, `ngay_binh_luan`) VALUES
(1, 11, 0, 5, '', '2023-07-27'),
(2, 11, 0, 5, '', '2023-07-27'),
(3, 11, 16, 5, 'd', '2023-07-27'),
(4, 11, 17, 5, 'd', '2023-07-27'),
(5, 11, 17, 5, 'd', '2023-07-27'),
(6, 11, 17, 5, 'd', '2023-07-27'),
(7, 11, 17, 5, 'm', '2023-07-27'),
(8, 11, 17, 5, 'd', '2023-07-27'),
(9, 11, 17, 5, 'dd', '2023-07-27');

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
  `weight` decimal(5,1) NOT NULL,
  `status` enum('Còn hàng','Liên hệ') NOT NULL,
  `price_range` decimal(10,0) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `laptops`
--

INSERT INTO `laptops` (`id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url`) VALUES
(12, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(13, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(14, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(15, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(16, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(17, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(18, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(19, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-9.jpg'),
(20, 'sadasd', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-mua-thu-la-vang-12.jpg'),
(24, '1231l', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 2, 'img/hinh-anh-con-mua-dep-9.jpg'),
(25, '1231l', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 1.0, 'Còn hàng', 0, 'img/hinh-nen-dep-may-tinh-89.jpg'),
(35, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'HP', 'Core i3', '14.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.1, 'Còn hàng', 1000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(36, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.1, 'Còn hàng', 40000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(37, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 1000.0, 'Còn hàng', 6000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(38, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 1000.0, 'Còn hàng', 6000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(39, '6000', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 1000.0, 'Còn hàng', 6000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(40, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 1000.0, 'Còn hàng', 6000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(41, 'Laptop Lenovo IdeaPad 3 14ITL6 82H701G0US', 'Lenovo', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 6000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(42, 'Laptop MSI Modern 15 B7M 099VN | 231VN', 'MSI', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.1, 'Còn hàng', 2000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(43, 'Laptop HP VICTUS 16-e1107AX 7C140PA', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 2.0, 'Còn hàng', 6000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg'),
(44, 'ms', 'Asus', 'Intel Celeron', '10.5 inch', 'Intel HD Graphics', '4GB', '2 TB', 'Windows 10', 0.1, 'Còn hàng', 1000, 'img/6659_hp_victus_16_e1107ax_7c140pa_kjl.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_khuyen_mai`
--

CREATE TABLE `ma_khuyen_mai` (
  `id_ma_khuyen_mai` int(11) NOT NULL,
  `ten_khuyen_mai` varchar(255) NOT NULL,
  `so_tien_toi_thieu` decimal(10,0) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_het_han` date NOT NULL,
  `so_tien_khuyen_mai` decimal(10,0) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `ma_khuyen_mai`
--

INSERT INTO `ma_khuyen_mai` (`id_ma_khuyen_mai`, `ten_khuyen_mai`, `so_tien_toi_thieu`, `ngay_bat_dau`, `ngay_het_han`, `so_tien_khuyen_mai`) VALUES
(1, 'SUMMER102', 50000, '2023-08-01', '2023-08-31', 10000),
(2, 'FALL20', 100000, '2023-09-01', '2023-09-30', 20000),
(4, 'Promo1', 1, '2023-08-01', '2023-08-31', 2),
(5, 'Promo2', 2, '2023-08-15', '2023-09-15', 3),
(6, 'Promo3', 3, '2023-09-01', '2023-09-30', 3),
(7, 'Promo4', 3, '2023-09-15', '2023-10-15', 3),
(8, 'Promo20', 2, '2023-12-01', '2023-12-31', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `promotion_code_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `total_amount`, `promotion_code_id`, `user_name`, `user_address`, `payment_method`, `message`, `order_status`) VALUES
(1, 2, '2023-07-31 22:14:53', 0, 0, 'admin123', '456 Admin Avenue', 'credit_card', '', 'Shipped'),
(3, 2, '2023-07-31 17:48:10', 1, 8, 'admin123', '456 Admin Avenue', 'credit_card', '12', 'Confirmed');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id_promotions` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id_promotions`, `title`, `content`, `image_path`, `start_date`, `end_date`) VALUES
(1, 'He', 'ad', 'img/hinh-nen-4k-bai-bien-nguyen-scaled.jpg', '2023-05-30', '2023-07-30');

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
-- Chỉ mục cho bảng `ma_khuyen_mai`
--
ALTER TABLE `ma_khuyen_mai`
  ADD PRIMARY KEY (`id_ma_khuyen_mai`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id_promotions`);

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
-- AUTO_INCREMENT cho bảng `ma_khuyen_mai`
--
ALTER TABLE `ma_khuyen_mai`
  MODIFY `id_ma_khuyen_mai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id_promotions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

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
