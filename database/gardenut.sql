-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2021 lúc 04:28 PM
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
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `is_active`) VALUES
(1, 'Huỳnh Hằng', '123@gmail.com', '$2y$10$qJksQhBixAXVF5bTx2ueuep6UXwbJ/cgi5ntg4OeJPNtIcB3gI.22', 0),
(2, 'dong', 'dong@gmail.com', '$2y$10$Z5fASRUBscU6uvW/LCk9uOcsCVARmtClxoWaip9GGh10izfQ28.D2', 0);

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
(2, 'office'),
(3, 'xuongrong'),
(4, 'senda'),
(5, 'hoa_sinhnhat'),
(6, 'hoa_damcuoi');

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
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `giagiam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_loaisp`, `tensp`, `ghichu`, `gia`, `soluong`, `hinhanh`, `giagiam`) VALUES
(1, 2, 'Cây Phát Tài', 'Cây Phát Tài được tìm thấy ở Zambia, Tanzania và Tây Phi. Loại cây này có lá màu xanh sẫm, tán lá xòe rộng và có đường gân vàng nổi bật, thường được trồng trong nhà giúp thanh lọc không khí hiệu quả…', 270000, 20, './assets/image/sanpham/cay-phat-tai-3.jpg', 0),
(2, 2, 'Cây Trầu Bà Leo Cột', 'Cây Trầu Bà Leo Cột (tên khoa học: Epipremnum aureum) không chỉ là loài cây có khả năng thanh lọc không khí trong nhà tốt mà còn được yêu thích bởi những ý nghĩa phong thủy tốt lành của nó…', 850000, 10, './assets/image/sanpham/cay-trau-ba-leo-cot-3.jpg', 0),
(3, 2, 'Cây Kim Tiền', 'Cây Kim Tiền (tên khoa học: Zamioculcas zamiifolia) là loại cây trồng trong nhà có vẻ đẹp sang trọng, đầy sức sống, mang đến nhiều giá trị phong thủy tốt lành đến với gia chủ…', 650000, 25, './assets/image/sanpham/cay-kim-tien-3.jpg', 0),
(4, 2, 'Cây Cau Cảnh', 'Cây Cau Cảnh là loài cây có sức sống mãnh liệt, mang nhiều ý nghĩa về may mắn và tài lộc. Hiện nay loại cây này được trồng nhiều trong không gian nhà ở, môi trường làm việc hay các quán cafe,…', 850000, 15, './assets/image/sanpham/cay-cau-canh-3.jpg', 0),
(5, 2, 'Cây Bàng Singapore', 'Cây Bàng Singapore (tên khoa học: Ficus Lyrata) là loại cây trồng trong nhà đẹp và rất được ưa chuộng để trang trí nội thất trong những năm gần đây…', 170000, 20, './assets/image/sanpham/cay-bang-singapore-3.jpg', 0),
(8, 1, 'Cây Bình An', 'Nhắc đến cây cảnh trồng trong nhà được ưa thích hiện nay không thể bỏ qua cây Bình An (tên khoa học: Peperomia angulata). Loài cây này dễ trồng, dễ chăm sóc và mang lại nhiều may mắn cho gia chủ…', 170000, 5, './assets/image/sanpham/cay-binh-an-3.jpg', 0),
(9, 1, 'Cây Dây Nhện', 'Cây Dây Nhện – Cỏ Lan Chi (tên khoa học: Chlorophytum Comosum) có khả năng hấp thụ tới 85% lượng khí Formaldehyde độc hại trong không khí xung quanh nó…', 170000, 31, './assets/image/sanpham/cay-day-nhen-3.jpg', 0),
(10, 1, 'Cây Lan Hồ Điệp', 'Cây Lan Hồ Điệp là một trong những loại hoa lan đẹp được ưa chuộng nhất hiện nay. Lan Hồ Điệp nổi tiếng với vô vàn chủng loại và màu sắc khác nhau được sử dụng trang trí nội thất giúp mang lại nhiều may mắn…', 190000, 26, './assets/image/sanpham/cay-lan-ho-diep-3.jpg', 0),
(11, 1, 'Cây Bạch Mã Hoàng Tử', 'Cây Bạch Mã Hoàng Tử (tên khoa học: Aglaonema Pseudobracteatum) là loại cây cảnh nội thất đẹp thường được trồng để trang trí trong văn phòng, nhà ở, phòng làm việc với nhiều ý nghĩa phong thủy tốt đẹp.', 220000, 12, './assets/image/sanpham/cay-bach-ma-hoang-tu-3.jpg', 0),
(12, 1, 'Cây Trúc Phú Quý', 'Cây Trúc Phú Quý (tên khoa học: Dracaena Surculosa) còn gọi là cây: Phát Dụ, cây Phát Lộc, Trúc Hạnh Vận… Trong phong thủy cây Trúc Phú Quý mang lại tài lộc, sức khỏe, may mắn cho gia chủ, giúp thúc vượng tài vận, tài khí của gia chủ ngày càng vượng ', 150000, 30, './assets/image/sanpham/truc-phu-quy-3.jpg', 0),
(13, 3, 'Xương Rồng Khế Bụi Vàng', 'Xương Rồng Khế Bụi Vàng là loại cây cảnh đẹp, thuộc nhóm cây mọng nước. Loại cây này có nguồn gốc từ vùng Nam Mỹ. Trong phong thủy Xương Rồng Khế Bụi Vàng được nhiều người biết đến với ý nghĩa mang đến sức mạnh giúp bảo vệ bạn tránh khỏi những nguồn ', 200000, 32, './assets/image/sanpham/xuong-rong-khe-vang-bui-2.jpg', 0),
(14, 3, 'Xương Rồng Bát Tiên', 'Xương Rồng Bát Tiên là một trong loài xương rồng cho hoa đẹp, đa dạng về màu sắc được nhiều người ưa thích. Chính nhờ vẻ đẹp dịu dàng của những bông hoa mà cây được trồng và trang trí nhiều trong nhà', 90000, 14, './assets/image/sanpham/xuong_rong_bat_tien_2.jpg', 0),
(15, 3, 'Xương Rồng Astro', 'Xương Rồng Astro (tên khoa học: Astrophytum myriostigma) là loại cây có ý nghĩa mang lại may mắn cho gia chủ. Ngoài ra, cây còn thu hút bởi vẻ ngoài đáng yêu, đặc biệt…', 70000, 15, './assets/image/sanpham/xuong-rong-astro-2.jpg', 0),
(16, 3, 'Xương Rồng Thanh Sơn', 'Xương Rồng Thanh Sơn còn có tên gọi khác là Xương Rồng Ngọn Núi. Tên gọi này xuất phát từ hình dáng bên ngoài, tựa những ngọn núi trùng điệp. Loại xương rồng này thuộc họ Cactaceae, chúng có đến hơn 1800 loài khác nhau…', 35000, 38, './assets/image/sanpham/xuong-rong-khe-xanh-2.jpg', 0),
(17, 3, 'Xương Rồng Khế Xanh Bụi', 'Xương Rồng Khế Bụi Xanh có nguồn gốc từ Nam Mỹ. Cây có hình dáng bên ngoài thu hút, độc đáo. Đặc biệt, chúng còn mang ý nghĩa đem lại may mắn, tránh những điều không tốt trong cuộc sống…', 150000, 8, './assets/image/sanpham/xuong-rong-thanh-son.jpg', 0),
(18, 4, 'Sen Đá Hoa Hồng Xanh', 'Sen Đá Hoa Hồng Xanh (tên khoa học: Aeonium dodrantale hoặc Greenovia dodrantalis) là một trong những loại sen đá quý hiếm mà nhiều người mong muốn sở hữu.', 100000, 18, './assets/image/sanpham/sen-da-hoa-hong-xanh-2.jpg', 0),
(19, 4, 'Sen Đá Giva', 'Sen Đá Giva (tên khoa học: Echeveria Agavoides) có màu xanh tươi đặc trưng, đầu lá như những chiếc gai nhọn mọc xen kẽ nhau một cách cân đối. Lá cây mọc đều xung quanh gốc, xếp xòe ra rất đẹp…', 35000, 43, './assets/image/sanpham/sen-da-giva-2.jpg', 0),
(20, 4, 'Sen Đá Nhung', 'Sen Đá Nhung (tên khoa học: Echeveria cv Dorris Taylor) là loài sen đá đặc biệt với một lớp lông tơ dày màu trắng bao phủ bên ngoài những chiếc lá. Cây mang đến cho người nhìn cảm giác về sự êm dịu và ngộ nghĩnh đáng yêu…', 35000, 20, './assets/image/sanpham/sen-da-nhung-long-2.jpg', 0),
(21, 4, 'Sen Đá Thái', 'Sen Đá Thái (tên khoa học: Echeveria Blue Atoll) có nguồn gốc từ Mexico. Hiện nay cây rất được ưa chuộng trồng tại Việt Nam bởi đặc tính dễ thích nghi với môi trường và đặc điểm hình dáng thu hút…', 35000, 10, './assets/image/sanpham/sen-da-thai-1.jpg', 0),
(22, 4, 'Sen Đá Ngọc', 'Sen Đá Ngọc (tên khoa học: Haworthia Cooperi) là loại cây mọng nước không có thân. Lá của cây mọc xoay tròn thành những cụm nhỏ mập mạp, nhìn giống như một chùm nho…', 35000, 22, './assets/image/sanpham/sen-da-ngoc-2.jpg', 0),
(23, 6, 'Bên em', 'Với sắc đỏ cổ điển của hoa hồng kết hợp với gam màu trắng từ hoa mõm sói và calimero trắng đã tạo nên một tổng thể hoà quyện và làm nên vẻ đẹp cho bó hoa này. Bó hoa phù hợp tặng các dịp chúc mừng các sự kiện đặc biệt, sinh nhật....', 650000, 50, './assets/image/sanpham/ben-em-1.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `phone`, `password`) VALUES
(2, 'Huỳnh Hằng', '0123456789', '123123'),
(3, 'test', '0123456789', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id_anh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
