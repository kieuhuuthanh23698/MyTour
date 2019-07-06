-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 06, 2019 lúc 11:20 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

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
  `id_customer` int(11) NOT NULL,
  `name_cus` varchar(50) NOT NULL,
  `phone_cus` varchar(12) NOT NULL,
  `email_cus` varchar(50) NOT NULL,
  `bill_status` int(1) NOT NULL DEFAULT '0',
  `address_cus` varchar(100) NOT NULL,
  `date_createbill` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id_customers` int(11) NOT NULL,
  `name_customers` int(11) DEFAULT NULL,
  `email_customers` int(11) DEFAULT NULL,
  `phone_customers` int(11) DEFAULT NULL,
  `address_customers` int(11) DEFAULT NULL,
  `user_customer` int(11) DEFAULT NULL,
  `pass_customers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id_customers`, `name_customers`, `email_customers`, `phone_customers`, `address_customers`, `user_customer`, `pass_customers`) VALUES
(0, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `star` int(1) NOT NULL DEFAULT '0',
  `cancelTime` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `destination`
--

INSERT INTO `destination` (`id_destination`, `destinationName`, `destinationEmail`, `destinationPhone`, `destinationAddress`, `destinationWard`, `destinationDistrice`, `destinationCounty`, `lat`, `lng`, `id_prop`, `destinationUser`, `destinationPassword`, `star`, `cancelTime`) VALUES
(1, '', '', '', '', '', '', '', 0, 0, 0, 'admin', 'admin', 0, NULL);

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
  ADD PRIMARY KEY (`id_bills`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_dest` (`id_dest`);

--
-- Chỉ mục cho bảng `convenience`
--
ALTER TABLE `convenience`
  ADD PRIMARY KEY (`id_convenience`);

--
-- Chỉ mục cho bảng `conveniencedetail`
--
ALTER TABLE `conveniencedetail`
  ADD PRIMARY KEY (`id_desc`,`id_conve`),
  ADD KEY `id_conve` (`id_conve`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`);

--
-- Chỉ mục cho bảng `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id_destination`);

- -
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
  ADD PRIMARY KEY (`id_dest`,`id_service`),
  ADD KEY `id_service` (`id_service`);

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
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `destination`
--
ALTER TABLE `destination`
  MODIFY `id_destination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `billdetail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id_bills`);

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customers`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`id_dest`) REFERENCES `destination` (`id_destination`);

--
-- Các ràng buộc cho bảng `conveniencedetail`
--
ALTER TABLE `conveniencedetail`
  ADD CONSTRAINT `conveniencedetail_ibfk_1` FOREIGN KEY (`id_conve`) REFERENCES `convenience` (`id_convenience`),
  ADD CONSTRAINT `conveniencedetail_ibfk_2` FOREIGN KEY (`id_desc`) REFERENCES `destination` (`id_destination`);

--
-- Các ràng buộc cho bảng `roomtypedetail`
--
ALTER TABLE `roomtypedetail`
  ADD CONSTRAINT `roomtypedetail_ibfk_1` FOREIGN KEY (`id_dest`) REFERENCES `destination` (`id_destination`);

--
-- Các ràng buộc cho bảng `serviceextradetail`
--
ALTER TABLE `serviceextradetail`
  ADD CONSTRAINT `serviceextradetail_ibfk_1` FOREIGN KEY (`id_dest`) REFERENCES `destination` (`id_destination`),
  ADD CONSTRAINT `serviceextradetail_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `serviceextra` (`id_serviceExtra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
