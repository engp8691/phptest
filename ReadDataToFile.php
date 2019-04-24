<?php
	class ReadDataToFile {
		public $phone;

		function __construct($phone) {
			$this->phone = $phone;
			$this->phone = preg_replace("/[^0-9]/", "", $this->phone);
		}

		public function download_page(){
			$areacode = substr($this->phone, 0, 3);
			$number = substr($this->phone, 3, 7);

			$path = 'https://www.infopay.com/phptest_phone_xml.php?username=accucomtest&password=test104&areacode=' . $areacode . '&phone=' . $number;

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$path);
			curl_setopt($ch, CURLOPT_FAILONERROR,1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 15);
			$retValue = curl_exec($ch);          
			curl_close($ch);

			$fp = fopen('/tmp/data.txt', 'w');
			fwrite($fp, $retValue);
			fclose($fp);
		}
	}

