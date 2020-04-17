<!DOCTYPE HTML>
<html lang="hi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keywords" content="Shri dharmdas,श्री धर्मदास गण परिषद">
	<meta name="description" content="Shri dharmdas,श्री धर्मदास गण परिषद">
	<?php $frontend_assets =  base_url().'frontend_assets/';?>
	<title><?= lang('site_name'); ?></title>
	<!--Bootstrap -->
	<link rel="stylesheet" href="<?= $frontend_assets; ?>assets/css/bootstrap.min.css" type="text/css">
	<!--OWL Carousel slider-->
	<link rel="stylesheet" href="<?= $frontend_assets; ?>assets/css/owl.carousel.css" type="text/css">
	<!--Custome Style -->
	<link rel="stylesheet" href="<?= $frontend_assets; ?>assets/css/style.css" type="text/css">
	<!--Responsive Style -->
	<link rel="stylesheet" href="<?= $frontend_assets; ?>assets/css/responsive.css" type="text/css">
	<!--magnific Style -->
	<link rel="stylesheet" href="<?= $frontend_assets; ?>assets/css/magnific-popup.css" type="text/css">
	<!--FontAwesome Font Style -->
	<link href="<?= $frontend_assets; ?>assets/css/font-awesome.css" rel="stylesheet">
	<!-- Fav and touch icons -->
	<link rel="shortcut icon" href="<?= $frontend_assets; ?>favicon.png">
	<!-- Google-Font-->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
	<!--Custom Style -->
	<link href="<?= $frontend_assets; ?>css/custom.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body id="tl">
	<!-- Header -->
	<header id="header" class="nav-stacked" data-spy="affix" data-offset-top="1">
		<!-- Header-top -->
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-4 col-8">
					<!-- 	<div class="follow_us">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							</ul> -->
						</div>
					</div>
					<div class="col-lg-6 col-md-8 col-4 align-self-center">
						<ul class="top-btn list-inline">
							<li class="list-inline-item"><i class="fa fa-phone"></i><a href="javascript:void();">+91 9987 069 990</a></li>
							<li class="list-inline-item"><i class="fa fa-envelope"></i><a href="javascript:void();">dharmdasjanganna2020@gmail.com</a></li>
						<!-- 	<li class="list-inline-item"><a class="btn btn-sm dark-btn tilak-top-btn" href="donation.html">Donate</a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /Header-top -->

		<!-- Navigation -->
		<nav id="navigation_bar" class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<div class="logo">
						<a href="<?= base_url(); ?>"><img src="<?= $frontend_assets; ?>images/logo/logo-w.png" alt="image" class="image-logo" /></a> 
					</div> <!-- /Logo -->
					<div id="menu_slide">
						<div id="nav-toggle-label">
							<div id="hamburger">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<div id="cross">
								<span></span>
								<span></span>
							</div>
						</div>
					</div>

				</div>
				<div class="collapse navbar-collapse" id="navigation">
					<ul class="nav navbar-nav">
						<!-- <li class="dropdown"><a href="#">Home<span class="nav_arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="index.html">Homepage 1</a></li>
								<li><a href="index2.html">Homepage 2</a></li>
							</ul>
						</li> -->
						<li><a href="<?= base_url(); ?>">Home</a></li>
					<!-- 	<li><a href="<?= base_url(); ?>about-us">About Us</a></li> -->
						<li><a href="<?= base_url(); ?>user-step-1">User Form</a></li>
					<!-- 	<li><a href="<?= base_url(); ?>user-step-1">Step-1</a></li>
						<li><a href="<?= base_url(); ?>user-step-2">Step-2</a></li>
						<li><a href="<?= base_url(); ?>user-step-3">Step-3</a></li> -->
						<!-- <li class="dropdown"><a href="#">Sermon <span class="nav_arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="sermon.html">Sermon</a></li>
								<li><a href="sermon-detail.html">Sermon Detail</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="events.html">Event <span class="nav_arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="events.html">Event</a></li>
								<li><a href="event-detail.html">Event Detail</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#">Pages <span class="nav_arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="our-teachers.html">our-teachers</a></li>
								<li><a href="shop-full-width.html">shop-full-width</a></li>
								<li><a href="shop-left.html">shop-left</a></li>
								<li><a href="shop-right.html">shop-right</a></li>
								<li><a href="log-in.html">log-in</a></li>
								<li><a href="sign-up.html">sign-up</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#">Blog <span class="nav_arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="blog.html">Blog</a></li>
								<li><a href="blog-detail.html">Blog Detail</a></li>
							</ul>
						</li> -->
						<!-- <li><a href="<?= base_url(); ?>contact-us">Contact</a></li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- Navigation end -->
		<!-- Mobile Navigation -->
		<div class="mobile-menu">
			<ul class="wd-menu pop-scroll">
					<li><a href="<?= base_url(); ?>">Home</a></li>
					<!-- <li><a href="<?= base_url(); ?>about-us">About Us</a></li> -->
				<!-- 	<li><a href="<?= base_url(); ?>user-form">User Form</a></li> -->
						<li><a href="<?= base_url(); ?>user-step-1">User Form</a></li>
					<!-- 	<li><a href="<?= base_url(); ?>home/user_step_1">Step-1</a></li>
						<li><a href="<?= base_url(); ?>home/user_step_2">Step-2</a></li>
						<li><a href="<?= base_url(); ?>home/user_step_3">Step-3</a></li> -->
				<!-- 	<li><a href="<?= base_url(); ?>contact-us">Contact</a></li> -->
<!-- 				<li class="has-child">
					<a href="#">Home</a>
					<ul class="sub-menu">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="index2.html">Homepage 2</a></li>
					</ul>
				</li>
				<li class="has-child">
					<a href="#">Blog</a>
					<ul class="sub-menu">
						<li><a href="blog.html">Blog</a></li>
						<li><a href="blog-detail.html">Blog Detail</a></li>
					</ul>
				</li>
				<li class="has-child">
					<a href="#">Pages</a>
					<ul class="sub-menu">
						<li><a href="our-teachers.html">our-teachers</a></li>
						<li><a href="shop-left.html">shop-left</a></li>
						<li><a href="shop-right.html">shop-right</a></li>
						<li><a href="shop-full-width.html">shop-full-width</a></li>
						<li><a href="log-in.html">log-in</a></li>
						<li><a href="sign-up.html">sign-up</a></li>
					</ul>
				</li>
				<li><a href="about-us.html">About us</a></li>
				<li><a href="contact-us.html">contact us</a></li>
				<li class="has-child"><a href="#">Sermon</a>
					<ul class="sub-menu">
						<li><a href="sermon.html">Sermon</a></li>
						<li><a href="sermon-detail.html">Sermon Detail</a></li>
					</ul>
				</li>
				<li class="has-child"><a href="#">Event</a>
					<ul class="sub-menu">
						<li><a href="events.html">Event</a></li>
						<li><a href="event-detail.html">Event Detail</a></li>
					</ul>
				</li> -->
			</ul>
		</div>
		<!-- END/Mobile Navigation -->
	</header>
	<!-- /Header -->