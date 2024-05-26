-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2024 lúc 06:41 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `exploreist`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `CategoriesID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`CategoriesID`, `Name`, `Image`) VALUES
(1, 'Camping', 'banner-1.jpg'),
(2, 'Hiking', 'banner-2.jpg'),
(3, 'Forest', 'banner-3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `CommentDate` datetime DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`CommentID`, `Content`, `CommentDate`, `UserID`, `PostID`) VALUES
(1, 't', '2024-05-01 18:46:02', 2, 1),
(2, 'a', '2024-05-26 17:46:42', 3, 5),
(3, 'dfg', '2024-05-26 17:50:33', 3, 5),
(4, 'w', '2024-05-26 17:50:56', 3, 6),
(5, 'ádasdasd', '2024-05-26 18:13:06', 3, 5),
(6, 'hihihi', '2024-05-26 18:49:40', 3, 5),
(7, 'er', '2024-05-26 18:50:37', 3, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(300) DEFAULT NULL,
  `Subject` varchar(500) DEFAULT NULL,
  `Message` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`FirstName`, `LastName`, `Email`, `Subject`, `Message`) VALUES
('a', 'a', 'a@gmail.com', 'a', 'a'),
('i', 'i', 'a@gmail.com', 'a', '88'),
('aa', 'aaa', 'a@gmail.com', 'a', 'a'),
('6', '6', 'a@gmail.com', '6', '6'),
('abbbbbbb', 'bbbbbbbb', 'bbbbb@gmail.com', 'bbbbbb', 'bbbbbb');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `PostDate` datetime NOT NULL,
  `UserID` int(11) NOT NULL,
  `CategoriesID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`PostID`, `Title`, `Content`, `PostDate`, `UserID`, `CategoriesID`, `Image`) VALUES
(5, 'kj-', 'jasrwerwerjwej;wkejr;kjerk;jwe;krjlkwehrlwherlhwlejkrhkjwehrkwherjkw kqwerhjlkqhr\r\n]wqerjoiqwehrljkqwehrjlkhwerl jwqel;rjwkehrlqejwr]\r\nqưer\r\n ưqer\r\n\r\nưer\r\nwerjasrwerwerjwej;wkejr;kjerk;jwe;krjlkwehrlwherlhwlejkrhkjwehrkwherjkw kqwerhjlkqhr\r\n]wqerjoiqwehrljkqwehrjlkhwerl jwqel;rjwkehrlqejwr]\r\nqưer\r\n ưqer\r\n\r\nưer\r\nưerjasrwerwerjwej;wkejr;kjerk;jwe;krjlkwehrlwherlhwlejkrhkjwehrkwherjkw kqwerhjlkqhr\r\n]wqerjoiqwehrljkqwehrjlkhwerl jwqel;rjwkehrlqejwr]\r\nqưer\r\n ưqer\r\n\r\nưer\r\nưerjasrwerwerjwej;wkejr;kjerk;jwe;krjlkwehrlwherlhwlejkrhkjwehrkwherjkw kqwerhjlkqhr\r\n]wqerjoiqwehrljkqwehrjlkhwerl jwqel;rjwkehrlqejwr]\r\nqưer\r\n ưqer\r\n\r\nưer\r\nưerjasrwerwerjwej;wkejr;kjerk;jwe;krjlkwehrlwherlhwlejkrhkjwehrkwherjkw kqwerhjlkqhr\r\n]wqerjoiqwehrljkqwehrjlkhwerl jwqel;rjwkehrlqejwr]\r\nqưer\r\n ưqer\r\n\r\nưer\r\nưerjasrwerwerjwej;wkejr;kjerk;jwe;krjlkwehrlwherlhwlejkrhkjwehrkwherjkw kqwerhjlkqhr\r\n]wqerjoiqwehrljkqwehrjlkhwerl jwqel;rjwkehrlqejwr]\r\nqưer\r\n ưqer\r\n\r\nưer\r\nưerjasrwerwerjwej;wkejr;kjerk;jwe;krjlkwehrlwherlhwlejk', '2024-05-11 15:45:00', 3, 1, 'Screenshot_20240302-212622.png'),
(6, 'a', 'a', '2024-05-08 16:19:00', 3, 2, ''),
(7, 'hihihih', 'sfweewrwerwetwewerwer', '2024-05-18 18:50:00', 3, 1, 'Biểu đồ không có tiêu đề-User.drawio.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(10) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `DOB`, `Email`, `FullName`, `Password`) VALUES
(2, 't', '2006-05-18 18:16:24', 't', 't', '0cc175b9c0f1b6a831c399e269772661'),
(3, 'a', '0000-00-00 00:00:00', 'a@gmail.com', 'a', '0cc175b9c0f1b6a831c399e269772661'),
(4, 'b', '0000-00-00 00:00:00', 'b@gmail.com', 'b', '92eb5ffee6ae2fec3ad71c777531578f'),
(5, 'c', '0000-00-00 00:00:00', 'c@gmail.com', 'c', '4a8a08f09d37b73795649038408b5f33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoriesID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `FK_user_id_comment` (`UserID`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `CategoriesID` (`CategoriesID`),
  ADD KEY `FK_user_id` (`UserID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_user_id_comment` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`CategoriesID`) REFERENCES `categories` (`CategoriesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
