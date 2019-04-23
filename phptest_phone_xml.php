<?php
	require './Singleton.php';
	$phone = $_GET['phone'];

	header ("content-type: text/xml");
	$xml='<?xml version="1.0" encoding="UTF-8"?>';
	$xml.='<records>';

	$instance = ConnectDb::getInstance();
	$conn = $instance->getConnection();
	$stmt = $conn->prepare("SELECT * FROM phonebook where phone = ?");

	if ($stmt->execute(array($phone))){
		while ($row = $stmt->fetch()) {
			$xml .= '<record>';
			$xml .= '<firstname>' . $row[firstname] . '</firstname>';
			$xml .= '<lastname>' . $row[lastname] . '</lastname>';
			$xml .= '<phone>' . $row[phone] . '</phone>';
			$xml .= '</record>';
		}
	}
    $xml .= '</records>';
    echo $xml;
