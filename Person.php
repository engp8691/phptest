<?php 
	abstract class Person {
		public $LastName;
		public $FirstName;
		public $BirthDate;
		public $Language;

		abstract protected function write_info();

		public function setLanguage($language="English"){
			$this->Language = $language;
		}

		public function getLanguage(){
			return $this->Language;
		}

		protected function doSomething ($description) {
			echo $description . "\n";
		}

		public function liveWithFamily(){
			echo "Yes\n";
		}

		public function anotherPublicFunction(){
			echo "anotherPublicFunction Yes\n";
		}
	}

