-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2018 at 05:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chuvanduong_eyewearstore_th17`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role_admin` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `img_path` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `phone`, `address`, `role_admin`, `status`, `img_path`, `create_time`, `update_time`) VALUES
(1, 'duongcv1006', '12345', 'dragonhn1106@gmail.com', '0964014502', 'haf nooij', -1, 0, 'ava1.jpg', '0000-00-00 00:00:00', '2018-05-31 09:08:07'),
(2, 'admin', '12345', '', '', '', -1, 1, 'ava2.jpg', NULL, NULL),
(3, 'duongcv', '123456', 'dragonhn1006@gmail.com', '0964014502', 'mai dịch', -1, 1, 'ava1.jpg', '2018-05-21 09:32:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level_user` tinyint(3) NOT NULL,
  `create_time` datetime NOT NULL,
  `like_answer` int(10) UNSIGNED DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `status`, `username`, `email`, `level_user`, `create_time`, `like_answer`, `content`) VALUES
(1, 25, 1, 'admin', 'dragonhn1xxx@gmail.com', 1, '2018-04-25 16:22:30', 0, 'sao thế bạn'),
(2, 25, 1, 'admin', 'dragonhn1xxx@gmail.com', 0, '2018-04-25 16:24:06', 1, 'xxxxx'),
(3, 25, 1, 'admin', 'dragonhn1xxx@gmail.com', 0, '2018-04-25 17:29:46', 1, '321321'),
(4, 32, 1, 'admin', 'dragonhn1xxx@gmail.com', 0, '2018-04-26 03:41:23', 1, 'chuẩn'),
(6, 1, 1, 'admin', '', 1, '2018-05-21 10:11:51', 0, 'to vc ra ý'),
(7, 2, 1, 'admin', '', 1, '2018-06-15 05:21:38', 0, 'ok'),
(8, 9, 1, 'admin', '', 1, '2018-06-15 05:23:11', 0, 'ok bạn'),
(9, 9, 1, 'Chu van duong', 'dragonhn@gmail.com', 0, '2018-06-15 05:23:51', 1, 'duongcvsdljsa;');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_hoadon`, `id_dh`, `status`, `create_time`, `update_time`) VALUES
(1, 1, 1, '2018-03-26 13:06:35', NULL),
(2, 2, 1, '2018-03-26 13:06:38', NULL),
(3, 4, 1, '2018-03-26 13:06:41', NULL),
(4, 5, 1, '2018-03-26 13:06:43', NULL),
(5, 8, 1, '2018-04-21 08:18:16', '0000-00-00 00:00:00'),
(6, 7, 1, '2018-04-21 08:18:20', '0000-00-00 00:00:00'),
(7, 7, 1, '2018-04-21 08:18:22', '0000-00-00 00:00:00'),
(8, 7, 1, '2018-04-21 08:18:22', '0000-00-00 00:00:00'),
(9, 9, 1, '2018-04-26 03:48:28', '0000-00-00 00:00:00'),
(10, 9, 1, '2018-04-26 03:48:29', '0000-00-00 00:00:00'),
(11, 9, 1, '2018-04-26 03:48:30', '0000-00-00 00:00:00'),
(12, 9, 1, '2018-04-26 03:48:30', '0000-00-00 00:00:00'),
(13, 9, 1, '2018-04-26 03:48:30', '0000-00-00 00:00:00'),
(14, 2, 1, '2018-04-26 03:51:13', '0000-00-00 00:00:00'),
(15, 4, 1, '2018-04-26 03:51:18', '0000-00-00 00:00:00'),
(16, 4, 1, '2018-04-26 03:51:20', '0000-00-00 00:00:00'),
(17, 4, 1, '2018-04-26 03:51:22', '0000-00-00 00:00:00'),
(18, 4, 1, '2018-04-26 03:51:22', '0000-00-00 00:00:00'),
(19, 4, 1, '2018-04-26 03:51:22', '0000-00-00 00:00:00'),
(20, 4, 1, '2018-04-26 03:51:23', '0000-00-00 00:00:00'),
(21, 4, 1, '2018-04-26 03:51:23', '0000-00-00 00:00:00'),
(22, 3, 1, '2018-04-26 03:53:34', '0000-00-00 00:00:00'),
(23, 9, 1, '2018-04-26 03:53:39', '0000-00-00 00:00:00'),
(24, 8, 1, '2018-04-26 03:53:43', '0000-00-00 00:00:00'),
(25, 10, 1, '2018-04-26 03:53:46', '0000-00-00 00:00:00'),
(26, 11, 1, '2018-04-26 03:53:49', '0000-00-00 00:00:00'),
(27, 6, 1, '2018-05-21 09:58:44', '0000-00-00 00:00:00'),
(28, 1, 1, '2018-06-12 19:24:51', '0000-00-00 00:00:00'),
(29, 1, 1, '2018-06-12 19:24:55', '0000-00-00 00:00:00'),
(30, 1, 1, '2018-06-12 19:24:57', '0000-00-00 00:00:00'),
(31, 2, 1, '2018-06-12 19:26:37', '0000-00-00 00:00:00'),
(32, 4, 1, '2018-06-12 19:33:09', '0000-00-00 00:00:00'),
(33, 6, 1, '2018-06-12 19:33:17', '0000-00-00 00:00:00'),
(34, 3, 1, '2018-06-12 19:33:22', '0000-00-00 00:00:00'),
(35, 3, 1, '2018-06-12 19:33:23', '0000-00-00 00:00:00'),
(36, 1, 1, '2018-06-12 19:37:24', '0000-00-00 00:00:00'),
(37, 2, 1, '2018-06-12 19:37:25', '0000-00-00 00:00:00'),
(38, 4, 1, '2018-06-12 19:38:48', '0000-00-00 00:00:00'),
(39, 3, 1, '2018-06-12 19:38:51', '0000-00-00 00:00:00'),
(40, 5, 1, '2018-06-12 19:39:37', '0000-00-00 00:00:00'),
(41, 6, 1, '2018-06-12 19:40:31', '0000-00-00 00:00:00'),
(42, 7, 1, '2018-06-12 19:42:23', '0000-00-00 00:00:00'),
(43, 9, 1, '2018-06-12 19:43:31', '0000-00-00 00:00:00'),
(44, 13, 1, '2018-06-12 19:43:42', '0000-00-00 00:00:00'),
(45, 15, 1, '2018-06-12 19:45:03', '0000-00-00 00:00:00'),
(46, 7, 1, '2018-06-12 19:47:22', '0000-00-00 00:00:00'),
(47, 9, 1, '2018-06-12 19:47:25', '0000-00-00 00:00:00'),
(48, 13, 1, '2018-06-12 19:47:26', '0000-00-00 00:00:00'),
(49, 1, 1, '2018-06-12 19:47:36', '0000-00-00 00:00:00'),
(50, 2, 1, '2018-06-12 19:47:38', '0000-00-00 00:00:00'),
(51, 4, 1, '2018-06-12 19:47:40', '0000-00-00 00:00:00'),
(52, 5, 1, '2018-06-12 19:47:43', '0000-00-00 00:00:00'),
(53, 3, 1, '2018-06-12 19:47:44', '0000-00-00 00:00:00'),
(54, 6, 1, '2018-06-12 19:47:46', '0000-00-00 00:00:00'),
(55, 15, 1, '2018-06-12 19:47:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_hd` int(11) NOT NULL,
  `id_kinh` int(10) UNSIGNED NOT NULL,
  `TenKH` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL,
  `Email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `SoLuong` int(11) UNSIGNED NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_hd`, `id_kinh`, `TenKH`, `SDT`, `Email`, `DiaChi`, `GhiChu`, `SoLuong`, `ThanhTien`, `TrangThai`, `create_time`, `update_time`) VALUES
