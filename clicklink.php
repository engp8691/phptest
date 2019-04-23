<?php
	require './Singleton.php';
	$phone = $_GET['phone'];

	header("Content-Type: text/html");
	include "header.html";

	$instance = ConnectDb::getInstance();
	$conn = $instance->getConnection();
	$stmt = $conn->prepare("SELECT * FROM phonebook where phone = ?");

	if ($stmt->execute(array($phone))){
		while ($row = $stmt->fetch()) {
			$name = $row[firstname] . " " . $row[lastname];
			echo '<a href="./phptest_phone_xml.php?phone='.$row[phone].'">'.$row[phone] . ' ' . $name .'</a><br/>';
		}
	}

	include "footer.html";
