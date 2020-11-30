-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2020 lúc 09:04 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `testdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `userId`, `content`, `images`, `created`) VALUES
(66, 17, 'wesaspiciatis consequatur laudantium! Illo assumenda quaerat nemo porro! Nesciunt expedita veritatis voluptas impedit officiis cupiditate animi dignissimos ipsa deserunt! Dicta illum neque accusantium quia exercitationem atque eligendi quae placeat. Porro temporibus esse blanditiis quaerat ad aliquam dolorem necessitatibus, voluptas officiis expedita possimus animi asperiores fugiat quos delectus dolor non iure id repudiandae nostrum rerum perferendis pariatur a. Libero quos itaque possimus alias amet porro blanditiis, adipisci, eius accusantium perspiciatis in deleniti. Te', 'IMG_20201030_122007.jpg', '2020-11-16 09:05:29'),
(67, 17, 'sadasd', '848943d4-0afd-42b3-a374-d02544ab357c.png', '2020-11-24 09:13:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text NOT NULL DEFAULT '0.jpg',
  `activation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `avatar`, `activation`) VALUES
(17, 'a', 'Nguyen Minh Hieu', 'hhiieeuu11@gmail.com', '$2y$10$CQ7OWs0.KKEnMn.CUUjq/ePdn.c58CPPhTkufW1zAcR7SfSDALEOG', '17.jpg', NULL),
(19, 's', 'Nguyen Minh Hieu', 's@gmail.com', '$2y$10$VGb/xTvrlVSFKJneja5luOjSXtWmV.esVeBWq.EEUDTL4CEAuv8Zi', '0.jpg', '49B5CC608AFE011D9F4E'),
(20, 'd', 'Nguyen Minh Hieu', 'd@gmail.com', '$2y$10$AZG.hZLAZbtXUZMteXFKZeKWEel1GU.q.TWGG3myfZSht6JDUjrdy', '0.jpg', '3017F761EAD58D5BD194'),
(21, 'n', 'Nguyen Hieu', 'n@gmail.com', '$2y$10$n2vxS5pZ.HetwphHzBsSM.bG39RVFHIJl2.zQpNiMpEsq5PVAwuNC', '0.jpg', '4795F0343F4ED8D68C41'),
(22, 'q', 'q', 'q@gmail.com', '$2y$10$L1G4EJ0xc5GYQEvkjnOY7./Fx1W7ndb4V7lgyscaGJUZPK8btLPFG', '0.jpg', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
