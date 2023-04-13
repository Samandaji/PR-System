
<?php 

  $msg = '';
  $msg_type = '';

  session_start();

  include "../config/dBase.php";

  $db = new dBase();

  if (isset($_POST['upload_project'])) 
  {
    
    // perform input validation here

    $student_name = $_POST['student_name'];
    $project_topic = $_POST['project_topic'];
    $school_session = $_POST['school_session'];
    $project_abstract = $_POST['project_abstract'];
    $graduation_year = $_POST['graduation_year'];
    $department = $_POST['department'];
    $supervisor = $_POST['supervisor'];

    $project_file = $_FILES['project_file'];

    $type = pathinfo($project_file['name'], PATHINFO_EXTENSION);

    $file_path = "../uploads/" . $project_file['name'];

    if (move_uploaded_file($project_file['tmp_name'], $file_path)) 
    {
        $rowsAdded = $db->nonQuery("INSERT INTO `projects`(`contributors`, `topic`, `abstract`, `supervisor`, `session`, `year_of_graduation`, `department`, `project_file`) VALUES(?, ?, ?, ?, ?, ?, ?, ?)", [$student_name, $project_topic, $project_abstract, $supervisor, $school_session, $graduation_year, $department, $file_path]);

      if ($rowsAdded > 0) 
      {

        $msg_type = 'success';
        $msg = 'Project successfully added.';
        
      }
      else
      {

        $msg_type = 'danger';
        $msg = 'Failed to add project.';

      }

    }
    else
    {

      $msg_type = 'danger';
      $msg = 'Failed to upload file.';

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
   
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="./img/buk_logo.jpg" alt="logo" style="width: 40px;" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        
        <ul class="navbar-nav navbar-nav-right">
          
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="./img/buk_logo.jpg" alt="profile"/>
              <span class="nav-profile-name">Louis Barnett</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
    <?php include "sidebar.php"; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Upload Project&nbsp;/&nbsp;</p>
                  </div>
                </div>
               
              </div>
            </div>
          </div>




          <!-- begin row -->
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              
              <div class="card">

                <div class="card-body">

                  <div class="alert alert-<?php echo $msg_type; ?>">
                    <?php echo $msg; ?>
                  </div>

                  <form class="forms-sample" action="upload_project.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="student_name">Student Name(s):</label>
                      <input type="text" name="student_name" id="student_name"  class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="project_topic">Topic:</label>
                      <input type="text" name="project_topic" id="project_topic"  class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="supervisor">Supervisor:</label>
                        <select name="supervisor" class="form-control" id="supervisor" required>

                          <option value="">-- Select Supervisor --</option>

                          <?php 

                            $supervisors = $db->query("SELECT * FROM `supervisors`", []);

                            foreach ($supervisors as $supervisor)
                            {
                              ?>

                                <option value="<?php echo $supervisor['email']; ?>">
                                  <?php echo $supervisor['fname'] . " " . $supervisor['oname'] . " " . $supervisor['lname']; ?>
                                </option>

                              <?php
                            }

                           ?>
                          

                        </select>
                    </div>

                    <div class="form-group">
                      
                      <label for="school_session">Session:</label>
                      <select name="school_session" class="form-control" id="school_session" required>
                        
                        <option value="">-- Select Session --</option>
                        <?php 

                          for ($i=2020; $i < 2030; $i++) 
                          { 
                            ?>

                              <option value="<?php echo $i . "/" . ($i + 1); ?>">
                                <?php echo $i . "/" . ($i + 1); ?>
                              </option>

                            <?php
                          }

                         ?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="project_abstract">Abstract</label>
                      <textarea name="project_abstract" class="form-control" id="project_abstract" rows="6" data-gramm="false" wt-ignore-input="true" required></textarea>
                    </div>

                    <div class="form-group">
                      <label for="graduation_year">Year of Graduation:</label>
                        <select name="graduation_year" class="form-control" id="exampleSelectGender" required>

                          <option value="">-- Select Year --</option>

                          <?php 

                            for ($i=2020; $i < 2030; $i++) 
                            { 
                              ?>

                                <option value="<?php echo $i; ?>">
                                  <?php echo $i; ?>
                                </option>

                              <?php
                            }

                           ?>
                          

                        </select>
                    </div>

                    <div class="form-group">
                      <label for="department">Department:</label>
                        <select name="department" class="form-control" id="department" required>

                          <option value="">-- Select Department --</option>

                          <?php 

                            $departments = $db->query("SELECT * FROM `departments`", []);

                            foreach ($departments as $department)
                            {
                              ?>

                                <option value="<?php echo $department['department_name']; ?>">
                                  <?php echo $department['department_name']; ?>
                                </option>

                              <?php
                            }

                           ?>
                          

                        </select>
                    </div>

                    <div class="form-group">

                      <label>Complete Project File:</label>
                      <input type="file" name="project_file" class="form-control" required>

                    </div>

                    <button name="upload_project" type="submit" class="btn btn-primary me-2">Upload</button>

                    <button class="btn btn-light">Cancel</button>

                  </form>

                </div>
              </div>
            </div>

          </div>
          <!-- end row -->

         
  
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bayero university </a>2023</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../template/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../template/vendors/chart.js/Chart.min.js"></script>
  <script src="../template/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../template/js/off-canvas.js"></script>
  <script src="../template/js/hoverable-collapse.js"></script>
  <script src="../template/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../template/js/dashboard.js"></script>
  <script src="../template/js/data-table.js"></script>
  <script src="../template/js/jquery.dataTables.js"></script>
  <script src="../template/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="../template/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

