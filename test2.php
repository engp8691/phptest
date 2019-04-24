<?php

class AminoAcid {
	var $name;  // aa name
	var $symbol;    // three letter symbol
	var $code;  // one letter code
	var $type;  // hydrophobic, charged or neutral
					
	function __construct ($aa) {
		foreach ($aa as $k=>$v)
			$this->$k = $aa[$k];
	}
}

function readDatabase($filename) {
	// read the XML database of aminoacids
	$data = implode("", file($filename));
	$parser = xml_parser_create();
	xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
	xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
	xml_parse_into_struct($parser, $data, $values, $tags);
	xml_parser_free($parser);

	// loop through the structures
	foreach ($tags as $key=>$val) {
		if ($key == "record") {
			$molranges = $val;
			for ($i=0; $i < count($molranges); $i+=2) {
				$offset = $molranges[$i] + 1;
				$len = $molranges[$i + 1] - $offset;
				$tdb[] = parseMol(array_slice($values, $offset, $len));
			}
		} else {
			continue;
		}
	}
	return $tdb;
}

function parseMol($mvalues) {
	for ($i=0; $i < count($mvalues); $i++) {
		$mol[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
	}
	return new AminoAcid($mol);
}

$result = readDatabase("/tmp/data.txt");
$count = sizeof($result);
print "Total is: " . $count . "\n";
// var_dump($result[0]);

$arr = get_object_vars($result[0]);
var_dump($arr);

print($arr["firstname"]);
// print($result[1]["firstname"]);
// print($result[2]["firstname"]);
