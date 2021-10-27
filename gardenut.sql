-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 07:49 AM
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
(9, 3, './assets/image/sanpham/cay-kim-tien-3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `id_loaisp` int(11) NOT NULL,
  `tenloai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`id_loaisp`, `tenloai`) VALUES
(1, 'home'),
(2, 'office');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `id_loaisp` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `ghichu` varchar(250) NOT NULL,
  `gia` int(11) NOT NULL,
  `giagiam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_loaisp`, `tensp`, `ghichu`, `gia`, `giagiam`) VALUES
(1, 2, 'Cây Phát Tài', 'Cây Phát Tài được tìm thấy ở Zambia, Tanzania và Tây Phi. Loại cây này có lá màu xanh sẫm, tán lá xòe rộng và có đường gân vàng nổi bật, thường được trồng trong nhà giúp thanh lọc không khí hiệu quả…', 270000, 0),
(2, 2, 'Cây Trầu Bà Leo Cột', 'Cây Trầu Bà Leo Cột (tên khoa học: Epipremnum aureum) không chỉ là loài cây có khả năng thanh lọc không khí trong nhà tốt mà còn được yêu thích bởi những ý nghĩa phong thủy tốt lành của nó…', 850000, 0),
(3, 2, 'Cây Kim Tiền', 'Cây Kim Tiền (tên khoa học: Zamioculcas zamiifolia) là loại cây trồng trong nhà có vẻ đẹp sang trọng, đầy sức sống, mang đến nhiều giá trị phong thủy tốt lành đến với gia chủ…', 650000, 0),
(4, 2, 'Cây Cau Cảnh', 'Cây Cau Cảnh là loài cây có sức sống mãnh liệt, mang nhiều ý nghĩa về may mắn và tài lộc. Hiện nay loại cây này được trồng nhiều trong không gian nhà ở, môi trường làm việc hay các quán cafe,…', 850000, 0),
(5, 2, 'Cây Bàng Singapore', 'Cây Bàng Singapore (tên khoa học: Ficus Lyrata) là loại cây trồng trong nhà đẹp và rất được ưa chuộng để trang trí nội thất trong những năm gần đây…', 170000, 0),
(8, 1, 'Cây Bình An', 'Nhắc đến cây cảnh trồng trong nhà được ưa thích hiện nay không thể bỏ qua cây Bình An (tên khoa học: Peperomia angulata). Loài cây này dễ trồng, dễ chăm sóc và mang lại nhiều may mắn cho gia chủ…', 170000, 0),
(9, 1, 'Cây Dây Nhện', 'Cây Dây Nhện – Cỏ Lan Chi (tên khoa học: Chlorophytum Comosum) có khả năng hấp thụ tới 85% lượng khí Formaldehyde độc hại trong không khí xung quanh nó…', 170000, 0),
(10, 1, 'Cây Lan Hồ Điệp', 'Cây Lan Hồ Điệp là một trong những loại hoa lan đẹp được ưa chuộng nhất hiện nay. Lan Hồ Điệp nổi tiếng với vô vàn chủng loại và màu sắc khác nhau được sử dụng trang trí nội thất giúp mang lại nhiều may mắn…', 190000, 0),
(11, 1, 'Cây Bạch Mã Hoàng Tử', 'Cây Bạch Mã Hoàng Tử (tên khoa học: Aglaonema Pseudobracteatum) là loại cây cảnh nội thất đẹp thường được trồng để trang trí trong văn phòng, nhà ở, phòng làm việc với nhiều ý nghĩa phong thủy tốt đẹp.', 220000, 0),
(12, 1, 'Cây Trúc Phú Quý', 'Cây Trúc Phú Quý (tên khoa học: Dracaena Surculosa) còn gọi là cây: Phát Dụ, cây Phát Lộc, Trúc Hạnh Vận… Trong phong thủy cây Trúc Phú Quý mang lại tài lộc, sức khỏe, may mắn cho gia chủ, giúp thúc vượng tài vận, tài khí của gia chủ ngày càng vượng ', 150000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `username` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`,`id_loaisp`),
  ADD KEY `id_loaisp` (`id_loaisp`);

--
-- Chỉ mục cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id_anh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_loaisp`) REFERENCES `loai_sp` (`id_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
