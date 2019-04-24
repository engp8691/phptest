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
