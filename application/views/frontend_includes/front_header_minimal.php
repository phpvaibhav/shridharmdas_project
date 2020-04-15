<!DOCTYPE HTML>
<html lang="hi">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="keywords" content="Shri dharmdas,श्री धर्मदास गण परिषद">
	<meta name="description" content="Shri dharmdas,श्री धर्मदास गण परिषद">
	<?php $frontend_assets =  base_url().'frontend_assets/';
			$backend_assets =  base_url().'backend_assets/';

	?>
	<title>श्री धर्मदास गण परिषद</title>
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
	<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
	<!-- Fav and touch icons -->

	<link rel="shortcut icon" href="<?= $frontend_assets; ?>favicon.png">
	 <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
     <!-- toastr -->
 <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    
	<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
<!--Custom Style -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?= $frontend_assets; ?>css/custom.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 <?php 
      if(!empty($front_styles)) { load_css($front_styles); } //load required page styles 
     ?>
</head>

<body id="tl" data-base-url="<?php echo base_url(); ?>">
	<!-- loader -->
<div class="dialog-background" id="pre-load-dailog" style="display: none;">
    <div class="dialog-loading-wrapper">
        <span class="dialog-loading-icon"><img src="<?= base_url();?>frontend_assets/images/ajax-loader.gif" alt="Loading..."></span>
    </div>
</div> 
<!-- loader -->
  <header class="tl-header tl-tilak-nav">

          <div class="container">
              <div class="tl-wrpr-inner">
                  <div class="tl-center tl-logo py-4 mx-auto">
                      <a href="<?= base_url(); ?>">
                          <img src="<?= $frontend_assets; ?>images/logo/logo-white.png" alt="Logo" style="width: 82px;" >
                      </a>
                  </div>
                  <!-- ui -->
                  
                  <!-- ui -->
              </div>
          </div>

  </header>
  <!-- Inner-Intro -->