<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>OPPA</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="template/assets/img/oppa logo.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="template/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="template/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="template/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="template/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="template/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="template/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="template/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="template/assets/css/responsive.css">

</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{url('index')}}">
								<img src="template/assets/img/oppa logo.png" width="100" height="50">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
                                <li>
									<div class="header-icons">
										<a  class="mobile-hide search-bar-icon"><i class="fas fa-search"></i></a>
									</div>
								</li>
								<li class="current-list-item"><a href="{{url('index')}}">Home</a>
                  @if(auth()->check())
                  @if(auth()->user()->usertype === 1)
									<ul class="sub-menu">
										<li><a href="{{url('index')}}">Home Page</a></li>
										<li><a href="{{url('redirect')}}">Admin Page</a></li>
									</ul>
                  @endif
                  @endif
								</li>

								<li><a href="{{url('all')}}">Shop</a>	</li>
                <li><a href="{{url('about')}}">About</a></li>


                                @if (auth()->user())
                <li style="float: right"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                </form>
                                @else
								<li style="float: right"><a href="{{ route('register') }}">Register</a></li>
                <li style="float: right"><a href="{{ route('login') }}">Login</a></li>
                                @endif

                @if (auth()->user())
              <li style="float:right" class="current-list-item"><a href="{{ route('profile') }}">Welcome {{auth()->user()->name}}</a>
              <ul class="sub-menu">
                <form method="POST">
                <li><a href="{{ url('showcart') }}">My Cart</a></li>
                  <li><a href="{{ url('myorder') }}">My Orders</a></li>
                  @if(auth()->user()->usertype === 1)
                      @csrf
                  <li><a href="{{url('add_product')}}">Add Products</a></li>
              </form>
                  @endif
              </ul>
              </li>
              @endif
              </ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
  <!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
        	<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
                <form action="{{ route('products.search')}}" method="GET">
							<input type="text" name="search" placeholder="Search ">
							<button type="submit">Search <i class="fas fa-search"></i></button>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->
