-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 12:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'เรื่องทั่วไป'),
(2, 'เรื่องเรียน'),
(3, 'เรื่องกีฬา');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(20148) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `post_date`, `user_id`, `post_id`) VALUES
(4, 'ผมมีให้คุณยืม300 จะโอนให้พรุ่งนี้เที่ยง', '2023-06-22 11:46:37', 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `content` varchar(2048) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `post_date`, `cat_id`, `user_id`) VALUES
(5, 'มีใครติวแคลให้ได้มั้ย', 'หาเพื่อนติวแคล อ่านสอบไม่ทันแล้ว', '2023-06-22 11:40:11', 2, 3),
(6, 'มีใครไปคอนเสิร์ต blackpink มั้ย', 'อยากหาเพื่อนไป เหงาๆ', '2023-06-22 11:40:23', 1, 3),
(7, 'admin มาแล้วจ้า', 'กลับมาแบ้ว', '2023-06-22 11:40:48', 1, 2),
(8, 'สวัสดี ผมโตโน่เอง', 'เชิญมาชมคอนเสิร์ทผมได้', '2023-06-22 11:42:55', 1, 9),
(9, 'หาเพื่อนไปเตะบอล แมนๆ', 'วันนี้สามทุ่มตรง', '2023-06-22 11:43:18', 3, 9),
(11, 'ช่วยด้วยเราติด ติดเงินเพื่อน', 'ไม่มีเงินทำไงดี ขอยืมหน่อย', '2023-06-22 11:45:23', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `gender` char(11) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `role` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `gender`, `email`, `role`) VALUES
(1, 'Apinun', '1fc2c85be667c2ad0061a9fa04df66dd15c09827', 'APINUN UMBAO', 'm', 'apinun893@gmail.com', 'a'),
(2, 'admin', '8dc9fa69ec51046b4472bb512e292d959edd2aef', 'Admin_User', 'm', 'ad000@webkakkak.com', 'a'),
(3, 'member', 'b54df48c4c77522382a5a3c2f0358573ad43746e', 'Member_User', 'm', 'mem00@memkakkak.com', 'm'),
(4, '้host', 'fa4fc200483c8c1eea40b64f9ca4b06078ac51e6', 'Host', 'm', 'host@webkakkak.com', 'm'),
(5, 'Meowoem', 'urmawofjopvjjdvaiufugadjkvpsdf9heja01jnjk3u44803nfsjf', 'Mrekt', 'Attack heli', 'urtypicalmoh@hotmail.jakepaul', 'T'),
(6, 'Natacha', 'efe4508236b150bc6517dc2b3537a8759952fe05', 'Natalia Natacha', 'f', 'letudive@gmail.com', 'm'),
(7, 'pp', '6d3236ec3c88039ca534b81acad564e847ecb062', 'pp', 'm', 'pp@gmail.com', 'm'),
(8, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a', 'm', 'a', 'm'),
(9, 'โตโน่', '44df027dcf2a9ec7736a2663848489e2c3a7f3c4', 'tono naja', 'm', 'tono@email.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
