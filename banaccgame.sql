-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2024 lúc 01:06 PM
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
-- Cơ sở dữ liệu: `banaccgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_infor`
--

CREATE TABLE `payment_infor` (
  `payment_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `payment_amount` int(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `ma_sp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_infor`
--

INSERT INTO `payment_infor` (`payment_id`, `user_name`, `payment_amount`, `payment_status`, `ma_sp`) VALUES
(87, 'Nguyen DTrung', 499999, 'Đã thanh toán', 'accgta1'),
(88, 'Nguyen DTrung', 499999, 'Đã thanh toán', 'accgta1'),
(89, 'Nguyen DTrung', 200000, 'Đã thanh toán', 'acccsgo1'),
(90, 'Nguyen DTrung', 499999, 'Đã thanh toán', 'accgta1'),
(91, 'Nguyen DTrung', 800000, 'Đã thanh toán', 'accnaraka1'),
(92, 'Nguyen DTrung', 800000, 'Đã thanh toán', 'accpubg2'),
(93, 'Nguyen DTrung', 800000, 'Đã thanh toán', 'accpubg2'),
(94, 'Nguyen DTrung', 800000, 'Đã thanh toán', 'accpubg2'),
(95, 'Nguyen DTrung', 200000, 'Đã thanh toán', 'acccsgo1'),
(96, 'Nguyen DTrung', 200000, 'Đã thanh toán', 'acccsgo1'),
(97, 'Nguyen DTrung', 200000, 'Đã thanh toán', 'acccsgo1'),
(98, 'Nguyen DTrung', 500000, 'Đã thanh toán', 'accfo2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(100) NOT NULL,
  `acc_user` varchar(100) NOT NULL,
  `acc_pass` varchar(100) NOT NULL,
  `tensp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `acc_user`, `acc_pass`, `tensp`) VALUES
(1, 'trungvipproluxury', 'ductrung1004', 'accpubg1'),
(2, 'dtrungdeptrai', '12345', 'accfo1'),
(3, 'accfo2@gmail.com', '12345', 'accfo2'),
(4, 'trungdeptraigta1', 'trungdeptrai', 'accgta1'),
(5, 'csgo1@gmail.com', '12345678', 'acccsgo1'),
(6, 'djtcuchungmay', 'accnaraka123', 'accnaraka1'),
(7, 'loconcac', 'accpubg2123', 'accpubg2'),
(8, 'accfo3@gmail.com', '122344134', 'accfo3'),
(9, 'csgo2@gmail.com', '1234', 'acccsgo2'),
(10, 'accpubg5', '1234541313', 'accpubg5'),
(11, 'djtcuc', '414131231', 'accfo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(100) NOT NULL,
  `banner_h4` varchar(100) NOT NULL,
  `banner_p` varchar(100) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  `banner_button` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `banner_h4`, `banner_p`, `banner_img`, `banner_button`) VALUES
