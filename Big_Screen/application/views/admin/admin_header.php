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
					<li>&nbsp;&nbsp;<img src="<?php echo base_url('images/profile_icon.png');?>" style="height:30px;width:30px" data-toggle="modal" data-target="#myModal"/>&nbsp;&nbsp;&nbsp; Admin</li><br>
					<li><a href="<?php echo site_url('usercontroller/logout');?>">Logout</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->



<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Profile
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle">
							  </div>
							  <div class="form" align="center">
							  <div style="height: 50%;width:50%;"><img src="../../images/profile_icon.png" height="100%" width="100%" style="border-radius: 100%;margin-bottom: 5px"></div>
								<h3 align="center">Admin</h3>
								<form action="<?php echo site_url('usercontroller/loginn')?>" method="post">
								  <input type="submit" value="Login">
								</form>
							  </div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>




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
					<?php
 				$userlist= $CI->countall(1);
 				$theatrelist= $CI->countall(2);
 				$distributorlist= $CI->countall(3);
 				$theatreapprove=$CI->countapprove(2);
 				$distributorapprove=$CI->countapprove(3);
 				?>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1" style="margin-left:7%">
					<nav>
						<ul class="nav navbar-nav">
							<li ><a href="<?php echo site_url('acontroller/index');?>">Home</a></li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">approval<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
									<div class="col-sm-4">
											<li><a href="<?php echo site_url('acontroller/theatreapproval');?>">Theatre approval <div class="lista" align="center"> <font color="#980017"> <?php echo $theatreapprove; ?></font></div></a></li>
											<li><a href="<?php echo site_url('acontroller/distributorapproval');?>">distributor approval <div class="lista" align="center"> <font color="#980017"> <?php echo $distributorapprove; ?></font></div></a></li>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">User List<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
									<div class="col-sm-4">
										<li><a href="<?php echo site_url('acontroller/userlist');?>">User list <div class="listu" align="center"> <font color="#980017"> <?php echo $userlist; ?></font></div></a></li>
										<li><a href="<?php echo site_url('acontroller/theatrelist');?>">Theatre list <div class="listu" align="center"> <font color="#980017"> <?php echo $theatrelist; ?></font></div></a></li>
										<li><a href="<?php echo site_url('acontroller/distributorlist');?>">distributor list <div class="listu" align="center"> <font color="#980017"> <?php echo $distributorlist; ?></font></div></a></li>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<?php /*?><li><a href="<?php echo site_url('usercontroller/admintheatreapproval');?>">Theatre list</a></li>
							<li><a href="<?php echo site_url('usercontroller/admintheatreapproval');?>">User list</a></li><?php */?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">News  <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
									<div class="col-sm-4">
											<li><a href="<?php echo site_url('acontroller/addnews');?>">Add News</a></li>
											<li><a href="<?php echo site_url('acontroller/dnews');?>">View News</a></li>
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li><a href="<?php echo site_url('acontroller/contact');?>">Running Detailes</a></li>
							<li><a href="<?php echo site_url('acontroller/payment');?>">Payment</a></li>
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
