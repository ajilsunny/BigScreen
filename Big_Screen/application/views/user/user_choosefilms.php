<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('user_header.php');
?>
<!-- banner -->
	<div id="slidey" style="display:none;">
		<ul>
			<li><img src="<?php echo base_url('images/5.jpg');?>" alt=" "><p class='title'>Tarzan</p><p class='description'> Tarzan, having acclimated to life in London, is called back to his former home in the jungle to investigate the activities at a mining encampment.</p></li>
			<li><img src="<?php echo base_url('images/2.jpg');?>" alt=" "><p class='title'>Maximum Ride</p><p class='description'>Six children, genetically cross-bred with avian DNA, take flight around the country to discover their origins. Along the way, their mysterious past is ...</p></li>
			<li><img src="<?php echo base_url('images/3.jpg');?>" alt=" "><p class='title'>Independence</p><p class='description'>The fate of humanity hangs in the balance as the U.S. President and citizens decide if these aliens are to be trusted ...or feared.</p></li>
			<li><img src="<?php echo base_url('images/4.jpg');?>" alt=" "><p class='title'>Central Intelligence</p><p class='description'>Bullied as a teen for being overweight, Bob Stone (Dwayne Johnson) shows up to his high school reunion looking fit and muscular. Claiming to be on a top-secret ...</p></li>
			<li><img src="<?php echo base_url('images/6.jpg');?>" alt=" "><p class='title'>Ice Age</p><p class='description'>In the film's epilogue, Scrat keeps struggling to control the alien ship until it crashes on Mars, destroying all life on the planet.</p></li>
			<li><img src="<?php echo base_url('images/7.jpg');?>" alt=" "><p class='title'>X - Man</p><p class='description'>In 1977, paranormal investigators Ed (Patrick Wilson) and Lorraine Warren come out of a self-imposed sabbatical to travel to Enfield, a borough in north ...</p></li>
		</ul>
    </div>
    <script src="<?php echo base_url('style/js/jquery.slidey.js');?>"></script>
    <script src="<?php echo base_url('style/js/jquery.dotdotdot.min.js');?>"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
		</script>
<!-- //banner -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
          <?php
            foreach($dis as $row)
            {
                $fid=$row->mid;
                $fname=$row->film_name;
                $pic=$row->poster_pic;
                $date=$row->date;

            ?>

					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="single.html" class="hvr-shutter-out-horizontal"><img src="<?php echo base_url('images/movie/poster/'.$pic.'');?>" title="album-name" class="img-responsive" alt=" " />
<!--								<div class="w3l-action-icon"><img src="images/play-button.png" style="height:50%;width:50%"/></div>
-->							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="single.html"><?php echo $fname; ?></a></h6>
								</div>
								<div>
									<b><p><?php echo $date; ?></p></b>
									<div class="block-stars">
										<ul style="display:inline-block">
										<?Php for($j=0;$j<5;$j++){?>
										<img src="<?php echo base_url('images/star.png');?>" style="display:inline-block;height:10%;width:10%">
										<?php } ?>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <img src="<?php echo base_url('images/twitter.png');?>" style="width:12%;height:12%"></a></li>
			<li class="w3_facebook"><a href="#">Facebook <img src="<?php echo base_url('images/fb.png');?>" style="width:12%;height:12%"></a></li>
			<!--<li class="w3_dribbble"><a href="#">Dribbble <img src="<?php echo base_url('images/fb.png');?>" style="width:12%;height:12%"></a></li>-->
			<li class="w3_g_plus"><a href="#">Google+ <img src="<?php echo base_url('images/google.png');?>" style="width:12%;height:12%"></a></li>
		</ul>
  </nav>
</div>
<!-- general -->
	<div class="general">
		<h4 class="latest-text w3_latest_text">Featured Movies</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured</a></li>
					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Top viewed</a></li>
					<li role="presentation"><a href="#rating" id="rating-tab" role="tab" data-toggle="tab" aria-controls="rating" aria-expanded="true">Top Rating</a></li>
					<li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">Recently Added</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies">
							<?php for($i=1;$i<=12;$i++){?>

							<div class="col-md-2 w3l-movie-gride-agile">
								<a href="single.html" class="hvr-shutter-out-horizontal"><img src="<?php echo base_url('images/m'.$i.'.jpg');?>" title="album-name" class="img-responsive" alt=" "/>
									<!--<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>-->
								</a>
								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6><a href="single.html">God’s Compass</a></h6>
									</div>
									<div>
									<b><p>2016</p></b>
									<div class="block-stars">
										<ul style="display:inline-block">
										<?Php for($j=0;$j<5;$j++){?>
										<img src="<?php echo base_url('images/star.png');?>" style="display:inline-block;height:10%;width:10%">
										<?php } ?>

										</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="ribben">
									<p>NEW</p>
								</div>
							</div>
							<?php } ?>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //general -->

<!-- Latest-tv-series -->
	<div class="Latest-tv-series">
		<h4 class="latest-text w3_latest_text w3_home_popular">Most Popular Movies</h4>
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">

					<?php for($k=1;$k<=3;$k++){ ?>

						<li>
							<div class="agile_tv_series_grid">
								<div class="col-md-6 agile_tv_series_grid_left">
									<div class="w3ls_market_video_grid1">
										<img src="<?php echo base_url('images/h'.$k.'-1.jpg');?>" alt=" " class="img-responsive" />
										<a class="w3_play_icon" href="#small-dialog">
											<span><img src="images/play-button.png"></span>

										</a>
									</div>
								</div>
								<div class="col-md-6 agile_tv_series_grid_right">
									<p class="fexi_header">the conjuring 2</p>
									<p class="fexi_header_para"><span class="conjuring_w3">Story Line<label>:</label></span> 720p,Bluray HD Free Movie Downloads, Watch Free Movies Online with high speed Free Movie Streaming | MyDownloadTube Lorraine and Ed Warren go to north London to help a single...</p>
									<p class="fexi_header_para"><span>Date of Release<label>:</label></span> Jun 10, 2016 </p>
									<p class="fexi_header_para">
										<span>Genres<label>:</label> </span>
										<a href="#">Drama</a> |
										<a href="#">Adventure</a> |
										<a href="#">Family</a>
									</p>
									<p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
										<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
										<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
									</p>
								</div>
								<div class="clearfix"> </div>

						</li>
						<?php } ?>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="<?php echo base_url('style/css/flexslider.css');?>" type="text/css" media="screen" property="" />
				<script defer src="<?php echo base_url('style/js/jquery.flexslider.js');?>"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
	</div>

	<!-- pop-up-box -->
		<script src="<?php echo base_url('style/js/jquery.magnific-popup.js');?>" type="text/javascript"></script>
	<!--//pop-up-box -->
	<div id="small-dialog" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
	</div>
	<div id="small-dialog1" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/148284736"></iframe>
	</div>
	<div id="small-dialog2" class="mfp-hide">
		<iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
	</div>
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

		});
	</script>
<!-- //Latest-tv-series -->
<?php
	include('footer.php');
	}
	else
	{
		$CI->mainindex() ;
	}
	?>