(1, 1, 'duongcv', 964014502, 'duongcv@gmail.com', 'hanoi', 'dat hang nhanh', 100, 6900000, 1, '2018-03-26 13:10:26', '2018-03-26 13:10:29'),
(2, 2, 'duongcv', 964014502, 'duongcv@gmail.com', 'hanoi', 'dathang', 100, 69000000, 1, '2018-03-26 13:10:20', '2018-03-26 13:10:23'),
(3, 3, 'duongcv2', 964014502, 'duongcv@gmail.com', 'hanoi', 'dat hang nhanh', 1000, 6900000, 1, '2018-03-26 13:10:13', '2018-03-26 13:10:17'),
(4, 2, 'duongcv4', 964014502, 'duongcv@gmail.com', 'hanoi', 'dathang', 2, 12000000, 1, '2018-03-26 13:10:06', '2018-03-26 13:10:10'),
(5, 21, 'duongcv3', 964014502, 'duongcv@gmail.com', 'hanoi', 'dat hang gap', 4, 120000000, 1, '2018-03-26 13:10:01', '2018-03-26 13:10:03'),
(6, 21, 'duongcv3', 964014502, 'duongcv@gmail.com', 'hanoi', 'dat hang gap', 4, 120000000, 1, '2018-03-26 13:10:01', '2018-03-26 13:10:03'),
(7, 5, 'duongcv3', 964014502, 'duongcv@gmail.com', 'hanoi', 'dat hang gap', 4, 120000000, 1, '2018-03-26 13:10:01', '2018-03-26 13:10:03'),
(8, 8, 'duongcv3', 964014502, 'duongcv@gmail.com', 'hanoi', 'dat hang gap', 4, 120000000, 1, '2018-03-26 13:10:01', '2018-03-26 13:10:03'),
(9, 9, 'duongcv3', 964014502, 'duongcv@gmail.com', 'hanoi', 'dat hang gap', 4, 120000000, 1, '2018-03-26 13:10:01', '2018-03-26 13:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `kinh`
--

CREATE TABLE `kinh` (
  `id` int(11) NOT NULL,
  `TenKinh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_nsx` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_npp` int(11) NOT NULL,
  `HinhAnh` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `GiaCu` int(11) NOT NULL,
  `GiaMoi` int(11) DEFAULT NULL,
  `id_loai` int(11) NOT NULL,
  `status` int(100) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `SoLuotXem` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kinh`
--

INSERT INTO `kinh` (`id`, `TenKinh`, `id_nsx`, `id_npp`, `HinhAnh`, `GiaCu`, `GiaMoi`, `id_loai`, `status`, `SoLuong`, `SoLuotXem`, `create_time`, `date_time`) VALUES
(1, 'GG0078SK-001', '1', 1, 'GG3595FS-807JJ-6tr8.jpg', 70000000, 0, 1, 1, 1000, 0, '2018-04-27 15:23:36', '2018-05-16 12:08:26'),
(2, 'GG3595FS-807JJ', '1', 1, 'GG3595FS-807JJ-6tr8.jpg', 6800000, 0, 2, 1, 1000, 0, '2018-04-27 15:26:00', '0000-00-00 00:00:00'),
(3, 'GG3658FS-D28ED', '1', 1, 'GG3658FS-D28ED-7tr2.jpg', 7200000, 0, 2, 1, 100, 0, '2018-04-27 15:26:40', '0000-00-00 00:00:00'),
(4, 'GG3661FS-75QED', '1', 1, 'GG3661FS-75QED-8tr2.JPG', 8200000, 0, 2, 1, 20, 0, '2018-04-27 15:32:01', '0000-00-00 00:00:00'),
(5, 'GG3662KS-75QHD-B', '1', 1, 'GG3662KS-75QHD-B-8tr2.jpg', 8200000, 0, 2, 1, 100, 0, '2018-04-27 15:32:32', '0000-00-00 00:00:00'),
(6, 'GG3665FS-51NYR', '1', 1, 'GG3665FS-51NYR-6tr2.jpg', 6200000, 0, 1, 1, 100, 0, '2018-04-27 15:33:19', '0000-00-00 00:00:00'),
(7, 'GG3687FS-4WJYY', '1', 1, 'GG3687FS-4WJYY-6tr9.jpg', 6900000, 0, 2, 1, 100, 4, '2018-04-27 15:33:49', '0000-00-00 00:00:00'),
(8, 'GG3776FS-MJ9-EU-6tr2', '1', 1, 'GG3776FS-MJ9-EU-6tr2.jpg', 6200000, 0, 0, 1, 20, 0, '2018-04-27 15:34:21', '0000-00-00 00:00:00'),
(9, 'GG3796FS-ANWY1', '2', 1, 'GG3796FS-ANWY1-7tr9 - Copy.jpg', 7900000, 0, 2, 1, 100, 0, '2018-04-27 15:35:10', '0000-00-00 00:00:00'),
(21, 'COQUETE2-XCTD8', '3', 3, 'COQUETE2-XCTD8-7tr2.jpg', 7200000, 0, 1, 1, 100, 0, '2018-04-27 15:39:39', '0000-00-00 00:00:00'),
(22, 'DIORSYMBOL1-D289C', '3', 3, 'DIORSYMBOL1-D289C-7tr350.jpg', 7350000, 0, 2, 1, 20, 0, '2018-04-27 15:40:40', '0000-00-00 00:00:00'),
(23, 'DIORSYMBOL2-D28JJ', '4', 3, 'DIORSYMBOL2-D28JJ-7tr350.jpg', 7350000, 0, 2, 1, 100, 0, '2018-04-27 15:41:10', '0000-00-00 00:00:00'),
(24, 'DIORTIEDYE1-BPEHA', '5', 3, 'DIORTIEDYE1-BPEHA-7tr.jpg', 7000000, 0, 2, 1, 20, 0, '2018-04-27 15:41:40', '0000-00-00 00:00:00'),
(25, 'DIORVOLUTE2F-BLQFM', '4', 3, 'DIORVOLUTE2F-BLQFM-7tr6.jpg', 7600000, 0, 0, 1, 10, 0, '2018-04-27 15:42:18', '0000-00-00 00:00:00'),
(26, 'DIORZENAIDE', '2', 3, 'DIORZENAIDE-7tr350.jpg', 7350000, 0, 1, 1, 100, 0, '2018-04-27 15:43:07', '0000-00-00 00:00:00'),
(27, 'MYLADYDIOR3SF-FCUJD', '2', 3, 'MYLADYDIOR3SF-FCUJD-7tr9.jpg', 7900000, 0, 2, 1, 10, 0, '2018-04-27 15:43:57', '0000-00-00 00:00:00'),
(28, 'SYMBLYDIORF-D28', '2', 3, 'SYMBLYDIORF-D28-tr.jpg', 7900000, 0, 2, 1, 10, 0, '2018-04-27 15:44:27', '0000-00-00 00:00:00'),
(29, 'SYMPLYDIOR-9E1HA', '3', 1, 'SYMPLYDIOR-9E1HA-7tr.jpg', 7000000, 0, 2, 1, 30, 0, '2018-04-27 15:44:56', '0000-00-00 00:00:00'),
(30, 'GU400-D-01A', '4', 2, 'GU400-D-01A-2tr6.jpg', 2600000, 0, 2, 1, 200, 1, '2018-04-27 15:45:46', '0000-00-00 00:00:00'),
(31, 'GU4002-D-05X', '2', 2, 'GU4002-D-05X-2tr6.jpg', 2600000, 0, 1, 1, 100, 0, '2018-04-27 15:46:12', '0000-00-00 00:00:00'),
(32, 'GU6834-32N-2tr6', '5', 2, 'GU6834-32N-2tr6.jpg', 2600000, 0, 2, 1, 10, 1, '2018-04-27 15:46:42', '0000-00-00 00:00:00'),
(33, 'GU6908-01A', '5', 2, 'GU6908-01A-2tr6.jpg', 2600000, 0, 1, 1, 10, 0, '2018-04-27 15:47:27', '0000-00-00 00:00:00'),
(34, 'GU7433-02C', '5', 2, 'GU7433-02C-1tr9.jpg', 100, 0, 2, 1, 0, 0, '2018-04-27 15:47:54', '0000-00-00 00:00:00'),
(35, 'GU7433-52C', '2', 2, 'GU7433-52C-1tr9.jpg', 1900000, 0, 2, 1, 10, 13, '2018-04-27 15:48:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loaikinh`
--

CREATE TABLE `loaikinh` (
  `id_loai` int(11) NOT NULL,
  `TenLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `img_path` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(100) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaikinh`
--

INSERT INTO `loaikinh` (`id_loai`, `TenLoai`, `img_path`, `status`, `create_time`, `update_time`) VALUES
(1, 'Kính thời trang nam', 'kieu_kinh_1.2.jpg', 1, '0000-00-00 00:00:00', '2018-04-04 08:58:54'),
(2, 'K&iacute;nh thời trang nữ', '32207709_2093446190892379_430953384938307584_n.jpg', 1, '0000-00-00 00:00:00', '2018-05-16 12:07:56'),
(3, 'Kính mắt dành cho trẻ em', 'kieu_kinh_1.2.jpg', 1, '2018-03-26 00:26:55', '2018-03-26 00:26:58'),
(4, 'Kính thuốc', 'kieu_kinh_1.2.jpg', 1, '2018-03-26 00:27:34', '2018-03-26 00:27:37'),
(5, 'Kính áp tròng', 'kieu_kinh_1.2.jpg', 1, '2018-03-26 00:27:57', '2018-03-26 00:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `nhaphanphoi`
--

CREATE TABLE `nhaphanphoi` (
  `id_npp` int(11) NOT NULL,
  `TenNPP` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SDTNPP` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiNPP` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_path` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhaphanphoi`
--

INSERT INTO `nhaphanphoi` (`id_npp`, `TenNPP`, `SDTNPP`, `DiaChiNPP`, `img_path`, `create_time`, `update_time`, `status`) VALUES
(1, 'C&ocirc;ng Ty Cổ Phần Thương Mại Đầu Tư VILANDIO', '0966778494', '201 L&yacute; Tự Trọng, P. Bến Th&agrave;nh, Quận 1, TP. Hồ Ch&iacute; Minh', 'kieu_kinh_1.2.jpg', '0000-00-00 00:00:00', '2018-04-10 05:39:53', 1),
(2, 'Công Ty TNHH Kính Mắt Việt Nam', '(024)3736535', '138B Giảng Võ, Q. Ba Đình, Hà Nội', 'kieu_kinh_1.2.jpg', NULL, NULL, 1),
(3, 'Việt Tín - Công Ty TNHH Kính Mắt Việt Tín', '(024)3767316', '345 P. Dịch Vọng, Q. Cầu Giấy, Hà Nội', 'kieu_kinh_1.2.jpg', NULL, NULL, 1),
(4, 'Kính Mắt VNS', '0949198866', '259 Đội Cấn, Q. Ba Đình, Hà Nội', 'kieu_kinh_1.2.jpg', NULL, NULL, 1),
(5, 'Thanh Lịch - C&ocirc;ng Ty TNHH K&iacute;nh Mắt Thanh Lịch', '0964014502', '97 H&agrave;ng B&ocirc;ng, Q. Ho&agrave;n Kiếm, H&agrave; Nội', 'kieu_kinh_1.2.jpg', '0000-00-00 00:00:00', '2018-04-02 00:39:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `id_nsx` int(11) NOT NULL,
  `TenNSX` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SDTNSX` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiNSX` varchar(200) NOT NULL,
  `img_path` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(100) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`id_nsx`, `TenNSX`, `SDTNSX`, `DiaChiNSX`, `img_path`, `status`, `create_time`, `update_time`) VALUES
(1, 'Gucci', '0964014502', 'USA_American', 'kieu_kinh_1.1.jpg', 1, '0000-00-00 00:00:00', '2018-04-10 09:09:01'),
(2, 'Guess', '0964014502', 'USA', 'kieu_kinh_1.2.jpg', 1, '2018-03-26 00:29:55', '2018-03-26 00:29:57'),
(3, 'Christian Dior', '0964014502', 'USA', 'kieu_kinh_1.2.jpg', 1, '2018-03-26 00:30:42', '2018-03-26 00:30:44'),
(4, 'Lacoste', '0964014502', 'USA', 'kieu_kinh_1.2.jpg', 1, '2018-03-26 00:29:55', '2018-03-26 00:29:57'),
(5, 'Levis', '0964014502', 'USA', 'kieu_kinh_1.2.jpg', 1, '2018-03-26 00:29:55', '2018-03-26 00:29:57'),
(6, 'Rayban', '0964014504', '321321312', 'kieu_kinh_1.2.jpg', 1, '2018-04-04 10:27:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `id_kinh` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `like_comment` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `username`, `email`, `content`, `create_time`, `id_kinh`, `status`, `like_comment`) VALUES
(2, 'admin', 'dragonhn1xxx@gmail.com', 'kính này còn bao nhiêu cái add ơi tớ muốn đặt số lượng lớn', '2018-04-25 16:09:52', 28, 1, 12),
(3, 'admin', 'dragonhn1xxx@gmail.com', 'kính này còn bao nhiêu cái addmin ơi', '2018-04-25 17:48:13', 27, 1, 1111),
(8, 'éadsadsada', 'dasdsadsa@gmail.com', 'ewqewqewqewqewq', '2018-05-31 10:36:43', 32, 1, 0),
(9, 'duongcv', 'dragonhn1006@gmail.com', 'dat hang gap', '2018-06-15 05:22:34', 35, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) NOT NULL,
  `TenDangNhap` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenHienThi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quyen` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `authen_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DiaChi`, `SDT`, `Email`, `Quyen`, `status`, `authen_key`, `create_time`, `update_time`) VALUES
(1, 'duongcv', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Dương', 'Mai Dịch', '0964014502', 'dragonhn1006@gmail.com', 1, 1, '1S-MhkUDCztZNh2JeUsuXrZvSDLYIArVJY778SaeGlU', '2018-05-22 05:16:35', '0000-00-00 00:00:00'),
(2, 'duongcv1', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Dương', 'Mai Dịch', '0964014502', 'dragonhn1006@gmail.com', 1, 1, '1S-MhkUDCztZNh2JeUsuXrZvSDLYIArVJY778SaeGlU', '2018-05-22 05:16:35', '0000-00-00 00:00:00'),
(3, 'duongcv2', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Dương', 'Mai Dịch', '0964014502', 'dragonhn1006@gmail.com', 1, 0, '1S-MhkUDCztZNh2JeUsuXrZvSDLYIArVJY778SaeGlU', '2018-05-22 05:16:35', '0000-00-00 00:00:00'),
(4, 'duongcv3', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Dương', 'Mai Dịch', '0964014502', 'dragonhn1006@gmail.com', 1, 0, '1S-MhkUDCztZNh2JeUsuXrZvSDLYIArVJY778SaeGlU', '2018-05-22 05:16:35', '0000-00-00 00:00:00'),
(5, 'duongcv4', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Dương', 'Mai Dịch', '0964014502', 'dragonhn1006@gmail.com', 1, 1, '1S-MhkUDCztZNh2JeUsuXrZvSDLYIArVJY778SaeGlU', '2018-05-22 05:16:35', '0000-00-00 00:00:00'),
(6, 'duongcv5', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Dương', 'Mai Dịch', '0964014502', 'dragonhn1006@gmail.com', 1, 0, '1S-MhkUDCztZNh2JeUsuXrZvSDLYIArVJY778SaeGlU', '2018-05-22 05:16:35', '0000-00-00 00:00:00'),
(7, 'duongcv6', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Duong1', 'số nh&agrave; 20 ng&otilde; 342 đường hồ t&ugrave;ng mậu quận bắc từ li&ecirc;m h&agrave; nội', '0964014502', 'dragonhn1006@gmail.com', 1, 1, 'hxzZadYmo-xs3FsssoHHWvBMq-51LZp00DIk9zIJsls', '2018-05-23 10:07:43', '0000-00-00 00:00:00'),
(8, 'duongcv7', '827ccb0eea8a706c4c34a16891f84e7b', 'Chu Văn Duong1', 'số nh&agrave; 20 ng&otilde; 342 đường hồ t&ugrave;ng mậu quận bắc từ li&ecirc;m h&agrave; nội', '0964014502', 'dragonhn1006@gmail.com', 1, 1, 'hxzZadYmo-xs3FsssoHHWvBMq-51LZp00DIk9zIJsls', '2018-05-23 10:07:43', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_hoadon`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_hd`);

--
-- Indexes for table `kinh`
--
ALTER TABLE `kinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaikinh`
--
ALTER TABLE `loaikinh`
  ADD PRIMARY KEY (`id_loai`);

--
-- Indexes for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  ADD PRIMARY KEY (`id_npp`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`id_nsx`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kinh`
--
ALTER TABLE `kinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `loaikinh`
--
ALTER TABLE `loaikinh`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nhaphanphoi`
--
ALTER TABLE `nhaphanphoi`
  MODIFY `id_npp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `id_nsx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
