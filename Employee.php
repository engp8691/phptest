<?php
	require 'Person.php';
	require_once 'Driving.php';
	require 'UsingTool.php';

	final class Employee extends Person implements Driving, UsingTool{
		public $EmployeeNumber;
		public $DateHired;

		public function write_info(){
			echo "Writing ". $this->LastName . "'s info to emloyee dbase table <br>\n\n";
		}

		public function addGas($gasNumber){
			echo "Employee is adding gas number $gasNumber\n";
		}

		public function igniteIt($ignitionType="Key"){
			echo "Employee is igniting the car with $ignitionType \n";
		}

		function usingMachine($machineName){
		}

		function assignWorkPlace($place){
		}

		public function callDoSomething(){
			$this->doSomething("Dele");
		}
	}
