
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
        Scan Product
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo base_url()?>assets/admin/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>node_modules/web3/dist/web3.min.js"></script>
</head>
<style>
  .breathing-text {
    -webkit-animation: breathing 7s ease-out infinite normal;
    animation: breathing 7s ease-out infinite normal;
    -webkit-font-smoothing: antialiased;  
    }


@-webkit-keyframes breathing {
  0% {
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
  }

  25% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  60% {
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
  }

  100% {
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
  }
}

@keyframes breathing {
  0% {
    -webkit-transform: scale(0.9);
    -ms-transform: scale(0.9);
    transform: scale(0.9);
  }

  25% {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
  }

  60% {
    -webkit-transform: scale(0.9);
    -ms-transform: scale(0.9);
    transform: scale(0.9);
  }

  100% {
    -webkit-transform: scale(0.9);
    -ms-transform: scale(0.9);
    transform: scale(0.9);
  }
}
</style>
<body class="off-canvas-sidebar" style="background-color: white;">
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
    <div class="container">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#">
        <small>Powered by</small> <img src="<?php echo base_url()?>assets/global/img/muqi_purple.svg">
        </a>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center" style="background-color: white;position: relative;">
            <div class="block-here">
              <div class="text-center icon-here">
                <i class="material-icons breathing-text" style="font-size: 10rem;color: #555555">nfc</i>
              </div>
              <h3 class="text-here" style="color: #555555;">"Place the product to the sensor"</h3>
            </div>
            <form class="rfid-form" style="z-index: -999;position: relative;">
                  <input class="input-rfid" type="text" autofocus>
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

  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url()?>assets/admin/js/plugins/moment.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url()?>assets/admin/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url()?>assets/admin/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>assets/admin/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/abiList/muqiCompany.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/abiList/muqiProducts.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url()?>scripts/rfid.js"></script>


</body>

</html>