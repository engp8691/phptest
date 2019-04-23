<?php
	require './Singleton.php';
	$phone = $_GET['phone'];

	function validate_mobile($number) {
		$pattern = '/^[0-9\-\(\)\/\+\s]*$/';
		preg_match($pattern, $number, $matches);
	
		return true;	
	}

	header('Content-Type: application/json');
	$result = array();

/*
	if(validate_mobile($phone)){
		$result["status"]="failed";
		echo json_encode($result);
		exit(1);
	}
*/

	$instance = ConnectDb::getInstance();
	$conn = $instance->getConnection();
	$stmt = $conn->prepare("SELECT * FROM phonebook where phone = ?");

	if ($stmt->execute(array($phone))){
		$count = $stmt->rowCount();
		if($count>0){
			$result["status"]="success";
			$result["count"]=$count;
		}else{
			$result["status"]="failed";
		}
	}else{
		$result["status"]="failed";
	}

	echo json_encode($result);
