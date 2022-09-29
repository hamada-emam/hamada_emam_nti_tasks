<?php 

class User{

	private $errors = array();

	public function signup($POST){

		//validate
		foreach ($POST as $key => $value) {
			# code...
			//username
			if($key == "username"){

				if(trim($value) == ""){

					$this->errors[] = "Please enter a valid username";
				}

				if(is_numeric($value)){

					$this->errors[] = "Username can not be a number";
				}

				if(preg_match("/[0-9]+/", $value)){

					$this->errors[] = "Username can not contain numbers";
				}
				
			}

			//email
			if($key == "email"){

				if(trim($value) == ""){

					$this->errors[] = "Please enter a valid email";
				}

				if(!filter_var($value,FILTER_VALIDATE_EMAIL)){

					$this->errors[] = "Email is not valid";
				}
			}

			//password
			if($key == "password"){

				//check if its empty
				if(trim($value) == ""){

					$this->errors[] = "Please enter a valid password";
				}

				//password length
				if(strlen($value) < 4){

					$this->errors[] = "Password must be atleast 4 characters long";
				}
				
			}
			
		}

		$DB = new Database();
		//check if email already exists
		$data = array();
		$data['email'] = $POST['email'];

		$query = "select * from users where email = :email limit 1";
		$result = $DB->read($query,$data);
		if($result){
			$this->errors[] = "That email is already in use";
		}

		//save to database
		if(count($this->errors) == 0){

			//save
			$query = "insert into users (username,email,password,date) values (:username,:email,:password,:date)";

			$data = array();
			$data['username'] = $POST['username'];
			$data['email'] = $POST['email'];
			$data['password'] = $POST['password'];
			$data['date'] = date("Y-m-d H:i:s");

			$result = $DB->write($query,$data);
			if(!$result){
				$this->errors[] = "Your data could not be saved";
			}
		}

		return $this->errors;
	}
}