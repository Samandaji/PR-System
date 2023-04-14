<?php
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "pr_system";
     
    $conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;View Previous Topic&nbsp;/&nbsp;</p>
           
                  </div>
                </div>
               
              </div>
            </div>
          </div>
           <!-- row -->
                <div class="row">
                    <div class="col-md-12" style="margin: 0 auto;">
                                 <!-- partial -->
            <div class="main-panel">
              <div class="content-wrapper">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data table</h4>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                          <table id="order-listing" class="table">
                            <thead>
                                <tr role="row">
                                   <th width="1%">SN</th>
                                   <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" width="10%">Authors</th>
                                   <th width="1%">Topics</th>
                                   <th width="1%">Year of Publication</th>
                                   <th width="1%">Department</th>
                                   <th width="1%">Project File</th>              
                                   </tr>
                                   </thead>
                                   <tbody>
                                     <?php 
                                        $result = $conn->prepare("SELECT * FROM projects ORDER BY sn ASC");
                                        $result->execute();
                                        for($i=1; $row = $result->fetch(); $i++){
                                      ?>
                                      <tr role="row" class="odd">
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $row["contributors"]; ?></td>  
                                          <td><?php echo $row["topic"]; ?></td>
                                          <td><?php echo $row["year_of_graduation"]; ?></td>        
                                          <td><?php echo $row["department"]; ?></td> 
                                          <td><?php echo $row["project_file"]; ?></td>     
                                      </tr>
                                      <?php 
                                      $i++;
                                      } 
                                      ?>
                                  </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- content-wrapper ends -->
              <!-- partial:../../partials/_footer.html -->
            </div> 
                   </div>
                </div>
                <!-- row ends here -->
  
        </div>
        <!-- content-wrapper ends -->
         <!-- container fluid -->
            <div class="container-fluid">
     
            <!-- container fluid ends here -->
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
  <script src="js/jquery.min.js"></script>
  <script src="../template/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- DataTables -->
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

