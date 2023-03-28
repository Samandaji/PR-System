
<?php 
	
	require_once "../config/dBase.php";

	

	class Admin
	{

		private $admin_id;
		private $fname;
		private $lname;
		private $oname;
		private $email;
		private $phone;
		private $password;
		private $data;

		private $database;

		public function register($admin_id, $fname, $lname, $oname, $email, $phone, $password)
		{

			$database = new dBase();

			$this->admin_id = $admin_id;
			$this->fname = $fname;
			$this->lname = $lname;
			$this->oname = $oname; 
			$this->email = $email;
			$this->phone = $phone;
			$this->password = $password;

			// check whether the student's record exists in the db.
			if ($this->adminExists($this->email, $this->admin_id)) 
			{
				return false;
			}
			else
			{
					
				$rowsAffected = $database->nonQuery("INSERT INTO `administrator`(`admin_id`, `fname`, `lname`, `oname`, `email`, `phone` , `password`) VALUES( ?, ?, ?, ?, ?, ?, ?) ", [$this->admin_id, $this->fname, $this->lname, $this->oname, $this->email, $this->phone, $this->password]);

				return $rowsAffected > 0 ? true : false;

			}

		}

		public function data($email = null){
			$data = $this->database->query("SELECT * FROM `administrator` 
				WHERE `email` = ? LIMIT 1", [$email]);
			return count($data) > 0 ? $data[0] : false;
		}

		public function adminExists($email, $admin_id=null)
		{

			$this->database = new dBase();
			
			$matchingRecordsCount = $this->database->nonQuery("SELECT * FROM `administrator` 
				WHERE `admin_id` = ? OR `email` = ? ", [$admin_id,$email]);
			return $matchingRecordsCount > 0 ? true : false;

		}


		public function login($email = null, $password = null){
			$admin = $this->adminExists($email=$email);
            $data = $this->data($email);

			if ($admin && $password === $data['password']) {
                return true;
            }

			return false;
		}
	}//end class




 ?>