-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2021 lúc 05:35 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `24hstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy A52 5G', 10990000.00, './assets/products/samsung-galaxy-a52-5g.jpg', '2020-03-28 11:08:57'),
(2, 'Samsung', 'Samsung Galaxy S21 5G', 20990000.00, './assets/products/samsung-galaxy-s21-5g.jpg', '2020-03-28 11:08:57'),
(3, 'Samsung', 'Samsung Galaxy A72', 11490000.00, './assets/products/samsung-galaxy-a72.jpg', '2020-03-28 11:08:57'),
(4, 'Samsung', 'Samsung Galaxy S21 Ultra', 30990000.00, './assets/products/samsung-galaxy-s21-ultra.jpg', '2020-03-28 11:08:57'),
(5, 'Samsung', 'Samsung Galaxy Note 20', 32990000.00, './assets/products/sam-sung-note-20-ultra.jpg', '2020-03-28 11:08:57'),
(6, 'Apple', 'iPhone XR 64GB', 13490000.00, './assets/products/iphone-xr.jpg', '2020-03-28 11:08:57'),
(7, 'Apple', 'iPhone 12 Pro 512GB', 38990000.00, './assets/products/iphone-12-pro.jpg', '2020-03-28 11:08:57'),
(8, 'Apple', 'iPhone 12 64GB', 23990000.00, './assets/products/iphone-12-64gb.jpg', '2020-03-28 11:08:57'),
(9, 'Apple', 'iPhone 12 Pro Max 128GB', 33990000.00, './assets/products/iphone-12promax128gb.jpg', '2020-03-28 11:08:57'),
(10, 'Apple', 'iPhone 11 64GB', 17990000.00, './assets/products/iphone-11-64gb.jpg', '2020-03-28 11:08:57'),
(11, 'Xiaomi', 'Xiaomi Mi 10T Pro 5G', 12990000.00, './assets/products/xiaomi-mi-10t-pro.jpg', '2020-03-28 11:08:57'),
(12, 'Xiaomi', 'Xiaomi POCO X3 NFC', 6990000.00, './assets/products/xiaomi-poco-x3-nfc.jpg', '2020-03-28 11:08:57'),
(13, 'Xiaomi', 'Xiaomi Redmi Note 10', 5490000.00, './assets/products/xiaomi-redmi-note-10.jpg', '2020-03-28 11:08:57'),
(14, 'Xiaomi', 'Xiaomi Redmi 9T', 4990000.00, './assets/products/xiaomi-redmi-9t-6gb.jpg', '2020-03-28 11:08:57'),
(15, 'Oppo', 'Oppo Reno4 Pro', 11990000.00, './assets/products/oppo-reno4-pro.jpg', '2020-03-28 11:08:57'),
(16, 'Oppo', 'Oppo A15', 3490000.00, './assets/products/oppo-a15.jpg', '2020-03-28 11:08:57'),
(17, 'Vivo', 'Vivo Y51', 6290000.00, './assets/products/vivo-y51.jpg', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_sale`
--

CREATE TABLE `product_sale` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_price_sale` double(10,2) DEFAULT NULL,
  `item_price_old` double(10,2) NOT NULL,
  `item_image` varchar(1000) NOT NULL,
  `item_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_sale`
--

INSERT INTO `product_sale` (`item_id`, `item_brand`, `item_name`, `item_price_sale`, `item_price_old`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy A52 5G', 10490000.00, 10990000.00, './assets/products/samsung-galaxy-a52-5g.jpg', '2020-03-28 11:08:57'),
(9, 'Apple', 'iPhone 12 Pro Max 128GB', 31690000.00, 33990000.00, './assets/products/iphone-12promax128gb.jpg', '2020-03-28 11:08:57'),
(10, 'Apple', 'iPhone 11 64GB', 16990000.00, 17990000.00, './assets/products/iphone-11-64gb.jpg', '2020-03-28 11:08:57'),
(14, 'Xiaomi', 'Xiaomi Redmi 9T', 4590000.00, 4990000.00, './assets/products/xiaomi-redmi-9t-6gb.jpg', '2020-03-28 11:08:57'),
(15, 'Oppo', 'Oppo Reno4 Pro', 10990000.00, 11990000.00, './assets/products/oppo-reno4-pro.jpg', '2020-03-28 11:08:57'),
(17, 'Vivo', 'Vivo Y51', 5990000.00, 6290000.00, './assets/products/vivo-y51.jpg', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_special`
--

CREATE TABLE `product_special` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(1000) NOT NULL,
  `item_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_special`
--

INSERT INTO `product_special` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(2, 'Samsung', 'Samsung Galaxy S21 5G', 20990000.00, './assets/products/samsung-galaxy-s21-5g.jpg', '2020-03-28 11:08:57'),
(3, 'Samsung', 'Samsung Galaxy A72', 11490000.00, './assets/products/samsung-galaxy-a72.jpg', '2020-03-28 11:08:57'),
(4, 'Samsung', 'Samsung Galaxy S21 Ultra', 30990000.00, './assets/products/samsung-galaxy-s21-ultra.jpg', '2020-03-28 11:08:57'),
(5, 'Samsung', 'Samsung Galaxy Note 20', 32990000.00, './assets/products/sam-sung-note-20-ultra.jpg', '2020-03-28 11:08:57'),
(6, 'Apple', 'iPhone XR 64GB', 13490000.00, './assets/products/iphone-xr.jpg', '2020-03-28 11:08:57'),
(7, 'Apple', 'iPhone 12 Pro 512GB', 38990000.00, './assets/products/iphone-12-pro.jpg', '2020-03-28 11:08:57'),
(8, 'Apple', 'iPhone 12 64GB', 23990000.00, './assets/products/iphone-12-64gb.jpg', '2020-03-28 11:08:57'),
(11, 'Xiaomi', 'Xiaomi Mi 10T Pro 5G', 12990000.00, './assets/products/xiaomi-mi-10t-pro.jpg', '2020-03-28 11:08:57'),
(12, 'Xiaomi', 'Xiaomi POCO X3 NFC', 6990000.00, './assets/products/xiaomi-poco-x3-nfc.jpg', '2020-03-28 11:08:57'),
(13, 'Xiaomi', 'Xiaomi Redmi Note 10', 5490000.00, './assets/products/xiaomi-redmi-note-10.jpg', '2020-03-28 11:08:57'),
(16, 'Oppo', 'Oppo A15', 3490000.00, './assets/products/oppo-a15.jpg', '2020-03-28 11:08:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` int(6) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `password`, `email`, `code`, `phone`, `status`) VALUES
(1, 'Daily', '123', 'admin@gmail.com', 0, '123', ''),
(2, 'Akshay', '123', 'Kashyap', 0, '12', ''),
(3, 'abc', '123', 'abc@gmail.com', 0, '1234', ''),
(27, 'thuy nguyen', '123', 'thuynguyenminh039@gmail.com', 0, '1234', 'verified');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `product_special`
--
ALTER TABLE `product_special`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
