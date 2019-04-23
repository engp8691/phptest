<?php
	namespace com\abc;

	class SplQueue{
		public $arr;
		
		public function length(){
			return count($this->arr);
		}

		public function enqueue($value){
			$this->arr[] = $value;
		}

		public function dequeue(){
			array_shift($this->arr);
		}

		public function print(){
			for($i=0; $i<count($this->arr); $i++){
				echo $this->arr[$i];
			}
		}
	}


