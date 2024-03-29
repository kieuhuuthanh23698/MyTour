<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_data');
		$this->load->library('session');
		//$this->load->helper('cart_helper');
	}

	public function index()
	{
		
		$view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['banner'] = $this->load->view('home/banner', NULL, TRUE);
		$view['search'] = $this->load->view('home/search', NULL, TRUE);
		$data['des'] = $this->M_data->load_query('select `id_destination` ,`destinationName`, `destinationImage` as img1, MIN(price) AS MinPrice, MIN(price) - MIN(price)/10 AS Sale 
			FROM `destination`, `roomtypedetail`
			WHERE `destination`.`id_destination` = `roomtypedetail`.`id_dest`
			GROUP BY `roomtypedetail`.`id_dest`
			ORDER BY `MinPrice` ASC
			LIMIT 0,5
			');
		$view['body'] = $this->load->view('page/bodyTrangchu', $data, TRUE);
		$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', $footerContent, TRUE);
		$this->load->view('home/masterHome', $view);
	}

	public function search()
	{
		$view['header'] = $this->load->view('home/header', NULL, TRUE);

		$city = $this->input->get('search_box');
		$dateFrom =  $this->input->get('timeCheckIn');
		$dateTo =  $this->input->get('timeCheckOut');
		$numRoom =  $this->input->get('numRoom');

		$quantumProduct = 9;
        $page = 1;
        $limit1 = ($page-1)* $quantumProduct;
        $limit2 = $quantumProduct;

		$query = "select * FROM (select `roomtypedetail`.`id_dest`, `roomtypedetail`.`id_room`, (SUM(`quantum`) -  SUM(COALESCE(`roomquantum`,0))) AS EmptyRoom FROM `roomtypedetail` LEFT JOIN (select id_dest, id_room, `roomquantum`FROM `billdetail`, `bills`WHERE ";
		if($dateFrom != '' && $dateTo != '')
		$query .= "((`dateFrom` BETWEEN '".$dateFrom."' AND '".$dateTo."') OR (`dateTo` BETWEEN '".$dateFrom."' AND '".$dateTo."'))
		AND";
		$query .="`bills`.`id_bills` = `billdetail`.`id_bill`) AS BookedBills ON `roomtypedetail`.`id_room` = `BookedBills`.`id_room`	AND `roomtypedetail`.`id_dest` = `BookedBills`.`id_dest` GROUP BY `id_dest`) AS EmptyRooms, `destination`, `roomtypedetail`
		WHERE `EmptyRooms`.`id_dest`	= `destination`.`id_destination` AND `EmptyRooms`.`id_dest` = `roomtypedetail`.`id_dest`";
		if($numRoom != '')
			$query .= "AND`EmptyRooms`.`EmptyRoom` > ".$numRoom;
		if($city != '')
		{
			$query .= " AND (`destination`.`city` LIKE  '%".$city."%' OR `destination`.`destinationName` LIKE '%".$city."%')";
			$cityID = $this->M_data->load_query("select `destinationCounty` FROM `destination` WHERE `city` = '".$city."' OR `destinationName` = '".$city."' LIMIT 0,1");
			if(count($cityID) > 0)
			{
				//load những huyện của city này
				$result_search['district'] = $this->M_data->getAPI("https://thongtindoanhnghiep.co/api/city/".$cityID[0]['destinationCounty']."/district");
			}
		}
		$query .= "AND `destination`.`status` = 0 GROUP BY `roomtypedetail`.`id_dest`";
		$allResult = $this->M_data->load_query($query);
		$result_search['count'] = count($allResult);

		$view['search'] = $this->load->view('home/search', NULL, TRUE);//search bar
		$result_search['destination'] = $this->M_data->load_query($query." limit ".$limit1.",".$limit2);
		$result_search['query'] = $query." limit ".$limit1.",".$limit2;
		$result_search['search_box'] = $city;
		$result_search['dateFrom'] = $dateFrom;
		$result_search['dateTo'] = $dateTo;
		$result_search['convenienceDes'] = $this->M_data->load_query('select * from conveniencedes where status_conven_des = 0');
		$result_search['serviceExtra'] = $this->M_data->load_query('select * from serviceextra');
		$view['body'] = $this->load->view('page/bodySearch', $result_search, TRUE);
		$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', $footerContent, TRUE);
		$this->load->view('home/masterHome', $view);
	}

	public function detailHotel()
	{
		$view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['body'] = $this->load->view('page/bodyChiTietHotel', NULL, TRUE);
		//$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', NULL, TRUE);
		$this->load->view('home/masterHome', $view);	
	}

	public function filter()
	{
       $city = $this->input->post('city');//search box
       $dateFrom = $this->input->post('timeCheckIn');
       $dateTo = $this->input->post('timeCheckOut');
       $numRoom = $this->input->post('numRoom');

       //filter với các giá trị search : search box, dateFrom, dateTo, number room book
       $query = "select  `destination`.`star`, `destination`.`destinationImage`, `destination`.`destinationName`, `destination`.`city`, `destination`.`id_destination`, `roomtypedetail`.`id_room`, EmptyRoom, MIN(`roomtypedetail`.`price`) AS MinPrice FROM (select `roomtypedetail`.`id_dest`, `roomtypedetail`.`id_room`, (SUM(`quantum`) -  SUM(COALESCE(`roomquantum`,0))) AS EmptyRoom FROM `roomtypedetail` LEFT JOIN (select id_dest, id_room, `roomquantum`FROM `billdetail`, `bills`WHERE ";
		if($dateFrom != '' && $dateTo != '')
		$query .= "((`dateFrom` BETWEEN '".$dateFrom."' AND '".$dateTo."') OR (`dateTo` BETWEEN '".$dateFrom."' AND '".$dateTo."'))
		AND";
		$query .="`bills`.`id_bills` = `billdetail`.`id_bill`) AS BookedBills ON `roomtypedetail`.`id_room` = `BookedBills`.`id_room`	AND `roomtypedetail`.`id_dest` = `BookedBills`.`id_dest` GROUP BY `id_dest`) AS EmptyRooms, `destination`, `roomtypedetail`
		WHERE `EmptyRooms`.`id_dest`	= `destination`.`id_destination` AND `EmptyRooms`.`id_dest` = `roomtypedetail`.`id_dest`";
		if($numRoom != '')
			$query .= "AND`EmptyRooms`.`EmptyRoom` >= ".$numRoom;
		if($city != NULL)
			$query .= " AND (`destination`.`city` LIKE  '%".$city."%' OR `destination`.`destinationName` LIKE
		'%".$city."%')";
		$query .= "AND `destination`.`status` = 0 ";



		// filter với loại hình destination
       	$typeDes = json_decode($this->input->post('typeDes'));
       	$queryFilter = '';
       	if($typeDes != NULL)
 		{
	 		$queryFilter .= ' and (';
	 		for($i = 0 ; $i < count($typeDes) ; $i++)
	 		{
	 			if($i == count($typeDes) - 1)
	 				$queryFilter .= 'id_prop = '.$typeDes[$i].')';
	 			else
	 				$queryFilter .= 'id_prop = '.$typeDes[$i].' or ';
	 		}
 			$query .= $queryFilter;
 		}

 		//filter với district id 
 		$district = json_decode($this->input->post('district'));
       	if($district != NULL)
 		{
	 		$queryFilter .= ' and (';
	 		for($i = 0 ; $i < count($district) ; $i++)
	 		{
	 			if($i == count($district) - 1)
	 				$queryFilter .= 'destinationDistrice = '.$district[$i].')';
	 			else
	 				$queryFilter .= 'destinationDistrice = '.$district[$i].' or ';
	 		}
 			$query .= $queryFilter;
 		}

 		//filter với mức giá (so với mức giá thấp nhất của các room của destinatiion)
       $price = json_decode($this->input->post('price'));
       if($price != NULL)
 		{
	 		$queryFilter .= ' and (';
	 		for($i = 0 ; $i < count($price) ; $i++)
	 		{
	 			if($i == count($price) - 1)
	 			{
	 				switch ($price[$i]) {
	 					case '1':
	 						$queryFilter .= ' ( `roomtypedetail`.`price` < 1000000 ) )';
	 						break;
	 					case '2':
	 						$queryFilter .= ' ( `roomtypedetail`.`price` > 1000000 and `roomtypedetail`.`price` < 3000000 ) )';
	 						break;
	 					case '3':
	 						$queryFilter .= ' ( `roomtypedetail`.`price` > 5000000 ) )';
	 						break;
	 				}
	 			}
	 			else
	 			{
	 				switch ($price[$i]) {
	 					case '1':
	 						$queryFilter .= ' ( `roomtypedetail`.`price` < 1000000 ) or ';
	 						break;
	 					case '2':
	 						$queryFilter .= ' ( `roomtypedetail`.`price` > 1000000 and `roomtypedetail`.`price` < 3000000 ) or ';
	 						break;
	 					case '3':
	 						$queryFilter .= ' ( `roomtypedetail`.`price` > 3000000 ) or ';
	 						break;
	 				}
	 			}
	 		}
 			$query .= $queryFilter;
 		}

 		//filter với hạng sao
       $star = json_decode($this->input->post('star'));
       if($star != NULL)
 		{
	 		$queryFilter .= ' and (';
	 		for($i = 0 ; $i < count($star) ; $i++)
	 		{
	 			if($i == count($star) - 1)
	 				$queryFilter .= 'star = '.$star[$i].')';
	 			else
	 				$queryFilter .= 'star = '.$star[$i].' or ';
	 		}
 			$query .= $queryFilter;
 		}

		$query .= "GROUP BY `roomtypedetail`.`id_dest`";		

       $service = json_decode($this->input->post('service'));
       if($service != NULL)
 		{
 			$query = "select * FROM (".$query.") AS `A` LEFT JOIN `serviceextradetail` ON  
 			`A`.`id_destination` = `serviceextradetail`.`id_dest`	WHERE ";
	 		$queryFilter .= '(';
	 		for($i = 0 ; $i < count($service) ; $i++)
	 		{
	 			if($i == count($service) - 1)
	 				$queryFilter .= 'id_service = '.$service[$i].')';
	 			else
	 				$queryFilter .= 'id_service = '.$service[$i].' or ';
	 		}
 			$query .= $queryFilter."GROUP BY id_dest ";
 		}


       $convenience = json_decode($this->input->post('convenience'));
       if($convenience != NULL)
 		{
 			$query = "select * FROM ( ".$query.") AS `B` LEFT JOIN `convenience_des_detail` ON `B`.`id_destination` 
 			= `convenience_des_detail`.`id_conven_dest` WHERE ";
	 		$queryFilter .= '(';
	 		for($i = 0 ; $i < count($convenience) ; $i++)
	 		{
	 			if($i == count($convenience) - 1)
	 				$queryFilter .= 'id_conven_dest = '.$convenience[$i].')';
	 			else
	 				$queryFilter .= 'id_conven_dest = '.$convenience[$i].' or ';
	 		}
 			$query .= $queryFilter;
 		}

 		//filter sắp xếp theo giá
		$orderBy = $this->input->post('orderBy');
		if($orderBy != NULL)
		{
			if($orderBy == 0)
				$query .= " ORDER BY `MinPrice` ASC";
			else
				$query .= " ORDER BY `MinPrice` DESC";

		}

       	$page = $this->input->post('page');
       	//echo "city :".$city."/dateFrom :".$dateFrom."/dateTo :".$dateTo."/numRoom :".$numRoom."/page :".$page;
		//$result_search['page'] = $this->input->post("page");
		//$page = 1;
		$quantumProduct = 5;
        $limit1 = ($page-1)* $quantumProduct;
        $limit2 = $quantumProduct;

        //echo "search box : ".$city;
		$allResult = $this->M_data->load_query($query);//lấy cố lượng record của tất cả kết quả
		$result_search['count'] = count($allResult);//trả về để vẽ phân trang
		$result_search['query'] = $query." limit ".$limit1.",".$limit2;
		//echo $query." limit ".$limit1.",".$limit2;
		$result_search['destination'] = $this->M_data->load_query($query." limit ".$limit1.",".$limit2);//kết quả filter được đã phân trang
		$result_search['search_box'] = $city;
		echo json_encode($result_search);
	}

	//data cho auto complete text search
	public function hotels()
	{
		$query = "select destinationName from destination";
		echo json_encode($this->M_data->load_query($query));
	}

    public function destinationDetail(){
    	$this->session->unset_userdata('bookedRoom');
    	$dateFrom = $this->input->get('dateFrom');
    	$dateTo = $this->input->get('dateTo');
    	$idDes = $this->input->get('idDes');
    	$data['destination'] = $this->M_data->load_query('select * from destination where id_destination = '.$idDes)[0];
    	//var_dump($data['destination']);
    	$queryRoom = "select*FROM(select`a`.`id_dest`, `a`.`area`,`a`.`id_room`,`a`.`imageRoom`,`a`.`view`,`a`.`bed`,`a`.`price`,`quantum`-COALESCE(`roomquantum`,0)AS EmptyRoom
FROM (select*FROM`roomtypedetail`WHERE`roomtypedetail`.`id_dest`=".$idDes.")AS a LEFT JOIN(select id_dest, id_room, `roomquantum`FROM `billdetail`, `bills`WHERE ((`dateFrom` BETWEEN '".$dateFrom."' AND '".$dateTo."') OR (`dateTo` BETWEEN '".$dateFrom."' AND '".$dateTo."')) AND`bills`.`id_bills`=`billdetail`.`id_bill`AND`id_dest`=".$idDes.")AS BookedBills ON `a`.`id_room`=`BookedBills`.`id_room`AND`a`.`id_dest`=`BookedBills`.`id_dest`)AS b,`roomtype`WHERE`b`.`id_room`=`roomtype`.`id_roomType`";
    	$data['rooms'] = $this->M_data->load_query($queryRoom);
    	//var_dump($data['rooms']);
    	$data['conven'] = $this->M_data->load_query("select * from convenience");
    	$data['images'] = $this->M_data->load_query('select * from imageDestination where id_dest = '.$idDes)[0];
        $view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['search'] = $this->load->view('home/search', NULL, TRUE);
		$view['body'] = $this->load->view('page/destinationDetail', $data, TRUE);
		$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', $footerContent, TRUE);
		$this->load->view('home/masterHome', $view);
    }


    public function bookRoom()
    {
    	$id_room = $this->input->post('id_room');
    	$id_dest = $this->input->post('id_dest');
    	$totalDays = $this->input->post('totalDays');
    	$numRoom = $this->input->post('numRoom');
    	if(isset($numRoom) && $numRoom > 0)
    	{

	    	$dateFrom = $this->input->post('dateFrom');
	    	$dateTo = $this->input->post('dateTo');
	    	$room = $this->M_data->load_query("select * FROM `roomtype`, `roomtypedetail` WHERE `roomtype`.`id_roomType` = `roomtypedetail`.`id_room` AND `roomtype`.`id_roomType` = ".$id_room." AND `roomtypedetail`.`id_dest` = ".$id_dest)[0];

	    	$item = array('id_room' => $id_room, 'roomName' => $room['roomTypeName'], 'price'=>$room['price'], 'id_dest' => $id_dest, 'dateFrom' => $dateFrom, 'dateTo' => $dateTo,'totalDays' => $totalDays, 'numRoom'=>$numRoom, 'totalCost' => $numRoom*$room['price']*$totalDays);
	    	
	    	if(!$this->session->has_userdata('bookedRoom'))
    		{
    			$bookedRoom = array();
    			array_push($bookedRoom, $item);
    			$this->session->set_userdata('bookedRoom', $bookedRoom);
    		}
    		else
    		{	

    			$bookedRoom = $this->session->userdata('bookedRoom');
    			$newBookedRoom = $this->M_data->addRoom($bookedRoom, $item);
    			$this->session->set_userdata('bookedRoom', $newBookedRoom);

    		}

    		$total = 0;

    		foreach ($bookedRoom as $k) {
    			$total += $k['totalCost'];
    		}

    		// $data['tr'] = "<tr><td>".$room['roomTypeName']."</td><td>".$room['price']." đ</td><td> ".$numRoom."</td><td><div class='room-time'><div><i class='far fa-calendar'></i><input type='text'name='timeCheckIn' value='".$dateFrom."' readonly/></div><div><i class='far fa-calendar'></i><input type='text' name='timeCheckOut' value='".$dateTo."' readonly/></div></div></td><td>".$numRoom*$room['price']*$totalDays." đ</td><td><button class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></td></tr>";
    		$data['total'] = $total;
    		$data['cart'] = $bookedRoom;
    		echo json_encode($data);
    	}
    }

    public function mapSearch(){
        $this->load->view('page/mapSearch');
    }

}
