<?php
require_once('dBase.php');

class register{ 
      private $firstname;
      private $lastname; 
      private $othername;
      private $matric_no; 
      private $gender; 
      private $department;
      private $email;
      private $password;

      public function _register($firstname, $lastname, $othername, $matric_no, 
      $gender, $department, $email, $password)
      {
          $this->firstname = $firstname;
          $this->lastname = $lastname;
          $this->othername = $othername;
          $this->matric_no = $matric_no;
          $this->gender = $gender;
          $this->department = $department;
          $this->email = $email;
          $this->password = $password;
          
      }

      function register_users($pdo, $firstname, $lastname, $othername, $matric_no, 
      $gender, $department, $email, $password)
      {
        $stmt = $pdo->prepare('INSERT INTO users VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt = $pdo->bindParam(":firstname", $firstname);
        $stmt = $pdo->bindParam(":lastname", $lastname);
        $stmt = $pdo->bindParam(":othername", $othername);
        $stmt = $pdo->bindParam(":matric_no", $matric_no);
        $stmt = $pdo->bindParam(":gender", $gender);
        $stmt = $pdo->bindParam(":department", $department);
        $stmt = $pdo->bindParam(":email", $email);
        $stmt = $pdo->bindParam(":password", $password);
        $stmt->execute($firstname, $lastname, $othername, $matric_no, 
        $gender, $department, $email, $password);
        
    
      }

      function sanitizeString($var)
        {
          if (get_magic_quotes_gpc())
          $var = stripslashes($var);
          $var = htmlentities($var);
          $var = htmlspecialchars($var);
          return $var;
        }

        function sanitizeMySQL($pdo, $var)
        {
        $var = $pdo->quote($var);
        $var = sanitizeString($var);
        return $var;
        }

        function validateEmail($user_email)
        {
          $user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);

          if (filter_var($user_email, FILTER_VALIDATE_EMAIL))
          {
            return true;
          }
          else
          {

            return false;

          }
        }
        if (isset($_POST['register']))
        {
           $pdo = dBase::_dBase();
           $firstname = sanitizeMySQL($_POST['firstname']);
           $lastname = sanitizeMySQL($_POST['firstname']); 
           $othername = sanitizeMySQL($_POST['firstname']);
           $matric_no = sanitizeMySQL($_POST['matric_no']); 
           $gender = sanitizeMySQL($_POST['gender']);
           $department = sanitizeMySQL($_POST['department']);
           $email =validateEmail($_POST['email']);
           $password = sanitizeMySQL($_POST['password']);
           register_users( $pdo, $firstname, $lastname, $othername, $matric_no, 
           $gender, $department, $email, $password);
        }

      
}
     
?>