
<?php 
	
	require_once "dBase.php";

	

	class Student
	{

		private $reg_number;
		private $full_name;
		private $email;
		private $department;
		private $username;
		private $password;
		private $confirmPassword;

		private $database;

		public function register($reg_number, $full_name, $email, $department, $username, $password, $confirmPassword)
		{

			$database = new dBase();


			$this->reg_number = $reg_number;
			$this->full_name = $full_name;
			$this->email = $email;
			$this->department = $department;
			$this->username = $username;
			$this->password = $password;
			$this->confirmPassword = $confirmPassword;

			// check whether the student's record exists in the db.
			if ($this->studentExists($this->reg_number)) 
			{
				return false;
			}
			else
			{
					
				$rowsAffected = $database->nonQuery("INSERT INTO `students`(`reg_number`, `full_name`, `email`, `department`, `username`, `password`) VALUES(?, ?, ?, ?, ?, ?) ", [$this->reg_number, $this->full_name, $this->email, $this->department, $this->username, $this->password]);

				return $rowsAffected > 0 ? true : false;

			}

		}


		public function studentExists($reg_number)
		{

			$this->database = new dBase();
			
			$matchingRecordsCount = $this->database->nonQuery("SELECT * FROM `students` WHERE `reg_number` = ? ", [$reg_number]);
			return $matchingRecordsCount > 0 ? true : false;

		}



	}




 ?>