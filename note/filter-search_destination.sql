SELECT * FROM
(
	SELECT * FROM
	(
		-- filter service
		SELECT  `destination`.`destinationName`, `destination`.`city`, `destination`.`id_destination`, `roomtypedetail`.`id_room`, EmptyRoom, MIN(`roomtypedetail`.`price`) AS MinPrice
		FROM
		(
		SELECT `roomtypedetail`.`id_dest`, `roomtypedetail`.`id_room`, (SUM(`quantum`) -  SUM(COALESCE(`roomquantum`,0))) AS EmptyRoom 
		FROM `roomtypedetail`
		LEFT JOIN 
			   (
				SELECT id_dest, id_room, `roomquantum`
				FROM `billdetail`, `bills`
				WHERE ((`dateFrom` BETWEEN '2019-7-14' AND '2019-7-20') OR (`dateTo` BETWEEN '2019-7-14' AND '2019-7-20'))
				AND `bills`.`id_bills` = `billdetail`.`id_bill`
			   ) AS BookedBills -- những hóa đơn đặt phòng ĐANG CÓ trong khoảng thời gian từ A - B
			   
		ON `roomtypedetail`.`id_room` = `BookedBills`.`id_room`	AND `roomtypedetail`.`id_dest` = `BookedBills`.`id_dest`
		GROUP BY `id_dest`
		) AS EmptyRooms -- số phòng trống của mỗi khách sạn trong khoảng thời gian từ A - B
		, `destination`, `roomtypedetail`-- những table liên quan đến search, filter : loại hình, mức giá, hạng sao, dịch vụ đi kèm, tiện nghi, huyện
		WHERE `EmptyRooms`.`id_dest` = `destination`.`id_destination` 
		AND `EmptyRooms`.`id_dest` = `roomtypedetail`.`id_dest`
		-- số phòng trống
		AND`EmptyRooms`.`EmptyRoom` >= 10
		-- Input search
		AND (`destination`.`city` LIKE  '%%' OR `destination`.`destinationName` LIKE '%%')
		-- Status
		AND `destination`.`status` = 0
		-- loại hình
		AND (`destination`.`id_prop` = 1 OR `destination`.`id_prop` = 2)
		AND (`destinationDistrice` = 77 OR `destinationDistrice` = 17)
		-- mức giá 
		AND ( ( `roomtypedetail`.`price` < 1000000 ) OR  ( `roomtypedetail`.`price` > 1000000 AND `roomtypedetail`.`price` < 3000000 ) OR  ( `roomtypedetail`.`price` > 5000000 ) )
		-- hạng sao
		AND ( (`star` = 1) OR (`star` = 2) OR (`star` = 3) OR (`star` = 4) OR (`star` = 5) )
		GROUP BY `roomtypedetail`.`id_dest`
	) AS `A` 
	-- filter service
	LEFT JOIN `serviceextradetail`
	ON  `A`.`id_destination` = `serviceextradetail`.`id_dest`
	WHERE ( (`id_service` = 1) OR (`id_service` = 2) OR (`id_service` = 4) )
	GROUP BY id_dest
	
) AS `B` 
-- filter với convnience của destination
LEFT JOIN `convenience_des_detail`
ON `B`.`id_destination` = `convenience_des_detail`.`id_conven_dest`
WHERE ( (`id_conven_dest` = 1) OR (`id_conven_dest` = 2))
ORDER BY `MinPrice` ASC