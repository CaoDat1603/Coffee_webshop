-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 08, 2024 lúc 06:44 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cafe_webshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `announcement`
--

CREATE TABLE `announcement` (
  `an_id` int(11) NOT NULL,
  `an_content` text NOT NULL,
  `an_time` datetime NOT NULL,
  `an_title` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categoryproduct`
--

CREATE TABLE `categoryproduct` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categoryproduct`
--

INSERT INTO `categoryproduct` (`ca_id`, `ca_name`) VALUES
(1, 'Caffee'),
(2, 'Trà'),
(3, 'Bánh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `total_payment` decimal(10,3) DEFAULT NULL,
  `order_time` datetime NOT NULL,
  `Status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `total_payment`, `order_time`, `Status`, `user_id`, `order_address`) VALUES
(1, 65.000, '2024-08-20 10:30:00', 'Pending', 10000, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(2, 75.000, '2024-08-20 11:00:00', 'Shipping', 10001, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(3, 30.000, '2024-08-20 12:00:00', 'Delivered', 10002, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(4, 205.000, '2024-08-20 13:00:00', 'Delivered', 10003, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(5, 70.000, '2024-08-20 14:00:00', 'Pending', 10004, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(6, 85.000, '2024-08-20 15:00:00', 'Shipping', 10005, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(7, 150.000, '2024-08-20 16:00:00', 'Delivered', 10006, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(8, 115.000, '2024-08-20 17:00:00', 'Delivered', 10007, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(9, 50.000, '2024-08-20 18:00:00', 'Pending', 10008, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(10, 140.000, '2024-08-20 19:00:00', 'Shipping', 10009, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(11, 125.000, '2024-08-20 20:00:00', 'Delivered', 10010, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(12, 100.000, '2024-08-20 21:00:00', 'Cancelled', 10011, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(13, 155.000, '2024-08-20 22:00:00', 'Pending', 10012, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(14, 110.000, '2024-08-21 08:00:00', 'Shipping', 10013, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(15, 130.000, '2024-08-21 09:00:00', 'Delivered', 10014, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(16, 100.000, '2024-08-21 10:00:00', 'Cancelled', 10015, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(17, 135.000, '2024-08-21 11:00:00', 'Pending', 10016, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(18, 100.000, '2024-08-21 12:00:00', 'Shipping', 10017, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(19, 135.000, '2024-08-21 13:00:00', 'Delivered', 10018, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(20, 130.000, '2024-08-21 14:00:00', 'Cancelled', 10019, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(21, 170.000, '2024-08-21 15:00:00', 'Pending', 10020, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(22, 190.000, '2024-08-21 16:00:00', 'Shipping', 10021, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(23, 195.000, '2024-08-21 17:00:00', 'Delivered', 10022, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(24, 135.000, '2024-08-21 18:00:00', 'Cancelled', 10023, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(25, 165.000, '2024-08-21 19:00:00', 'Pending', 10024, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(26, 170.000, '2024-08-21 20:00:00', 'Shipping', 10025, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(27, 190.000, '2024-08-21 21:00:00', 'Delivered', 10026, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(28, 195.000, '2024-08-21 22:00:00', 'Cancelled', 10027, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(29, 185.000, '2024-08-22 08:00:00', 'Pending', 10028, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(30, 185.000, '2024-08-22 09:00:00', 'Shipping', 10029, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(31, 80.000, '2024-08-22 10:00:00', 'Delivered', 10030, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(32, 165.000, '2024-08-22 11:00:00', 'Cancelled', 10031, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(33, 195.000, '2024-08-22 12:00:00', 'Pending', 10032, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(34, 250.000, '2024-08-22 13:00:00', 'Shipping', 10033, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(35, 160.000, '2024-08-22 14:00:00', 'Delivered', 10034, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(36, 185.000, '2024-08-22 15:00:00', 'Cancelled', 10035, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(37, 130.000, '2024-08-22 16:00:00', 'Pending', 10036, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(38, 190.000, '2024-08-22 17:00:00', 'Shipping', 10037, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(39, 220.000, '2024-08-22 18:00:00', 'Delivered', 10038, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(40, 190.000, '2024-08-22 19:00:00', 'Cancelled', 10039, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(41, 185.000, '2024-08-22 20:00:00', 'Pending', 10040, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(42, 195.000, '2024-08-22 21:00:00', 'Shipping', 10041, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(43, 170.000, '2024-08-22 22:00:00', 'Delivered', 10042, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(44, 170.000, '2024-08-23 08:00:00', 'Cancelled', 10043, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(45, 205.000, '2024-08-23 09:00:00', 'Pending', 10044, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(46, 170.000, '2024-08-23 10:00:00', 'Shipping', 10045, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(47, 155.000, '2024-08-23 11:00:00', 'Delivered', 10046, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(48, 165.000, '2024-08-23 12:00:00', 'Cancelled', 10047, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(49, 145.000, '2024-08-23 13:00:00', 'Pending', 10048, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(50, 165.000, '2024-08-23 14:00:00', 'Shipping', 10049, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(104, 75.000, '2024-09-05 17:13:45', 'Pending', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(105, 50.000, '2024-09-05 17:20:20', 'Shipping', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(106, 75.000, '2024-09-05 17:23:00', 'Delivered', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(107, 125.000, '2024-09-05 17:26:02', 'Cancelled', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(108, 125.000, '2024-09-05 17:50:56', 'Pending', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(110, 125.000, '2024-09-06 08:58:42', 'Pending', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(111, 30.000, '2024-09-07 15:24:45', 'Pending', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(114, 100.000, '2024-09-07 15:28:50', 'Pending', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(115, 100.000, '2024-09-07 15:28:50', 'Pending', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(116, 165.000, '2024-09-07 15:32:38', 'Pending', 10066, '\r\n70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12, Hồ Chí Minh'),
(119, 100.000, '2024-09-08 09:21:29', 'Pending', 10064, 'Hồ Chí Minh, Việt Nam'),
(120, 30.000, '2024-09-08 09:32:04', 'Pending', 10064, 'Hồ Chí Minh, Việt Nam'),
(121, 170.000, '2024-09-08 10:26:04', 'Pending', 10066, 'Hồ Chí Minh, Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `product_id`, `quantity`) VALUES
(1, 2, 2),
(1, 3, 1),
(2, 17, 1),
(3, 15, 1),
(4, 8, 2),
(4, 10, 1),
(5, 12, 1),
(6, 21, 1),
(7, 19, 3),
(8, 5, 1),
(8, 11, 1),
(9, 9, 1),
(10, 12, 1),
(10, 13, 1),
(11, 17, 1),
(11, 20, 1),
(12, 20, 2),
(13, 7, 1),
(13, 21, 1),
(14, 10, 1),
(14, 16, 1),
(15, 16, 1),
(15, 21, 1),
(16, 6, 1),
(16, 9, 1),
(17, 8, 1),
(17, 10, 1),
(18, 19, 1),
(18, 20, 1),
(19, 15, 2),
(19, 17, 1),
(20, 10, 1),
(20, 11, 1),
(21, 4, 1),
(21, 5, 2),
(22, 12, 1),
(22, 13, 1),
(22, 15, 1),
(23, 13, 1),
(23, 16, 1),
(23, 17, 1),
(24, 19, 1),
(24, 21, 1),
(25, 5, 1),
(25, 9, 1),
(25, 11, 1),
(26, 12, 1),
(26, 14, 1),
(26, 15, 1),
(27, 6, 1),
(27, 7, 1),
(27, 8, 1),
(28, 14, 1),
(28, 17, 1),
(28, 20, 1),
(29, 8, 1),
(29, 11, 1),
(29, 19, 1),
(30, 10, 1),
(30, 13, 1),
(30, 20, 1),
(31, 2, 1),
(31, 4, 1),
(31, 15, 1),
(32, 7, 1),
(32, 9, 1),
(32, 16, 1),
(33, 12, 1),
(33, 16, 1),
(33, 18, 1),
(34, 5, 2),
(34, 12, 1),
(34, 18, 1),
(35, 2, 2),
(35, 9, 1),
(35, 14, 1),
(36, 11, 1),
(36, 16, 1),
(36, 17, 1),
(37, 4, 1),
(37, 5, 1),
(37, 20, 1),
(38, 7, 1),
(38, 13, 1),
(38, 19, 1),
(39, 8, 1),
(39, 14, 1),
(39, 18, 1),
(40, 6, 1),
(40, 8, 1),
(40, 13, 1),
(41, 6, 1),
(41, 11, 1),
(41, 14, 1),
(42, 15, 1),
(42, 18, 1),
(42, 21, 1),
(43, 4, 1),
(43, 7, 1),
(43, 13, 1),
(44, 9, 1),
(44, 12, 1),
(44, 20, 1),
(45, 7, 1),
(45, 10, 1),
(45, 14, 1),
(46, 11, 1),
(46, 15, 1),
(46, 17, 1),
(47, 2, 1),
(47, 10, 1),
(47, 12, 1),
(48, 7, 1),
(48, 9, 1),
(48, 16, 1),
(49, 3, 1),
(49, 5, 1),
(49, 14, 1),
(50, 11, 1),
(50, 13, 1),
(50, 15, 1),
(104, 2, 1),
(104, 3, 1),
(104, 4, 1),
(105, 5, 1),
(106, 3, 1),
(106, 5, 1),
(107, 3, 1),
(107, 5, 2),
(108, 3, 1),
(108, 5, 2),
(110, 3, 1),
(110, 5, 2),
(111, 15, 1),
(114, 7, 1),
(114, 15, 1),
(115, 7, 1),
(115, 15, 1),
(116, 7, 1),
(116, 11, 1),
(116, 15, 1),
(119, 5, 2),
(120, 4, 1),
(121, 21, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` enum('active','hidden') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `ca_id`, `product_name`, `price`, `img`, `status`) VALUES
(2, 1, 'Caffee Đen Đá', 20.000, 'cfden.png', 'active'),
(3, 1, 'Caffee Socola-Trắng', 25.000, 'cf-whiteSocola.png', 'active'),
(4, 1, 'Cappuccino', 30.000, 'Cappuccino.png', 'active'),
(5, 1, 'Cold Brew Cam Úc', 50.000, 'Cold Brew Cam Úc.png', 'active'),
(6, 1, 'Cold Brew Hạnh Nhân', 50.000, 'Cold Brew Sữa Hạnh Nhân.png', 'active'),
(7, 1, 'Cold Brew Dâu Tây', 70.000, 'Cold Brew Dâu Tây.png', 'active'),
(8, 1, 'Cold Brew Macchiato', 70.000, 'Cold Brew Macchiato.png', 'active'),
(9, 1, 'Coffee Jelly', 50.000, 'Coffee Jelly.png', 'active'),
(10, 1, 'Dalgona Coffee', 65.000, 'Dalgona Coffee.png', 'active'),
(11, 1, 'Boozy Whipped Coffee', 65.000, 'Boozy Whipped Coffee.png', 'active'),
(12, 2, 'Matcha Espresso', 70.000, 'Matcha Espresso.png', 'active'),
(13, 2, 'Trà Đá Mận (Maesil)', 70.000, 'Trà Đá Mận (Maesil).png', 'active'),
(14, 2, 'Trà Hoa Oải Hương', 70.000, 'Trà Hoa Oải Hương.png', 'active'),
(15, 2, 'Trà Chanh Giây', 30.000, 'Trà Chanh Giây.png', 'active'),
(16, 2, 'Trà Earl Grey', 45.000, 'Trà Earl Grey.png', 'active'),
(17, 3, 'Chocolate Mousse', 75.000, 'Chocolate Mousse.png', 'active'),
(18, 3, 'Croissant Kem Dâu', 80.000, 'Croissant Kem Dâu.png', 'active'),
(19, 3, 'Matcha Tiramisu', 50.000, 'Matcha Tiramisu.png', 'active'),
(20, 3, 'Rose Panna Cotta', 50.000, 'Rose Panna Cotta.png', 'active'),
(21, 3, 'Vanilla Dream Crepes', 85.000, 'Vanilla Dream Crepes.png', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `pro_id` int(11) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_content` text NOT NULL,
  `pro_create_time` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `pro_code` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `phone_number`, `level`) VALUES
(10000, 'Lương Quốc Trung', 'Password1', '0123456781', 1),
(10001, 'Nguyễn Hồng Sơn', 'Password2', '0123456782', 1),
(10002, 'Trần Thu Hương', 'Password3', '0123456783', 1),
(10003, 'Phạm Quốc Khánh', 'Password4', '0123456784', 1),
(10004, 'Lê Hoàng Minh', 'Password5', '0123456785', 1),
(10005, 'Ngô Anh Dũng', 'Password6', '0123456786', 1),
(10006, 'Đinh Thị Lan', 'Password7', '0123456787', 1),
(10007, 'Trương Vĩnh Phúc', 'Password8', '0123456788', 1),
(10008, 'Hoàng Thị Bích', 'Password9', '0123456789', 1),
(10009, 'Vũ Đình Trung', 'Password10', '0123456790', 1),
(10010, 'Nguyễn Thanh Tùng', 'Password11', '0123456791', 1),
(10011, 'Bùi Minh Thư', 'Password12', '0123456792', 1),
(10012, 'Phạm Anh Tuấn', 'Password13', '0123456793', 1),
(10013, 'Lê Quốc Đạt', 'Password14', '0123456794', 1),
(10014, 'Nguyễn Thị Kim', 'Password15', '0123456795', 1),
(10015, 'Trần Văn Hà', 'Password16', '0123456796', 1),
(10016, 'Hoàng Thị Hồng', 'Password17', '0123456797', 1),
(10017, 'Ngô Đức Mạnh', 'Password18', '0123456798', 1),
(10018, 'Lương Thị Hà', 'Password19', '0123456799', 1),
(10019, 'Trịnh Văn Long', 'Password20', '0123456800', 1),
(10020, 'Nguyễn Phương Linh', 'Password21', '0123456801', 1),
(10021, 'Bùi Quang Huy', 'Password22', '0123456802', 1),
(10022, 'Phạm Minh Hòa', 'Password23', '0123456803', 1),
(10023, 'Lê Thị Tuyết', 'Password24', '0123456804', 1),
(10024, 'Nguyễn Văn Khánh', 'Password25', '0123456805', 1),
(10025, 'Trần Thị Nga', 'Password26', '0123456806', 1),
(10026, 'Phan Minh Khoa', 'Password27', '0123456807', 1),
(10027, 'Vũ Anh Quân', 'Password28', '0123456808', 1),
(10028, 'Nguyễn Thị Lan', 'Password29', '0123456809', 1),
(10029, 'Hoàng Văn Tùng', 'Password30', '0123456810', 1),
(10030, 'Phạm Thu Trang', 'Password31', '0123456811', 1),
(10031, 'Trần Quốc Toàn', 'Password32', '0123456812', 1),
(10032, 'Nguyễn Thanh Huyền', 'Password33', '0123456813', 1),
(10033, 'Bùi Văn Sơn', 'Password34', '0123456814', 1),
(10034, 'Phạm Thị Hồng', 'Password35', '0123456815', 1),
(10035, 'Lê Quang Dũng', 'Password36', '0123456816', 1),
(10036, 'Nguyễn Đình Phúc', 'Password37', '0123456817', 1),
(10037, 'Trần Văn Quý', 'Password38', '0123456818', 1),
(10038, 'Ngô Thị Hà', 'Password39', '0123456819', 1),
(10039, 'Phạm Thanh Hương', 'Password40', '0123456820', 1),
(10040, 'Lê Văn Thành', 'Password41', '0123456821', 1),
(10041, 'Nguyễn Quốc Anh', 'Password42', '0123456822', 1),
(10042, 'Trần Thị Bích', 'Password43', '0123456823', 1),
(10043, 'Nguyễn Hữu Thắng', 'Password44', '0123456824', 1),
(10044, 'Hoa', 'Hoa123456', '0123456825', 1),
(10045, 'Phạm Minh Tuấn', 'Password46', '0123456826', 1),
(10046, 'Lê Anh Dũng', 'Password47', '0123456827', 1),
(10047, 'Nguyễn Văn Hùng', 'Password48', '0123456828', 1),
(10048, 'Trần Minh Tâm', 'Password49', '0123456829', 1),
(10049, 'Phạm Thị Quỳnh', 'Password50', '0123456830', 1),
(10058, 'Nguyễn Thị Thu Vân', 'Van123456', '0999999999', 1),
(10064, 'Trân Văn Dự', 'Du12345678', '1010101010', 1),
(10065, 'Quoc Trung', 'Quoc1234567890', '1212121212', 1),
(10066, 'Quốc Trung', 'Trung123456', '1313131313', 0),
(10067, 'Cao Tiến Đạt', 'Dat12345', '0354464053', 0),
(10068, 'Trân Văn Dự', 'Du123456', '7777777777', 1),
(10069, 'Trung Đạt Dự', 'Home123456', '1111111111', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userannouncement`
--

CREATE TABLE `userannouncement` (
  `user_id` int(11) NOT NULL,
  `an_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`an_id`);

--
-- Chỉ mục cho bảng `categoryproduct`
--
ALTER TABLE `categoryproduct`
  ADD PRIMARY KEY (`ca_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_ibfk_2` (`user_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `ca_id` (`ca_id`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`pro_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `userannouncement`
--
ALTER TABLE `userannouncement`
  ADD PRIMARY KEY (`user_id`,`an_id`),
  ADD KEY `an_id` (`an_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `announcement`
--
ALTER TABLE `announcement`
  MODIFY `an_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categoryproduct`
--
ALTER TABLE `categoryproduct`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10070;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ca_id`) REFERENCES `categoryproduct` (`ca_id`);

--
-- Các ràng buộc cho bảng `userannouncement`
--
ALTER TABLE `userannouncement`
  ADD CONSTRAINT `userannouncement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `userannouncement_ibfk_2` FOREIGN KEY (`an_id`) REFERENCES `announcement` (`an_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
