<?php
$CI =& get_instance();
 $a= $CI->sessionin(0) ;
if($a==1)
{
include('admin_header.php');
?>
<!-- contact -->
	<div class="contact-agile">
		<div id="map"></div>
		<div class="faq">
			<h4 class="latest-text w3_latest_text">Contact Us</h4>
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Address</h3>
					<h4>Amal Jyothi College of Engineering,</h4>
					<h4>Kanjirappally, Koovappally P.O.</h4>
					<h4>Kottayam Dt., Kerala </h4>
					<h4>India. PIN - 686518</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Call</h3>
					<h4>+91-8593967684</h4>
					<h4>+91-9207642256</h4>
					<h4>+91-9495461810</h4>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>Email</h3>
					<h4><a href="mailto:info@example.com">ajilsunny007@gmail.com</a></h4>
					<h4><a href="mailto:info@example.com">ajilsunny@mca.ajce.in</a></h4>
					<h4><a href="mailto:info@example.com">ajilsunny84@gmail.com</a></h4>
				</div>
				<div class="col-md-3 social-w3l">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>Social media</h3>
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
						<li class="twt"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
						<li class="ggp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="text">Google+</span></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<form action="#" method="post">
					<input type="text" name="your name" placeholder="FIRST NAME" required="">
					<input type="text" name="your name" placeholder="LAST NAME" required="">
					<input type="text" name="your email" placeholder="EMAIL" required="">
					<input type="text" name="subject" placeholder="SUBJECT" required="">
					<textarea  name="your message" placeholder="YOUR MESSAGE" required></textarea>
					<input type="submit" value="SEND MESSAGE">
				</form>
			</div>
		</div>
	</div>
				<!-- Map-JavaScript -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
			<script type="text/javascript">
				google.maps.event.addDomListener(window, 'load', init);
				function init() {
					var mapOptions = {
						zoom: 15,
						center: new google.maps.LatLng(9.5284655,76.8226699),
						styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
					};
					var mapElement = document.getElementById('map');
					var map = new google.maps.Map(mapElement, mapOptions);
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(9.5284655,76.8226699),
						map: map,
					});
				}
			</script>
		<!-- //Map-JavaScript -->
<!-- //contact -->
<?php
include('footer.php');
	}
	else
	{
		$CI->mainindex() ;
	}
?>
