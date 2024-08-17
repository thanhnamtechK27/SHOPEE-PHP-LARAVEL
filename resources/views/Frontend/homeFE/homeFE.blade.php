@extends("Frontend.layouts.app")
@section("content")
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <H2 class="title text-center" style="color:#FE980F;">FEATURES ITEMS</H2>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div id="filtered-products">
                        <div class="row" id="products-list">
                            <!-- Các sản phẩm lọc được sẽ được hiển thị ở đây -->
                        </div>
                    </div>
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            @if ($product->hinhanh)
                                                <img src="{{ asset('upload/product/' . json_decode($product->hinhanh)[0]) }}" alt="{{ $product->name }}" />
                                            @else
                                                <img src="{{ asset('upload/product/default.jpg') }}" alt="{{ $product->name }}" />
                                            @endif
                                            <h2>{{ $product->price }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <a style="background: #fff;border: 0 none;border-radius: 0;color: #FE980F;font-family: 'Roboto', sans-serif;font-size: 15px;margin-bottom: 25px;" 
                                                href="{{ route('product_detail', ['id' => $product->id]) }}" class="btn btn-default">
                                                Chi tiết
                                            </a>
                                            <a href="#" class="btn btn-default add-to-cart"
                                            data-product-id="{{ $product->id }}"
                                            data-product-name="{{ $product->name }}"
                                            data-product-price="{{ $product->price }}"
                                            data-product-category="{{ $product->category }}">
                                                <i class="fa fa-shopping-cart"></i> ADD TO CART
                                            </a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ $product->price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <a style="background: #fff;border: 0 none;border-radius: 0;color: #FE980F;font-family: 'Roboto', sans-serif;font-size: 15px;margin-bottom: 25px;" 
                                                href="{{ route('product_detail', ['id' => $product->id]) }}" class="btn btn-default">
                                                Chi tiết
                                            </a>
                                                <a href="#" class="btn btn-default add-to-cart"
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product->name }}"
                                                data-product-price="{{ $product->price }}"
                                                data-product-category="{{ $product->category }}">
                                                    <i class="fa fa-shopping-cart"></i> ADD TO CART
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i> Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i> Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Không có sản phẩm</p>
                    @endif
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection
@section("js")
<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function(e) {
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
