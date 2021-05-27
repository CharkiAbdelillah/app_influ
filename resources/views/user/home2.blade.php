<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | 3WDEV</title>
    <link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('user/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('user/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->  
    
</head><!--/head-->

<body>
    <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +212600040797</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> 3wdev@info.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								@if(auth()->user()->is_admin == 2)
									<li><a href="/manager/home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
								@elseif(auth()->user()->is_admin == 1)
									<li><a href="/admin/home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container" >
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left" >
                            {{-- <router-link to="/user/home2"> --}}
                                {{-- <img src="images/home/logo3v2.png" alt="" /> --}}
                            {{-- </router-link> --}}
							<a href="home2"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								
                                <li class="dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div  class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                        </a>
                            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	<div id="app">
		<app-home></app-home>
	</div>
						
    <script src="{{asset('user/js/jquery.js')}}"></script>
	<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('user/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('user/js/price-range.js')}}"></script>
    <script src="{{asset('user/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('user/js/main.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
</body>

</html>