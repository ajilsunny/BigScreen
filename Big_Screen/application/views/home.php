<!DOCTYPE html>
<?php
include('Header.php');
?>
<!-- banner -->
	<div id="slidey" style="display:none;">
		<ul>
			<?php
			foreach($cover as $row1)
			{
					$fname=$row1->film_name;
					$cpic=$row1->cover_pic;
					$d=$row1->description;
					$disc = substr($d, 0, 320);
			 ?>
			<li><img src="<?php echo base_url('images/movie/cover/').$cpic;?>" alt=" "><p class='title'><?php echo $fname ?></p><p class='description'><?php echo $disc; ?></p></li>
			<?php
			}
			?>
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
						foreach($cover as $row)
						{
								$fid=$row->mid;
								$fname=$row->film_name;
								$pic=$row->poster_pic;
								$date=$row->date;

						?>
						<div class="item">
	            <a data-toggle="modal" data-target="#myModal" onClick="return sess()">
							<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
	              <input type="hidden" name="fid" value="<?php echo $fid; ?>" >
								<button type="submit" href="" name="submit" class="hvr-shutter-out-horizontal" style="background:none;border:none">
	                <img src="<?php echo base_url('images/movie/poster/'.$pic.'');?>" title="album-name" class="img-responsive" alt=" " />
	              </button>
	<!--								<div class="w3l-action-icon"><img src="images/play-button.png" style="height:50%;width:50%"/></div>
	-->          </a>
								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6><a href="#"><?php echo $fname; ?></a></h6>
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


<!-- general -->
	<div class="general">
		<h4 class="latest-text w3_latest_text">Featured Movies</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured</a></li>
					</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies">
							<?php for($i=1;$i<=12;$i++){?>

							<div class="col-md-2 w3l-movie-gride-agile">
								<a data-toggle="modal" data-target="#myModal" onClick="return sess()"><img src="<?php echo base_url('images/m'.$i.'.jpg');?>" title="album-name" class="img-responsive" alt=" "/>
									<!--<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>-->
								</a>
								<div class="mid-1 agileits_w3layouts_mid_1_home">
									<div class="w3l-movie-text">
										<h6><a href="#">God’s Compass</a></h6>
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
										<a class="w3_play_icon" href="#">
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
?>
