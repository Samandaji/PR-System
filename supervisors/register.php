<?php 

  $msg = '';
  $msg_type = '';

  if (isset($_POST['register'])) 
  {

    require_once "supervisor.class.php";

    // validate the user's inputs

    $staff_id = $_POST['staff_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $oname = $_POST['oname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['comfirm_password'];
  
    $staff = new Staff();
    $staffAdded = $staff->register($staff_id, $fname, $lname, $oname, $email, $phone, $password);

    if (!$staffAdded) 
    {

      $msg_type = 'danger';
      $msg = 'Registration Failed!!';
      
    }
    else
    {

      $msg_type = 'success';
      $msg = 'Staff successfully Registered!!!';

    }    
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Buk PR System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../template/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./img/buk_logo.jpg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
               <center><img src="./img/buk_logo.jpg" alt="logo" height="120" style=" width:100px;"></center>
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
               <div class="alert alert-<?php echo $msg_type; ?>">
                <?php echo $msg; ?>
                </div>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="" placeholder="Staff_ID...." name="staff_id">
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="" placeholder="First Name...." name="fname">
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="" placeholder="Last Name...." name="lname">
                </div>
                 <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="" placeholder="Other Name...." name="oname">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                 <div class="form-group">
                  <input type="number" class="form-control form-control-lg" id="" placeholder="Phone Number...." name="phone">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                 <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="confirm_pass" placeholder="Confirm Password" name="comfirm_password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
