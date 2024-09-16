@if (!request()->is('cart*') && !request()->is('frontend/checkout*') && !request()->is('register_fe') && !request()->is('login_fe'))


<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1 style="color: green;">SHOPEE</h1>
									<h2 style="color: green;">Thời trang xu hướng</h2>
									<p>Với rất nhiều thương hiệu thời trang, lựa chọn đa dạng phong phú hãy nhanh tay bạn nhé. </p>
									<button style="background-color: #00CC99;" type="button" class="btn btn-default get">Mua ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('Frontend/images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('Frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1 style="color: green;">SHOPEE</h1>
									<h2 style="color: green;">100% uy tín</h2>
									<p>Với rất nhiều thương hiệu thời trang, lựa chọn đa dạng phong phú hãy nhanh tay bạn nhé. </p>
									<button style="background-color: #00CC99;" type="button" class="btn btn-default get">Mua ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('Frontend/images/home/girl2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{('images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1 style="color: green;">SHOPEE</h1>
									<h2 style="color: green;">Giao hàng siêu tốc</h2>
									<p>Với rất nhiều thương hiệu thời trang, lựa chọn đa dạng phong phú hãy nhanh tay bạn nhé. </p>
									<button style="background-color: #00CC99;" type="button" class="btn btn-default get">Mua ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('Frontend/images/home/girl3.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('Frontend/images/home/pricing.png')}}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a style="color: #00CC99;" href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-caret-left"></i>
						</a>
						<a style="color: #00CC99;" href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-caret-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	@endif