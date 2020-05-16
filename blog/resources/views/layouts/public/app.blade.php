<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>@yield('title', $appName. '|'.'')</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('public-page/assets/images/favicon.ico') }}" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('public-page/assets/images/apple-touch-icon-114x114-precomposed.png') }}">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('public-page/assets/images/apple-touch-icon-72x72-precomposed.html') }}">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('public-page/assets/images/apple-touch-icon-57x57-precomposed.png') }}">	
	
	<!-- Library - Google Font Familys -->
	<link href="../../../../fonts.googleapis.com/css8896.css?family=Hind:300,400,500,600,700%7cMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
	<!-- Library -->
    <link href="{{ asset('public-page/assets/css/lib.css') }}" rel="stylesheet">
	
	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	
	<!-- Custom - Common CSS -->
	<link rel="stylesheet" href="{{ asset('public-page/assets/css/rtl.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public-page/style.css') }}">

	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
	
</head>

<body class="singletemplate" data-offset="200" data-spy="scroll" data-target=".ownavigation">
	<!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
		</div>
	</div><!-- Loader /- -->

	<!-- Header Section -->
    @include('layouts.public.header')

    <!-- Header Section /- -->

	<div class="main-container">
	
		<main class="site-main">
		

			<!-- Page Content -->
			<div class="container-fluid no-left-padding no-right-padding page-content blog-single">
				<!-- Container -->
				<div style="margin:0px 100px">
				@include('layouts.alert')
				</div>
				<div class="container">
					<div class="row">
					
						<!-- Content Area -->
						@yield('content')
                        <!-- Content Area /- -->
						<!-- Widget Area -->
						@if(url()->current()==url('kontak') || Str::startsWith(Request::path(),'artikel/detail') || Str::startsWith(Request::path(),'kegiatan/detail')  || Str::startsWith(Request::path(),'masjid/detail') || Str::startsWith(Request::path(),'tentang-kami')) 	

						@else
						@include('layouts.public.sidebar')
						@endif
                        <!-- Widget Area /- -->
					</div>
				</div><!-- Container /- -->
			</div><!-- Page Content /- -->
			
		</main>
		
	</div>
	
	<!-- Footer Main -->
    @include('layouts.public.footer')
    <!-- Footer Main /- -->
	
	<!-- JQuery v1.12.4 -->
	<script src="{{ asset('public-page/assets/js/jquery-1.12.4.min.js') }}"></script>

	<!-- Library - Js -->
	<script src="{{ asset('public-page/assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('public-page/assets/js/lib.js') }}"></script>
	
	<!-- Library - Theme JS -->
	<script src="{{ asset('public-page/assets/js/functions.js') }}"></script>
	@stack('script')
</body>

</html>