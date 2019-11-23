
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/global/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/global/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="#9C27B0" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <title>
        Admin | Login
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo base_url()?>assets/admin/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url()?>assets/admin/demo/demo.css" rel="stylesheet" />
    
	<!-- recaptcha v3 -->
	<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
</head>
<style>
.grecaptcha-badge {
     z-index: 99;   
}
</style>
<body class="off-canvas-sidebar" style="background-color: white;">
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
    <div class="container">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url()?>assets/global/img/muqi_purple.svg"> <small>| admin</small>
        </a>
      </div>
    </div>
  </nav>
  <div style="position: absolute; width: 100%; height: 100%;" id="particles-js"></div>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <input type="hidden" id="token" name="token">
            <form class="form">
				<input type="hidden" id="key" value="<?php echo SITE_KEY;?>">
                <div class="card card-login pb-4" style="box-shadow: none;">
                    <div class="row">
                        <div class="m-auto pt-5">
                            <img class="muqi-icon" src="<?php echo base_url()?>assets/global/img/icon_dark.svg" style="width: 8em;">
                        </div>
                    </div>
                <div class="card-body ">
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input type="text" class="form-control username" placeholder="Username...">
                    </div>
                  </span>
                  <br>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" class="form-control password" placeholder="Password...">
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                <button class="btn btn-primary btn-link btn-lg login-button btn-block" type="submit">log-in</button>
                <br>
                </div>
                <div class="login-response text-center"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                 <span style="color: #555555;">Union Bank Hackathon</span>
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                 <span style="color: #555555;">University of Makati</span>
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                 <span style="color: #555555;">Blockchain</span>
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                 <span style="color: #555555;">Licenses</span>
                  
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right"><span style="color: #555555;">
            &copy; 2019, made with <i class="material-icons">favorite</i> by Ardeidae from Produce to Table</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url()?>assets/admin/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/admin/js/core/popper.min.js"></script>
  <script src="<?php echo base_url()?>assets/admin/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url()?>assets/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url()?>assets/admin/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url()?>assets/admin/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>assets/admin/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url()?>assets/admin/demo/demo.js"></script>
  <script src="<?php echo base_url()?>assets/global/js/particles.min.js"></script>
  <script src="<?php echo base_url()?>assets/global/js/particle-color.js"></script>
  <script src="<?php echo base_url()?>scripts/adminLogin.js"></script>
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
</body>

</html>