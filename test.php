<?php
	function download_page($path){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$path);
		curl_setopt($ch, CURLOPT_FAILONERROR,1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		$retValue = curl_exec($ch);          
		curl_close($ch);
		return $retValue;
	}

	$sXML = download_page('https://www.infopay.com/phptest_phone_xml.php?username=accucomtest&password=test104&areacode=386&phone=7540455');

	$fp = fopen('/tmp/data.txt', 'w');
	fwrite($fp, $sXML);
	fclose($fp);

	$filename = '/tmp/data.txt';
	$data = implode("", file($filename));

	$p = xml_parser_create();
	xml_parse_into_struct($p, $data, $vals, $index);
	xml_parser_free($p);

	var_dump($vals);


