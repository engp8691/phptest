<?php
	require_once "./Person.php";
	require_once "./Driving.php";

	final class Student extends Person implements Driving{
		public $StudentNumber;
		public $CourseName;

		function __construct($name) {		
			$this->StudentNumber = $name;		
		}

		public function write_info(){
			//sql codes here
			echo "Writing ". $this->LastName . "'s info to student dbase table <br>\n\n";
		}

		public function addGas($gasNumber){
			echo "Student is adding gas $gasNumber\n";
        }

        public function igniteIt($ignitionType="Keyless"){
			echo "Student is igniting the car with $ignitionType \n";
		}

		public function liveWithFamily(){
			echo "MayBe\n";
		}
	}
