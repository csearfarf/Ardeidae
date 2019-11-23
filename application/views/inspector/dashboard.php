
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
    MUQI | Products
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>assets/admin/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <script src="<?php echo base_url(); ?>node_modules/web3/dist/web3.min.js"></script>
  <style type="text/css">
    #qrcode {
  width:160px;
  height:160px;
  margin-top:15px;
}
  </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url()?>assets/global/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                <img src="<?php echo base_url()?>assets/global/img/icon_purple.svg" style="width: 1.8rem;" />
            </a>
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                <img src="<?php echo base_url()?>assets/global/img/muqi_purple.svg" style="width: 4.5rem;" />
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="<?php echo base_url()?>assets/global/img/placeholder.jpg" />
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        <?php echo $this->session->userdata('firstname')." ".$this->session->userdata('lastname');?>
                        <b class="caret"></b>
                    </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-mini"> MP </span>
                            <span class="sidebar-normal"> My Profile </span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-mini"> EP </span>
                            <span class="sidebar-normal"> Edit Profile </span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-mini"> S </span>
                            <span class="sidebar-normal"> Settings </span>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url();?>company/dashboard">
                        <i class="material-icons">store</i>
                        <p> Products </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                        </button>
                        </div>
                        <a class="navbar-brand" href="#">Products</a>| Manage Products
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Some Actions
                                </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                <a class="dropdown-item" href="#">Another Notification</a>
                                <a class="dropdown-item" href="#">Another One</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url()?>company/logout">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="content">
                    <div class="container-fluid">
                    <!-- lagay mo dito yan -->  
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header card-header-primary">
                              <h4 class="card-title ">Product History</h4>
                              <p class="card-category">Company products that is registered and maintain by the Inspectors</p>
                            </div>
                            <div class="card-body">
                              <input type="hidden" id="address" value="<?php echo $this->session->userdata('contract_address');?>">
                               <input type="hidden" id="sname" value="<?php echo $this->session->userdata('name');?>">
                                <div class="row">
                                  <div class="col-md-4">
                                  </div>
                                  <div class="col-md-4">
                                  <div class="form-group">
                                  <input type="text" class="form-control" id="searchBox" placeholder="Search">
                                  </div>
                                  </div>

                                  <div class="col-md-4">
                                      <p class="text-right">
                                      <button class="btn-primary btn btn-md" data-toggle="modal" data-target="#createAccount">Scan Product</button>
                                      </p>
                                  </div>
                                  
                                </div>
                               
                             
                                 <table class="table dt-responsive nowrap text-center" id="accounts">
                                 <thead class="text-primary">
                                 <tr>
                                  <th class="text-center font-weight-bold h4">Company Name</th>
                                  <th class="text-center font-weight-bold h4">Production Date</th>
                                  <th class="text-center font-weight-bold h4">Expiration Date</th>
                                  <th class="text-center font-weight-bold h4">Meat type</th>
                                  <th class="text-center font-weight-bold h4">Meat Category</th>
                                  <th class="text-center font-weight-bold h4">Status</th>
                                  <th class="text-center font-weight-bold h4">Option</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                                 </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <!--MODALS -->


              <div class="modal fade " tabindex="-1" role="dialog" id="updateProduct">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <form  id="createForm" role="form" method="post" accept-charset="utf-8" >
                    <div class="modal-header">
                      <h3 class="modal-title">Product Details</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Appearance</label>
                              <select class="form-control selectpicker" data-style="btn btn-link" id="appearance" required>
                                <option value="1">Bad</option>
                                <option value="2">Nice</option>
                                <option value="3">Good</option>
                                <option value="4">Very Good</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Odor</label>
                              <select class="form-control selectpicker" data-style="btn btn-link" id="odor" required> 
                                <option value="1">Bad</option>
                                <option value="2">Nice</option>
                                <option value="3">Good</option>
                                <option value="4">Very Good</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Texture</label>
                              <select class="form-control selectpicker" data-style="btn btn-link" id="texture" required> 
                                <option value="1">Bad</option>
                                <option value="2">Nice</option>
                                <option value="3">Good</option>
                                <option value="4">Very Good</option>
                              </select>
                            </div>
                        </div>
                         <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Lab Test</label>
                              <select class="form-control selectpicker" data-style="btn btn-link" id="lab" required>
                                <option value="Condemned">Condemned</option> 
                                <option value="Passed">Passed</option>
                                
                              </select>
                            </div>
                        </div>

                      </div>
                      <input type="hidden" id="specificID">
                     


                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" type="submit" onclick='updateSave();'>Save Changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>


              <div class="modal fade " tabindex="-1" role="dialog" id="viewProduct">
                <div class="modal-dialog modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title">Product Details</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">



                    </div>
                    <!-- 
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" type="submit" onclick='createSave();'>Create Save</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div> -->

                  </div>
                </div>
              </div>

            <!--MODALS END-->
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="#!">
                                    About Us
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy; 2019, made with <i class="material-icons">favorite</i> by
                            <a href="#!">Ardeidae</a> for a better web.
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
              <!--  Plugin for Sweet Alert -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/sweetalert2.js"></script>
              <!-- Forms Validations Plugin -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/jquery.validate.min.js"></script>
              <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/jquery.bootstrap-wizard.js"></script>
              <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/bootstrap-selectpicker.js"></script>
              <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/bootstrap-datetimepicker.min.js"></script>
              <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
              <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/bootstrap-tagsinput.js"></script>
              <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/jasny-bootstrap.min.js"></script>
              <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/fullcalendar.min.js"></script>
              <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/jquery-jvectormap.js"></script>
              <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/nouislider.min.js"></script>
              <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
              <!-- Library for adding dinamically elements -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/arrive.min.js"></script>
              <!-- Chartist JS -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/chartist.min.js"></script>
              <!--  Notifications Plugin    -->
              <script src="<?php echo base_url()?>assets/admin/js/plugins/bootstrap-notify.js"></script>
              <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="<?php echo base_url()?>assets/admin/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
              <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/abiList/muqiCompany.js"></script>
              <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/abiList/muqiProducts.js"></script>
              <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>scripts/inspectorDashboard.js"></script>

             


</body>

</html>