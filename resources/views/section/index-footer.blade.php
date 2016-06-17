<a href="#" class="fh5co-arrow fh5co-gotop footer-box"><i class="ti-angle-up"></i></a>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 footer-box">
						<h3 class="fh5co-footer-heading">Company</h3>
						<ul class="fh5co-footer-links">
							<li><a href="#">About</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Our Products</a></li>
							<li><a href="#">Our Culture</a></li>
							<li><a href="#">Team</a></li>
						</ul>

					</div>
					<div class="col-md-4 col-sm-6 footer-box">
						<h3 class="fh5co-footer-heading">More Links</h3>
						<ul class="fh5co-footer-links">
							<li><a href="{{route('getterms-conditions')}}">Terms &amp; Conditions</a></li>
							<li><a href="#">Our Careers</a></li>
							<li><a href="{{route('getfaq')}}">Support &amp; FAQ's</a></li>
							<li><a href="#" id="footer_signup">Sign up</a></li>
							<li><a href="{{ route('admin-login') }}">Log in</a></li>
						</ul>
					</div>
					<div class="col-md-4 col-sm-12 footer-box">
						<h3 class="fh5co-footer-heading">Get in touch</h3>
						<ul class="fh5co-social-icons">
							
							<li><a href="#"><i class="ti-google"></i></a></li>
							<li><a href="#"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="#"><i class="ti-facebook"></i></a></li>	
							<li><a href="#"><i class="ti-instagram"></i></a></li>
							<li><a href="#"><i class="ti-dribbble"></i></a></li>
						</ul>
					</div>
					<div class="col-md-12 footer-box text-center">
						<div class="fh5co-copyright">
						<p>&copy; All Rights Reserved to Tier5 LLC. <br>Designed and Developed by <a href="https://www.tier5.us/" target="_blank">Tier5 LLC</a></p>
						</div>
					</div>
					
				</div>
				<!-- END row -->
				<div class="fh5co-spacer fh5co-spacer-md"></div>
			</div>
			<!-- jQuery -->
		<script src="{{url('/')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- jQuery Easing -->
		<script src="{{url('/')}}/public/bootstrap/js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="{{url('/')}}/public/bootstrap/js/bootstrap.js"></script>
		<!-- Owl carousel -->
		<script src="{{url('/')}}/public/bootstrap/js/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="{{url('/')}}/public/bootstrap/js/jquery.magnific-popup.min.js"></script>
		<!-- Superfish -->
		<script src="{{url('/')}}/public/bootstrap/js/hoverIntent.js"></script>
		<script src="{{url('/')}}/public/bootstrap/js/superfish.js"></script>
		<!-- Easy Responsive Tabs -->
		<script src="{{url('/')}}/public/bootstrap/js/easyResponsiveTabs.js"></script>
		<!-- FastClick for Mobile/Tablets -->
		<script src="{{url('/')}}/public/bootstrap/js/fastclick.js"></script>
		<!-- Parallax -->
		<!-- <script src="{{url('/')}}/public/bootstrap/js/jquery.parallax-scroll.min.js"></script> -->
		<!-- Waypoints -->
		<script src="{{url('/')}}/public/bootstrap/js/jquery.waypoints.min.js"></script>
		<!-- Main JS -->
		<script src="{{url('/')}}/public/bootstrap/js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#get_started').click(function(){
					$('html, body').animate({
        				scrollTop: $("#fh5co-main").offset().top
    				}, 2000);
				});
				$('#first_signUp').click(function(){
					$('html, body').animate({
        				scrollTop: $("#fh5co-main").offset().top
    				}, 2000);
				});
				$('#nav-abt').click(function(){
					$('html, body').animate({
        				scrollTop: $("#about").offset().top
    				}, 2000);
				});
				$('#footer_signup').click(function(){
					$('html, body').animate({
        				scrollTop: $("#fh5co-main").offset().top
    				}, 2000);
				});
			});
		</script>