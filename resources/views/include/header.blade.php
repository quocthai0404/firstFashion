<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href=" {{ asset('images/icons/favicon.png') }}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('vendor/animate/animate.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" {{ asset('vendor/select2/select2.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<!--===============================================================================================-->
	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="animsition">
	

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						First Fashion free shipping for standard order over $500
					</div>

					<div class="right-top-bar flex-w h-full">


						<!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Dropdown button
							</button> -->
						@if(Auth::check())
						<a href="#" class="flex-c-m trans-04 p-lr-25" id="dropdownMenuButton" data-toggle="dropdown">
							<i class="zmdi zmdi-account"></i> &nbsp;<span>{{Auth::user()->fullname}}</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<div>
								<a class="dropdown-item" href="#" style="font-size: 12px; font-family: Poppins-Regular;">Change Password</a>
							</div>

							<form action="{{route('logout')}}" method="post">
								@csrf
								<input type="submit" value="Log Out" class="dropdown-item" style="font-size: 12px;color:#C0C0C0;font-family: Poppins-Regular;">
							</form>


						</div>
						@else
						<a href="#" class="flex-c-m trans-04 p-lr-25" id="dropdownMenuButton" data-toggle="dropdown">
							<i class="zmdi zmdi-account"></i> &nbsp;<span>Login | Sign Up</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="{{route('login')}}">Login</a>
							<a class="dropdown-item" href="{{route('signup')}}">Sign Up</a>

						</div>
						@endif

					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="{{route('home')}}">Home</a>
							</li>
							<li>
								<a href="{{route('productMen')}}">Men</a>

							</li>

							<li>
								<a href="{{route('productWomen')}}">Women</a>
							</li>



							<li>
								<a href="{{route('about')}}">About</a>
							</li>

							<li>
								<a href="{{route('contact')}}">Contact</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ count((array) session('cart')) }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ count((array) session('cart')) }}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						First Fashion free shipping for standard order over $500
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">

						<!-- <a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a> -->
						<!-- <a href="#" class="flex-c-m p-lr-10 trans-04" id="dropdownMenuButton" data-toggle="dropdown">
							<i class="zmdi zmdi-account"></i> &nbsp;<span>Login | Sign Up</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div> -->

						@if(Auth::check())
						<a href="#" class="flex-c-m p-lr-10 trans-04" id="dropdownMenuButton" data-toggle="dropdown">
							<i class="zmdi zmdi-account"></i> &nbsp;<span>{{Auth::user()->fullname}}</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#" style="font-size: 12px; font-family: Poppins-Regular;">Change Password</a>

							<form action="{{route('logout')}}" method="post">
								@csrf
								<input type="submit" value="Log Out" class="dropdown-item" style="font-size: 12px;color:#C0C0C0;font-family: Poppins-Regular;">
							</form>


						</div>
						@else
						<a href="#" class="flex-c-m p-lr-10 trans-04" id="dropdownMenuButton" data-toggle="dropdown">
							<i class="zmdi zmdi-account"></i> &nbsp;<span>Login | Sign Up</span>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="{{route('login')}}">Login</a>
							<a class="dropdown-item" href="{{route('signup')}}">Sign Up</a>

						</div>
						@endif


					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>
					<a href="{{route('productMen', 1)}}">Men</a>
				</li>
				<li>
					<a href="{{route('productWomen')}}">Women</a>
				</li>

				<li>
					<a href="{{route('about')}}">About</a>
				</li>

				<li>
					<a href="{{route('contact')}}">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

					@php $total = 0 @endphp
					@foreach((array) session('cart') as $id => $details)
					@php $total += $details['price'] * $details['quantity'] @endphp
					@endforeach



					@if(session('cart'))

					@foreach(session('cart') as $id => $details)
					

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src=" {{ asset('images/' .  $details['product_src'] ) }}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								
								{{ $details['product_name'] }}
							</a>

							<span class="header-cart-item-info">
								Price: ${{ $details['price'] }}
							</span>
							<span class="header-cart-item-info">
								Quantity:{{ $details['quantity'] }}
							</span>
						</div>
					</li>
					@endforeach
					@endif



					<div class="w-full">
						<div class="header-cart-total w-full p-tb-40">
							Total: $ {{ $total }}
						</div>

						<div class="header-cart-buttons flex-w w-full">
							<a href="{{route('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
								View Cart
							</a>

							
						</div>
					</div>
			</div>
		</div>
	</div>