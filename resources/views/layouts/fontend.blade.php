<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>BLOG-@yield('title')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="{{asset('fontend')}}/common-css/bootstrap.css" rel="stylesheet">

	<link href="{{asset('fontend')}}/common-css/swiper.css" rel="stylesheet">

	<link href="{{asset('fontend')}}/common-css/ionicons.css" rel="stylesheet">

	<link href="{{asset('backend')}}/css/toastr.min.css" rel="stylesheet" />
	<script src="{{asset('backend')}}/js/sweetalert2.all.min.js"></script>
	<link href="{{asset('fontend')}}/front-page-category/css/styles.css" rel="stylesheet">

	<link href="{{asset('fontend')}}/front-page-category/css/responsive.css" rel="stylesheet">
	@stack('css')

</head>
<body >

	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src="{{asset('fontend')}}/images/logo.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="{{url('/')}}">Home</a></li>
				<!-- <li><a href="#">Categories</a></li> -->
				<li><a href="{{route('allposts')}}">Posts</a></li>
				@guest
				<li><a href="{{route('login')}}">Login</a></li>
				@else
				@if(Auth::user()->role_id==1)
				<li><a href="{{route('admindashboard')}}">Dashboard</a></li>
				@elseif(Auth::user()->role_id==2)
				<li><a href="{{route('authordashboard')}}">Dashboard</a></li>
				@endif
				@endguest
				<!-- <li><a href="#">Features</a></li> -->
			</ul><!-- main-menu -->

			<div class="src-area">
				<form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form>
			</div>

		</div><!-- conatiner -->
	</header>
	@yield('content')
	<footer>
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<a class="logo" href="#"><img src="{{asset('fontend')}}/images/logo.png" alt="Logo Image"></a>
						<p class="copyright">Bona @ 2017. All rights reserved.</p>
						<p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<ul class="icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
						<div class="footer-section">
						<h4 class="title"><b>CATAGORIES</b></h4>
						<ul>
							<li><a href="#">BEAUTY</a></li>
							<li><a href="#">HEALTH</a></li>
							<li><a href="#">MUSIC</a></li>
						</ul>
						<ul>
							<li><a href="#">SPORT</a></li>
							<li><a href="#">DESIGN</a></li>
							<li><a href="#">TRAVEL</a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>SUBSCRIBE</b></h4>
						<div class="input-area">
							<form action="{{url('subscribe/email/store')}}" method="post" enctype="multipart/form-data">
								@csrf
								@if($errors->has('email'))
									<span class="btn btn-danger">{{$errors->first('email')}}</span>
								@endif
								<input class="email-input" type="text" placeholder="Enter your email" name="email">
								<button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
							</form>
						</div>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->

	<script src="{{asset('fontend')}}/common-js/jquery-3.1.1.min.js"></script>

	<script src="{{asset('fontend')}}/common-js/tether.min.js"></script>

	<script src="{{asset('fontend')}}/common-js/bootstrap.js"></script>

	<script src="{{asset('fontend')}}/common-js/swiper.js"></script>
	<script src="{{asset('backend')}}/js/toastr.min.js"></script>
	{!! Toastr::message() !!}
	<script>
			@if($errors->any())
				@foreach($errors->all() as $error)
					toastr.error('{{ $error }}','Error',{
						closeButton:true,
						progressBar:true,
					});
				@endforeach
			@endif
	</script>
	<script src="{{asset('fontend')}}/common-js/scripts.js"></script>

</body>
</html>
