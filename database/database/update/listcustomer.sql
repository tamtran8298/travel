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
-- Cấu trúc bảng cho bảng `listcustomer`
--

CREATE TABLE `listcustomer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `personkind` varchar(255) NOT NULL,
  `clone_room` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `listcustomer`
--

INSERT INTO `listcustomer` (`id`, `name`, `gender`, `date_birth`, `personkind`, `clone_room`, `price`, `created_at`, `updated_at`) VALUES
(23, 'KH1', '1', '2006-02-15', 'Em bé', 'Không', 350000, '2020-06-27', '2020-06-27'),
(24, 'KH2', '1', '2005-09-19', 'Trẻ em', 'Phòng đơn', 6200000, '2020-06-27', '2020-06-27'),
(25, 'asgdjsa', '0', '2017-01-02', 'Người lớn', 'Phòng đơn', 7600000, '2020-06-27', '2020-06-27'),
(26, 'bb', '0', '2006-02-15', 'Trẻ em', 'Không', 5600000, '2020-06-27', '2020-06-27'),
(27, 'asgdjsa', '0', '2003-08-17', 'Người lớn', 'Không', 11499000, '2020-06-27', '2020-06-27'),
(28, 'asgdjsa', '0', '2003-08-17', 'Người lớn', 'Không', 11499000, '2020-06-27', '2020-06-27'),
(29, 'asgdjsa', '0', '2003-08-17', 'Người lớn', 'Không', 11499000, '2020-06-27', '2020-06-27'),
(30, 'test', '0', '2009-06-11', 'Người lớn', 'Không', 7000000, '2020-06-27', '2020-06-27'),
(31, 'test', '0', '2009-06-11', 'Người lớn', 'Không', 7000000, '2020-06-27', '2020-06-27'),
(32, 'test', '0', '2009-06-11', 'Người lớn', 'Không', 7000000, '2020-06-27', '2020-06-27');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `listcustomer`
--
ALTER TABLE `listcustomer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `listcustomer`
--
ALTER TABLE `listcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
