-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2024 lúc 09:44 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_lam_phuong_thuy`
--

CREATE TABLE `db_lam_phuong_thuy` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `ImageURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_lam_phuong_thuy`
--

INSERT INTO `db_lam_phuong_thuy` (`ID`, `Title`, `Description`, `ImageURL`) VALUES
(1, 'Laravel Programming', 'This is a longer card with supporting text below as a natural lead-in to additional content.', 'laravel.png'),
(2, '.NET Programming', 'This is a longer card with supporting text below as a natural lead-in to additional content.', 'dot-net.png'),
(3, 'Spring Boot Programming', 'This is a longer card with supporting text below as a natural lead-in to additional content.', 'spring-boot.png'),
(4, 'Angular Programming', 'This is a longer card with supporting text below as a natural lead-in to additional content.', 'angular.png'),
(5, 'React Programming', 'Learn how to build powerful user interfaces with React.', 'react.png'),
(6, 'Vue.js Programming', 'Master the basics of Vue.js, a popular JavaScript framework.', 'vuejs.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
