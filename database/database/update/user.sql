-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2020 lúc 07:12 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `abc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `adult` int(10) NOT NULL,
  `children11` int(10) NOT NULL,
  `children` int(10) NOT NULL,
  `small_children` int(10) NOT NULL,
  `guests` int(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `id_tour` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `adult`, `children11`, `children`, `small_children`, `guests`, `note`, `id_tour`, `total`, `updated_at`, `created_at`) VALUES
(111, 'Đỗ Hữu Huy', 'admin@gmail.com', 21321312, 'Đơn Dương,Lâm Đồng', 1, 0, 1, 0, 2, NULL, 10, 6550000, '2020-06-27 22:01:46', '2020-06-27 22:01:46'),
(112, 'Gsh', 'admin@gmail.com', 21321312, 'asdas', 2, 0, 0, 0, 2, 'asd', 10, 11800000, '2020-06-27 22:03:24', '2020-06-27 22:03:24'),
(113, 'Gsh', 'admin@gmail.com', 21321312, 'asdas', 2, 0, 0, 0, 2, 'asd', 10, 13200000, '2020-06-27 22:03:55', '2020-06-27 22:03:55'),
(114, 'adasd', 'admin@gmail.com', 26556, 'Đơn Dương,Lâm Đồng', 1, 0, 0, 0, 1, NULL, 10, 7000000, '2020-06-27 22:05:49', '2020-06-27 22:05:49'),
(115, 'Gsh', 'huyspeedy98@gmail.com', 12313153, 'ádasd', 1, 0, 0, 0, 1, NULL, 15, 11499000, '2020-06-27 22:37:17', '2020-06-27 22:37:17'),
(116, 'Gsh', 'huyspeedy98@gmail.com', 12313153, 'ádasd', 1, 0, 0, 0, 1, NULL, 15, 11499000, '2020-06-27 22:40:11', '2020-06-27 22:40:11'),
(117, 'Gsh', 'huyspeedy98@gmail.com', 12313153, 'ádasd', 1, 0, 0, 0, 1, NULL, 15, 11499000, '2020-06-27 22:41:08', '2020-06-27 22:41:08'),
(118, 'adasd', 'admin@gmail.com', 12313153, 'Đơn Dương,Lâm Đồng', 1, 0, 0, 0, 1, NULL, 10, 7000000, '2020-06-27 22:43:04', '2020-06-27 22:43:04'),
(119, 'adasd', 'admin@gmail.com', 12313153, 'Đơn Dương,Lâm Đồng', 1, 0, 0, 0, 1, NULL, 10, 7000000, '2020-06-27 22:43:23', '2020-06-27 22:43:23'),
(120, 'adasd', 'admin@gmail.com', 12313153, 'Đơn Dương,Lâm Đồng', 1, 0, 0, 0, 1, NULL, 10, 7000000, '2020-06-27 22:45:03', '2020-06-27 22:45:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
