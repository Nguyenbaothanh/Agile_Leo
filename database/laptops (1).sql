-- Tạo cơ sở dữ liệu
CREATE DATABASE laptops;
GO

-- Chọn cơ sở dữ liệu
USE laptops;
GO

-- Tạo bảng
CREATE TABLE laptops (
    id INT PRIMARY KEY IDENTITY(1,1), -- Tự động tăng
    laptop_name NVARCHAR(100) NOT NULL,
    brand NVARCHAR(50) NOT NULL,
    processor NVARCHAR(50) NOT NULL,
    screen_size NVARCHAR(20) NOT NULL,
    graphics_card NVARCHAR(100) NOT NULL,
    ram NVARCHAR(10) NOT NULL,
    storage_capacity NVARCHAR(50) NOT NULL,
    operating_system NVARCHAR(50) NOT NULL,
    weight DECIMAL(5,1) NOT NULL,
    status NVARCHAR(50) NOT NULL, -- SQL Server không hỗ trợ kiểu enum, sử dụng NVARCHAR thay thế
    price_range DECIMAL(10,0) NOT NULL,
    image_url NVARCHAR(255) NOT NULL,
    time_click_laptop DATETIME NOT NULL
);
GO

-- Chèn dữ liệu vào bảng
INSERT INTO laptops (laptop_name, brand, processor, screen_size, graphics_card, ram, storage_capacity, operating_system, weight, status, price_range, image_url, time_click_laptop) VALUES
('Laptop Asus Vivobook 15 OLED A1505VA-L1201W (Intel Core i9-13900H | 16GB | 512GB | Intel Iris Xe | 1', 'Asus', 'Core i9', '15.6 inch', 'Iris Xe Graphics', '16GB', '512GB SSD', 'Windows 11', 1.7, 'Còn hàng', 21490000, 'img/44640_a1505va_l1201w_1.png', '1900-01-01 00:00:00'),
('Laptop Lenovo Yoga Slim 6 14IRH8 OLED 83E00008VN (Intel Core i7-13700H | 512GB | 16 GB | Intel Iris ', 'Lenovo', 'Core i7', '14.0 inch', 'Iris Xe Graphics', '16GB', '512GB SSD', 'Windows 11', 1.4, 'Còn hàng', 23990000, 'img/46445_laptop_lenovo_yoga_slim_6_14irh8_83e00008vn__5_.jpg', '1900-01-01 00:00:00'),
('Laptop Lenovo ThinkBook 14 G4 IAP (Core i7-1255U | 8GB | 512GB | Intel Iris Xe | 14 inch FHD | Win11', 'Lenovo', 'Core i7', '14.0 inch', 'Intel HD Graphics', '8GB', '512GB SSD', 'Windows 11', 1.4, 'Còn hàng', 17990000, 'img/45205_laptop_lenovo_thinkbook_14_g4_iap_21dh00b8vn_anphatpc_34.jpg', '1900-01-01 00:00:00');
GO

