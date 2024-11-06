-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2024 lúc 09:18 AM
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
-- Cơ sở dữ liệu: `banhangdientu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Linh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`baiviet_id`, `tenbaiviet`, `tomtat`, `noidung`, `danhmuctin_id`, `baiviet_image`) VALUES
(6, 'Bài 1: Kiến thức laptop', 'Các phím tắt thông dụng\r\nViệc biết sử dụng các phím tắt sẽ giúp người dùng thao tác dễ dàng và tiện lợi hơn rất nhiều trên laptop. Và sau đây là một vài tổ hợp phím tắt thông dụng cho người thường xuyên dùng laptop:\r\n\r\n- Ctrl + V: dùng để dán.\r\n\r\n- Ctrl + C: dùng để copy.\r\n\r\n- Ctrl + A: dùng để chọn tất cả.\r\n\r\n- Ctrl + S: dùng để lưu trữ.\r\n\r\n- Ctrl + X: dùng để cắt một đoạn thông tin hoặc tệp.\r\n\r\n- Ctrl + Z: dùng để quay lại thao tác trước đó.\r\n\r\n- Ctrl + Esc: dùng để mở Start Menu.\r\n\r\n- Alt + F4: dùng để đóng chương trình.\r\n\r\n- Alt + Tab: dùng để chuyển đổi giữa các chương trình đang chạy.\r\n\r\n- Delete: dùng để xóa từ hoặc tập tin.\r\n\r\n- Shift + Delete: dùng để xóa vĩnh viễn tập tin, không lưu vào thùng rác.\r\n\r\n- F1: dùng để mở trợ giúp phần mềm đang sử dụng.\r\n\r\n- F2: dùng để đổi tên thư mục.\r\n\r\n- F3: dùng để mở công cụ tìm kiếm.\r\n\r\n- Windows + R: dùng để mở cửa sổ Run.', 'Các phím tắt thông dụng\r\nViệc biết sử dụng các phím tắt sẽ giúp người dùng thao tác dễ dàng và tiện lợi hơn rất nhiều trên laptop. Và sau đây là một vài tổ hợp phím tắt thông dụng cho người thường xuyên dùng laptop:\r\n\r\n- Ctrl + V: dùng để dán.\r\n\r\n- Ctrl + C: dùng để copy.\r\n\r\n- Ctrl + A: dùng để chọn tất cả.\r\n\r\n- Ctrl + S: dùng để lưu trữ.\r\n\r\n- Ctrl + X: dùng để cắt một đoạn thông tin hoặc tệp.\r\n\r\n- Ctrl + Z: dùng để quay lại thao tác trước đó.\r\n\r\n- Ctrl + Esc: dùng để mở Start Menu.\r\n\r\n- Alt + F4: dùng để đóng chương trình.\r\n\r\n- Alt + Tab: dùng để chuyển đổi giữa các chương trình đang chạy.\r\n\r\n- Delete: dùng để xóa từ hoặc tập tin.\r\n\r\n- Shift + Delete: dùng để xóa vĩnh viễn tập tin, không lưu vào thùng rác.\r\n\r\n- F1: dùng để mở trợ giúp phần mềm đang sử dụng.\r\n\r\n- F2: dùng để đổi tên thư mục.\r\n\r\n- F3: dùng để mở công cụ tìm kiếm.\r\n\r\n- Windows + R: dùng để mở cửa sổ Run.', 3, '9520 (1).jpg'),
(7, 'Bài 2: Kiến thức về máy ảnh', 'Dưới đây là một số kiến thức cơ bản về máy ảnh: Cấu trúc cơ bản của máy ảnh: Ống kính: Dùng để thu nhận ánh sáng và tạo hình ảnh. Gương lật: Dùng để chuyển hướng ánh sáng từ ống kính lên hệ thống ngắm và lấy tiêu cự chính xác. Cảm biến hình ảnh: Dùng để ghi lại hình ảnh bằng cách chuyển đổi ánh sáng thành tín hiệu điện. Bộ xử lý hình ảnh: Dùng để xử lý tín hiệu từ cảm biến và tạo ra hình ảnh cuối cùng. Cảm biến hình ảnh: Cảm biến hình ảnh là một bộ phận quan trọng của máy ảnh. Có hai loại cảm biến phổ biến là cảm biến CMOS và cảm biến CCD. Cảm biến CMOS (Complementary Metal-Oxide-Semiconductor): Thường được sử dụng trong các máy ảnh kỹ thuật số hiện đại. Nó có khả năng tiêu thụ ít năng lượng hơn và tạo ra hình ảnh chất lượng cao. Cảm biến CCD (Charge-Coupled Device): Dùng để chuyển đổi ánh sáng thành tín hiệu điện. Cảm biến CCD thường tạo ra hình ảnh chi tiết và có độ nhạy cao hơn trong điều kiện ánh sáng thấp. Chế độ chụp: Máy ảnh kỹ thuật số thường có nhiều chế độ chụp khác nhau để phù hợp với các tình huống chụp khác nhau. Một số chế độ phổ biến bao gồm: chế độ tự động (Auto), chế độ chụp theo chủ thể (Portrait), chụp cảnh (Landscape), chụp chân dung (Portrait), chụp đêm (Night), chụp thể thao (Sports), và chụp macro (Macro). Điều chỉnh tiêu cự và khẩu độ: Tiêu cự (Focal length): Được đo bằng mm, tiêu cự ảnh hưởng đến góc nhìn và độ phóng đại của ống kính. Tiêu cự lớn hơn tạo ra góc nhìn hẹp hơn và độ phóng đại cao hơn. Khẩu độ (Aperture): Được đo bằng số F, khẩu độ quyết định lượng ánh sáng vào ống kính. Số F càng nhỏ thì khẩu độ càng lớn và lượng ánh sáng vào càng nhiều. Chế độ lấy nét: Máy ảnh có nhiều chế độ lấy nét, bao gồm lấy nét tự động (Auto Focus) và lấy nét thủ công (Manual Focus). Chế độ lấy nét tự động thường sử dụng các cảm biến và thuật toán để tìm điểm lấy nét chính xác trên một chủ thể. Chế độ lấy nét thủ công cho phép người dùng tự điều chỉnh điểm lấy nét. Định dạng hình ảnh: Máy ảnh thường hỗ trợ nhiều định dạng hình ảnh, bao gồm JPEG, RAW, PNG, và TIFF. Định dạng JPEG là định dạng phổ biến', 'Dưới đây là một số kiến thức cơ bản về máy ảnh: Cấu trúc cơ bản của máy ảnh: Ống kính: Dùng để thu nhận ánh sáng và tạo hình ảnh. Gương lật: Dùng để chuyển hướng ánh sáng từ ống kính lên hệ thống ngắm và lấy tiêu cự chính xác. Cảm biến hình ảnh: Dùng để ghi lại hình ảnh bằng cách chuyển đổi ánh sáng thành tín hiệu điện. Bộ xử lý hình ảnh: Dùng để xử lý tín hiệu từ cảm biến và tạo ra hình ảnh cuối cùng. Cảm biến hình ảnh: Cảm biến hình ảnh là một bộ phận quan trọng của máy ảnh. Có hai loại cảm biến phổ biến là cảm biến CMOS và cảm biến CCD. Cảm biến CMOS (Complementary Metal-Oxide-Semiconductor): Thường được sử dụng trong các máy ảnh kỹ thuật số hiện đại. Nó có khả năng tiêu thụ ít năng lượng hơn và tạo ra hình ảnh chất lượng cao. Cảm biến CCD (Charge-Coupled Device): Dùng để chuyển đổi ánh sáng thành tín hiệu điện. Cảm biến CCD thường tạo ra hình ảnh chi tiết và có độ nhạy cao hơn trong điều kiện ánh sáng thấp. Chế độ chụp: Máy ảnh kỹ thuật số thường có nhiều chế độ chụp khác nhau để phù hợp với các tình huống chụp khác nhau. Một số chế độ phổ biến bao gồm: chế độ tự động (Auto), chế độ chụp theo chủ thể (Portrait), chụp cảnh (Landscape), chụp chân dung (Portrait), chụp đêm (Night), chụp thể thao (Sports), và chụp macro (Macro). Điều chỉnh tiêu cự và khẩu độ: Tiêu cự (Focal length): Được đo bằng mm, tiêu cự ảnh hưởng đến góc nhìn và độ phóng đại của ống kính. Tiêu cự lớn hơn tạo ra góc nhìn hẹp hơn và độ phóng đại cao hơn. Khẩu độ (Aperture): Được đo bằng số F, khẩu độ quyết định lượng ánh sáng vào ống kính. Số F càng nhỏ thì khẩu độ càng lớn và lượng ánh sáng vào càng nhiều. Chế độ lấy nét: Máy ảnh có nhiều chế độ lấy nét, bao gồm lấy nét tự động (Auto Focus) và lấy nét thủ công (Manual Focus). Chế độ lấy nét tự động thường sử dụng các cảm biến và thuật toán để tìm điểm lấy nét chính xác trên một chủ thể. Chế độ lấy nét thủ công cho phép người dùng tự điều chỉnh điểm lấy nét. Định dạng hình ảnh: Máy ảnh thường hỗ trợ nhiều định dạng hình ảnh, bao gồm JPEG, RAW, PNG, và TIFF. Định dạng JPEG là định dạng phổ biến', 5, 'abc (1).jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Laptop'),
(2, 'Tủ lạnh'),
(3, 'Máy giặt'),
(4, 'Điện thoại'),
(5, 'Tivi '),
(6, 'Máy ảnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc_tin`
--

