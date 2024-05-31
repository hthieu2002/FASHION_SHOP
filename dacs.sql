-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2021 lúc 01:14 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tai_khoan_ad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `tai_khoan_ad`, `mat_khau`) VALUES
('2', 'admin2', '25f9e794323b453885f5181f1b624d0b'),
('7877', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `macthd` int(11) NOT NULL,
  `mahd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`macthd`, `mahd`, `masp`, `soluongmua`, `dongia`) VALUES
(47, '67074', '6230', 2, 54000),
(48, '21780', '5780', 2, 162000),
(49, '3122', '4242', 4, 90000),
(50, '3122', '3870', 5, 170000),
(51, '3122', '5472', 4, 180000),
(52, '3122', '5299', 3, 152000),
(53, '12449', '5781', 3, 66500),
(54, '12449', '7431', 4, 225000),
(55, '12449', '8652', 4, 90000),
(56, '24694', '3870', 3, 170000),
(57, '24694', '4242', 2, 90000),
(58, '24694', '1078', 5, 144000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gop_y`
--

CREATE TABLE `gop_y` (
  `magy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay` datetime NOT NULL,
  `noidunggy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quatrinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gop_y`
--

INSERT INTO `gop_y` (`magy`, `masp`, `makh`, `ngay`, `noidunggy`, `quatrinh`) VALUES
('98556', '5780', '4047', '2021-12-07 15:12:26', 'Sản phẩm rất đẹp, phù hợp cá tính hiện nay, mong shop có nhiều sản phẩm mới và đẹp hơn nữa.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `mahd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaylap` datetime NOT NULL,
  `tonggia` int(11) NOT NULL,
  `noinhan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`mahd`, `makh`, `manv`, `ngaylap`, `tonggia`, `noinhan`, `ghichu`, `tinhtrang`) VALUES
('12449', '2328', '1871', '2021-12-06 15:12:51', 1459500, 'Sơn Lộc - Bố Trạch - Quảng Bình', 'Đồ rất đẹp nha', 4),
('21780', '4047', '0', '2021-12-06 14:12:01', 324000, 'Thôn Phúc Hòa - Xã Phú Hòa - Huyện Bố Trạch - Tỉnh Quảng Bình', 'ok', 0),
('24694', '4047', '0', '2021-12-07 08:12:52', 1410000, 'Thôn Phúc Hòa - Xã Phú Hòa - Huyện Bố Trạch - Tỉnh Quảng Bình', 'ok', 0),
('3122', '9636', '0', '2021-12-06 15:12:48', 2386000, 'Vạn Trạch - Bố Trạch - Quảng Bình', 'đồ đẹp lắm shop ơi', 0),
('67074', '4047', '9854', '2021-12-02 21:12:37', 108000, 'Thôn Phúc Hòa - Xã Phú Hòa - Huyện Bố Trạch - Tỉnh Quảng Bình', 'ok', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `makh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tai_khoan_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`makh`, `tai_khoan_kh`, `mat_khau`) VALUES
('2328', 'uyennhi', '827ccb0eea8a706c4c34a16891f84e7b'),
('2424', 'tungtungcs', '827ccb0eea8a706c4c34a16891f84e7b'),
('4047', 'tuannguyen', '915f3286ee8a46cdbd49af14d9d575f7'),
('9636', 'ctrung', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `malsp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenlsp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`malsp`, `tenlsp`) VALUES
('1173', 'Áo '),
('2992', 'Quần '),
('8191', 'Đồ bộ'),
('9868', 'Phụ kiện thời trang ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `mand` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `makh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idadmin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manv` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`mand`, `ten`, `hinhanh`, `diachi`, `email`, `dienthoai`, `makh`, `idadmin`, `manv`) VALUES
('0', 'Chưa xác nhận', 'NULL', 'NULL', 'NULL', 'null', NULL, NULL, '0'),
('2283', 'Nhi Hoàng', '95436968_599629054018638_6146439723490476032_n1638020758.jpg', 'Sơn Lộc - Bố Trạch - Quảng Bình', 'hoangthiuyennhi.qb@gmail.com', '0826045847', '2328', NULL, NULL),
('3566', 'Hoàng Thị Uyển Nhi', '43502962_268510123797201_1327365389495042048_n1638842126.jpg', 'Thôn Phúc Hòa - Xã Phú Hòa - Huyện Bố Trạch - Tỉnh Quảng Bình', 'nguyenvinhtuan07@gmail.com', '0856775530', '4047', NULL, NULL),
('3700', 'Hoàng Trung Hiếu', 'macdinh.jpg', 'Vạn Trạch - Bố Trạch - Quảng Bình', 'hthieu.20it3@vku.udn.vn', '0856775530', '9636', NULL, NULL),
('3823', 'HoàngTrung Hiếu', 'tumblr_1d6733e68952c957803500215688c38b_b8261db7_6401638867699.gif', 'Quảng Bình', 'hoangtrunghieu26112002@gmail.com', '0856775530', NULL, NULL, '1871'),
('7877', 'admin', 'anime2_ss.png', 'chưa cập nhật', 'chưa cập nhật', 'null', NULL, '7877', NULL),
('9149', 'NguyenVanTung', 'staff-teachers-icon-vector-isolated-260nw-119474049116382816341638867488.jpg', 'Gia Lai ', 'a@gmail.com', '0983242324', '2424', NULL, NULL),
('9867', 'Nguyễn Văn Tùng', 'nhanvien21638780002.jpg', 'Đắk Lắk', 'nvtung.20it2@vku.udn.vn', '0987755446', NULL, NULL, '9854');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `manv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tai_khoan_nv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`manv`, `tai_khoan_nv`, `mat_khau`) VALUES
('0', 'Test', 'b98169e534a3306fab7f8f6a67efffb5'),
('1871', 'trunghieu', '827ccb0eea8a706c4c34a16891f84e7b'),
('9854', 'tungnguyen', 'b127865843e794e64e9962d312c2b349');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `masp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `malsp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tensp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhsp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasp` int(11) NOT NULL,
  `kichco` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mieuta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `giakm` int(11) NOT NULL,
  `ngaybd` datetime NOT NULL,
  `ngaykt` datetime NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`masp`, `malsp`, `tensp`, `anhsp`, `giasp`, `kichco`, `soluong`, `mieuta`, `noidung`, `giakm`, `ngaybd`, `ngaykt`, `tinhtrang`, `hot`) VALUES
('1078', '1173', 'Quần thể thao form rộng ', 'quannam1638281908.jpg', 160000, 0, 70, '<p>Th&ocirc;ng tin sản phẩm&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t li&ecirc;̣u: QUẦN chất th&ocirc; mềm mặc 4 m&ugrave;a đều xinh - quay m&aacute;y giặt thoải m&aacute;i ko nhăn ko nh&agrave;u</p>\r\n\r\n<p>Ki&ecirc;̉u dáng: full h&igrave;nh hot nhất thị trường, d&aacute;ng quần short năng động mix match vs &aacute;o thun / &aacute;o nỉ cực xinh , đơn / đ&ocirc;i / nh&oacute;m mặc đều hợp nh&eacute;,</p>\r\n\r\n<p>NH&Agrave; EM L&Agrave;M CẠP THOẢI M&Aacute;I - C&Oacute; T&Uacute;I QUẦN TO RỘNG KH&Aacute;C BỌT VS THỊ TRƯỜNG NH&Eacute;.&nbsp;</p>\r\n\r\n<p>Form : d&agrave;i 48-50cm , rộng v2 55cm - 90cm (cực co gi&atilde;n ahii b&eacute;o gầy sướng nh&eacute;) , rộng v3 &lt;105cm đổ lại , tầm 65 70kg đổ lại mặc qu&aacute; hợp l&iacute; lu&ocirc;n</p>\r\n', '<p>Hướng dẫn sử dụng sản phẩm</p>\r\n\r\n<p>Lần đầu đem về chỉ xả nước lạnh rồi phơi kh&ocirc;</p>\r\n\r\n<p>Nhớ lộn tr&aacute;i &aacute;o khi giặt v&agrave; kh&ocirc;ng giặt ng&acirc;m</p>\r\n\r\n<p>Kh&ocirc;ng giặt m&aacute;y trong 2 tuần đầu</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng thuốc tẩy</p>\r\n\r\n<p>Khi phơi lộn tr&aacute;i v&agrave; kh&ocirc;ng phơi trực tiếp dưới &aacute;nh nắng mặt trời</p>\r\n', 144000, '2021-11-30 21:18:44', '2021-12-11 21:18:44', 0, 0),
('1140', '2992', 'Quần kaki hàn quốc ', 'quannam31638281847.jpg', 150000, 0, 7, '<p>&nbsp;Th&ocirc;ng tin sản phẩm&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t li&ecirc;̣u: QUẦN chất th&ocirc; mềm mặc 4 m&ugrave;a đều xinh - quay m&aacute;y giặt thoải m&aacute;i ko nhăn ko nh&agrave;u</p>\r\n\r\n<p>Ki&ecirc;̉u dáng: full h&igrave;nh hot nhất thị trường, d&aacute;ng quần short năng động mix match vs &aacute;o thun / &aacute;o nỉ cực xinh , đơn / đ&ocirc;i / nh&oacute;m mặc đều hợp nh&eacute;,</p>\r\n\r\n<p>NH&Agrave; EM L&Agrave;M CẠP THOẢI M&Aacute;I - C&Oacute; T&Uacute;I QUẦN TO RỘNG KH&Aacute;C BỌT VS THỊ TRƯỜNG NH&Eacute;.&nbsp;</p>\r\n\r\n<p>Form : d&agrave;i 48-50cm , rộng v2 55cm - 90cm (cực co gi&atilde;n ahii b&eacute;o gầy sướng nh&eacute;) , rộng v3 &lt;105cm đổ lại , tầm 65 70kg đổ lại mặc qu&aacute; hợp l&iacute; lu&ocirc;n</p>\r\n', '<p>Hướng dẫn sử dụng sản phẩm</p>\r\n\r\n<p>Lần đầu đem về chỉ xả nước lạnh rồi phơi kh&ocirc;</p>\r\n\r\n<p>Nhớ lộn tr&aacute;i &aacute;o khi giặt v&agrave; kh&ocirc;ng giặt ng&acirc;m</p>\r\n\r\n<p>Kh&ocirc;ng giặt m&aacute;y trong 2 tuần đầu</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng thuốc tẩy</p>\r\n\r\n<p>Khi phơi lộn tr&aacute;i v&agrave; kh&ocirc;ng phơi trực tiếp dưới &aacute;nh nắng mặt trời</p>\r\n', 135000, '2021-11-30 21:17:42', '2021-12-11 21:17:42', 0, 0),
('3506', '1173', 'Giày mlb nam ', 'giay11638283911.jpg', 300000, 0, 21, '<p>Gi&agrave;y Phản Quang Mẫu Mới 2021</p>\r\n\r\n<p>Gi&agrave;y Nam Tho&aacute;ng Kh&iacute;&nbsp;</p>\r\n\r\n<p>Gi&agrave;y Thể Thao Nam mới về.&nbsp;</p>\r\n\r\n<p>Kiểu d&aacute;ng th&iacute;ch hợp với nhiều độ tuổi v&agrave; dễ phối quần &aacute;o; c&oacute; thể đi chơi, đi l&agrave;m cũng như c&aacute;c hoạt động thể dục thể thao - Sản phẩm c&oacute; chất liệu đẹp, bền v&agrave; nhẹ đi rất &ecirc;m v&agrave; &ocirc;m ch&acirc;n!</p>\r\n\r\n<p>Size nam 39-44 -</p>\r\n\r\n<p>Shop cam kết b&aacute;n h&agrave;ng chất lượng tốt, đảm đ&uacute;ng như trong ảnh, kh&ocirc;ng đ&uacute;ng đổi trả kh&ocirc;ng mất ph&iacute;.</p>\r\n', '<p><a href=\"https://www.youtube.com/watch?v=6cthax1cNUI&amp;t=1s\">Tham khảo c&aacute;ch chon size tại đ&acirc;y</a></p>\r\n', 270000, '2021-11-30 21:49:30', '2022-01-08 21:49:30', 0, 1),
('3870', '1173', 'Quần jean nam ', 'quannam21638281981.jpg', 200000, 0, 51, '<p>Th&ocirc;ng tin sản phẩm&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t li&ecirc;̣u: QUẦN chất th&ocirc; mềm mặc 4 m&ugrave;a đều xinh - quay m&aacute;y giặt thoải m&aacute;i ko nhăn ko nh&agrave;u</p>\r\n\r\n<p>Ki&ecirc;̉u dáng: full h&igrave;nh hot nhất thị trường, d&aacute;ng quần short năng động mix match vs &aacute;o thun / &aacute;o nỉ cực xinh , đơn / đ&ocirc;i / nh&oacute;m mặc đều hợp nh&eacute;,</p>\r\n\r\n<p>NH&Agrave; EM L&Agrave;M CẠP THOẢI M&Aacute;I - C&Oacute; T&Uacute;I QUẦN TO RỘNG KH&Aacute;C BỌT VS THỊ TRƯỜNG NH&Eacute;.&nbsp;</p>\r\n\r\n<p>Form : d&agrave;i 48-50cm , rộng v2 55cm - 90cm (cực co gi&atilde;n ahii b&eacute;o gầy sướng nh&eacute;) , rộng v3 &lt;105cm đổ lại , tầm 65 70kg đổ lại mặc qu&aacute; hợp l&iacute; lu&ocirc;n</p>\r\n', '<p>Hướng dẫn sử dụng sản phẩm</p>\r\n\r\n<p>Lần đầu đem về chỉ xả nước lạnh rồi phơi kh&ocirc;</p>\r\n\r\n<p>Nhớ lộn tr&aacute;i &aacute;o khi giặt v&agrave; kh&ocirc;ng giặt ng&acirc;m</p>\r\n\r\n<p>Kh&ocirc;ng giặt m&aacute;y trong 2 tuần đầu</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng thuốc tẩy</p>\r\n\r\n<p>Khi phơi lộn tr&aacute;i v&agrave; kh&ocirc;ng phơi trực tiếp dưới &aacute;nh nắng mặt trời</p>\r\n', 170000, '2021-11-30 21:19:35', '2021-12-11 21:19:35', 0, 0),
('3933', '1173', 'Sơ mi form rộng nam ', 'set21638281523.jpg', 180000, 2, 24, '<p>&nbsp;Chi tiết &Aacute;o sơ mi Feaer - Chất liệu: Lụa Twill ch&eacute;o mềm mịn, si&ecirc;u m&aacute;t, thấm h&uacute;t mồ h&ocirc;i nhanh, cảm gi&aacute;c v&ocirc; c&ugrave;ng ấm &aacute;p v&agrave;o m&ugrave;a đ&ocirc;ng m&agrave; vẫn m&aacute;t mẻ v&agrave;o m&ugrave;a h&egrave;</p>\r\n\r\n<p>H&agrave;ng c&ograve;n nguy&ecirc;n tem m&aacute;c, cực sang chảnh - Họa tiết sọc trắng đen Kh&aacute;ch h&agrave;ng phối Jeans, Kaki, Short đều đẹp.</p>\r\n\r\n<p>Mặc dạo phố, du lịch hay đến c&aacute;c buổi tiệc đều mang đến sự tự tin đẳng cấp d&agrave;nh cho kh&aacute;ch h&agrave;ng.</p>\r\n', '<p>Bảng size mẫu : Size M: Nặng 55-64kg ; Cao 1m60-1m74</p>\r\n\r\n<p>Size L: Nặng 65-74kg ; Cao 1m75-1m79</p>\r\n\r\n<p>Size XL: Nặng 75-84kg ; Cao 1m78-1m83</p>\r\n\r\n<p>Size XXL: Nặng 85-94kg ; Cao 1m79-1m85</p>\r\n\r\n<p>Lưu &yacute;: Đ&acirc;y l&agrave; bảng th&ocirc;ng số chọn size cơ bản, t&ugrave;y thuộc v&agrave; v&agrave;o mỗi người m&agrave; c&oacute; thể +/- 1 Size</p>\r\n', 162000, '2021-11-30 21:11:58', '2021-11-30 21:11:58', 0, 0),
('4242', '1173', 'Áo thun tay lỡ form rộng Unisex Phi Hành Gia', 'ao_nam11637139712.jpg', 90000, 2, 33, '<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>Chất liệu: Cotton</p>\r\n\r\n<p>Cổ &aacute;o: Cổ tr&ograve;n</p>\r\n\r\n<p>Mẫu: Kh&aacute;c, Trơn, In</p>\r\n\r\n<p>M&ugrave;a: Bốn M&ugrave;a</p>\r\n\r\n<p>Chiều d&agrave;i tay &aacute;o: D&agrave;i 3/4</p>\r\n\r\n<p>Phong c&aacute;ch: Thể thao, Cơ bản, H&agrave;n Quốc, Đường phố, C&ocirc;ng sở</p>\r\n\r\n<p>Chiều d&agrave;i &aacute;o: D&agrave;i</p>\r\n\r\n<p>D&aacute;ng kiểu &aacute;o: Rộng</p>\r\n\r\n<p>Kho h&agrave;ng: H&agrave; nội</p>\r\n\r\n<p>Gửi từ: Quận Nam Từ Li&ecirc;m, H&agrave; Nội</p>\r\n', '<p>- T&ecirc;n sản phẩm: &Aacute;o thun b&ograve; sữa form rộng tay lỡ Unisex</p>\r\n\r\n<p>- Xuất sứ: Việt Nam</p>\r\n\r\n<p>- Chất liệu: cotton D&Agrave;Y MỀM MỊN M&Aacute;T kh&ocirc;ng x&ugrave; l&ocirc;ng. Form &aacute;o rộng chuẩn TAY LỠ UNISEX cực đẹp.</p>\r\n\r\n<p>- Size &aacute;o: FREESIZE form rộng</p>\r\n\r\n<p>- Chiều d&agrave;i &aacute;o: 72cm - Chiều rộng &aacute;o: 55cm</p>\r\n\r\n<p>- Chiều d&agrave;i tay &aacute;o: 20cm - Từ 50-65KG (mặc rộng thoải m&aacute;i)</p>\r\n\r\n<p>- Từ 66-75KG (mặc rộng vừa).</p>\r\n', 90000, '2021-11-17 16:01:43', '2021-11-17 16:01:43', 0, 0),
('4702', '9868', 'Dây chuyền nam ', 'dc41638283246.jpg', 50000, 0, 44, '<p>K&iacute;ch thước sản phẩm: (Nếu kh&ocirc;ng c&oacute; k&iacute;ch thước, vui l&ograve;ng tham khảo chiều d&agrave;i hoặc kết quả đeo từ h&igrave;nh mẫu), đơn vị k&iacute;ch thước: cm</p>\r\n\r\n<p>M&agrave;u sắc: Bạc Chất liệu: Th&eacute;p titan</p>\r\n\r\n<p>K&iacute;ch thước: D&acirc;y chuyền chữ thập 48cm, d&acirc;y chuyền chữ nhật 62cm, d&acirc;y chuyền thẻ 72cm</p>\r\n\r\n<p>H&igrave;nh dạng / kiểu d&aacute;ng: D&acirc;y chuyền nhiều lớp</p>\r\n\r\n<p>C&aacute;c đặc điểm: d&acirc;y chuyền nhiều lớp phong c&aacute;ch hip-hop cho nam nữ</p>\r\n', '', 50000, '2021-11-30 21:40:43', '2021-12-11 21:40:43', 0, 0),
('5299', '1173', 'Đồ bộ nam hàn quốc ', 'dobo71638282353.jpg', 160000, 2, 25, '<p>Chất liệu: Thun lạnh co giản 4 chiều, thấm h&uacute;t mồ h&ocirc;i cực tốt, đứng l&ecirc;n ngồi xuống cực k&yacute; thoải m&aacute;i.</p>\r\n\r\n<p>Xuất xứ: Việt nam&nbsp;</p>\r\n\r\n<p>Một v&agrave;i mẹo nhỏ để sản phẩm được bền v&agrave; đẹp theo thời gian nh&eacute;:&nbsp;</p>\r\n\r\n<p>Tr&aacute;nh tiếp x&uacute;c trực tiếp với &aacute;nh nắng để sản phẩm được giữ m&agrave;u l&acirc;u hơn.&nbsp;</p>\r\n\r\n<p>Kh&ocirc;ng ch&agrave; mạnh bằng b&agrave;n chải.</p>\r\n\r\n<p>Giặt m&aacute;y hoặc giặt tay đều được nh&eacute; c&aacute;c bạn.</p>\r\n', '<p>Size: size M (40-55kg),</p>\r\n\r\n<p>size L( 55kg-68kg),</p>\r\n\r\n<p>size XXS (size em b&eacute; dưới 10kg - trường hơp kh&ocirc;ng vừa ở size n&agrave;y shop kh&ocirc;ng giải quyết khiếu nại)</p>\r\n', 152000, '2021-11-30 21:25:47', '2021-12-11 21:25:47', 0, 0),
('5472', '1173', 'Sơ mi xanh nam ', 'sominam101638280736.jpg', 200000, 0, 53, '<p>&nbsp;Chi tiết &Aacute;o sơ mi Feaer - Chất liệu: Lụa Twill ch&eacute;o mềm mịn, si&ecirc;u m&aacute;t, thấm h&uacute;t mồ h&ocirc;i nhanh, cảm gi&aacute;c v&ocirc; c&ugrave;ng ấm &aacute;p v&agrave;o m&ugrave;a đ&ocirc;ng m&agrave; vẫn m&aacute;t mẻ v&agrave;o m&ugrave;a h&egrave;</p>\r\n\r\n<p>H&agrave;ng c&ograve;n nguy&ecirc;n tem m&aacute;c, cực sang chảnh - Họa tiết sọc trắng đen Kh&aacute;ch h&agrave;ng phối Jeans, Kaki, Short đều đẹp.</p>\r\n\r\n<p>Mặc dạo phố, du lịch hay đến c&aacute;c buổi tiệc đều mang đến sự tự tin đẳng cấp d&agrave;nh cho kh&aacute;ch h&agrave;ng.</p>\r\n', '<p>Bảng size mẫu : Size M: Nặng 55-64kg ; Cao 1m60-1m74</p>\r\n\r\n<p>Size L: Nặng 65-74kg ; Cao 1m75-1m79</p>\r\n\r\n<p>Size XL: Nặng 75-84kg ; Cao 1m78-1m83</p>\r\n\r\n<p>Size XXL: Nặng 85-94kg ; Cao 1m79-1m85</p>\r\n\r\n<p>Lưu &yacute;: Đ&acirc;y l&agrave; bảng th&ocirc;ng số chọn size cơ bản, t&ugrave;y thuộc v&agrave; v&agrave;o mỗi người m&agrave; c&oacute; thể +/- 1 Size</p>\r\n', 180000, '2021-11-30 20:58:46', '2022-01-08 20:58:46', 0, 1),
('5780', '1173', 'Sơ mi trắng nam ', 'sominam21638278774.jpg', 180000, 1, 35, '<p>H&agrave;ng Fullbox cực sang chảnh</p>\r\n\r\n<p>Chất liệu: Vải lụa th&aacute;i cao cấp, vải d&agrave;y, vải mềm mịn thấm h&uacute;t mồ h&ocirc;i tốt, kh&ocirc;ng phai m&agrave;u,kh&ocirc;ng nhăn. Đường may tinh tế, tỉ mỉ Thiết kế hiện đại, trẻ trung dễ kết hợp c&aacute;c trang phục kh&aacute;c nhau: quần jean, quần &acirc;u, gi&agrave;y t&acirc;y, g&igrave;&agrave;y thể thao. D&ugrave; l&agrave; đi l&agrave;m đi chơi hay đi dự tiệc đều đẹp v&agrave; sang trọng Mẫu sơ mi họa tiết kẻ ở cổ v&agrave; tay &aacute;o tạo điểm nhấn cho người mặc lịch l&atilde;m v&agrave; sang trọng</p>\r\n\r\n<p>.</p>\r\n', '<p>HƯỚNG DẪN CHỌN SIZE &Aacute;O SƠ MI NAM</p>\r\n\r\n<p>Size M từ 48-55kg, dưới 1m65</p>\r\n\r\n<p>Size L từ 55- 65kg, từ 1m65 - 1m72</p>\r\n\r\n<p>Size XL từ 65-72kg, từ 1m72 - 1m78</p>\r\n\r\n<p>Size XXL từ 72-80kg, từ 1m78- 1m85</p>\r\n\r\n<p>Bụng to th&igrave; tăng th&ecirc;m 1 size nh&eacute; Lưu &yacute;: th&ocirc;ng số c&aacute;c số đo c&oacute; thể bị ch&ecirc;nh lệch 1-2cm</p>\r\n', 162000, '2021-11-30 20:25:47', '2021-12-11 20:25:47', 0, 0),
('5781', '1173', 'Quần áo rồng lộn ', 'dobo51638282299.jpg', 70000, 1, 61, '<p>Chất liệu: Thun lạnh co giản 4 chiều, thấm h&uacute;t mồ h&ocirc;i cực tốt, đứng l&ecirc;n ngồi xuống cực k&yacute; thoải m&aacute;i.</p>\r\n\r\n<p>Xuất xứ: Việt nam&nbsp;</p>\r\n\r\n<p>Một v&agrave;i mẹo nhỏ để sản phẩm được bền v&agrave; đẹp theo thời gian nh&eacute;:&nbsp;</p>\r\n\r\n<p>Tr&aacute;nh tiếp x&uacute;c trực tiếp với &aacute;nh nắng để sản phẩm được giữ m&agrave;u l&acirc;u hơn.&nbsp;</p>\r\n\r\n<p>Kh&ocirc;ng ch&agrave; mạnh bằng b&agrave;n chải.</p>\r\n\r\n<p>Giặt m&aacute;y hoặc giặt tay đều được nh&eacute; c&aacute;c bạn.</p>\r\n', '<p>Size: size M (40-55kg),</p>\r\n\r\n<p>size L( 55kg-68kg),</p>\r\n\r\n<p>size XXS (size em b&eacute; dưới 10kg - trường hơp kh&ocirc;ng vừa ở size n&agrave;y shop kh&ocirc;ng giải quyết khiếu nại)</p>\r\n', 66500, '2021-11-30 21:24:53', '2021-12-11 21:24:53', 0, 0),
('5984', '1173', 'Set đồ nam mùa hè ', 'dobo21638282232.jpg', 150000, 1, 52, '<p>Chất liệu: Thun lạnh co giản 4 chiều, thấm h&uacute;t mồ h&ocirc;i cực tốt, đứng l&ecirc;n ngồi xuống cực k&yacute; thoải m&aacute;i.</p>\r\n\r\n<p>Xuất xứ: Việt nam&nbsp;</p>\r\n\r\n<p>Một v&agrave;i mẹo nhỏ để sản phẩm được bền v&agrave; đẹp theo thời gian nh&eacute;:&nbsp;</p>\r\n\r\n<p>Tr&aacute;nh tiếp x&uacute;c trực tiếp với &aacute;nh nắng để sản phẩm được giữ m&agrave;u l&acirc;u hơn.&nbsp;</p>\r\n\r\n<p>Kh&ocirc;ng ch&agrave; mạnh bằng b&agrave;n chải.</p>\r\n\r\n<p>Giặt m&aacute;y hoặc giặt tay đều được nh&eacute; c&aacute;c bạn.</p>\r\n', '<p>Size: size M (40-55kg),</p>\r\n\r\n<p>size L( 55kg-68kg),</p>\r\n\r\n<p>size XXS (size em b&eacute; dưới 10kg - trường hơp kh&ocirc;ng vừa ở size n&agrave;y shop kh&ocirc;ng giải quyết khiếu nại)</p>\r\n', 135000, '2021-11-30 21:23:46', '2021-12-11 21:23:46', 0, 0),
('6146', '1173', 'Dây chuyền hình chữ thập ', 'dc21638283160.jpg', 60000, 0, 63, '<p>K&iacute;ch thước sản phẩm: (Nếu kh&ocirc;ng c&oacute; k&iacute;ch thước, vui l&ograve;ng tham khảo chiều d&agrave;i hoặc kết quả đeo từ h&igrave;nh mẫu), đơn vị k&iacute;ch thước: cm</p>\r\n\r\n<p>M&agrave;u sắc: Bạc Chất liệu: Th&eacute;p titan</p>\r\n\r\n<p>K&iacute;ch thước: D&acirc;y chuyền chữ thập 48cm, d&acirc;y chuyền chữ nhật 62cm, d&acirc;y chuyền thẻ 72cm</p>\r\n\r\n<p>H&igrave;nh dạng / kiểu d&aacute;ng: D&acirc;y chuyền nhiều lớp</p>\r\n\r\n<p>C&aacute;c đặc điểm: d&acirc;y chuyền nhiều lớp phong c&aacute;ch hip-hop cho nam nữ</p>\r\n', '', 48000, '2021-11-30 21:39:08', '2021-11-30 21:39:08', 0, 0),
('6230', '2992', 'Quần hoa cúc trắng ', 'quannam121638281787.jpg', 60000, 0, 33, '<p>&nbsp;Th&ocirc;ng tin sản phẩm&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t li&ecirc;̣u: QUẦN chất th&ocirc; mềm mặc 4 m&ugrave;a đều xinh - quay m&aacute;y giặt thoải m&aacute;i ko nhăn ko nh&agrave;u</p>\r\n\r\n<p>Ki&ecirc;̉u dáng: full h&igrave;nh hot nhất thị trường, d&aacute;ng quần short năng động mix match vs &aacute;o thun / &aacute;o nỉ cực xinh , đơn / đ&ocirc;i / nh&oacute;m mặc đều hợp nh&eacute;,</p>\r\n\r\n<p>NH&Agrave; EM L&Agrave;M CẠP THOẢI M&Aacute;I - C&Oacute; T&Uacute;I QUẦN TO RỘNG KH&Aacute;C BỌT VS THỊ TRƯỜNG NH&Eacute;.&nbsp;</p>\r\n\r\n<p>Form : d&agrave;i 48-50cm , rộng v2 55cm - 90cm (cực co gi&atilde;n ahii b&eacute;o gầy sướng nh&eacute;) , rộng v3 &lt;105cm đổ lại , tầm 65 70kg đổ lại mặc qu&aacute; hợp l&iacute; lu&ocirc;n</p>\r\n', '<p>Hướng dẫn sử dụng sản phẩm</p>\r\n\r\n<p>Lần đầu đem về chỉ xả nước lạnh rồi phơi kh&ocirc;</p>\r\n\r\n<p>Nhớ lộn tr&aacute;i &aacute;o khi giặt v&agrave; kh&ocirc;ng giặt ng&acirc;m</p>\r\n\r\n<p>Kh&ocirc;ng giặt m&aacute;y trong 2 tuần đầu</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng thuốc tẩy</p>\r\n\r\n<p>Khi phơi lộn tr&aacute;i v&agrave; kh&ocirc;ng phơi trực tiếp dưới &aacute;nh nắng mặt trời</p>\r\n', 54000, '2021-11-30 21:16:50', '2021-12-11 21:16:50', 0, 0),
('6239', '1173', 'Sơ mi xám ', 'sominam71638279256.jpg', 150000, 0, 22, '<p>&nbsp;Chi tiết &Aacute;o sơ mi Feaer - Chất liệu: Lụa Twill ch&eacute;o mềm mịn, si&ecirc;u m&aacute;t, thấm h&uacute;t mồ h&ocirc;i nhanh, cảm gi&aacute;c v&ocirc; c&ugrave;ng ấm &aacute;p v&agrave;o m&ugrave;a đ&ocirc;ng m&agrave; vẫn m&aacute;t mẻ v&agrave;o m&ugrave;a h&egrave;</p>\r\n\r\n<p>H&agrave;ng c&ograve;n nguy&ecirc;n tem m&aacute;c, cực sang chảnh - Họa tiết sọc trắng đen Kh&aacute;ch h&agrave;ng phối Jeans, Kaki, Short đều đẹp.</p>\r\n\r\n<p>Mặc dạo phố, du lịch hay đến c&aacute;c buổi tiệc đều mang đến sự tự tin đẳng cấp d&agrave;nh cho kh&aacute;ch h&agrave;ng.</p>\r\n', '<p>Bảng size mẫu : Size M: Nặng 55-64kg ; Cao 1m60-1m74</p>\r\n\r\n<p>Size L: Nặng 65-74kg ; Cao 1m75-1m79</p>\r\n\r\n<p>Size XL: Nặng 75-84kg ; Cao 1m78-1m83</p>\r\n\r\n<p>Size XXL: Nặng 85-94kg ; Cao 1m79-1m85</p>\r\n\r\n<p>Lưu &yacute;: Đ&acirc;y l&agrave; bảng th&ocirc;ng số chọn size cơ bản, t&ugrave;y thuộc v&agrave; v&agrave;o mỗi người m&agrave; c&oacute; thể +/- 1 Size</p>\r\n', 135000, '2021-11-30 20:33:35', '2021-12-10 20:33:35', 0, 0),
('6365', '1173', 'Dây chuyền họa tiết bông hoa ', 'dc51638283289.jpg', 60000, 0, 43, '<p>K&iacute;ch thước sản phẩm: (Nếu kh&ocirc;ng c&oacute; k&iacute;ch thước, vui l&ograve;ng tham khảo chiều d&agrave;i hoặc kết quả đeo từ h&igrave;nh mẫu), đơn vị k&iacute;ch thước: cm</p>\r\n\r\n<p>M&agrave;u sắc: Bạc Chất liệu: Th&eacute;p titan</p>\r\n\r\n<p>K&iacute;ch thước: D&acirc;y chuyền chữ thập 48cm, d&acirc;y chuyền chữ nhật 62cm, d&acirc;y chuyền thẻ 72cm</p>\r\n\r\n<p>H&igrave;nh dạng / kiểu d&aacute;ng: D&acirc;y chuyền nhiều lớp</p>\r\n\r\n<p>C&aacute;c đặc điểm: d&acirc;y chuyền nhiều lớp phong c&aacute;ch hip-hop cho nam nữ</p>\r\n', '', 54000, '2021-11-30 21:41:19', '2021-12-11 21:41:19', 0, 1),
('6755', '1173', 'Giày air force 1 ', 'giaynam71638283899.jpg', 250000, 0, 25, '<p>Chi tiết</p>\r\n\r\n<p>Gi&agrave;y Phản Quang Mẫu Mới 2021</p>\r\n\r\n<p>Gi&agrave;y Nam Tho&aacute;ng Kh&iacute;&nbsp;</p>\r\n\r\n<p>Gi&agrave;y Thể Thao Nam mới về.&nbsp;</p>\r\n\r\n<p>Kiểu d&aacute;ng th&iacute;ch hợp với nhiều độ tuổi v&agrave; dễ phối quần &aacute;o; c&oacute; thể đi chơi, đi l&agrave;m cũng như c&aacute;c hoạt động thể dục thể thao - Sản phẩm c&oacute; chất liệu đẹp, bền v&agrave; nhẹ đi rất &ecirc;m v&agrave; &ocirc;m ch&acirc;n!</p>\r\n\r\n<p>Size nam 39-44 -</p>\r\n\r\n<p>Shop cam kết b&aacute;n h&agrave;ng chất lượng tốt, đảm đ&uacute;ng như trong ảnh, kh&ocirc;ng đ&uacute;ng đổi trả kh&ocirc;ng mất ph&iacute;.</p>\r\n', '<p><a href=\"https://www.youtube.com/watch?v=6cthax1cNUI&amp;t=1s\">Tham khảo c&aacute;ch chon size tại đ&acirc;y</a></p>\r\n', 225000, '2021-11-30 21:51:21', '2022-01-08 21:51:21', 0, 0),
('6761', '1173', 'Sơ mi khoác ngoài ', 'sominam141638281463.jpg', 120000, 0, 42, '<p>Chi tiết</p>\r\n\r\n<p>Ch&acirc;t liệu: Chất nỉ tricos d&agrave;y, ko bai x&ugrave;</p>\r\n\r\n<p>M&agrave;u sắc: Đen</p>\r\n\r\n<p>K&iacute;ch thước: FreeSize ph&ugrave; hợp từ 65kg trở lại</p>\r\n\r\n<p>Xuất xứ: Việt Nam</p>\r\n\r\n<p>Form d&aacute;ng chuẩn mẫu, thiết kế trẻ trung c&aacute; t&iacute;nh, năng động, chuẩn style h&agrave;n quốc, &aacute;o cả nam nữ đều mặc được lu&ocirc;n nha</p>\r\n', '<p>Bảng size mẫu : Size M: Nặng 55-64kg ; Cao 1m60-1m74</p>\r\n\r\n<p>Size L: Nặng 65-74kg ; Cao 1m75-1m79</p>\r\n\r\n<p>Size XL: Nặng 75-84kg ; Cao 1m78-1m83</p>\r\n\r\n<p>Size XXL: Nặng 85-94kg ; Cao 1m79-1m85</p>\r\n\r\n<p>Lưu &yacute;: Đ&acirc;y l&agrave; bảng th&ocirc;ng số chọn size cơ bản, t&ugrave;y thuộc v&agrave; v&agrave;o mỗi người m&agrave; c&oacute; thể +/- 1 Size</p>\r\n', 120000, '2021-11-30 21:10:53', '2021-11-30 21:10:53', 0, 0),
('7231', '1173', 'Áo polo nam tay dài phong cách trẻ trung basic', 'ao_thun_nam1636803963.jpg', 120000, 1, 66, '<ul>\r\n	<li><strong>Chất liệu</strong>: Cotton</li>\r\n	<li><strong>Mẫu</strong>: Trơn</li>\r\n	<li><strong>Chiều d&agrave;i tay &aacute;o</strong>: D&agrave;i tay</li>\r\n	<li><strong>Phong c&aacute;ch</strong>: Cơ bản</li>\r\n	<li><strong>Phong c&aacute;ch</strong>: Thể thao</li>\r\n	<li><strong>Phong c&aacute;ch</strong>: H&agrave;n Quốc</li>\r\n	<li><strong>D&aacute;ng kiểu &aacute;o</strong>: Cổ điển</li>\r\n</ul>\r\n', '<p>- &Aacute;o polo nam tay d&agrave;i kiểu d&aacute;ng basic</p>\r\n\r\n<p>-&Aacute;o thu đ&ocirc;ng ph&ugrave; hợp với thời tiết se lạnh, m&ugrave;a đ&ocirc;ng c&oacute; thể khoắc th&ecirc;m &aacute;o khoắc trẻ trung năng động</p>\r\n\r\n<p>- Thiết kế: thiết kế theo form chuẩn mới nhất, ph&ugrave; hợp với d&aacute;ng người Việt Nam</p>\r\n\r\n<p>- Kiểu d&aacute;ng: Theo d&aacute;ng thể thao, kh&ocirc;ng bị mất form khi giặt nhiều lần</p>\r\n\r\n<p>- Chất liệu: Thun cao cấp, co gi&atilde;n, thoải m&aacute;i khi vận động</p>\r\n\r\n<p>- Đặc biệt: mềm mịn, vải nhẹ, tho&aacute;ng khi v&agrave; nhanh kh&ocirc; khi giặt</p>\r\n\r\n<p>- Mặc đi tập gym, chạy bộ, coffe, du lịch hoặc mặc thường ng&agrave;y đều ổn</p>\r\n\r\n<p>- M&agrave;u sắc: Đen, Trắng, xanh than, ghi, x&aacute;m cực dễ phối đồ</p>\r\n\r\n<p>- Nơi sản xuất: Việt Nam</p>\r\n\r\n<p>Hướng dẫn chọn size &aacute;o thun nam tay d&agrave;i :</p>\r\n\r\n<p>- M (45-55Kg, &lt;1m67)</p>\r\n\r\n<p>- L (55-65Kg, &lt;1m73</p>\r\n\r\n<p>&ndash;XL (65-75Kg, &lt;1m77)</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch nếu th&iacute;ch mặc form thoải m&aacute;i n&ecirc;n lấy tăng 1 - 2 size Lưu &yacute;: - Nếu chưa chắc chắn về chọn size sản phẩm - Nếu kh&aacute;ch form người kh&ocirc;ng c&acirc;n đối (B&eacute;o, gầy, thấp...) - Nếu kh&aacute;ch th&iacute;ch mặc &ocirc;m body hoặc mặc rộng thoải m&aacute;i INBOX trực tiếp cho shop để được tư vấn size nh&eacute;</p>\r\n', 108000, '2021-11-13 18:45:53', '2021-11-14 18:45:53', 0, 1),
('7431', '1173', 'Áo khoác họa tiết lửa ', 'k11638280853.jpg', 250000, 2, 55, '<p>Ch&acirc;t liệu: Chất nỉ tricos d&agrave;y, ko bai x&ugrave;</p>\r\n\r\n<p>???? M&agrave;u sắc: Đen</p>\r\n\r\n<p>???? K&iacute;ch thước: FreeSize ph&ugrave; hợp từ 65kg trở lại</p>\r\n\r\n<p>???? Xuất xứ: Việt Nam</p>\r\n\r\n<p>Form d&aacute;ng chuẩn mẫu, thiết kế trẻ trung c&aacute; t&iacute;nh, năng động, chuẩn style h&agrave;n quốc, &aacute;o cả nam nữ đều mặc được lu&ocirc;n nha</p>\r\n', '<p>Bảng size mẫu : Size M: Nặng 55-64kg ; Cao 1m60-1m74</p>\r\n\r\n<p>Size L: Nặng 65-74kg ; Cao 1m75-1m79</p>\r\n\r\n<p>Size XL: Nặng 75-84kg ; Cao 1m78-1m83</p>\r\n\r\n<p>Size XXL: Nặng 85-94kg ; Cao 1m79-1m85</p>\r\n\r\n<p>Lưu &yacute;: Đ&acirc;y l&agrave; bảng th&ocirc;ng số chọn size cơ bản, t&ugrave;y thuộc v&agrave; v&agrave;o mỗi người m&agrave; c&oacute; thể +/- 1 Size</p>\r\n', 225000, '2021-11-30 21:00:47', '2021-12-11 21:00:47', 0, 0),
('8173', '1173', 'Quần đùi hoa quả sơn ', 'quannam81638281656.jpg', 70000, 1, 41, '<p>1. Th&ocirc;ng tin sản phẩm&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t li&ecirc;̣u: QUẦN chất th&ocirc; mềm mặc 4 m&ugrave;a đều xinh - quay m&aacute;y giặt thoải m&aacute;i ko nhăn ko nh&agrave;u</p>\r\n\r\n<p>Ki&ecirc;̉u dáng: full h&igrave;nh hot nhất thị trường, d&aacute;ng quần short năng động mix match vs &aacute;o thun / &aacute;o nỉ cực xinh , đơn / đ&ocirc;i / nh&oacute;m mặc đều hợp nh&eacute;,</p>\r\n\r\n<p>NH&Agrave; EM L&Agrave;M CẠP THOẢI M&Aacute;I - C&Oacute; T&Uacute;I QUẦN TO RỘNG KH&Aacute;C BỌT VS THỊ TRƯỜNG NH&Eacute;.&nbsp;</p>\r\n\r\n<p>Form : d&agrave;i 48-50cm , rộng v2 55cm - 90cm (cực co gi&atilde;n ahii b&eacute;o gầy sướng nh&eacute;) , rộng v3 &lt;105cm đổ lại , tầm 65 70kg đổ lại mặc qu&aacute; hợp l&iacute; lu&ocirc;n</p>\r\n', '<p>Hướng dẫn sử dụng sản phẩm</p>\r\n\r\n<p>Lần đầu đem về chỉ xả nước lạnh rồi phơi kh&ocirc;</p>\r\n\r\n<p>Nhớ lộn tr&aacute;i &aacute;o khi giặt v&agrave; kh&ocirc;ng giặt ng&acirc;m</p>\r\n\r\n<p>Kh&ocirc;ng giặt m&aacute;y trong 2 tuần đầu</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng thuốc tẩy</p>\r\n\r\n<p>Khi phơi lộn tr&aacute;i v&agrave; kh&ocirc;ng phơi trực tiếp dưới &aacute;nh nắng mặt trời</p>\r\n', 63000, '2021-11-30 21:14:10', '2021-12-11 21:14:10', 0, 0),
('8181', '1173', 'Dây chuyền máy ảnh ', 'dc81638283217.jpg', 60000, 0, 44, '<p>K&iacute;ch thước sản phẩm: (Nếu kh&ocirc;ng c&oacute; k&iacute;ch thước, vui l&ograve;ng tham khảo chiều d&agrave;i hoặc kết quả đeo từ h&igrave;nh mẫu), đơn vị k&iacute;ch thước: cm</p>\r\n\r\n<p>M&agrave;u sắc: Bạc Chất liệu: Th&eacute;p titan</p>\r\n\r\n<p>K&iacute;ch thước: D&acirc;y chuyền chữ thập 48cm, d&acirc;y chuyền chữ nhật 62cm, d&acirc;y chuyền thẻ 72cm</p>\r\n\r\n<p>H&igrave;nh dạng / kiểu d&aacute;ng: D&acirc;y chuyền nhiều lớp</p>\r\n\r\n<p>C&aacute;c đặc điểm: d&acirc;y chuyền nhiều lớp phong c&aacute;ch hip-hop cho nam nữ</p>\r\n', '', 51000, '2021-11-30 21:40:08', '2021-12-11 21:40:08', 0, 0),
('8372', '1173', 'Áo phong nam', 'ao_phong_nam1636799596.jpg', 38000, 1, 19, '<p><strong>Chiều d&agrave;i tay &aacute;o</strong> : Tay ngắn</p>\r\n\r\n<p>&diams; &Aacute;o ph&ocirc;ng nam BETTER / chất tici</p>\r\n\r\n<p>&diams; Nam &lt; 65kg đổ lại ( tuỳ chiều cao )</p>\r\n\r\n<p>&diams; Hầu như tất cả c&aacute;c mẫu đ&atilde; k&egrave;m h&igrave;nh ảnh thật trải s&agrave;n rồi kh&aacute;ch nh&eacute; :</p>\r\n\r\n<p>&diams; Đại l&yacute; &ocirc;m l&ocirc;,t&aacute;ch l&ocirc; ibox số lượng giảm mạnh</p>\r\n\r\n<p>&diams; Xưởng chuy&ecirc;n sỉ lẻ quần &aacute;o thời trang 4 m&ugrave;a</p>\r\n\r\n<p>&diams; Gi&aacute; tại xưởng kh&ocirc;ng qua trung gian</p>\r\n\r\n<p>&diams; Mẫu m&atilde; đa dạng hợp thời trang</p>\r\n\r\n<p>&diams; Cảm ơn qu&yacute; kh&aacute;ch đ&atilde; lu&ocirc;n tin tưởng v&agrave; ủng hộ sản phẩm của HT Shop</p>\r\n\r\n<p>&diams; C&oacute; việc gấp LH :0856775530</p>\r\n', '<p>&Aacute;o phong nam BETTER / chất tici, d&agrave;nh cho nam dưới 65kg ( t&ugrave;y chiều cao), h&igrave;nh ảnh được chụp tại shop v&agrave; uy t&iacute;n&nbsp;</p>\r\n', 38000, '2021-11-13 17:32:38', '2021-11-13 17:32:38', 0, 1),
('8487', '1173', 'Sơ mi họa tiết  ', 'sominam91638279049.jpg', 200000, 2, 41, '<p>???? Chi tiết &Aacute;o sơ mi Feaer - Chất liệu: Lụa Twill ch&eacute;o mềm mịn, si&ecirc;u m&aacute;t, thấm h&uacute;t mồ h&ocirc;i nhanh, cảm gi&aacute;c v&ocirc; c&ugrave;ng ấm &aacute;p v&agrave;o m&ugrave;a đ&ocirc;ng m&agrave; vẫn m&aacute;t mẻ v&agrave;o m&ugrave;a h&egrave;</p>\r\n\r\n<p>- H&agrave;ng c&ograve;n nguy&ecirc;n tem m&aacute;c, cực sang chảnh - Họa tiết sọc trắng đen Kh&aacute;ch h&agrave;ng phối Jeans, Kaki, Short đều đẹp.</p>\r\n\r\n<p>Mặc dạo phố, du lịch hay đến c&aacute;c buổi tiệc đều mang đến sự tự tin đẳng cấp d&agrave;nh cho kh&aacute;ch h&agrave;ng.</p>\r\n', '<p>Bảng size mẫu : Size M: Nặng 55-64kg ; Cao 1m60-1m74</p>\r\n\r\n<p>Size L: Nặng 65-74kg ; Cao 1m75-1m79</p>\r\n\r\n<p>Size XL: Nặng 75-84kg ; Cao 1m78-1m83</p>\r\n\r\n<p>Size XXL: Nặng 85-94kg ; Cao 1m79-1m85</p>\r\n\r\n<p>Lưu &yacute;: Đ&acirc;y l&agrave; bảng th&ocirc;ng số chọn size cơ bản, t&ugrave;y thuộc v&agrave; v&agrave;o mỗi người m&agrave; c&oacute; thể +/- 1 Size</p>\r\n', 180000, '2021-11-30 20:30:34', '2021-12-11 20:30:34', 0, 0),
('8652', '1173', 'Quần sort xanh ngọc ', 'quannam61638281716.jpg', 100000, 0, 25, '<p>Th&ocirc;ng tin sản phẩm&nbsp;</p>\r\n\r\n<p>Ch&acirc;́t li&ecirc;̣u: QUẦN chất th&ocirc; mềm mặc 4 m&ugrave;a đều xinh - quay m&aacute;y giặt thoải m&aacute;i ko nhăn ko nh&agrave;u</p>\r\n\r\n<p>Ki&ecirc;̉u dáng: full h&igrave;nh hot nhất thị trường, d&aacute;ng quần short năng động mix match vs &aacute;o thun / &aacute;o nỉ cực xinh , đơn / đ&ocirc;i / nh&oacute;m mặc đều hợp nh&eacute;,</p>\r\n\r\n<p>NH&Agrave; EM L&Agrave;M CẠP THOẢI M&Aacute;I - C&Oacute; T&Uacute;I QUẦN TO RỘNG KH&Aacute;C BỌT VS THỊ TRƯỜNG NH&Eacute;.&nbsp;</p>\r\n\r\n<p>Form : d&agrave;i 48-50cm , rộng v2 55cm - 90cm (cực co gi&atilde;n ahii b&eacute;o gầy sướng nh&eacute;) , rộng v3 &lt;105cm đổ lại , tầm 65 70kg đổ lại mặc qu&aacute; hợp l&iacute; lu&ocirc;n</p>\r\n', '<p>Hướng dẫn sử dụng sản phẩm</p>\r\n\r\n<p>Lần đầu đem về chỉ xả nước lạnh rồi phơi kh&ocirc;</p>\r\n\r\n<p>Nhớ lộn tr&aacute;i &aacute;o khi giặt v&agrave; kh&ocirc;ng giặt ng&acirc;m</p>\r\n\r\n<p>Kh&ocirc;ng giặt m&aacute;y trong 2 tuần đầu</p>\r\n\r\n<p>Kh&ocirc;ng sử dụng thuốc tẩy</p>\r\n\r\n<p>Khi phơi lộn tr&aacute;i v&agrave; kh&ocirc;ng phơi trực tiếp dưới &aacute;nh nắng mặt trời</p>\r\n', 90000, '2021-11-30 21:15:46', '2021-12-11 21:15:46', 0, 0),
('8853', '1173', 'Bộ đồ gucci ', 'dobo11638282401.jpg', 150000, 0, 34, '<p>Chất liệu: Thun lạnh co giản 4 chiều, thấm h&uacute;t mồ h&ocirc;i cực tốt, đứng l&ecirc;n ngồi xuống cực k&yacute; thoải m&aacute;i.</p>\r\n\r\n<p>Xuất xứ: Việt nam&nbsp;</p>\r\n\r\n<p>Một v&agrave;i mẹo nhỏ để sản phẩm được bền v&agrave; đẹp theo thời gian nh&eacute;:&nbsp;</p>\r\n\r\n<p>Tr&aacute;nh tiếp x&uacute;c trực tiếp với &aacute;nh nắng để sản phẩm được giữ m&agrave;u l&acirc;u hơn.&nbsp;</p>\r\n\r\n<p>Kh&ocirc;ng ch&agrave; mạnh bằng b&agrave;n chải.</p>\r\n\r\n<p>Giặt m&aacute;y hoặc giặt tay đều được nh&eacute; c&aacute;c bạn.</p>\r\n', '<p>Size: size M (40-55kg),</p>\r\n\r\n<p>size L( 55kg-68kg),</p>\r\n\r\n<p>size XXS (size em b&eacute; dưới 10kg - trường hơp kh&ocirc;ng vừa ở size n&agrave;y shop kh&ocirc;ng giải quyết khiếu nại)</p>\r\n', 135000, '2021-11-30 21:26:36', '2021-12-11 21:26:36', 0, 0),
('9518', '1173', 'Sơ mi đen ', 'sominam51638279344.jpg', 230000, 1, 64, '<p>Chi tiết &Aacute;o sơ mi Feaer - Chất liệu: Lụa Twill ch&eacute;o mềm mịn, si&ecirc;u m&aacute;t, thấm h&uacute;t mồ h&ocirc;i nhanh, cảm gi&aacute;c v&ocirc; c&ugrave;ng ấm &aacute;p v&agrave;o m&ugrave;a đ&ocirc;ng m&agrave; vẫn m&aacute;t mẻ v&agrave;o m&ugrave;a h&egrave;</p>\r\n\r\n<p>- H&agrave;ng c&ograve;n nguy&ecirc;n tem m&aacute;c, cực sang chảnh - Họa tiết sọc trắng đen Kh&aacute;ch h&agrave;ng phối Jeans, Kaki, Short đều đẹp.</p>\r\n\r\n<p>Mặc dạo phố, du lịch hay đến c&aacute;c buổi tiệc đều mang đến sự tự tin đẳng cấp d&agrave;nh cho kh&aacute;ch h&agrave;ng.</p>\r\n', '<p>Bảng size mẫu : Size M: Nặng 55-64kg ; Cao 1m60-1m74</p>\r\n\r\n<p>Size L: Nặng 65-74kg ; Cao 1m75-1m79</p>\r\n\r\n<p>Size XL: Nặng 75-84kg ; Cao 1m78-1m83</p>\r\n\r\n<p>Size XXL: Nặng 85-94kg ; Cao 1m79-1m85</p>\r\n\r\n<p>Lưu &yacute;: Đ&acirc;y l&agrave; bảng th&ocirc;ng số chọn size cơ bản, t&ugrave;y thuộc v&agrave; v&agrave;o mỗi người m&agrave; c&oacute; thể +/- 1 Size</p>\r\n', 207000, '2021-11-30 20:35:32', '2021-12-08 20:35:32', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`macthd`),
  ADD KEY `mahd` (`mahd`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `gop_y`
--
ALTER TABLE `gop_y`
  ADD PRIMARY KEY (`magy`),
  ADD KEY `masp` (`masp`,`makh`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `makh` (`makh`,`manv`),
  ADD KEY `manv` (`manv`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`malsp`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`mand`),
  ADD KEY `makh` (`makh`,`idadmin`,`manv`),
  ADD KEY `manv` (`manv`),
  ADD KEY `idadmin` (`idadmin`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `malsv` (`malsp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  MODIFY `macthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `san_pham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`mahd`) REFERENCES `hoa_don` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gop_y`
--
ALTER TABLE `gop_y`
  ADD CONSTRAINT `gop_y_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `san_pham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gop_y_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `khach_hang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khach_hang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`manv`) REFERENCES `nhan_vien` (`manv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `nguoi_dung_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhan_vien` (`manv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nguoi_dung_ibfk_2` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nguoi_dung_ibfk_3` FOREIGN KEY (`makh`) REFERENCES `khach_hang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`malsp`) REFERENCES `loai_san_pham` (`malsp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
