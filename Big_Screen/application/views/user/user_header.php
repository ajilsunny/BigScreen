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
<script type="text/javascript" src="<?php echo base_url('style/js/jquery-2.1.4.min.js');?>"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="<?php echo base_url('style/css/owl.carousel.css');?>" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo base_url('style/js/owl.carousel.js');?>"></script>
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
<style>
div.scrollmenu {
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
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
					<li><img src="<?php echo base_url('images/profile_icon.png');?>" style="height:30px;width:30px"/>&nbsp;&nbsp;&nbsp;
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
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="<?php echo site_url('ucontroller/userhome');?>">Home</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Choose Film<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
									<div class="col-sm-4">
										<li><a href="<?php echo site_url('usercontroller/englishfilms');?>">English</a></li>
										<li><a href="<?php echo site_url('usercontroller/malayalamfilms');?>">Malayalam</a></li>
										<li><a href="<?php echo site_url('usercontroller/hindifilms');?>">Hindi</a></li>
										<li><a href="<?php echo site_url('usercontroller/tamilfilms');?>">Tamil</a></li>
										<li><a href="<?php echo site_url('usercontroller/kannadafilms');?>">Kannada</a></li>
										<li><a href="<?php echo site_url('usercontroller/telugufilms');?>">Telugu</a></li>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>

							<li><a href="#">Seat booked</a></li>
							<li><a href="#l">Payment</a></li>
							<li><a href="<?php echo site_url('ucontroller/userprofile');?>">Profile</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Choose Theaters<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="#">Andhra Pradesh</a></li>
												<li><a href="#"> Arunachal Pradesh</a></li>
												<li><a href="#">Assam</a></li>
												<li><a href="#">Bihar</a></li>
												<li><a href="#">Chhattisgarh</a></li>
												<li><a href="#">Goa</a></li>
												<li><a href="#">Gujarat</a></li>
												<li><a href="#">Haryana</a></li>
												<li><a href="#">Himachal Pradesh</a></li>
												<li><a href="#">Jammu & Kashmir</a></li>

											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="#">Jharkhand</a></li>
												<li><a href="#">Karnataka</a></li>
												<li><a href="#">Kerala</a></li>
												<li><a href="#">Madhya Pradesh</a></li>
												<li><a href="#">Maharashtra</a></li>
												<li><a href="#">Manipur</a></li>
												<li><a href="#">Meghalaya</a></li>
												<li><a href="#">Mizoram</a></li>
												<li><a href="#">Nagaland</a></li>
												<li><a href="#">Odisha</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<li><a href="#">Punjab</a></li>
												<li><a href="#">Rajasthan</a></li>
												<li><a href="#">Sikkim</a></li>
												<li><a href="#">Tamil Nadu</a></li>
												<li><a href="#">Telangana</a></li>
												<li><a href="#">Tripura</a></li>
												<li><a href="#">Uttarakhand</a></li>
												<li><a href="#">Uttar Pradesh</a></li>
												<li><a href="#">West Bengal</a></li>

											</ul>
										</div>

										<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li><a href="<?php echo site_url('usercontroller/usercontact');?>">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
<!-- //nav -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="https://twitter.com/">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="https://www.facebook.com/">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_g_plus"><a href="https://www.google.com/">Google+ <i class="fa fa-google-plus"></i></a></li>
		</ul>
  </nav>
</div>
