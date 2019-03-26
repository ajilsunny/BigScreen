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
<script type="text/javascript" src="<?php echo base_url('style/js/validate.js');?>"></script>
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
<script>
function user()
{
	var x = document.getElementById("file");
	x.style.display = "none";
	var u=document.getElementById('Type').value;
	if(u>1)
	{
		var x = document.getElementById("file");
		x.style.display = "block";
		//$('#file').('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
	}
}
function dist()
{
	var state=document.getElementById('state').value;
  var data=new FormData();
  data.append('sid',state);
	$.ajax({
    method:'post',
    url:"<?php echo site_url("usercontroller/districtselect"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
		//alert(result);
			 var r=JSON.parse(result);
			 //alert(r[0]);
			 $('#district').html("<option value=0>"+"Select District"+"</option>");

			 for(i=0;i<r.length;i++){
				 $('#district').append("<option value="+r[i].id+">"+r[i].value+"</option>");
			 }
				 //$('#district').append("<option value="+result+">"+result+"</option>");
				 //$('#file').append('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
				}
  });
}
	</script>
	 <!-- start-smoth-scrolling -->
</head>

<body>

<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href='<?php echo site_url('usercontroller/index');?>'><h1>Big<span>Screen</span></h1></a><img  src="<?php echo base_url('images/1.jpg');?>">
			</div>

			<div class="w3_search">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="Search" required="">
					<input type="submit" name="search" value="Go">
				</form>
			</div>
			<script>
			<?php $this->session->sess_destroy(); ?>
			</script>
			<div class="w3l_sign_in_register">
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+91) 8593967684</li><br>
					<li><a href="#" data-toggle="modal" data-target="#myModal" onClick="return sess()">Login</a></li>
					<li>
					<?php
					$s=$this->session->userdata('msg');
					if($s!="")
					{ echo "<font color='#FF0000'>".$s."</font>";
					}
					?>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Sign In & Sign Up
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Click Me</div>
							  </div>
							  <div class="form">
								<h3>Login to your account</h3>
								<form name="loginform" id="loginform" action="<?php echo site_url('usercontroller/loginn')?>" method="post">
								  <input type="text" name="Username" placeholder="Email" required="">
								  <input type="password" name="Password" placeholder="Password" required="">
								  <input type="submit" value="Login">
								</form>
							</div>

							  <div class="form">
								<h3>Create an account</h3>
								<form name="signup" id="signup" action="<?php echo site_url('usercontroller/insert')?>" method="post" onsubmit="return signup1()" enctype="multipart/form-data">
									<p id="vname" style="color:red;"></P>
								  <input type="text" name="Name" id="Name" placeholder="Name" pattern="^[a-zA-Z]+$" maxlength="15" onkeyup="this.value = this.value.toUpperCase();" >
									<p id="vemail" style="color:red;"></P>
									<input type="email" name="Email" id="Email" placeholder="Email Address">
									<p id="vphone" style="color:red;"></P>
									<input type="text" name="Phone" id="Phone" placeholder="Phone Number" maxlength="10" pattern="^\d{10}$" >
									<p id="vtype" style="color:red;"></P>
									<select name="Type" id="Type" placeholder="Select" style="width:100%;height:100%;margin-bottom:5%;padding:4% 4%" onchange="return user()">
								  <option value="0">Select Type</option>
								  <option value="1">User</option>
								  <option value="2">Theatre Owner</option>
								  <option value="3">distributor</option>
									</select>
									<p id="vstate" style="color:red;"></P>
									<select name="state" id="state" style="width:100%;height:100%;margin-bottom:5%;padding:4% 4%" onchange="return dist()" >
									<option value="0">Select State</option>
									<?php
									foreach($dis as $row)
										{
											$id=$row->id;
											$name=$row->sname;
											?>
											<option value="<?php echo $id;?>"><?php echo $name ?></option>
										<?php
										}
										?>
									</select>
									<p id="vdist" style="color:red;"></P>
									<select name="district" id="district" style="width:100%;height:100%;margin-bottom:5%;padding:4% 4%" >
										<option value="0">Select District</option>
									</select>
									<p id="vplace" style="color:red;"></P>
								  <input type="text" name="Place" id="Place" placeholder="Place" pattern="^[a-zA-Z]+$" >
									<p id="vpin" style="color:red;"></P>
									<input type="text" name="Pin" id="Pin" placeholder="Pincode" pattern="^\d{6}$" >
									<p id="vpass1" style="color:red;"></P>
									<input type="password" name="psw1" id="psw1" placeholder="password" >
									<p id="vpass2" style="color:red;"></P>
									<input type="password" name="psw2" id="psw2" placeholder="Confirm password" >
									<div class="input-group" id="file" name="file" style="display:none">
										<label>Upload Gov.verified certificate copy</label>
										<p id="vfile" style="color:red;"></P>
										<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">
									</div>
								  <input type="submit" value="Register">
								</form>
							  </div>
							  <div class="cta"><a href="<?php echo site_url('usercontroller/forgotpassword')?>">Forgot your password?</a></div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>
<!-- //bootstrap-pop-up -->
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
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1" style="margin-left:6%">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="<?php echo site_url();?>">Home</a></li>
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
							<!--<li><a href="">tv - series</a></li>-->
							<li><a href="<?php echo site_url('usercontroller/index');?>">news</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Choose Theater  <b class="caret"></b></a>
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
							<li><a href="<?php echo site_url('usercontroller/index');?>">About</a></li>
							<li><a href="<?php echo site_url('usercontroller/contact');?>">Contact Us</a></li>
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
