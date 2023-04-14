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
          <!-- Notifications -->
           <li class="nav-item dropdown me-4">
            <?php 
               /* $result = $conn->prepare("SELECT * FROM notifications ORDER BY sn DESC LIMIT 5");
                $result->execute();
                $notifications = $result->fetch();
                var_dump($notifications);*/
                  $notifications = $db->query("SELECT * FROM `notifications` ORDER BY sn DESC LIMIT 5", []);
            ?>
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <?php foreach ($notifications as $notification): ?>
                <a class="dropdown-item" href="test.php?=<?php echo $notification['sn']; ?>">
                  <div class="item-thumbnail">
                    <div class="item-icon bg-success">
                      <i class="mdi mdi-information mx-0"></i>
                    </div>
                  </div>
                  <div class="item-content">
                    <h6><?php echo $notification['student_email']; ?></h6>
                    <h6 class="font-weight-normal"><?php echo $notification['subject']; ?></h6>
                    <p class="font-weight-light small-text mb-0 text-muted">
                      <?php echo $notification['notification_time']; ?>
                    </p>
                  </div>
                </a>
              <?php endforeach ?>
            </div>

          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="./img/buk_logo.jpg" alt="profile"/>
              <span class="nav-profile-name"><?php echo $_SESSION['email'];?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
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