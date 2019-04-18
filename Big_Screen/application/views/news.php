<?php
include('Header.php');
?>
<div class="faq">
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="index.html">Home</a></li>
					  <li class="active">News</li>
					</ol>
				</div>
				<div class="agileinfo-news-top-grids">
					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#home1" id="home1-tab" role="tab" data-toggle="tab" aria-controls="home1" aria-expanded="true">Latest News</a></li>


								</ul>

								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home1" aria-labelledby="home1-tab">
										<div class="wthree-news-top-left">
                      <?php
                      $i=0;
                        foreach ($news as $key)
                        {
                          $nid=$key->nid;
                          $heading=$key->heading;
                          $discription1=$key->description;
                          $discription = substr($discription1, 0, 250);
                          $date1=date_create($key->ndate);
                          $date=date_format($date1,"d/M/Y H:i:s");
                          $photo=$key->photo;
                          if($i==5)
                          {
                            break;
                          }
                       ?>
                    <form action="<?php echo site_url('usercontroller/newssingle'); ?>" method="post">
                      <input type="hidden" name="nid" value="<?php echo $nid ?>">
                      <div class="col-md-12 w3-agileits-news-left well">
												<div class="col-sm-3 wthree-news-img">
													<a><img src="<?php echo base_url('images/news/').$photo ?>" alt="" /></a>
												</div>
												<div class="col-sm-7 wthree-news-info">
													<h5><a><button style="background:none;border:none" type="submit"><?php  echo $heading ?></button></a></h5>
													<p><?php echo $discription ?></p>
													<ul>
														<li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $date ?></li>
														<li><i class="fa fa-eye" aria-hidden="true"></i> 250</li>
													</ul>
												</div>
												<div class="clearfix"> </div>
											</div>
                    </form>
                    <?php
                    $i++;
                  }
                      ?>
											<div class="clearfix"> </div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 wthree-news-right">
						<!-- news-right-top -->
						<div class="news-right-top">
							<div class="wthree-news-right-heading">
								<h3>Updated News</h3>
							</div>
							<div class="wthree-news-right-top">
								<div class="news-grids-bottom">
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
						<!-- //news-right-top -->
						<!-- news-right-bottom -->

						<!-- //news-right-bottom -->
					</div>

					<div class="clearfix well">
            <img src="https://tpc.googlesyndication.com/simgad/10050203127778980225">
            <img src="<?php echo base_url('images/gif1.gif')?>" style="width:28%;height:40%;padding-top:2%">
          </div>


				</div>
			</div>
	</div>
        <?php
        include('footer.php');
        ?>
