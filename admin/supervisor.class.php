
<?php 
	
	require_once "../config/dBase.php";

	

	class Staff
	{

		private $staff_id;
		private $fname;
		private $lname;
		private $oname;
		private $email;
		private $phone;
		private $password;
		private $data;

		private $database;

		public function register($staff_id, $fname, $lname, $oname, $email, $phone, $password)
		{

			$database = new dBase();

			$this->staff_id = $staff_id;
			$this->fname = $fname;
			$this->lname = $lname;
			$this->oname = $oname; 
			$this->email = $email;
			$this->phone = $phone;
			$this->password = $password;

			// check whether the student's record exists in the db.
			if ($this->supervisorExists($this->email, $this->staff_id)) 
			{
				return false;
			}
			else
			{
					
				$rowsAffected = $database->nonQuery("INSERT INTO `supervisors`(`staff_id`, `fname`, `lname`, `oname`, `email`, `phone` , `password`) VALUES( ?, ?, ?, ?, ?, ?, ?) ", [$this->staff_id, $this->fname, $this->lname, $this->oname, $this->email, $this->phone, $this->password]);

				return $rowsAffected > 0 ? true : false;

			}

		}

		public function data($email = null){
			$data = $this->database->query("SELECT * FROM `supervisors` 
				WHERE `email` = ? LIMIT 1", [$email]);
			return count($data) > 0 ? $data[0] : false;
		}

		public function supervisorExists($email, $staff_id=null)
		{

			$this->database = new dBase();
			
			$matchingRecordsCount = $this->database->nonQuery("SELECT * FROM `supervisors` 
				WHERE `staff_id` = ? OR `email` = ? ", [$staff_id,$email]);
			return $matchingRecordsCount > 0 ? true : false;

		}


		public function login($email = null, $password = null){
			$staff = $this->supervisorExists($email=$email);
            $data = $this->data($email);

			if ($staff && $password === $data['password']) {
                return true;
            }

			return false;
		}
	}//end class




 ?>