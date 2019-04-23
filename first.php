<?php
class SimpleClass{
	private $var = 'A test string';

	 public $var2 = <<<EOD
hello world
<html>
<body>
	I am a chinese kind.
</body>
</html>
EOD;

	public function setVar($pVar){
		$this->var = $pVar;
	}

	public function getVar(){
		return $this->var;
	}

	public function displayVar(){
		echo $this->var . "\n";
		echo $this->var2;
	}
}

$myClass = new SimpleClass();
$myClass->setVar('Caobi');
$myClass->displayVar();

$anotherClass = $myClass;
$anotherClass->displayVar();

var_dump($anotherClass);
var_dump($myClass);

$myClass = null;
try{
	$myClass->displayVar();
}catch(Throwable $e){
	echo $e;
}

echo "line 32\n";

try{
	$anotherClass->displayVar();
}catch(Throwable $e){
	echo $e;
}

var_dump($anotherClass);
var_dump($myClass);

$q = new SplStack();

$q[] = 1;
$q[] = 2;
$q[] = 3;
$q->push(4);
$q->add(1,15);

$q->rewind();
while($q->valid()){
	echo $q->current(),"\n";
	$q->next();
}

?>
