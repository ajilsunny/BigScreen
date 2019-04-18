<?php
include('Header.php');
?>


<div class="faq">
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="index.html">Home</a></li>
					   <li><a href="news.html">News</a></li>
					  <li class="active">Single</li>
					</ol>
				</div>

				<div class="agileinfo-news-top-grids">
          <?php
            foreach ($newssing as $key)
            {
              $heading=$key->heading;
              $discription=$key->description;
              $date1=date_create($key->ndate);
              $date=date_format($date1,"d/M/Y H:i:s");
              $photo=$key->photo;
           ?>

					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="wthree-news-left-img">
								<center>
                  <img src="<?php echo base_url('images/news/').$photo ?>" alt="" style="height:50%;width:40%" />
                </center>
                <br>
								<h3><?php echo $heading; ?></h3>

								<div class="s-author">
									<p>Posted By <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a> &nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $date ?> &nbsp;&nbsp; <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Comments (10)</a></p>
								</div>
								<div id="fb-root"></div>
								<div class="news-shar-buttons">
									<ul>
										<li>
											<div class="fb-like" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
											<script>(function(d, s, id) {
											  var js, fjs = d.getElementsByTagName(s)[0];
											  if (d.getElementById(id)) return;
											  js = d.createElement(s); js.id = id;
											  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
											  fjs.parentNode.insertBefore(js, fjs);
											}(document, 'script', 'facebook-jssdk'));</script>
										</li>
										<li>
											<div class="fb-share-button" data-href="https://www.facebook.com/w3layouts" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fw3layouts&amp;src=sdkpreparse">Share</a></div>
										</li>
										<li class="news-twitter">
											<a href="https://twitter.com/w3layouts" class="twitter-follow-button" data-show-count="false">Follow @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
										</li>
										<li>
											<a href="https://twitter.com/intent/tweet?screen_name=w3layouts" class="twitter-mention-button" data-show-count="false">Tweet to @w3layouts</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
										</li>
										<li>
											<!-- Place this tag where you want the +1 button to render. -->
											<div class="g-plusone" data-size="medium"></div>

											<!-- Place this tag after the last +1 button tag. -->
											<script type="text/javascript">
											  (function() {
												var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
												po.src = 'https://apis.google.com/js/platform.js';
												var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
											  })();
											</script>
										</li>
									</ul>
								</div>
								<div class="w3-agile-news-text">
									<p><?php echo $discription; ?></p>
								</div>
							</div>
						</div>
					</div>
        <?php } ?>
					<div class="col-md-4 wthree-news-right">
						<!-- news-right-top -->
						<div class="news-right-top">
							<div class="wthree-news-right-heading">
								<h3>Updated News</h3>
							</div>
							<div class="wthree-news-right-top">
								<div class="news-grids-bottom" >
									<!-- date -->
									<div id="design" class="date">
										<div id="cycler">
                      <?php
                        foreach ($news as $key)
                        {
                          $nid=$key->nid;
                          $heading=$key->heading;
                          $date2=date_create($key->ndate);
                          $date3=date_format($date2,"d/M/Y H:i:s");
                          $discription1=$key->description;
                          $discription = substr($discription1, 0, 100);
                       ?>
                       <div class="date-text">
                         <form action="<?php echo site_url('usercontroller/newssingle'); ?>" method="post">
                           <input type="hidden" name="nid" value="<?php echo $nid ?>">
 												<a><button style="background:none;border:none" type="submit"><?php echo $date3 ?></button></a>
 												<p><h4><button style="background:none;border:none" type="submit"><?php echo $heading; ?></button></h4></p>
                         <p><?php echo $discription; ?></p>
                       </form>
 											</div>
                    <?php } ?>
										</div>
										<script>
										function blinker() {
											$('.blinking').fadeOut(500);
											$('.blinking').fadeIn(500);
										}
										setInterval(blinker, 1000);
										</script>
										<script>
											function cycle($item, $cycler){
												setTimeout(cycle, 2000, $item.next(), $cycler);

												$item.slideUp(1000,function(){
													$item.appendTo($cycler).show();
												});
												}
											cycle($('#cycler div:first'),  $('#cycler'));
										</script>
									</div>
									<!-- //date -->
								</div>
							</div>
						</div>
            <div class="clearfix well">
              <!-- <img src="https://tpc.googlesyndication.com/simgad/10050203127778980225"> -->
              </div>
					</div>

				</div>
			</div>
	</div>

  <?php
  include('footer.php');
  ?>
