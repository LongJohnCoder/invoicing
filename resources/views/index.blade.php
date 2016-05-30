@extends('layout.master-index')
@section('content')
			<div id="fh5co-hero" style="background-image: url({{url('/')}}/public/bootstrap/images/slide_2.jpg);">
			<div class="overlay"></div>
			<a href="#fh5co-main" class="smoothscroll fh5co-arrow to-animate hero-animate-4"><i class="ti-angle-down"></i></a>
			<!-- End fh5co-arrow -->
			<div class="container">
				<div class="col-md-12">
					<div class="fh5co-hero-wrap">
						<div class="fh5co-hero-intro">
							<h1 class="to-animate hero-animate-1">A Custom Invoice Generator Platform For Your Clients. Simple - Smooth - Dynamic.</h1>
							<h2 class="to-animate hero-animate-2">Created by <a href="https://www.tier5.us/" target="_blank">Tier5 LLC</a></h2>
							<p class="to-animate hero-animate-3"><a href="#" class="btn btn-outline btn-md" id="first_signUp">Sign Up Now</a></p>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<div id="fh5co-main">
			<div class="fh5co-cards">
				<div class="container-fluid">
					<div class="row animate-box">
						<div class="col-md-12 heading text-center"><h2>Outstanding Products</h2></div>
					</div>
					<div class="container">
						<div class='package'>
    						<div class='name'>Basic</div>
						    <div class='price'>$0</div>
						    <div class='trial'>Only 35 invoices</div>
    						<hr>
						    <ul>
						      <li>
						        <strong>35</strong>
						        invoices
						      </li>
						      <li>
						        <strong>No</strong>
						        Support
						      </li>
						      <li>
						        <strong>Default</strong>
						        payment gateway
						      </li>
						    </ul>
						    <a href="{{ route('register') }}">
						    	<button type="submit" class="btn btn-default">Sign Up</button>
						    </a>
  						</div>
  						<div class='package brilliant'>
						    <div class='name'>Professional</div>
						    <div class='price'>$10</div>
						    <div class='trial'>unlimited invoices</div>
						    <hr>
						    <ul>
						      <li>
						        <strong>Unlimited</strong>
						        invoices
						      </li>
						      <li>
						        <strong>business hours</strong>
						        support
						      </li>
						      <li>
						        <strong>Unlimited</strong>
						        public playlists
						      </li>
						      <li>
						        Invoice analytics
						      </li>
						      <li>
						        Default gateway(stripe)
						      </li>
						    </ul>
						    <button type="submit" class="btn btn-default">Sign Up</button>
 						</div>
 						<div class='package'>
						    <div class='name'>Gold</div>
						    <div class='price'>$20</div>
						    <div class='trial'>24*7 support</div>
						    <hr>
						    <ul>
						      <li>
						        <strong>unlimited</strong>
						        invoices
						      </li>
						      <li>
						        <strong>Hastle free</strong>
						        renewals
						      </li>
						      <li>Multiple payment gateway</li>
						      <li>Full Analytics</li>
						    </ul>
						    <button type="submit" class="btn btn-default">Sign Up</button>
						  </div>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				
				<div class="row text-center" id="fh5co-features">
					<div class="col-md-12 heading animate-box"><h2>Awesome Features</h2></div>
					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
						<div class="fh5co-feature-icon">
							<i class="ti-mobile"></i>
						</div>
						<h3 class="heading">Mobile</h3>
						<p>Create an invoice from your mobile devices, tablet and any other custom devices you want. Full platform independent views.</p>
					</div>
					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="ti-lock"></i>
						</div>
						<h3 class="heading">Security</h3>
						<p>No matter it wants your account details for payment, we do care about your security as well. High end security level with simple user interface.</p>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="fa fa-hand-o-right" aria-hidden="true"></i>
						</div>
						<h3 class="heading">Simplicity</h3>
						<p>Easy to use, simple look, customizable,send invoices to your clients anywhere anytime.</p>
					</div>

					<div class="clearfix visible-md-block visible-lg-block"></div>

					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
						<div class="fh5co-feature-icon">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</div>
						<h3 class="heading">24*7 support</h3>
						<p>Stuck in a very critical situation ! Dont worry we are right here to get you out from that.</p>
					</div>

					<div class="clearfix visible-sm-block"></div>

					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="fa fa-cog" aria-hidden="true"></i>
						</div>
						<h3 class="heading">Fully Customizable</h3>
						<p>Yes! We also do care about your choices. Fully customizable and editable according to your colors of thinking.</p>
					</div>
					<div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box"> 
						<div class="fh5co-feature-icon">
							<i class="fa fa-line-chart" aria-hidden="true"></i>
						</div>
						<h3 class="heading">Analytics</h3>
						<p>You can even keep record of each and every invoice you generate by our analytics graph.</p>
					</div>
				</div>
				<!-- END row -->
				
			</div>
			<!-- END container -->

			<div class="animate-box fh5co-product-2">
				<div class="fh5co-half img" style="background-image: url({{url('/')}}/public/bootstrap/images/Client.jpg);">
					
				</div>
				<div class="fh5co-half" id="about">
					<h3>About invoicingyou.com</h3>
					<p>Invoicingyou platform is the open source custom invoicing platform made by <a href="https://tier5.us" target="_blank">Tier5 LLC</a> for business purposes. The different membership level is here. According to memebership level a user can get features like analytics, pi chart payment gateway selection option and much more. </p>
					<p><a href="#" class="btn btn-outline btn-md" id="get_started">Get Started</a></p>
				</div>
			</div>

			<div id="fh5co-testimonial">
				<div class="container">
				<div class="row">
					<!-- Start Slider Testimonial -->
	            <h2 class="fh5co-uppercase-heading-sm text-center animate-box">Customer Says...</h2>
	            <div class="fh5co-spacer fh5co-spacer-xs"></div>
	            <div class="owl-carousel-fullwidth animate-box">
	            <div class="item">
	              <p class="text-center quote">&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained. &rdquo; <cite class="author">&mdash; Ferdinand A. Porsche</cite></p>
	            </div>
	            <div class="item">
	              <p class="text-center quote">&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while. &rdquo;<cite class="author">&mdash; Steve Jobs</cite></p>
	            </div>
	            <div class="item">
	              <p class="text-center quote">&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly. &rdquo;<cite class="author">&mdash; Frank Chimero</cite></p>
	            </div>
	          </div>
	           <!-- End Slider Testimonial -->

				</div>
				<!-- END row -->
				</div>
			</div>
		</div>
@endsection