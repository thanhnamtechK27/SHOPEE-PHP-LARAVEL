@extends("Frontend.layouts.app");
@section("content")
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ asset('upload/product/' . json_decode($product->hinhanh)[0]) }}" alt="" />
								<a href="{{ asset('upload/product/' . json_decode($product->hinhanh)[0]) }}" rel="prettyPhoto"><h3>ZOOM</h3></a>
							</div>
							@php
								$images = json_decode($product->hinhanh, true);
							@endphp

		
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									@foreach(array_chunk($images, 3) as $index => $chunk)
										<div class="item {{ $index === 0 ? 'active' : '' }}" style="display: flex;">
											@foreach($chunk as $image)
												@if(isset($image))
													<a href=""><img src="{{ asset('upload/product/' . $image) }}" alt="" style="width: 100px; height: auto;"></a>
												@endif
											@endforeach
										</div>
									@endforeach
								</div>
							<!-- Controls -->
							<a class="left item-control" href="#similar-product" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right item-control" href="#similar-product" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2> {{ $product->name }}</h2>
								<p> ID: {{ $product->id }}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>{{ $product->price }} $</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart" 
										data-product-id="{{ $product->id }}"
										data-product-name="{{ $product->name }}"
										data-product-price="{{ $product->price }}"
										data-product-category="{{ $product->category }}">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b>  {{ $product->sale }}%</p>
								<p><b>Brand:</b>  {{ $product->brand }}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>
	
@endsection
@section("js")
<script>
    $(document).ready(function() {
        $('.cart').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            var productName = $(this).data('product-name');
            var productPrice = $(this).data('product-price');
            var productCategory = $(this).data('product-category');
            $.ajax({
                url: '{{ route("add_to_cart") }}',
                type: 'POST',
                data: {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    category: productCategory,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
					$('.cart-count').text(response.totalItems);
                    alert(response.success);
                    // Cập nhật số lượng sản phẩm trong giỏ hàng trên giao diện nếu cần
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Lỗi - ' + errorMessage);
                }
            });
        });
    });
</script>
@endsection
