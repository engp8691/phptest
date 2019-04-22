<?php
class SimpleClass{
	public $var = 'A test string';

	public function displayVar(){
		echo $this->var . "\n";
	}
}

$myClass = new SimpleClass();
$myClass->displayVar();

?>
