<?php
	namespace com\abc;

	class SplStack{
		public $arr;
		
		public function length(){
			return count($this->arr);
		}

		public function push($value){
			$this->arr[] = $value;
		}

		public function pop(){
			array_pop($this->arr);
		}

		public function print(){
			for($i=0; $i<count($this->arr); $i++){
				echo $this->arr[$i];
			}
		}
	}

