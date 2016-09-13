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
							<h1 class="to-animate hero-animate-1">A Custom Invoice Generator Platform For Your Clients. <br />Simple - Smooth - Dynamic.</h1>
							<h2 class="to-animate hero-animate-2">Created by <a href="https://www.tier5.us/" target="_blank">Tier5 LLC</a></h2>
							<p class="to-animate hero-animate-3"><a href="http://invoicingyou.com/register" class="btn btn-outline btn-md" id="first_signUp">Sign Up Now</a></p>
						</div>
					</div>
				</div>
			</div>		
		</div>





		<div class=" about-page"> <!-- fh5co-cards -->
		<div class="container-fluid">
			<div class=""><!-- row -->
			<div class=""> <!-- col-md-12 -->
				
				<div class="animate-box fh5co-product-2">
				<!-- <div class="fh5co-half img" style="background-image: url({{url('/')}}/public/bootstrap/images/abt-ban.jpg);">
					
				</div> -->

				<div class="row">


				<div class="animate-box col-md-5 col-sm-5 abt-pic">
				<img src="{{url('/')}}/public/bootstrap/images/Client.jpg" alt="img">
				</div>

				<div class="col-md-7 col-sm-7" id="about">
					<h3>About INVOICINGYOU.COM</h3>
					<p>The INVOICINGYOU.COM platform is an open source custom invoicing platform made by <a href="https://tier5.us" target="_blank">Tier5 LLC</a> for business purposes. On our platform you can send customized invoices to your clients over a generic INVOICINGYOU.COM domain. Invoices can be moved to your own domain with GOLD membership plans. Integrate your favorite payment gateway or use ours if you like. Have your clients pay directly to your bank account or paypal with a very easy to use interface.</p>
					<!-- <p><a href="invoicing/" class="btn btn-outline btn-md" id="get_started">Get Started</a></p> -->
				</div>

				</div>
			</div>




			</div>
			</div>		
		</div>
		</div>		
@endsection