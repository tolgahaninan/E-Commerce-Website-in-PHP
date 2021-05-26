<?php 


class Conn {

	private static $instance;

	private function __construct(){

	}

	public static function getInstance(){

		if(isset(self::$instance)){
			return self::$instance;
		}
		else if (!isset(self::$instance)){
			self::$instance = new PDO('mysql:host=localhost;dbname=test',"root","");

		}

	}


}




?>