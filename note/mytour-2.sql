-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 27, 2019 lúc 09:36 AM
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

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoomInf` (IN `id` INT, IN `dateF` DATE, IN `dateT` DATE, IN `idRoomType` INT)  BEGIN
select roomtypedetail.id_dest, roomtype.id_roomType, roomtype.roomTypeName, sum(roomquantum) as 'total', roomtypedetail.quantum, area, view, bed, price
from roomtypedetail left join (select * from billdetail where (dateF between dateFrom and dateTo) or (dateT between dateFrom and dateTo)  ) as a
ON roomtypedetail.id_room = a.id_room left join roomtype on roomtypedetail.id_room = roomtype.id_roomType left join bills on a.id_bill = bills.id_bills
group by roomtypedetail.id_dest, roomtype.id_roomType, roomtype.roomTypeName, roomtypedetail.quantum, area, view, bed, price
having (total is null or total < quantum) and roomtypedetail.id_dest = id and roomtype.id_roomType = idRoomType ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `roomCanOrder` (IN `id` INT, IN `dateF` DATE, IN `dateT` DATE)  BEGIN
select roomtypedetail.id_dest, roomtype.id_roomType, roomtype.roomTypeName, sum(roomquantum) as 'total', roomtypedetail.quantum, area, view, bed, price
from roomtypedetail left join (select * from billdetail where (dateF between dateFrom and dateTo) or (dateT between dateFrom and dateTo)  ) as a
ON roomtypedetail.id_room = a.id_room left join roomtype on roomtypedetail.id_room = roomtype.id_roomType left join bills on a.id_bill = bills.id_bills
group by roomtypedetail.id_dest, roomtype.id_roomType, roomtype.roomTypeName, roomtypedetail.quantum, area, view, bed, price
having (total is null or total < quantum) and roomtypedetail.id_dest = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adUser` varchar(50) NOT NULL,
  `adPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adUser`, `adPassword`) VALUES
('admin', '123'),
('user', '123');

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

--
-- RELATIONSHIPS FOR TABLE `billdetail`:
--   `id_bill`
--       `bills` -> `id_bills`
--   `id_room`
--       `roomtype` -> `id_roomType`
--   `id_bill`
--       `bills` -> `id_bills`
--

--
-- Đang đổ dữ liệu cho bảng `billdetail`
--

INSERT INTO `billdetail` (`id_bill`, `id_room`, `roomquantum`, `dateFrom`, `dateTo`, `money`) VALUES
(1, 1, 2, '2019-07-18', '2019-07-20', 4000000),
(1, 2, 1, '2019-07-18', '2019-07-21', 2300000);

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

--
-- RELATIONSHIPS FOR TABLE `bills`:
--   `id_dest`
--       `destination` -> `id_destination`
--

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id_bills`, `id_dest`, `id_customer`, `name_cus`, `phone_cus`, `email_cus`, `bill_status`, `address_cus`, `date_createbill`, `totalMoney`) VALUES
(1, 1, 0, 'Nguyễn Hải', '094854733', 'hainguyen@gmail.com', 0, 'Thành Phố Hồ Chí Minh', '2019-07-06 15:03:24', 2000000),
(2, 1, 0, 'Lương Văn Hà', '098488388', 'luongvanha@gmail.com', 1, 'Đà Nẵng', '2019-07-06 15:05:49', 3400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinhsachhuy`
--

