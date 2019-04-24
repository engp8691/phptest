<?php

require_once "./AminoAcid.php";

class RecordDBFromFile{
	public $filename;
	public $records;

	function __construct($file) {		
		$this->filename = $file;		
	}	

	public function readDatabase($filename) {
		$data = implode("", file($filename));
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $data, $values, $tags);
		xml_parser_free($parser);

		foreach ($tags as $key=>$val) {
			if ($key == "record") {
				$molranges = $val;
				// var_dump($molranges);

				for ($i=0; $i < count($molranges); $i+=2) {
					$offset = $molranges[$i] + 1;
					$len = $molranges[$i + 1] - $offset;
					$tdb[] = $this->parseMol(array_slice($values, $offset, $len));
				}
			} else {
				continue;
			}
		}
		return $tdb;
	}

	public function parseMol($mvalues) {
		for ($i=0; $i < count($mvalues); $i++) {
			if (array_key_exists('value', $mvalues[$i])) {
				$mol[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
			}
		}
		return new AminoAcid($mol);
	}

	function retrieve(){
		$db = $this->readDatabase($this->filename);
		return $db;
	}
}

