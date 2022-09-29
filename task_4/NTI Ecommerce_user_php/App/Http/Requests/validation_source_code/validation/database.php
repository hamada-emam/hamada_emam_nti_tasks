<?php 

class Database{

	private $HOST = "localhost";
	private $USER = "root";
	private $PASS = "";
	private $DB_NAME = "myusers";

	private function connect(){

		$string = "mysql:host=$this->HOST;dbname=$this->DB_NAME";
		
		try{

			$con = new PDO($string,$this->USER,$this->PASS);
		}catch(PDOException $e){

			die($e->getMessage());
		}

		return $con;
	}

	public function write($query,$data = array()){

		$con = $this->connect();

		$stm = $con->prepare($query);
		$result = $stm->execute($data);

		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function read($query,$data = array()){

		$con = $this->connect();

		$stm = $con->prepare($query);
		$result = $stm->execute($data);

		if($result){
			
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			if(is_array($data) && count($data) > 0){
				return $data;
			}
		}
		
		return false;
	}

	
}