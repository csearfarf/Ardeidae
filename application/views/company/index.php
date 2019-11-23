<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/global/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/global/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="theme-color" content="#9C27B0" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>MUQI | Login</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">


	<!-- CSS Files -->
    <link href="<?php echo base_url()?>assets/user/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/user/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>

	<!-- recaptcha v3 -->
	<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
    <script src="<?php echo base_url(); ?>node_modules/web3/dist/web3.min.js"></script>
</head>

<style>
.login-image-custom {
  background-size: 72%;
  background-repeat: no-repeat;
  background-image: 
    url('<?php echo base_url()?>assets/global/img/backgroundfood.svg'),
  	url('<?php echo base_url()?>assets/global/img/purple.svg');
  background-position: 
    12.5em 23.5em,
  	205% 30%;
	}
	.color-gray{
		color: #555555; 
	}

</style>

<body class="login-page">
	<nav class="navbar navbar-default navbar-fixed-top">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
            
        		
        		<button type="button" class="navbar-toggle" data-target="#example-navbar-primary">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
                <a class="navbar-brand" href="#">
				   <img src='<?php echo base_url()?>assets/global/img/muqi_purple.svg' style="width:8rem">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-primary">
				<ul class="nav navbar-nav navbar-right">
		            
		            <li>
		                <a href="#">
							<i class="material-icons">vertical_split</i>
								Explore
		                </a>
					</li>
					<li>
		                <a href="#">
							<i class="material-icons">code</i>
								Developers
		                </a>
					</li>
					<li class="active">
		                <a href="#" class="btn btn-rose btn-raised btn-round">
							<i class="material-icons">account_circle</i>
		                        Login
		                </a>
		            </li>
				</ul>
			</div>
    	</div>
    </nav>

	<div class="page-header login-image-custom" style="background-color: white;">
		<div class="container" >
			<div class="row" style="padding-top: 3.5vw;">
				<div class="col-lg-7" style="margin-bottom: 4em;">
					<h1 class="color-gray title-greet">Good Day
						<span
								   class="txt-rotate"
								   data-period="2000"
								   data-rotate='[ "Stranger", "to you.", "Everybody!" ]'></span>
					</h1>
					<h2 class="color-gray title-desc wow fadeInUp" data-wow-duration="1s">Meat Unified Quality Inspector<br><small>Securing Meat Product’s Safety from Produce to Table</small></h2>
					<button class="btn btn-primary wow fadeInUp" data-wow-duration="1s">
							Learn More
					</button><br>
				</div>
				<div class="col-lg-4 col-lg-offset-1" >
					<div class="card card-signup wow slideInUp" data-wow-duration="2s">
						<input type="hidden" id="token" name="token">
						<form class="form" id="loginForm">
							<input type="hidden" id="key" value="<?php echo SITE_KEY;?>">
							<div class="col-12">
								<div class="col-lg-10 col-lg-offset-1">
									<h2 class="title color-gray" style="color: #555555;margin-bottom: 10px;">Login <br>Company</h2>
								</div>
							</div>
							<div class="card-content">
								
								<div class="input-group input-username">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <div class="form-group label-floating status-here">
                                        <label for="username" class="control-label">username
                                        </label>
										<input name="username" type="text" class="form-control username">
										<span class="material-icons form-control-feedback">clear</span>
										<span class="material-input"></span>
                                    </div>
								</div>
								
								<div class="input-group input-password">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label for="password" class="control-label">Password
                                        </label>
										<input name="password" type="password" class="form-control password">
										<span class="material-icons form-control-feedback">clear</span>
										<span class="material-input"></span>
                                    </div>
								</div>
								
								
							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-primary btn-simple btn-wd btn-lg" id="login-button">Sign-in</button>
							</div>
							<div class="text-center login-result" style="padding-bottom: 2rem;"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer footer-black footer-big">
		<div class="container">
			<div class="content">
				<div class="container">
							<div class="col-md-2">
							    <h5>About Us</h5>
								<ul class="links-vertical">
									<li>
										<a href="#">
											Location
										</a>
									</li>
									<li>
										<a href="#">
										   Contact Us
										</a>
									</li>
									<li>
										<a href="#">
										   Developers
										</a>
									</li>
									<li>
										<a href="#">
										   About the app
										</a>
									</li>
								</ul>
							</div>
							<div class="col-md-2">
								<h5>References</h5>
								<ul class="links-vertical">
							<li>
								<a href="https://nmis.gov.ph">
									 nmis.gov.ph
								</a>
							</li>
							<li>
								<a href="#">
									doh.gov.ph
								</a>
							</li>
							<li>
								<a href="https://www.biography.com/political-figure/jos%C3%A9-rizal">
									biography.com
								</a>
							</li>
							<li>
								<a href="http://nhcp.gov.ph/historical-context-and-legal-basis-of-rizal-day-and-other-memorials-in-honor-of-jose-rizal/">
									nhcp.gov.ph
								</a>
							</li>
						</ul>
					</div>

					<div class="col-md-4">
						<h5>Features</h5>
						<div class="social-feed">
							<div class="feed-line">
								<i class="material-icons">important_devices</i>
								<p>Responsive and cross browser compatibility</p>
							</div>
							<div class="feed-line">
								<i class="material-icons">child_friendly</i>
								<p>User Friendly interface an less friction design</p>
							</div>
							<div class="feed-line">
								<i class="material-icons">verified_user</i>
								<p>Secured system architecture framework</p>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<h5>Development Technologies</h5>
						<ul class="social-buttons">
							<li>
								<i class="devicon-bootstrap-plain-wordmark colored" style="font-size: 4rem;"></i>
							</li>
							<li>
								<i class="devicon-codeigniter-plain-wordmark colored" style="font-size: 4rem;"></i>
							</li>
							<li>
								<i class="devicon-jquery-plain-wordmark colored" style="font-size: 4rem;"></i>
							</li>
							<li>
								<i class="devicon-sass-original colored" style="font-size: 4rem;"></i>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<hr />

			<div class="copyright pull-center">
						Copyright &copy; 2019 <img src='<?php echo base_url()?>assets/global/img/muqi_purple.svg' style="width:5rem;padding-bottom: .2em;">
			</div>
		</div>
	</footer>
</body>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url()?>assets/user/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/user/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/user/js/fittext-jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/user/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/user/js/material.min.js"></script>

	<script src="<?php echo base_url()?>assets/user/js/moment.min.js"></script>

	<script src="<?php echo base_url()?>assets/user/js/nouislider.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url()?>assets/user/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<script src="<?php echo base_url()?>assets/user/js/bootstrap-selectpicker.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

	<script src="<?php echo base_url()?>assets/user/js/bootstrap-tagsinput.js"></script>

	<script src="<?php echo base_url()?>assets/user/js/jasny-bootstrap.min.js"></script>

	<script src="<?php echo base_url()?>assets/user/js/material-kit.js?v=1.2.1" type="text/javascript"></script>

    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/abiList/muqiCompany.js"></script>
    <script src="<?php echo base_url()?>scripts/companyLogin.js" type="text/javascript"></script>

    <script>
        new WOW().init();
    </script>

</html>
