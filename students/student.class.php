
<?php 
	
	require_once "../config/dBase.php";

	

	class Student
	{

		private $reg_number;
		private $full_name;
		private $email;
		private $department;
		private $username;
		private $password;
		private $confirmPassword;
		private $data;

		private $database;

		public function register($reg_number, $email, $password)
		{

			$database = new dBase();


			$this->reg_number = $reg_number;
			$this->email = $email;
			$this->password = $password;

			// check whether the student's record exists in the db.
			if ($this->studentExists($this->reg_number, $this->email)) 
			{
				return false;
			}
			else
			{
					
				$rowsAffected = $database->nonQuery("INSERT INTO `students`(`reg_number`, `email`, `password`) VALUES( ?, ?, ?) ", [$this->reg_number, $this->email, $this->password]);

				return $rowsAffected > 0 ? true : false;

			}

		}

		public function data($email = null){
			$data = $this->database->query("SELECT * FROM `students` 
				WHERE `email` = ? LIMIT 1", [$email]);
			return count($data) > 0 ? $data[0] : false;
		}

		public function studentExists($email, $reg_number=null)
		{

			$this->database = new dBase();
			
			$matchingRecordsCount = $this->database->nonQuery("SELECT * FROM `students` 
				WHERE `reg_number` = ? OR `email` = ? ", [$reg_number,$email]);
			return $matchingRecordsCount > 0 ? true : false;

		}


		public function login($email = null, $password = null){
			$student = $this->studentExists($email=$email);
            $data = $this->data($email);

			if ($student && $password === $data['password']) {
                return true;
            }

			return false;
		}
	}//end class

 ?>