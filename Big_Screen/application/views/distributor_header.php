<!DOCTYPE html>
<html lang="en">
<head>
<title>BigScreen</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link rel="icon" href="../../images/images.png" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="<?php echo base_url('style/css/bootstrap.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('style/css/style.css');?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('style/css/contactstyle.css');?>" rel="stylesheet"  type="text/css" media="all" />
<link href="<?php echo base_url('style/css/faqstyle.css');?>" rel="stylesheet"  type="text/css" media="all" />
<link href="<?php echo base_url('style/css/single.css');?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('style/css/medile.css');?>" rel='stylesheet' type='text/css' />
<link href="../../style/css/flexslider.css" type="text/css" rel="stylesheet" />
<!-- banner-slider -->
<link href="<?php echo base_url('style/css/jquery.slidey.min.css');?>" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="<?php echo base_url('style/css/popuo-box.css');?>" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url('style/css/font-awesome.min.css');?>" />
<!-- //font-awesome icons -->
<!-- js -->

<link rel="stylesheet" href="<?php echo base_url('style/css/contactstyle.css');?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url('style/css/faqstyle.css');?>" type="text/css" media="all" />
<!-- news-css -->
<link rel="stylesheet" href="<?php echo base_url('style/news-css/news.css');?>" type="text/css" media="all" />
<!-- //news-css -->
<!-- list-css -->
<link rel="stylesheet" href="<?php echo base_url('style/list-css/list.css');?>" type="text/css" media="all" />
<!-- //list-css -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url('style/css/font-awesome.min.css');?>" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="<?php echo base_url('style/js/jquery-2.1.4.min.js');?>"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url('style/js/move-top.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('style/js/easing.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('style/js/validateaddmovie.js');?>"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="<?php echo base_url('style/css/owl.carousel.css');?>" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo base_url('style/js/owl.carousel.js');?>"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({

		  autoPlay: 3000, //Set AutoPlay to 3 seconds

		  items : 5,
		  itemsDesktop : [640,5],
		  itemsDesktopSmall : [414,4]

		});

	});
</script>
<script src="js/simplePlayer.js"></script>
<script>
	$("document").ready(function() {
		$("#video").simplePlayer();
	});
</script>


<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({

		  autoPlay: 3000, //Set AutoPlay to 3 seconds

		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]

		});

	});
</script>
<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url('style/js/move-top.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('style/js/easing.js');?>"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!--validation registration-->
	 <!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="#"><h1>Big<span>Screen</span></h1></a><img  src="<?php echo base_url('images/1.jpg');?>">
			</div>
			<div class="w3_search">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="Search" required="">
					<input type="submit" value="Go">
				</form>
			</div>
			<div class="w3l_sign_in_register">
				<ul>
					<li>&nbsp;&nbsp;<img src="<?php echo base_url('images/profile_icon.png');?>" style="height:30px;width:30px"/>&nbsp;&nbsp;&nbsp;
					<?php
						$name=$this->session->userdata('name');
						echo $name;
					?>
				</li><br>
					<li><a href="<?php echo site_url('usercontroller/logout');?>">Logout</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->

<!-- nav -->
<div class="movies_nav">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1" style="margin-left:7%">
				<nav>
					<ul class="nav navbar-nav">
							<li><a href="<?php echo site_url('dcontroller/distributorhome');?>">Home</a></li>
							<li><a href="<?php echo site_url('dcontroller/distributoraddfilms');?>">Add films </a></li>
							<li><a href="<?php echo site_url('dcontroller/distributorfilms');?>">Films</a></li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">films status<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
									<div class="col-sm-4">
										<li><a href="<?php echo site_url('dcontroller/distributorselectedfilms');?>">Film Requests</a></li>
										<li><a href="<?php echo site_url('dcontroller/distributorrunningstatus');?>">Films Running Theaters</a></li>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li><a href="<?php echo site_url('dcontroller/distributorprofile');?>">Profile</a></li>
							<li><a href="<?php echo site_url('dcontroller/distributorcontact');?>">Contact Us</a></li>
							<li></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
<!-- //nav -->
<!-- //banner-bottom -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="https://twitter.com/">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="https://www.facebook.com/">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_g_plus"><a href="https://www.google.com/">Google+ <i class="fa fa-google-plus"></i></a></li>
		</ul>
  </nav>
</div>