(1, 'ƯU ĐÃI ĐẶC BIỆT', 'MUA SẮM VỚI NHỮNG ƯU ĐÃI CỰC KÌ ĐẶC BIỆT CỦA CHÚNG TÔI', 'img/banner3.jpg', 'ĐI ĐẾN NGAY'),
(2, 'ĐĂNG KÍ NGAY', 'ĐĂNG KÍ NGAY ĐỂ TRUY CẬP VÀO CÁC SẢN PHẨM ', 'img/banner4.jpg', 'ĐĂNG KÍ NGAY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'PUBG'),
(2, 'FIFA'),
(3, 'GTA V'),
(4, 'CSGO'),
(12, 'NARAKA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_deal`
--

CREATE TABLE `tbl_deal` (
  `id` int(100) NOT NULL,
  `deal_name` varchar(100) NOT NULL,
  `deal_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_deal`
--

INSERT INTO `tbl_deal` (`id`, `deal_name`, `deal_id`) VALUES
(1, '30%', 1),
(2, '50%', 2),
(3, '70%', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `fb_comment` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `fb_comment`, `user_name`) VALUES
(2, 'hello', 'Nguyen DTrung'),
(3, 'hello', 'Nguyen DTrung'),
(7, 'hello', 'trungdeptrai'),
(11, 'hello', 'trungdeptrai'),
(13, 'hello', 'Nguyen DTrung'),
(14, '12312432143123', 'Nguyen DTrung'),
(15, 'ádafasfSFDFDSF', 'Nguyen DTrung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_img`
--

CREATE TABLE `tbl_img` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_img`
--

INSERT INTO `tbl_img` (`id`, `product_id`, `img`) VALUES
(58, 85, 'imgchitiet/657ae6b115d7e_fb.png'),
(61, 86, 'imgchitiet/657ae72dc8a77_usecasetq.png'),
(62, 87, 'imgchitiet/657ae93b299e1_catongquat.png'),
(65, 88, 'imgchitiet/fo1chitiet.jpg'),
(74, 16, 'imgchitiet/657b1fbbecda0_3-cach-thay-doi-tam-ngam-cs-go-crosshair-don-gian-nhat12121313-800x405.jpg'),
(75, 16, 'imgchitiet/657b1fbbed34e_14325428744_1f561b7125_b.jpg'),
(76, 16, 'imgchitiet/657b1fbbed52a_maxresdefault.jpg'),
(77, 18, 'imgchitiet/657b200c83f48_playerunknowns-battlegrounds-pubg-bgmi-2022-games-5k-5120x2882-7843.jpg'),
(78, 18, 'imgchitiet/657b200c84189_pubg-mobile-playerunknowns-battlegrounds-5k-5120x2880-8276.jpg'),
(79, 18, 'imgchitiet/657b200c84365_pubg-mobile-playerunknowns-battlegrounds-5k-5120x2880-8279.jpg'),
(80, 18, 'imgchitiet/657b200c845e7_pubg-mobile-playerunknowns-battlegrounds-5k-6843x3849-8280.jpg'),
(81, 4, 'imgchitiet/657b209b8bec7_grand-theft-auto-vi-5120x2880-13621.png'),
(82, 4, 'imgchitiet/657b209b8c339_gta-6-official-5120x2880-13626.jpg'),
(83, 4, 'imgchitiet/657b209b8c62e_gta-6-vice-city-3840x2160-13623.jpg'),
(84, 19, 'imgchitiet/657b23d7ed0c7_image-61c2604ab3cf5.png'),
(85, 19, 'imgchitiet/657b23d7ed324_image-1556-fifa.jpg'),
(86, 19, 'imgchitiet/657b23d7ed51a_image-1572-fifa.jpg'),
(87, 20, 'imgchitiet/657b23e4d3c0e_image-60526884e320c.png'),
(88, 20, 'imgchitiet/657b23e4d3e71_maxresdefault (1).jpg'),
(89, 20, 'imgchitiet/657b23e4d3ff4_Top-10-doi-hinh-fifa-online4-khung-nhat-the-gioi.png'),
(92, 52, 'imgchitiet/657b24aa2a702_fo3chitiet.jpg'),
(114, 22, 'imgchitiet/658592f8f1215_csgo1chitiet.jpg'),
(115, 22, 'imgchitiet/658592f8f13a9_csgo2chitiet.jpg'),
(117, 43, 'imgchitiet/6585932b2e474_657b1fbbed34e_14325428744_1f561b7125_b.jpg'),
(118, 43, 'imgchitiet/6585932b2e5a5_657b1fbbed52a_maxresdefault.jpg'),
(119, 52, 'imgchitiet/6585935a9b217_657aeb143266f_photo-1-1590164050752818441954.webp'),
(120, 52, 'imgchitiet/6585935a9b392_657b23d7ed0c7_image-61c2604ab3cf5.png'),
(121, 52, 'imgchitiet/6585935a9b576_657b23d7ed51a_image-1572-fifa.jpg'),
(122, 21, 'imgchitiet/6597ebe27afa4_Screenshot 2023-07-11 214544.png'),
(123, 21, 'imgchitiet/6597ebe27b707_Screenshot 2023-07-10 211001.png'),
(124, 21, 'imgchitiet/6597ebe27ba18_Screenshot 2023-07-11 013753.png'),
(125, 21, 'imgchitiet/6597ebe27bc8e_Screenshot 2023-07-11 204517.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(100) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_name`, `menu_link`) VALUES
(2, 'sản phẩm', 'sanpham.php'),
(3, 'nạp tiền', 'naptien.php'),
(4, 'bình luận', 'feedback.php'),
(5, 'liên hệ', 'lienhe.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_notify`
--

CREATE TABLE `tbl_notify` (
  `id` int(100) NOT NULL,
  `notify_name` varchar(100) NOT NULL,
  `notify_img` varchar(100) NOT NULL,
  `notify_stt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_notify`
--

INSERT INTO `tbl_notify` (`id`, `notify_name`, `notify_img`, `notify_stt`) VALUES
(1, 'Ưu đãi đặc biệt', 'img/accfo1.jpg', 'Mua ngay'),
(3, 'Vận chuyển ', 'img/acccsgo1.jpg', 'Mua ngay'),
(4, 'Đăng kí nhận ưu đãi', 'img/accpubg1.jpg', 'Đăng kí ngay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(100) NOT NULL,
  `category` int(100) NOT NULL,
  `deal` int(100) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gia` int(100) NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category`, `deal`, `tensp`, `gia`, `trangthai`, `img`, `ghichu`) VALUES
(4, 3, 1, 'accgta1', 499999, '-30%', 'img/658592695dbeb_accgta1.jpg', '112'),
(16, 4, 2, 'acccsgo1', 200000, '-50%', 'img/65859279c4f5a_acccsgo1.jpg', '1'),
(18, 1, 2, 'accpubg2', 800000, '-50%', 'img/65859289f14f4_accpubg2.jpg', '0'),
(19, 2, 1, 'accfo3', 799999, '-30%', 'img/65859296116ca_accfo3.jpg', '0'),
(20, 2, 3, 'accfo2', 500000, '-70%', 'img/658592a58ec2e_accfo2.jpg', '1'),
(21, 12, 0, 'accnaraka1', 800000, 'Sẵn sàng', 'img/658592d8828ac_accnarak1.jpg', '132'),
(22, 1, 0, 'accpubg1', 800000, 'Sẵn sàng', 'img/accpubg1.jpg', 'trung đẹp trai'),
(43, 4, 0, 'acccsgo2', 799999, 'Sẵn sàng', 'img/6585932b2cfb6_acccsgo2.jpg', '1'),
(52, 2, 0, 'accfo1', 100000, 'Sẵn sàng', 'img/6585935a9a960_accfo1.jpg', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pw` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `sodu` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `address`, `email`, `user_name`, `user_pw`, `role`, `sodu`) VALUES
(29, 'Nguyễn Đức Trung', '385 Nguyễn Văn Linh', 'nguyendtrunq@gmail.com', 'Nguyen DTrung', '$2y$10$oR/khIzKqe21Ctl8SrheMemUp6QG/00alIPgWmHligQwh.iU3lKDy', 0, 1255445),
(31, 'Nguyễn Đức Trung', '385 Nguyễn Văn Linh', 'lupinduq@gmail.com', 'trungdeptrai', '$2y$10$e4HoUXn3n1OG56fOKhIFyOlpTAt4kEEWi/DYR9x9jUZiZXR/EDQwq', 0, 10000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `update_balance`
--

CREATE TABLE `update_balance` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `deposits` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `payment_infor`
--
ALTER TABLE `payment_infor`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_deal`
--
ALTER TABLE `tbl_deal`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Chỉ mục cho bảng `tbl_notify`
--
ALTER TABLE `tbl_notify`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_product_ibfk_1` (`category`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `update_balance`
--
ALTER TABLE `update_balance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `payment_infor`
--
ALTER TABLE `payment_infor`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_deal`
--
ALTER TABLE `tbl_deal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_notify`
--
ALTER TABLE `tbl_notify`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `update_balance`
--
ALTER TABLE `update_balance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
