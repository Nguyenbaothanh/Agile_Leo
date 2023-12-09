-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2023 lúc 02:07 PM
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
  `weight` decimal(5,1) NOT NULL,
  `status` enum('Còn hàng','Liên hệ') NOT NULL,
  `price_range` decimal(10,0) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `time_click_laptop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `laptops`
--

INSERT INTO `laptops` (`id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url`, `time_click_laptop`) VALUES
(74, 'Laptop Asus Vivobook 15 OLED A1505VA-L1201W (Intel Core i9-13900H | 16GB | 512GB | Intel Iris Xe | 1', 'Asus', 'Core i9', '15.6 inch', 'Iris Xe Graphics', '16GB', '512GB SSD', 'Windows 11', 1.7, 'Còn hàng', 21490000, 'img/44640_a1505va_l1201w_1.png', '0000-00-00 00:00:00'),
(75, 'Laptop Lenovo Yoga Slim 6 14IRH8 OLED 83E00008VN (Intel Core i7-13700H | 512GB | 16 GB | Intel Iris ', 'Lenovo', 'Core i7', '14.0 inch', 'Iris Xe Graphics', '16GB', '512GB SSD', 'Windows 11', 1.4, 'Còn hàng', 23990000, 'img/46445_laptop_lenovo_yoga_slim_6_14irh8_83e00008vn__5_.jpg', '0000-00-00 00:00:00'),
(76, 'Laptop Lenovo ThinkBook 14 G4 IAP (Core i7-1255U | 8GB | 512GB | Intel Iris Xe | 14 inch FHD | Win11', 'Lenovo', 'Core i7', '14.0 inch', 'Intel HD Graphics', '8GB', '512GB SSD', 'Windows 11', 1.4, 'Còn hàng', 17990000, 'img/45205_laptop_lenovo_thinkbook_14_g4_iap_21dh00b8vn_anphatpc_34.jpg', '0000-00-00 00:00:00'),
(77, 'Laptop Lenovo Ideapad Gaming 3 15ACH6 82K2027QVN (AMD Ryzen 5 5500H | 8GB | 512GB | RTX 2050 | 15.6 ', 'Lenovo', 'Ryzen 5', '15.6 inch', 'RTX 2050 6GB', '8GB', '512GB SSD', 'Windows 11', 2.3, 'Còn hàng', 14990000, 'img/46501_laptop_lenovo_ideapad_gaming_3_15ach6_82k2027qvn__3_.jpg', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
