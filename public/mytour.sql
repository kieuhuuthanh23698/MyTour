-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 05, 2019 lúc 05:43 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mytour`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetail`
--

CREATE TABLE `billdetail` (
  `id_bill` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `roomquantum` int(11) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id_bills` int(11) NOT NULL,
  `id_dest` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerPhone` varchar(11) NOT NULL,
  `totalMoney` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `convenience`
--

CREATE TABLE `convenience` (
  `id_convenience` int(11) NOT NULL,
  `convenienceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conveniencedetail`
--

CREATE TABLE `conveniencedetail` (
  `id_desc` int(11) NOT NULL,
  `id_conve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `destination`
--

CREATE TABLE `destination` (
  `id_destination` int(11) NOT NULL,
  `destinationName` varchar(100) NOT NULL,
  `destinationEmail` varchar(50) NOT NULL,
  `destinationPhone` varchar(11) NOT NULL,
  `destinationAddress` varchar(100) NOT NULL,
  `destinationWard` varchar(50) NOT NULL,
  `destinationDistrice` varchar(50) NOT NULL,
  `destinationCounty` varchar(50) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `id_prop` int(2) NOT NULL,
  `destinationUser` varchar(50) NOT NULL,
  `destinationPassword` varchar(50) NOT NULL,
  `star` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `propertytype`
--

CREATE TABLE `propertytype` (
  `id_property` int(2) NOT NULL,
  `propertyName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomtype`
--

CREATE TABLE `roomtype` (
  `id_roomType` int(11) NOT NULL,
  `roomTypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomtypedetail`
--

CREATE TABLE `roomtypedetail` (
  `id_dest` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `area` float NOT NULL,
  `view` varchar(50) NOT NULL,
  `sigleQuantum` int(11) NOT NULL,
  `doubleQuantum` int(11) NOT NULL,
  `quantum` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `serviceextra`
--

CREATE TABLE `serviceextra` (
  `id_serviceExtra` int(11) NOT NULL,
  `serviceExtraName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `serviceextradetail`
--

CREATE TABLE `serviceextradetail` (
  `id_dest` int(11) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`id_bill`,`id_room`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id_bills`);

--
-- Chỉ mục cho bảng `convenience`
--
ALTER TABLE `convenience`
  ADD PRIMARY KEY (`id_convenience`);

--
-- Chỉ mục cho bảng `conveniencedetail`
--
ALTER TABLE `conveniencedetail`
  ADD PRIMARY KEY (`id_desc`,`id_conve`);

--
-- Chỉ mục cho bảng `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id_destination`);

--
-- Chỉ mục cho bảng `propertytype`
--
ALTER TABLE `propertytype`
  ADD PRIMARY KEY (`id_property`);

--
-- Chỉ mục cho bảng `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id_roomType`);

--
-- Chỉ mục cho bảng `roomtypedetail`
--
ALTER TABLE `roomtypedetail`
  ADD PRIMARY KEY (`id_dest`,`id_room`);

--
-- Chỉ mục cho bảng `serviceextra`
--
ALTER TABLE `serviceextra`
  ADD PRIMARY KEY (`id_serviceExtra`);

--
-- Chỉ mục cho bảng `serviceextradetail`
--
ALTER TABLE `serviceextradetail`
  ADD PRIMARY KEY (`id_dest`,`id_service`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id_bills` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `convenience`
--
ALTER TABLE `convenience`
  MODIFY `id_convenience` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `destination`
--
ALTER TABLE `destination`
  MODIFY `id_destination` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `propertytype`
--
ALTER TABLE `propertytype`
  MODIFY `id_property` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id_roomType` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `serviceextra`
--
ALTER TABLE `serviceextra`
  MODIFY `id_serviceExtra` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
