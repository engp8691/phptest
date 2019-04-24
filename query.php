<?php
	require_once './Singleton.php';
	require_once "./ReadDataToFile.php";
	require_once "./RecordDBFromFile.php";

	$phone = $_GET['phone'];

	header('Content-Type: application/json');

	$r = new ReadDataToFile($phone);
	$r->download_page();

	$records = new RecordDBFromFile("/tmp/data.txt");
	$result = $records->retrieve();
	$count = sizeof($result);

	$report = array();

	$instance = ConnectDb::getInstance();
	$conn = $instance->getConnection();

	$stmt = $conn->prepare("INSERT INTO phonebook VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	for($i=0; $i<$count; $i++){
		$arr = get_object_vars($result[$i]);

		$firstname = "";
		$middlename = "";
		$lastname = "";
		$addressA = "";
		$addressB = "";
		$state = "";
		$age = "";
		$from = "";
		$to = "";
		$phone = "";
		$timezone = "";
		$phone_carrier = "";
		$provider_type = "";

		if(array_key_exists("firstname", $arr)) $firstname = $arr["firstname"];
		if(array_key_exists("middlename", $arr)) $middlename = $arr["middlename"];
		if(array_key_exists("lastname", $arr)) $lastname = $arr["lastname"];
		if(array_key_exists("addressA", $arr)) $addressA = $arr["addressA"];
		if(array_key_exists("addressB", $arr)) $addressB = $arr["addressB"];
		if(array_key_exists("state", $arr)) $state = $arr["state"];
		if(array_key_exists("age", $arr)) $age = $arr["age"];
		if(array_key_exists("from", $arr)) $from = $arr["from"];
		if(array_key_exists("to", $arr)) $to = $arr["to"];
		if(array_key_exists("phone", $arr)) $phone = $arr["phone"];
		if(array_key_exists("timezone", $arr)) $timezone = $arr["timezone"];
		if(array_key_exists("phone_carrier", $arr)) $phone_carrier = $arr["phone_carrier"];
		if(array_key_exists("provider_type", $arr)) $provider_type = $arr["provider_type"];

		if ($stmt->execute(array($firstname, $middlename, $lastname, $addressA, $addressB, $state, $age, $from, $to, $phone, $timezone, $phone_carrier, $provider_type))){
			$report[$i]["name"] = $firstname . " " . $lastname;
			$report[$i]["phone"] = $phone;
			$areacode = substr($phone, 0, 3);
			$report[$i]["areacode"] = $areacode;
			$number = substr($phone, 3, 7);
			$report[$i]["number"] = $number;
		}
	}
	// $stmt->close();

	if($count>0){
		$report["status"]="success";
		$report["count"]=$count;
	}else{
		$report["status"]="failed";
	}

	echo json_encode($report);


