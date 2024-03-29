
<?php 

  $msg = '';
  $msg_type = '';

  if (isset($_POST['register'])) 
  {

    require_once "student.class.php";
    require_once "validation.php";

    // validate the user's inputs

    $full_name = sanitizeMySQL(($_POST['firstname'] . " " . $_POST['othername'] . " " . $_POST['lastname']);
    $reg_number = sanitizeMySQL($_POST['regno']);
    $deparment = sanitizeMySQL($_POST['deparment']);
    $email = validateEmail($_POST['email']);
    $username = sanitizeMySQL($_POST['username']);
    $password = sanitizeMySQL($_POST['newpswd']);
    $confirmPassword = sanitizeMySQL($_POST['comfirmpswd']);
    $gender = sanitizeMySQL($_POST['gender']);

    $student = new Student();
    $studentAdded = $student->register($reg_number, $full_name, $email, $deparment, $username, $password, $confirmPassword);

    if (!$studentAdded) 
    {

      $msg_type = 'danger';
      $msg = 'Failed to add the student.';
      
    }
    else
    {

      $msg_type = 'success';
      $msg = 'Student added successfully.';

    }

  }


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BUK Projects Retrieval System">
    <meta name="author" content="Abubakar Usman">
    <title>Sign-up Page</title>
    <link type="text/css" media="screen" rel="stylesheet" href="assets/boostrap/css/bootstrap.min.css">
    <link type="text/css" media="screen" rel="stylesheet" href="">
    <link type="text/css" media="screen" rel="stylesheet" href="myStyle.css">
</head>
<body>

    <section class = "container">
        <div class="row content d-flex justify-content-center align-items-center">
          <div class=" col-md-5 pt-3 pb-3">
            <div class="box-shadow bg-white p-4">
              
              <div class="alert alert-<?php echo $msg_type; ?>">
                <?php echo $msg; ?>
              </div>

              <h5 class="text-center mb-4">Sign-Up</h5>
              <h6>Create your account</h6>

           <form class="mb-4" action="signup.php" method="post">
            <div class="form-floating mb-3">
                <input type="input" class="form-control rounded-0" id="floatingInput" placeholder="First Name" name="firstname">
                <label for="floatingInput">First Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="input" class="form-control rounded-0" id="floatingInput" placeholder="Other Name" name="othername">
                <label for="floatingInput">Other name</label>
           </div>

           <div class="form-floating mb-3">
                  <input type="input" class="form-control rounded-0" id="floatingInput" placeholder="Last Name" name="lastname">
                  <label for="floatingInput">Last Name</label>
           </div>

           <div class="form-floating mb-3">
              <input type="input" class="form-control rounded-0" id="floatingInput" placeholder="Matric" name="regno">
              <label for="floatingInput">Matric number</label>
           </div>

           <div class="form-group mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" checked>
                <label class="form-check-label" for="male">
                  Male
                </label>
            </div>

            <div class="form-check  form-check-inline">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Female">
              <label class="form-check-label" for="female">
                Female
                </label>
            </div>
           </div>
        
          <div class="form-group">
            <select name="deparment" class="form-control rounded-0 mb-3 " required>
              <option value="" selected>Choose Deparment</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Software Engineering">Software Engineering</option>
              <option value="Information Technology">Information Technology</option>
              <option value="Cyber Security">Cyber Security</option>
            </select>
          </div>
          
           
          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-0" id="floatingInput" placeholder="Email Address" name="email">
            <label for="floatingpassword">Email Address</label>
          </div>
          <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-0" id="floatingInput" placeholder="username" name="username">
                  <label for="floatingpassword"> Username</label>
          </div>
          <div class="form-floating mb-3">
                  <input type="password" class="form-control rounded-0" id="floatingInput" placeholder="New password" name="newpswd">
                  <label for="floatingpassword"> New Password</label>
          </div>
         <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-0" id="floatingInput" placeholder="Comfirm password" name="comfirmpswd">
                    <label for="floatingpassword"> Comfirm Password</label>
         </div>
         <div class="d-grid gap-2 mb-3">
                  <button type="submit" name="register" class="btn btn-dark btn-lg border-0 rounded-0" name="signup">SIGN UP</button>
                  <div class="sign-up-link mb-3 text-center">
                    <h6>Already Have an Account?</h6>
                    <a href="login.html" title="Sign-up" class="text-decoration-none">
                      Click here
                    </a>
                  </div>
        </div>
      </form>
   </div>
  </div>
 </div>
</section>   
    <script src="assets/boostrap/js/bootstrap.min.js"></script>
    <script src="assets/boostrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>