CREATE TABLE `tbl_danhmuc_tin` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc_tin`
--

INSERT INTO `tbl_danhmuc_tin` (`danhmuctin_id`, `tendanhmuc`) VALUES
(3, 'Kiến thức về Laptop'),
(4, 'Kiến thức về Tivi'),
(5, 'Kiến thức về Máy ảnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `soluong`, `mahang`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`) VALUES
(51, 30, 3, '8487', 32, '2023-11-28 04:51:37', 1, 0),
(52, 30, 2, '8798', 33, '2023-12-17 09:23:45', 1, 0),
(61, 39, 1, '8925', 37, '2023-12-20 08:23:00', 1, 0),
(62, 44, 1, '1590', 37, '2023-12-20 08:48:50', 1, 0),
(63, 45, 1, '1590', 37, '2023-12-20 08:48:50', 1, 0),
(97, 50, 1, '3159', 42, '2023-12-22 04:20:06', 1, 0),
(98, 36, 1, '3159', 42, '2023-12-22 04:20:06', 1, 0),
(99, 40, 1, '3159', 42, '2023-12-22 04:20:06', 1, 0),
(100, 30, 1, '1596', 32, '2024-01-03 10:47:06', 1, 0),
(101, 37, 1, '2536', 43, '2024-01-06 15:48:01', 1, 0),
(102, 39, 1, '2536', 43, '2024-01-06 15:48:01', 1, 0),
(103, 44, 1, '2536', 43, '2024-01-06 15:48:01', 1, 0),
(104, 40, 1, '5712', 44, '2024-01-06 15:49:01', 1, 0),
(105, 49, 1, '5712', 44, '2024-01-06 15:49:01', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `khachhang_id`, `tinhtrangdon`, `huydon`) VALUES
(24, 30, 2, '2643', '2023-11-28 04:48:43', 31, 1, 0),
(25, 37, 1, '2643', '2023-11-28 04:48:43', 31, 1, 0),
(26, 30, 2, '1273', '2023-11-28 04:48:50', 31, 0, 0),
(27, 37, 1, '1273', '2023-11-28 04:48:50', 31, 0, 0),
(28, 30, 3, '8487', '2023-11-28 04:51:37', 32, 1, 0),
(29, 30, 2, '8798', '2023-12-17 09:23:45', 33, 1, 0),
(30, 30, 1, '950', '2023-12-17 09:24:48', 34, 0, 2),
(31, 38, 1, '950', '2023-12-17 09:24:48', 34, 0, 2),
(32, 38, 1, '6208', '2023-12-17 12:43:12', 32, 0, 0),
(33, 37, 1, '6208', '2023-12-17 12:43:12', 32, 0, 0),
(34, 30, 1, '5969', '2023-12-18 12:56:49', 35, 0, 0),
(35, 37, 1, '6015', '2023-12-19 13:32:55', 36, 1, 0),
(36, 38, 1, '6015', '2023-12-19 13:32:55', 36, 1, 0),
(37, 49, 1, '5126', '2023-12-19 13:36:05', 36, 1, 0),
(38, 39, 1, '8925', '2023-12-20 08:23:00', 37, 1, 0),
(39, 44, 1, '1590', '2023-12-20 08:48:50', 37, 1, 0),
(40, 45, 1, '1590', '2023-12-20 08:48:50', 37, 1, 0),
(41, 44, 1, '7034', '2023-12-20 08:24:29', 37, 0, 0),
(42, 45, 1, '7034', '2023-12-20 08:24:29', 37, 0, 0),
(43, 38, 2, '4530', '2023-12-20 16:25:03', 35, 0, 2),
(44, 38, 2, '3662', '2023-12-20 16:25:39', 35, 0, 2),
(45, 37, 1, '4825', '2023-12-20 09:46:30', 35, 0, 0),
(46, 37, 1, '5781', '2023-12-20 09:48:10', 35, 0, 0),
(47, 37, 1, '9779', '2023-12-20 09:49:11', 35, 0, 0),
(48, 38, 1, '4608', '2023-12-21 09:35:39', 35, 0, 0),
(49, 37, 1, '9544', '2023-12-20 09:49:51', 35, 0, 0),
(50, 30, 1, '9544', '2023-12-20 09:49:51', 35, 0, 0),
(51, 29, 1, '8810', '2023-12-20 10:55:23', 32, 0, 0),
(52, 29, 1, '447', '2023-12-20 16:12:38', 38, 1, 2),
(53, 40, 1, '447', '2023-12-20 16:12:38', 38, 1, 2),
(54, 30, 1, '8308', '2023-12-20 16:24:23', 38, 1, 2),
(55, 30, 1, '2746', '2023-12-20 16:17:19', 38, 0, 2),
(56, 33, 1, '4113', '2023-12-20 16:19:25', 38, 0, 2),
(57, 39, 1, '544', '2023-12-20 16:21:50', 38, 1, 2),
(58, 38, 1, '6964', '2023-12-20 16:25:34', 38, 0, 2),
(59, 30, 1, '9756', '2023-12-20 16:27:53', 38, 0, 2),
(60, 38, 1, '8281', '2023-12-20 16:30:52', 38, 0, 2),
(61, 33, 1, '5016', '2023-12-20 16:31:19', 38, 0, 2),
(62, 42, 1, '7304', '2023-12-20 16:34:08', 38, 0, 2),
(63, 40, 1, '394', '2023-12-20 16:34:54', 38, 0, 2),
(64, 30, 1, '1022', '2023-12-20 16:35:29', 38, 0, 2),
(65, 33, 1, '473', '2023-12-20 16:36:17', 38, 0, 2),
(66, 37, 1, '4758', '2023-12-21 02:52:51', 39, 0, 2),
(67, 33, 1, '2743', '2023-12-21 02:54:15', 39, 1, 2),
(68, 38, 1, '3296', '2023-12-21 04:18:40', 35, 0, 2),
(69, 30, 2, '5093', '2023-12-21 09:35:10', 41, 0, 2),
(70, 50, 1, '5093', '2023-12-21 09:35:10', 41, 0, 2),
(71, 30, 1, '4560', '2023-12-21 09:37:41', 35, 0, 0),
(72, 30, 1, '7668', '2023-12-22 03:59:10', 35, 1, 0),
(73, 45, 1, '7668', '2023-12-22 03:59:10', 35, 1, 0),
(74, 50, 1, '3159', '2023-12-22 04:20:06', 42, 1, 0),
(75, 36, 1, '3159', '2023-12-22 04:20:06', 42, 1, 0),
(76, 40, 1, '3159', '2023-12-22 04:20:06', 42, 1, 0),
(77, 30, 1, '1596', '2024-01-03 10:47:06', 32, 1, 0),
(78, 37, 1, '2536', '2024-01-06 15:48:01', 43, 1, 0),
(79, 39, 1, '2536', '2024-01-06 15:48:01', 43, 1, 0),
(80, 44, 1, '2536', '2024-01-06 15:48:01', 43, 1, 0),
(81, 40, 1, '5712', '2024-01-06 15:49:01', 44, 1, 0),
(82, 49, 1, '5712', '2024-01-06 15:49:01', 44, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `address`, `note`, `email`, `password`, `giaohang`) VALUES
(32, 'lê quang linh', '0339633745', 'đình làng bảo tàng quảng lãng', 'a', 'thethisao19@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(33, 'lê quang linh2', '0339633745', 'đình làng bảo tàng quảng lãng', 'a', 'thethisao18@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(34, 'lê quang linh', '0339633742', 'đình làng bảo tàng quảng lãng', 'a', 'caohieu2627@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(37, 'ba', '0339633745', 'đình làng bảo tàng quảng lãng', 'a', 'thethisao19@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(42, 'công', '0339633745', 'hà nội', '', 'thethisao18@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(43, 'hiếu', '0339633745', 'a', '', 'caohieu267@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(44, 'long', '0339633745', 'ad', '', 'thethisao19@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_giakhuyenmai` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanpham_hot` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_image`) VALUES
(29, 6, 'máy ảnh canon', 'Nikon Z6 II là mẫu máy ảnh mirrorless kế nhiệm của Nikon Z6. Giống như Nikon Z6, Nikon Z6 II được thiết kế hoàn toàn bằng hợp kim Magiê tạo độ chắc chắn, bền bỉ mang lại cảm giác thoải mái cho người dùng. Máy ảnh được trang bị màn hình LCD 3.2 inch, 2.1 triệu điểm ảnh kết hợp với các nút bấm thuận tiện trong quá trình sử dụng.', '', '50000000', '49000000', 0, 0, 5, 'abc (1).jpg'),
(30, 6, 'máy ảnh canon EOS 850D', 'Nikon Z6 II là mẫu máy ảnh mirrorless kế nhiệm của Nikon Z6. Giống như Nikon Z6, Nikon Z6 II được thiết kế hoàn toàn bằng hợp kim Magiê tạo độ chắc chắn, bền bỉ mang lại cảm giác thoải mái cho người dùng. Máy ảnh được trang bị màn hình LCD 3.2 inch, 2.1 triệu điểm ảnh kết hợp với các nút bấm thuận tiện trong quá trình sử dụng.', '', '50000000', '49000000', 0, 0, 4, 'abc (1).jpg'),
(33, 6, 'máy ảnh sony', 'Nikon Z6 II là mẫu máy ảnh mirrorless kế nhiệm của Nikon Z6. Giống như Nikon Z6, Nikon Z6 II được thiết kế hoàn toàn bằng hợp kim Magiê tạo độ chắc chắn, bền bỉ mang lại cảm giác thoải mái cho người dùng. Máy ảnh được trang bị màn hình LCD 3.2 inch, 2.1 triệu điểm ảnh kết hợp với các nút bấm thuận tiện trong quá trình sử dụng.', '', '50000000', '49000000', 0, 0, 44, 'sony2 (1).jpg'),
(36, 5, 'tivi sony 43 inch', 'Chiêm ngưỡng QLED TV thế hệ mới mang đậm triết lý thiết kế mà Samsung luôn theo đuổi. Màn hình với viền siêu mỏng giúp hướng sự chú ý hoàn toàn vào nội dung hiển thị, giảm thiểu xao lãng, cho trải nghiệm điện ảnh thêm trọn vẹn', '', '50000000', '49000000', 0, 0, 19, 'tivi2 (1).jpg'),
(37, 5, 'tivi samsung 43 inch', 'Chiêm ngưỡng QLED TV thế hệ mới mang đậm triết lý thiết kế mà Samsung luôn theo đuổi. Màn hình với viền siêu mỏng giúp hướng sự chú ý hoàn toàn vào nội dung hiển thị, giảm thiểu xao lãng, cho trải nghiệm điện ảnh thêm trọn vẹn', '', '50000000', '45000000', 0, 0, 19, 'tivi2 (1).jpg'),
(38, 5, 'tivi lg 43 inch', 'Chiêm ngưỡng QLED TV thế hệ mới mang đậm triết lý thiết kế mà Samsung luôn theo đuổi. Màn hình với viền siêu mỏng giúp hướng sự chú ý hoàn toàn vào nội dung hiển thị, giảm thiểu xao lãng, cho trải nghiệm điện ảnh thêm trọn vẹn', '', '50000000', '49000000', 0, 0, 5, 'lg (1).jpg'),
(39, 4, 'điện thoại iphone14promax', 'Cụm camera ở mặt sau với 3 ống kính được xếp dọc theo thân máy, không chỉ là một điểm nhấn mạnh mẽ mà còn tạo nên sự ấn tượng và cá tính. Sự sắp xếp này không được đặt trong một cụm cố định mà thay vào đó là sự riêng lẻ của từng ống kính, giúp tạo nên một vẻ ngoại hình độc đáo và thời thượng.\r\n\r\nCảm biến vân tay được tích hợp chung với nút nguồn ở cạnh bên, mang lại trải nghiệm mở khóa dễ dàng và an toàn. Việc tích hợp này không chỉ giúp bảo mật thông tin mà còn tạo nên một thiết kế gọn gàng và hiệu quả.', '', '39000000', '32000000', 0, 0, 66, 'ip (1).jpg'),
(40, 4, 'điện thoại samsung a50', 'Cụm camera ở mặt sau với 3 ống kính được xếp dọc theo thân máy, không chỉ là một điểm nhấn mạnh mẽ mà còn tạo nên sự ấn tượng và cá tính. Sự sắp xếp này không được đặt trong một cụm cố định mà thay vào đó là sự riêng lẻ của từng ống kính, giúp tạo nên một vẻ ngoại hình độc đáo và thời thượng.\r\n\r\nCảm biến vân tay được tích hợp chung với nút nguồn ở cạnh bên, mang lại trải nghiệm mở khóa dễ dàng và an toàn. Việc tích hợp này không chỉ giúp bảo mật thông tin mà còn tạo nên một thiết kế gọn gàng và hiệu quả.', '', '30000000', '29000000', 0, 0, 10, 'a51.png'),
(41, 4, 'điện thoại iphone15promax', 'Cụm camera ở mặt sau với 3 ống kính được xếp dọc theo thân máy, không chỉ là một điểm nhấn mạnh mẽ mà còn tạo nên sự ấn tượng và cá tính. Sự sắp xếp này không được đặt trong một cụm cố định mà thay vào đó là sự riêng lẻ của từng ống kính, giúp tạo nên một vẻ ngoại hình độc đáo và thời thượng.\r\n\r\nCảm biến vân tay được tích hợp chung với nút nguồn ở cạnh bên, mang lại trải nghiệm mở khóa dễ dàng và an toàn. Việc tích hợp này không chỉ giúp bảo mật thông tin mà còn tạo nên một thiết kế gọn gàng và hiệu quả.', '', '59000000', '49000000', 0, 0, 5, 'ip (1).jpg'),
(42, 3, 'máy giặt panasonic', 'Khối lượng giặt: 8.5Kg phù hợp cho gia đình 3 - 5 người\r\n\r\n14 chương trình giặt khác nhau, đáp ứng mọi nhu cầu giặt đa dạng. \r\n\r\nĐộng cơ Inverter giúp máy giặt vận hành êm ái, bền bỉ, tiết kiệm điện năng\r\n\r\nCông nghệ Spa Care & giặt hơi nước Steam diệt khuẩn 99,99% loại bỏ vi khuẩn gây hại, bảo vệ vải và giảm độ nhăn', '', '50000000', '49000000', 0, 0, 66, 'ba (1).jpg'),
(43, 3, 'Máy giặt Samsung', 'Khối lượng giặt: 8.5Kg phù hợp cho gia đình 3 - 5 người\r\n\r\n14 chương trình giặt khác nhau, đáp ứng mọi nhu cầu giặt đa dạng. \r\n\r\nĐộng cơ Inverter giúp máy giặt vận hành êm ái, bền bỉ, tiết kiệm điện năng\r\n\r\nCông nghệ Spa Care & giặt hơi nước Steam diệt khuẩn 99,99% loại bỏ vi khuẩn gây hại, bảo vệ vải và giảm độ nhăn', '', '50000000', '45000000', 0, 0, 19, 'sa (1).jpg'),
(44, 3, 'Máy giặt Shark', 'Khối lượng giặt: 8.5Kg phù hợp cho gia đình 3 - 5 người\r\n\r\n14 chương trình giặt khác nhau, đáp ứng mọi nhu cầu giặt đa dạng. \r\n\r\nĐộng cơ Inverter giúp máy giặt vận hành êm ái, bền bỉ, tiết kiệm điện năng\r\n\r\nCông nghệ Spa Care & giặt hơi nước Steam diệt khuẩn 99,99% loại bỏ vi khuẩn gây hại, bảo vệ vải và giảm độ nhăn', '', '19000000', '18000000', 0, 0, 66, 'ba (1).jpg'),
(45, 2, 'tủ lạnh panasonic', 'Ngăn Đông mềm Diệt khuẩn Prime Fresh+ Blue Ag Bảo vệ sức khỏe & tiết kiệm thời gian nấu ngay không cần rã đông\r\nSiêu tiết kiệm điện với bộ 3 công nghệ: Multi control  & Inverter & Econavi\r\nNgăn rau củ Fresh Safe giúp giữ ẩm 90%, thực phẩm luôn tươi ngon', '', '50000000', '45000000', 0, 0, 5, 'Tu-lanh-Sharp-SJ-FX640V-SL-web1 (1).jpg'),
(46, 2, 'Tủ lạnh Sharp', 'Ngăn Đông mềm Diệt khuẩn Prime Fresh+ Blue Ag Bảo vệ sức khỏe & tiết kiệm thời gian nấu ngay không cần rã đông\r\nSiêu tiết kiệm điện với bộ 3 công nghệ: Multi control  & Inverter & Econavi\r\nNgăn rau củ Fresh Safe giúp giữ ẩm 90%, thực phẩm luôn tươi ngon', '', '80000000', '79000000', 0, 0, 66, 'samsung-rf48a4000b4-sv-1.-600x600 (1).jpg'),
(47, 2, 'tủ lạnh samsung', 'Ngăn Đông mềm Diệt khuẩn Prime Fresh+ Blue Ag Bảo vệ sức khỏe & tiết kiệm thời gian nấu ngay không cần rã đông\r\nSiêu tiết kiệm điện với bộ 3 công nghệ: Multi control  & Inverter & Econavi\r\nNgăn rau củ Fresh Safe giúp giữ ẩm 90%, thực phẩm luôn tươi ngon', '', '79000000', '69000000', 0, 0, 19, 'samsung-rf48a4000b4-sv-1.-600x600 (1).jpg'),
(48, 1, 'laptop dell xps 9520', 'Laptop Dell sở hữu bộ vi xử lý Intel Core i7 13700H dòng H series hiệu năng cao đi cùng với card rời NVIDIA GeForce RTX 4050 6 GB ', '', '50000000', '49000000', 0, 0, 8, '9520 (1).jpg'),
(49, 1, 'laptop dell latitude 5520', 'Laptop Dell sở hữu bộ vi xử lý Intel Core i7 13700H dòng H series hiệu năng cao đi cùng với card rời NVIDIA GeForce RTX 4050 6 GB ', '', '200000000', '18000000', 0, 0, 5, '5520 (1).jpg'),
(50, 1, 'laptop dell xps 9530', 'Laptop Dell sở hữu bộ vi xử lý Intel Core i7 13700H dòng H series hiệu năng cao đi cùng với card rời NVIDIA GeForce RTX 4050 6 GB ', '', '79000000', '69000000', 0, 0, 4, '9520 (1).jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_caption` text NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_caption`, `slider_active`) VALUES
(1, 'b2.jpg', 'Slider khuyến mãi ', 1),
(2, 'b3.jpg', 'Slider 50%', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`baiviet_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `baiviet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
