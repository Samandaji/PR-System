<?php
  session_start();
  if(isset($_SESSION['email']))
  {
    // code...
 

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
       <?php include "navbar.php"?>
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
                      <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Submit documents&nbsp;/&nbsp;</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="content-wrapper">
                <div class="col-6 grid-margin stretch-card">
                  <div class="card" style="margin-left:350px;">
                      <div class="card-body">
                          <h4 class="card-title">Fill The Form Bellow To Submit Your Project Work</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                  <label for="exampleInputName1">SUbject</label>
                                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject..." required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail3">Email address</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                <div class="form-group">
                                  <label>File upload</label>
                                  <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info"  placeholder="Upload documents" name="file">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleTextarea1">Comments!</label>
                                  <textarea class="form-control" id="comments" rows="4" name="comments"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary me-2" name="upload">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                  </div>
                </div>
            </div>
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
<?php
   }
   else{
    header("Location:login.php");
  }
?>