CREATE TABLE `chinhsachhuy` (
  `id_dest` int(11) DEFAULT NULL,
  `id_room` int(11) DEFAULT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `chinhsachhuy`:
--

--
-- Đang đổ dữ liệu cho bảng `chinhsachhuy`
--

INSERT INTO `chinhsachhuy` (`id_dest`, `id_room`, `noi_dung`) VALUES
(1, 1, '<ul>\n	<li>Huỷ miễn ph&iacute; trước&nbsp;<strong>7 ng&agrave;y</strong>&nbsp;so với ng&agrave;y nhận ph&ograve;ng.</li>\n	<li>Huỷ trước&nbsp;<strong>3 ng&agrave;y</strong>&nbsp;so với ng&agrave;y nhận ph&ograve;ng, t&iacute;nh ph&iacute;&nbsp;<strong>50%</strong>&nbsp;gi&aacute; trị đơn ph&ograve;ng.</li>\n	<li>Kh&aacute;ch&nbsp;<strong>kh&ocirc;ng đến</strong>&nbsp;hoặc huỷ trong v&ograve;ng&nbsp;<strong>3</strong>&nbsp;ng&agrave;y so với ng&agrave;y nhận ph&ograve;ng, t&iacute;nh ph&iacute;&nbsp;<strong>100%</strong>&nbsp;gi&aacute; trị đơn ph&ograve;ng.</li>\n</ul>\n'),
(1, 2, '<ul>\n	<li>Huỷ miễn ph&iacute; trước&nbsp;<strong>7 ng&agrave;y</strong>&nbsp;so với ng&agrave;y nhận ph&ograve;ng.</li>\n	<li>Huỷ trước&nbsp;<strong>3 ng&agrave;y</strong>&nbsp;so với ng&agrave;y nhận ph&ograve;ng, t&iacute;nh ph&iacute;&nbsp;<strong>50%</strong>&nbsp;gi&aacute; trị đơn ph&ograve;ng.</li>\n	<li>Kh&aacute;ch&nbsp;<strong>kh&ocirc;ng đến</strong>&nbsp;hoặc huỷ trong v&ograve;ng&nbsp;<strong>3</strong>&nbsp;ng&agrave;y so với ng&agrave;y nhận ph&ograve;ng, t&iacute;nh ph&iacute;&nbsp;<strong>100%</strong>&nbsp;gi&aacute; trị đơn ph&ograve;ng.</li>\n</ul>\n'),
(1, 3, '<ul>\n	<li>Huỷ miễn ph&iacute; trước&nbsp;<strong>7 ng&agrave;y</strong>&nbsp;so với ng&agrave;y nhận ph&ograve;ng.</li>\n	<li>Huỷ trước&nbsp;<strong>3 ng&agrave;y</strong>&nbsp;so với ng&agrave;y nhận ph&ograve;ng, t&iacute;nh ph&iacute;&nbsp;<strong>50%</strong>&nbsp;gi&aacute; trị đơn ph&ograve;ng.</li>\n	<li>Kh&aacute;ch&nbsp;<strong>kh&ocirc;ng đến</strong>&nbsp;hoặc huỷ trong v&ograve;ng&nbsp;<strong>3</strong>&nbsp;ng&agrave;y so với ng&agrave;y nhận ph&ograve;ng, t&iacute;nh ph&iacute;&nbsp;<strong>100%</strong>&nbsp;gi&aacute; trị đơn ph&ograve;ng.</li>\n</ul>\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chinhsachphuthu`
--

CREATE TABLE `chinhsachphuthu` (
  `id_phuthu` int(255) NOT NULL,
  `id_dest` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `dieukien` text NOT NULL,
  `mucphi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `chinhsachphuthu`:
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `convenience`
--

CREATE TABLE `convenience` (
  `id_convenience` int(11) NOT NULL,
  `convenienceName` varchar(50) NOT NULL,
  `icon_conven` varchar(100) NOT NULL,
  `status_conven_room` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `convenience`:
--

--
-- Đang đổ dữ liệu cho bảng `convenience`
--

INSERT INTO `convenience` (`id_convenience`, `convenienceName`, `icon_conven`, `status_conven_room`) VALUES
(1, 'Điều hòa nhiệt độ', '<i class=\"far fa-fan\"></i>', 0),
(2, 'Máy sấy tóc', '<i class=\"far fa-fan\"></i>', 0),
(3, 'Truyền hình vệ tinh/cáp', '<i class=\"far fa-fan\"></i>', 0),
(4, 'Tủ lạnh', '<i class=\"far fa-fan\"></i>', 0),
(5, 'Dép đi trong phòng', '<i class=\"far fa-fan\"></i>', 0),
(6, 'Tivi màn hình phẳng', '<i class=\"far fa-fan\"></i>', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conveniencedes`
--

CREATE TABLE `conveniencedes` (
  `id_convenDes` int(11) NOT NULL,
  `name_convenDes` varchar(255) NOT NULL,
  `status_conven_des` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `conveniencedes`:
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conveniencedetail`
--

CREATE TABLE `conveniencedetail` (
  `id_desc` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_conve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `conveniencedetail`:
--   `id_conve`
--       `convenience` -> `id_convenience`
--   `id_desc`
--       `destination` -> `id_destination`
--   `id_conve`
--       `convenience` -> `id_convenience`
--

--
-- Đang đổ dữ liệu cho bảng `conveniencedetail`
--

INSERT INTO `conveniencedetail` (`id_desc`, `id_room`, `id_conve`) VALUES
(1, 1, 1),
(1, 1, 3),
(1, 2, 1),
(1, 2, 2),
(1, 2, 3),
(1, 3, 4),
(1, 3, 5),
(1, 3, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `convenience_des_detail`
--

CREATE TABLE `convenience_des_detail` (
  `id_dest` int(11) NOT NULL,
  `id_conven_dest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `convenience_des_detail`:
--   `id_conven_dest`
--       `conveniencedes` -> `id_convenDes`
--

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
  `cancelTime` int(2) DEFAULT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `destination`:
--   `id_prop`
--       `propertytype` -> `id_property`
--

--
-- Đang đổ dữ liệu cho bảng `destination`
--

INSERT INTO `destination` (`id_destination`, `destinationName`, `destinationEmail`, `destinationPhone`, `destinationAddress`, `destinationWard`, `destinationDistrice`, `destinationCounty`, `lat`, `lng`, `id_prop`, `destinationUser`, `destinationPassword`, `star`, `cancelTime`, `district`, `city`, `status`) VALUES
(1, 'Khách sạn bloom Đà Nẵng', 'bloom@gmail.com', '094847837', '204 Đường 3-2', '912', '77', '4', 0, 0, 1, 'bloom', '123', 5, 30, 'Hóc Môn', 'TP Hồ Chí Minh', 0),
(2, 'Khách Sạn Majestic Premium Nha Trang', 'nhatrang@gmail.com', '098584738', '', '', '', '', 0, 0, 0, 'nhatrang', '123', 0, NULL, '', '', 1),
(9, 'Khách Sạn Queen Ann Nha Trang', 'queen@gmail.com', '0943883', '', '', '', '', 0, 0, 0, 'queen', '123', 0, NULL, '', '', 1),
(10, 'Khách Sạn Agnes Nha Trang', '', '109283832', '', '', '', '', 0, 0, 0, 'agnes', '123', 0, NULL, '', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luu_y`
--

CREATE TABLE `luu_y` (
  `id_dest` int(11) DEFAULT NULL,
  `id_room` int(11) DEFAULT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `luu_y`:
--

--
-- Đang đổ dữ liệu cho bảng `luu_y`
--

INSERT INTO `luu_y` (`id_dest`, `id_room`, `noi_dung`) VALUES
(1, 1, '<ul>\n	<li>&nbsp;</li>\n</ul>\n'),
(1, 2, '<ul>\n	<li>&nbsp;</li>\n</ul>\n'),
(1, 3, '<ul>\n	<li>&nbsp;</li>\n</ul>\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `propertytype`
--

CREATE TABLE `propertytype` (
  `id_property` int(2) NOT NULL,
  `propertyName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `propertytype`:
--

--
-- Đang đổ dữ liệu cho bảng `propertytype`
--

INSERT INTO `propertytype` (`id_property`, `propertyName`) VALUES
(1, 'Khách Sạn'),
(2, 'Resort');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomtype`
--

CREATE TABLE `roomtype` (
  `id_roomType` int(11) NOT NULL,
  `roomTypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `roomtype`:
--

--
-- Đang đổ dữ liệu cho bảng `roomtype`
--

INSERT INTO `roomtype` (`id_roomType`, `roomTypeName`) VALUES
(1, 'Standard Double'),
(2, 'Superior Double'),
(3, 'Superior Twin'),
(4, 'Deluxe Double');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roomtypedetail`
--

CREATE TABLE `roomtypedetail` (
  `id_dest` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `imageRoom` varchar(50) NOT NULL,
  `area` float NOT NULL,
  `view` varchar(50) NOT NULL,
  `bed` varchar(50) NOT NULL,
  `quantum` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `roomtypedetail`:
--   `id_dest`
--       `destination` -> `id_destination`
--   `id_room`
--       `roomtype` -> `id_roomType`
--

--
-- Đang đổ dữ liệu cho bảng `roomtypedetail`
--

INSERT INTO `roomtypedetail` (`id_dest`, `id_room`, `imageRoom`, `area`, `view`, `bed`, `quantum`, `price`) VALUES
(1, 1, '1.jpg', 16, 'Hướng phố', '1 Giường đôi', 10, 273000),
(1, 2, '2.jpg', 22, 'Hướng phố', '1 Giường đơn, 1 Giường đôi', 20, 364000),
(1, 3, '3.jpg', 35, 'Hướng phố', '1 Giường đơn, 2 Giường đôi', 30, 546000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `serviceextra`
--

CREATE TABLE `serviceextra` (
  `id_serviceExtra` int(11) NOT NULL,
  `serviceExtraName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `serviceextra`:
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `serviceextradetail`
--

CREATE TABLE `serviceextradetail` (
  `id_dest` int(11) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `serviceextradetail`:
--   `id_dest`
--       `destination` -> `id_destination`
--   `id_service`
--       `serviceextra` -> `id_serviceExtra`
--

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adUser`);

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
-- Chỉ mục cho bảng `chinhsachphuthu`
--
ALTER TABLE `chinhsachphuthu`
  ADD PRIMARY KEY (`id_phuthu`) USING BTREE;

--
-- Chỉ mục cho bảng `convenience`
--
ALTER TABLE `convenience`
  ADD PRIMARY KEY (`id_convenience`,`convenienceName`) USING BTREE;

--
-- Chỉ mục cho bảng `conveniencedes`
--
ALTER TABLE `conveniencedes`
  ADD PRIMARY KEY (`id_convenDes`);

--
-- Chỉ mục cho bảng `conveniencedetail`
--
ALTER TABLE `conveniencedetail`
  ADD PRIMARY KEY (`id_desc`,`id_room`,`id_conve`) USING BTREE,
  ADD KEY `id_conve` (`id_conve`);

--
-- Chỉ mục cho bảng `convenience_des_detail`
--
ALTER TABLE `convenience_des_detail`
  ADD PRIMARY KEY (`id_dest`,`id_conven_dest`),
  ADD KEY `id_conven_dest` (`id_conven_dest`);

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id_bills` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chinhsachphuthu`
--
ALTER TABLE `chinhsachphuthu`
  MODIFY `id_phuthu` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `convenience`
--
ALTER TABLE `convenience`
  MODIFY `id_convenience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `conveniencedes`
--
ALTER TABLE `conveniencedes`
  MODIFY `id_convenDes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `destination`
--
ALTER TABLE `destination`
  MODIFY `id_destination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `propertytype`
--
ALTER TABLE `propertytype`
  MODIFY `id_property` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id_roomType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `billdetail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id_bills`);

--
-- Các ràng buộc cho bảng `conveniencedetail`
--
ALTER TABLE `conveniencedetail`
  ADD CONSTRAINT `conveniencedetail_ibfk_1` FOREIGN KEY (`id_conve`) REFERENCES `convenience` (`id_convenience`);

--
-- Các ràng buộc cho bảng `convenience_des_detail`
--
ALTER TABLE `convenience_des_detail`
  ADD CONSTRAINT `convenience_des_detail_ibfk_2` FOREIGN KEY (`id_conven_dest`) REFERENCES `conveniencedes` (`id_convenDes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
