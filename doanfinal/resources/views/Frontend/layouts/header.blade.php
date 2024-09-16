<header id="header"><!--header-->
		<div class="header_top" style="background-color: #00CC99;"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo" >
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 819484467</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> thanhnamnguyen769@gmail.com</a></li>
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
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
					<div class="logo pull-left">
						<a href="index.html">
							<img src="{{asset('Frontend/images/home/llogoshopee.png')}}" alt="" style="width: 150px; height: auto;" />
						</a>
					</div>
						<div class="btn-group pull-right clearfix">
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
						<ul class="nav navbar-nav">
							<li><a href="{{route('account_fe')}}"><i class="fa fa-user"></i> Account</a></li>
							<li><a href="{{route('my_product')}}"><i class="fa fa-star"></i> Product</a></li>
							<li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							<li>
								<a href="{{ route('cart') }}">
									<i class="fa fa-shopping-cart"></i> Cart
									<span class="cart-count">{{ Session::has('cart') ? count(Session::get('cart')) : 0 }}</span>
								</a>
							</li>
							@if(session()->has('email'))
								<li><span>{{ session('email') }}</span></li>
								<li><a href="{{ route('logout_fe') }}">Logout</a></li>
							@else
								<li><a href="{{ route('login_fe') }}"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="{{ route('register_fe') }}"><i class="fa fa-lock"></i> Register</a></li>
							@endif
						</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a style="color: #00CC99;" href="{{ route('home_fe') }}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ route('my_product') }}">Products</a></li>
										<li><a href="{{ route('checkout') }}">Checkout</a></li> 
										<li><a href="{{ route('cart') }}">CART</a></li>
										<li><a href="{{ route('login_fe') }}">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog</a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ route('blog_list') }}">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="{{ route('search') }}" method="GET">
								<input style="border-radius: 20px;" type="text" name="keyword" placeholder="Tìm kiếm"/>
								<button style="border-color: #00CC99;  border-radius: 20px; background-color:#00CC99; padding: 5px; color:#fff;" type="submit">Tìm kiếm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->