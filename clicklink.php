<?php
	require './Singleton.php';
	$data = $_GET['data'];

	header("Content-Type: text/html");
	include "header.html";

	$jsonArray = json_decode($data, true);

	$count = sizeof($jsonArray);
	for($i=0; $i<$count; $i++){
		echo '<a href="https://www.infopay.com/phptest.php?username=accucomtest&password=test104&firstname=$jsonArray[$i]["firstname"]&middle_initial=$jsonArray[$i]["firstname"]&lastname=$jsonArray[$i]["lastname"]&city=$jsonArray[$i]["city"]&state=$jsonArray[$i]["state"]&zip=&client_reference=test&phone=&housenumber=&streetname=.">' . $jsonArray[$i]["name"] . '</a><br/>';
	}

	include "footer.html";

