-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.y/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2023 lúc 07:43 AM
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
-- Cơ sở dữ liệu: `quanlytiemnet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi`
--

CREATE TABLE `chi` (
  `ID` int(11) NOT NULL,
  `DanhMuc` int(11) NOT NULL,
  `SoTien` int(11) NOT NULL,
  `Ngay` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID` int(11) NOT NULL,
  `MaDanhMuc` varchar(10) NOT NULL,
  `TenDanhMuc` varchar(500) NOT NULL,
  `Loai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `sdtkhachhang` char(10) NOT NULL COMMENT 'sdt KH',
  `idphong` int(11) NOT NULL COMMENT 'id phòng',
  `idgiatien` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'id giá tiền',
  `thoigianbatdau` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian bắt đầu sử dụng',
  `thoigianketthuc` timestamp NULL DEFAULT NULL COMMENT 'thời gian trả máy',
  `giamgia` int(11) NOT NULL DEFAULT 0,
  `ghichu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`sdtkhachhang`, `idphong`, `idgiatien`, `thoigianbatdau`, `thoigianketthuc`, `giamgia`, `ghichu`) VALUES
('0911351412', 1, '2022-09-14 16:19:56', '2021-10-04 12:39:03', '2021-10-04 13:39:13', 5, ''),
('0911351412', 5, '2022-09-01 09:19:56', '2022-09-06 12:49:14', '2022-09-06 14:14:15', 5, ''),
('0911351412', 11, '2022-09-01 09:19:56', '2022-09-09 09:49:14', '2022-09-09 10:12:14', 5, ''),
('0911351412', 8, '2022-09-01 09:19:56', '2022-10-03 01:49:14', '2022-10-03 09:59:20', 5, ''),
('0911351412', 1, '2022-09-01 09:19:56', '2022-10-04 05:39:03', '2022-10-04 06:39:13', 5, ''),
('0913311318', 16, '2022-09-14 16:19:56', '2022-08-01 01:00:44', '2022-08-01 03:00:44', 10, ''),
('0913311318', 1, '2022-09-14 16:19:56', '2022-10-04 14:29:57', '2022-10-04 15:29:57', 10, ''),
('0913311318', 15, '2022-09-14 16:16:51', '2022-10-04 14:46:55', '2022-10-04 16:51:42', 10, ''),
('0925256567', 2, '2022-09-01 09:19:56', '2020-10-01 05:42:18', '2020-10-01 06:42:33', 5, ''),
('0925256567', 9, '2022-09-01 09:19:56', '2020-10-04 02:49:14', '2020-10-04 04:41:25', 0, ''),
('0925256567', 2, '2022-09-14 16:19:56', '2021-10-04 12:42:18', '2021-10-04 13:42:33', 5, ''),
('0925256567', 6, '2022-09-01 09:19:56', '2022-09-05 13:49:14', '2022-09-05 15:12:22', 10, ''),
('0925256567', 2, '2022-09-01 09:19:56', '2022-09-08 10:49:14', '2022-09-08 12:42:04', 5, ''),
('0936616471', 1, '2022-10-04 14:50:36', '2022-10-04 15:02:55', '2022-10-04 16:22:46', 0, ''),
('0937803045', 12, '2021-05-22 16:30:48', '2022-03-31 23:36:05', '2022-04-01 07:00:01', 10, ''),
('0938090948', 9, '2022-09-14 16:19:56', '2021-10-04 13:56:00', '2021-10-04 14:56:17', 5, ''),
('0938090948', 17, '2022-09-14 16:19:56', '2022-09-09 03:53:19', '2022-09-09 06:00:44', 5, ''),
('0950496346', 14, '2022-09-14 16:19:56', '2022-09-09 03:56:32', '2022-09-09 05:00:48', 5, ''),
('0953248159', 2, '2022-09-14 16:19:56', '2022-10-04 14:30:31', '2022-10-04 16:30:57', 5, ''),
('0956120203', 1, '2022-09-14 16:19:56', '2021-10-02 13:57:52', '2021-10-02 14:57:52', 10, ''),
('0956120203', 12, '2022-09-01 03:10:27', '2022-07-01 06:00:01', '2022-07-01 10:00:01', 10, ''),
('0956696718', 12, '2022-09-14 16:19:56', '2022-06-01 02:00:01', '2022-06-01 06:00:01', 10, ''),
('0956696718', 4, '2022-09-01 09:19:56', '2022-09-07 11:49:14', '2022-09-07 13:52:44', 5, ''),
('0956696718', 10, '2022-09-01 09:19:56', '2022-09-30 23:49:14', '2022-10-01 04:12:00', 5, ''),
('0956696718', 3, '2022-09-01 09:19:56', '2022-10-03 18:29:00', '2022-10-03 21:29:00', 10, ''),
('0956696718', 3, '2022-09-14 16:19:56', '2022-10-04 01:29:00', '2022-10-04 02:13:26', 10, ''),
('0956696718', 3, '2022-10-04 14:50:36', '2022-10-04 13:53:03', '2022-10-04 16:22:22', 10, ''),
('0956696718', 4, '2022-09-14 16:19:56', '2022-10-04 13:58:32', '2022-10-04 16:00:52', 10, ''),
('0957062985', 12, '2021-05-22 16:37:07', '2022-05-01 07:00:01', '2022-05-01 12:00:01', 5, ''),
('0957062985', 7, '2022-09-01 09:19:56', '2022-10-03 04:49:14', '2022-10-03 05:20:11', 5, ''),
('0957062985', 10, '2022-09-01 09:19:56', '2022-10-03 08:31:00', '2022-10-03 09:49:14', 5, ''),
('0957062985', 10, '2022-09-14 16:19:56', '2022-10-03 15:31:00', '2022-10-03 16:49:14', 5, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giatien`
--

CREATE TABLE `giatien` (
  `idgiatien` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian cập nhật giá',
  `gia` int(11) NOT NULL COMMENT 'giá tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giatien`
--

INSERT INTO `giatien` (`idgiatien`, `gia`) VALUES
('2021-05-22 16:30:48', 2),
('2021-05-22 16:37:07', 3),
('2022-09-01 03:10:27', 3),
('2022-09-01 09:19:56', 4),
('2022-09-02 03:10:27', 3),
('2022-09-03 03:10:27', 4),
('2022-09-04 03:10:27', 5),
('2022-09-05 03:10:27', 5),
('2022-09-14 16:16:51', 6),
('2022-09-14 16:19:56', 7),
('2022-10-04 14:50:36', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id` int(11) NOT NULL COMMENT 'khóa chính',
  `tenphong` varchar(32) NOT NULL COMMENT 'tên phòng',
  `tinhtrang` varchar(32) NOT NULL DEFAULT 'binhthuong' COMMENT 'bình thường/hỏng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id`, `tenphong`, `tinhtrang`) VALUES
(1, 'phòng 01', 'Bình thường'),
(2, 'phòng 02', 'Bình thường'),
(3, 'phòng 03', 'Bình thường'),
(4, 'phòng 04', 'Bình thường'),
(5, 'phòng 05', 'Bình thường'),
(6, 'phòng 06', 'Bình thường'),
(7, 'phòng 07', 'Bình thường'),
(8, 'phòng 08', 'Bình thường'),
(9, 'phòng 09', 'Bình thường'),
(10, 'phòng 10', 'Bình thường'),
(11, 'phòng 11', 'Hỏng'),
(12, 'phòng 12', 'Bình thường'),
(13, 'phòng 13', 'Bình thường'),
(14, 'phòng 14', 'Bình thường'),
(15, 'phòng 15', 'Bình thường'),
(16, 'phòng 16', 'Bình thường'),
(17, 'phòng 17', 'Bình thường'),
(18, 'phòng 18', 'Hỏng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan` varchar(16) NOT NULL COMMENT 'khóa chính',
  `matkhau` char(32) NOT NULL COMMENT 'mật khẩu mã hóa',
  `loaitaikhoan` varchar(255) NOT NULL DEFAULT 'Bình thường',
  `ghichu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan`, `matkhau`, `loaitaikhoan`, `ghichu`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', 'Quản trị viên'),
('admin1', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', NULL),
('nguoidung01', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', NULL),
('nhanvien1', 'e10adc3949ba59abbe56e057f20f883e', 'Quản trị', 'Bình thường'),
('nhanvien2', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', ''),
('nhanvien3', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', ''),
('taikhoan001', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', NULL),
('taikhoan01', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', NULL),
('user01', 'e10adc3949ba59abbe56e057f20f883e', 'Bình thường', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinkhachhang`
--

CREATE TABLE `thongtinkhachhang` (
  `sdt` char(10) NOT NULL COMMENT 'khóa chính',
  `hoten` varchar(255) NOT NULL,
  `ngaysinh` date DEFAULT NULL COMMENT 'ngày/tháng/năm sinh KH',
  `diachi` varchar(255) DEFAULT NULL COMMENT 'địa chỉ KH',
  `thoigiandangky` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian đăng ký KH',
  `loaikhachhang` varchar(16) NOT NULL DEFAULT 'binhthuong' COMMENT 'KH bình thường/thân thuộc/VIP',
  `gioitinh` varchar(3) DEFAULT NULL COMMENT 'giới tính KH'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinkhachhang`
--

INSERT INTO `thongtinkhachhang` (`sdt`, `hoten`, `ngaysinh`, `diachi`, `thoigiandangky`, `loaikhachhang`, `gioitinh`) VALUES
('0911351412', 'Võ Cao Tiến3', '1995-09-30', 'Xã Ân Mỹ, Huyện Hoài Ân, Tỉnh Bình Định', '2021-07-30 00:35:59', 'Thân thuộc', 'Nam'),
('0912738914', 'Trần Phú Quí', '2000-05-13', 'Vĩnh Long', '2021-05-22 16:36:45', 'VIP', 'Nam'),
('0913311318', 'Vũ Minh Vũ', '1977-06-09', 'Xã Ia KDăm, Huyện Ia Pa, Tỉnh Gia Lai', '2021-05-28 00:24:40', 'VIP', 'Nam'),
('0916609959', 'Huỳnh Thanh Xuân', '2007-12-15', 'Phường Quang Trung, Quận Đống Đa, Thành phố Hà Nội', '2021-03-15 00:33:07', 'Bình thường', 'Nữ'),
('0917049576', 'Đỗ Thế Quyền', '2007-12-07', 'Phường Tân Hòa, Thành phố Biên Hòa, Tỉnh Đồng Nai', '2021-11-17 00:32:21', 'Thân thuộc', 'Nam'),
('0919438961', 'Phan Tuấn Dũng', '1986-02-07', 'Xã Nghĩa Lâm, Huyện Nghĩa Hưng, Tỉnh Nam Định', '2021-01-25 00:26:44', 'VIP', 'Nam'),
('0921823784', 'Lê Quý Vĩnh', '1988-06-06', 'Xã Pù Nhi, Huyện Mường Lát, Tỉnh Thanh Hóa', '2021-01-19 00:30:12', 'Bình thường', 'Nam'),
('0921996132', 'Ngô Thúy Phượng', '1968-06-15', 'Xã Hòa Mỹ Tây, Huyện Tây Hoà, Tỉnh Phú Yên', '2021-09-15 00:33:24', 'VIP', 'Nữ'),
('0921997051', 'Lý Hà Nhi', '1978-05-16', 'Xã Tủa Sín Chải, Huyện Sìn Hồ, Tỉnh Lai Châu', '2021-06-09 00:36:12', 'VIP', 'Nữ'),
('0922639657', 'Lý Hoàng Ân', '1981-09-01', 'Phường Quán Trữ, Quận Kiến An, Thành phố Hải Phòng', '2021-06-06 00:27:22', 'Bình thường', 'Nam'),
('0925256567', 'Ngô Song Thư', '1979-12-07', 'Xã Tân Mỹ Chánh, Thành phố Mỹ Tho, Tỉnh Tiền Giang', '2021-07-13 00:35:20', 'Thân thuộc', 'Nữ'),
('0925827519', 'Ngô Nguyên Lộc', '1993-07-12', 'Xã Khánh Yên Trung, Huyện Văn Bàn, Tỉnh Lào Cai', '2021-03-10 00:32:31', 'Bình thường', 'Nam'),
('0926291178', 'Nguyễn Hoàng Kha', '2002-06-04', 'Vĩnh Long', '2022-10-04 14:47:47', 'VIP', 'Nam'),
('0927082784', 'Lý Hiếu Minh', '1993-11-06', 'Thị trấn Gio Linh, Huyện Gio Linh, Tỉnh Quảng Trị', '2021-07-15 00:31:47', 'Bình thường', 'Nữ'),
('0935285392', 'Bùi Nguyên Hồng', '1982-09-23', 'Phường Phước Hoà, Thị xã Phú Mỹ, Tỉnh Bà Rịa - Vũng Tàu', '2021-10-29 00:27:31', 'Bình thường', 'Nữ'),
('0936616471', 'Bùi Việt Mi', '2001-04-28', 'Phường Lê Lợi, Thị xã Sơn Tây, Thành phố Hà Nội', '2021-03-01 00:35:23', 'Bình thường', 'Nữ'),
('0937803045', 'Hồ Duy Luận', '2006-12-17', 'Xã Tả Phìn, Huyện Đồng Văn, Tỉnh Hà Giang', '2021-02-20 00:36:00', 'VIP', 'Nam'),
('0938090948', 'Dương Phương An', '1967-10-06', 'Xã Mỹ Thạnh, Huyện Giồng Trôm, Tỉnh Bến Tre', '2021-03-13 00:24:03', 'Thân thuộc', 'Nữ'),
('0942420720', 'Lý Mai Châu', '1969-04-02', 'Phường Mỹ Hương, Thành phố Phan Rang-Tháp Chàm, Tỉnh Ninh Thuận', '2021-04-29 00:37:06', 'VIP', 'Nữ'),
('0950496346', 'Dương Phương Nam', '1968-03-16', 'Xã An Hiệp, Huyện Tuy An, Tỉnh Phú Yên', '2021-05-17 00:37:47', 'Thân thuộc', 'Nam'),
('0953248159', 'Đỗ Thắng Lợi', '1995-04-29', 'Xã Phú Sơn, Huyện Quan Hóa, Tỉnh Thanh Hóa', '2021-08-05 00:32:43', 'Thân thuộc', 'Nam'),
('0954767259', 'Trần Huy Quang', '1989-11-13', 'Xã Hồng Phong, Huyện Vũ Thư, Tỉnh Thái Bình', '2021-06-23 00:30:21', 'Bình thường', 'Nam'),
('0954925452', 'Hồ Minh Quân', '1968-08-21', 'Phường Nguyễn Cư Trinh, Quận 1, Thành phố Hồ Chí Minh', '2021-03-25 00:31:45', 'VIP', 'Nam'),
('0956120203', 'Hoàng Anh Thi', '1976-06-27', 'Xã Vinh Quang, Huyện Chiêm Hóa, Tỉnh Tuyên Quang', '2021-09-29 00:32:02', 'VIP', 'Nữ'),
('0956696718', 'Lý Trung Ðức', '1971-05-03', 'Xã Bình Phú, Huyện Thăng Bình, Tỉnh Quảng Nam', '2021-03-09 00:37:26', 'VIP', 'Nam'),
('0957062985', 'Lê Duy Thành', '2008-04-04', 'Xã Thạch Lập, Huyện Ngọc Lặc, Tỉnh Thanh Hóa', '2021-05-07 00:23:57', 'Thân thuộc', 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thu`
--

CREATE TABLE `thu` (
  `ID` int(11) NOT NULL,
  `DanhMuc` int(11) NOT NULL,
  `SoTien` int(11) NOT NULL,
  `Ngay` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `ID` int(11) NOT NULL,
  `DanhMuc` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `DienGiai` varchar(500) NOT NULL,
  `Ngay` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi`
--
ALTER TABLE `chi`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`sdtkhachhang`,`thoigianbatdau`),
  ADD KEY `idgiatien` (`idgiatien`),
  ADD KEY `idphong` (`idphong`);

--
-- Chỉ mục cho bảng `giatien`
--
ALTER TABLE `giatien`
  ADD PRIMARY KEY (`idgiatien`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenphong` (`tenphong`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Chỉ mục cho bảng `thongtinkhachhang`
--
ALTER TABLE `thongtinkhachhang`
  ADD PRIMARY KEY (`sdt`);

--
-- Chỉ mục cho bảng `thu`
--
ALTER TABLE `thu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi`
--
ALTER TABLE `chi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `thu`
--
ALTER TABLE `thu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `idphong` FOREIGN KEY (`idphong`) REFERENCES `phong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sdt` FOREIGN KEY (`sdtkhachhang`) REFERENCES `thongtinkhachhang` (`sdt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
