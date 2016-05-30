<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	@include('section.index-header')
	</head>
	<body>
		<!-- START #fh5co-header -->
		<header id="fh5co-header-section" role="header" class="" >
			@include('section.index-nav')
		</header>
			@yield('content')
		<!-- END fhtco-main -->
		<footer role="contentinfo" id="fh5co-footer">
			@include('section.index-footer')
		</footer>
	</body>
</html>