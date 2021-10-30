-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2021 lúc 06:34 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gardenut`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `id_anh` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`id_anh`, `id_sanpham`, `link`) VALUES
(1, 1, './assets/image/sanpham/cay-phat-tai-1.jpg'),
(2, 1, './assets/image/sanpham/cay-phat-tai-2.jpg'),
(3, 1, './assets/image/sanpham/cay-phat-tai-3.jpg'),
(4, 2, './assets/image/sanpham/cay-trau-ba-leo-cot-1.jpg'),
(5, 2, './assets/image/sanpham/cay-trau-ba-leo-cot-2.jpg'),
(6, 2, './assets/image/sanpham/cay-trau-ba-leo-cot-3.jpg'),
(7, 3, './assets/image/sanpham/cay-kim-tien-1.jpg'),
(8, 3, './assets/image/sanpham/cay-kim-tien-2.jpg'),
(9, 3, './assets/image/sanpham/cay-kim-tien-3.jpg'),
(10, 11, './assets/image/sanpham/cay-bach-ma-hoang-tu-1.jpg'),
(11, 11, './assets/image/sanpham/cay-bach-ma-hoang-tu-2.jpg'),
(12, 11, './assets/image/sanpham/cay-bach-ma-hoang-tu-3.jpg'),
(13, 5, './assets/image/sanpham/cay-bang-singapore-1.jpg'),
(14, 5, './assets/image/sanpham/cay-bang-singapore-2.jpg'),
(15, 5, './assets/image/sanpham/cay-bang-singapore-3.jpg'),
(16, 8, './assets/image/sanpham/cay-binh-an-1.jpg'),
(17, 8, './assets/image/sanpham/cay-binh-an-2.jpg'),
(18, 8, './assets/image/sanpham/cay-binh-an-3.jpg'),
(19, 4, './assets/image/sanpham/cay-cau-canh-1.jpg'),
(20, 4, './assets/image/sanpham/cay-cau-canh-2.jpg'),
(21, 4, './assets/image/sanpham/cay-cau-canh-3.jpg'),
(22, 9, './assets/image/sanpham/cay-day-nhen-1.jpg'),
(23, 9, './assets/image/sanpham/cay-day-nhen-2.jpg'),
(24, 9, './assets/image/sanpham/cay-day-nhen-3.jpg'),
(25, 10, './assets/image/sanpham/cay-lan-ho-diep-1.jpg'),
(26, 10, './assets/image/sanpham/cay-lan-ho-diep-3.jpg'),
(27, 10, './assets/image/sanpham/cay-lan-ho-diep-2.jpg'),
(28, 12, './assets/image/sanpham/truc-phu-quy-1.jpg'),
(29, 12, './assets/image/sanpham/truc-phu-quy-2.jpg'),
(30, 12, './assets/image/sanpham/truc-phu-quy-3.jpg'),
(31, 13, './assets/image/sanpham/xuong-rong-khe-vang-bui-1.jpg'),
(32, 13, './assets/image/sanpham/xuong-rong-khe-vang-bui-2.jpg'),
(33, 14, './assets/image/sanpham/xuong_rong_bat_tien_1.jpg'),
(34, 14, './assets/image/sanpham/xuong_rong_bat_tien_2.jpg'),
(35, 15, './assets/image/sanpham/xuong-rong-astro-1.jpg'),
(36, 15, './assets/image/sanpham/xuong-rong-astro-2.jpg'),
(37, 16, './assets/image/sanpham/xuong-rong-thanh-son.jpg'),
(38, 17, './assets/image/sanpham/xuong-rong-khe-xanh-2.jpg'),
(39, 17, './assets/image/sanpham/xuong-rong-khe-xanh-1.jpg'),
(40, 18, './assets/image/sanpham/sen-da-hoa-hong-xanh-1.jpg'),
(41, 18, './assets/image/sanpham/sen-da-hoa-hong-xanh-2.jpg'),
(42, 19, './assets/image/sanpham/sen-da-giva-1.jpg'),
(43, 19, './assets/image/sanpham/sen-da-giva-2.jpg'),
(44, 20, './assets/image/sanpham/sen-da-nhung-long-1.jpg'),
(45, 20, './assets/image/sanpham/sen-da-nhung-long-2.jpg'),
(46, 21, './assets/image/sanpham/sen-da-thai-1.jpg'),
(47, 21, './assets/image/sanpham/sen-da-thai-2.jpg'),
(48, 22, './assets/image/sanpham/sen-da-ngoc-1.jpg'),
(49, 22, './assets/image/sanpham/sen-da-ngoc-2.jpg'),
(50, 23, './assets/image/sanpham/ben-em-1.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`id_anh`,`id_sanpham`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id_anh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
