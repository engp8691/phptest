<?php
	class ConnectDb {
		// Hold the class instance.
		private static $instance = null;
		private $conn;
  
		private $host = 'localhost';
		private $user = 'root';
		private $pass = 'sqliscool';
		private $name = 'phptest';
   
		// The db connection is established in the private constructor.
		private function __construct() {
			// In real product, they are in ini file
			// make sure php-mysql is installed. It is done via:  apt-get install php-mysql
			$this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}",
				 $this->user,
				 $this->pass,
				 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		}

		private function __clone() {
		}
  
		public static function getInstance() {
			if(!self::$instance) {
				self::$instance = new ConnectDb();
			}

			return self::$instance;
		}
  
		public function getConnection() {
			return $this->conn;
		}
	}
