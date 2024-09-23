@extends("Frontend.layouts.app")
@section("content")
<div class="features_items">

    <!-- Form tìm kiếm -->
    <form action="{{ route('search_form_advanced') }}" method="post" style="margin-bottom: 50px;">
        @csrf
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <input type="text" name="name" style="flex: 1; border: 0; padding: 5px; margin-right:10px; background-color:#F0F0E9;" placeholder="Name">
            <select name="price" style="flex: 1; padding: 5px; margin-right:10px;">
                <option value="">Chọn giá</option>
                <option value="888-999">888-999</option>
                <option value="777-888">777-888</option>
                <option value="666-777">666-777</option>
                <option value="555-666">555-666</option>
                <option value="0-555">0-555</option>
            </select>
            <select name="category" style="flex: 1; padding: 5px; margin-right:10px;">
                <option value="category1">Danh mục</option>
                <option value="category2">Nam</option>
                <option value="category3">Thời trang thể thao</option>
            </select>
            <select name="brand" style="flex: 1; padding: 5px; margin-right:10px;">
                <option value="brand1">Thương hiệu</option>
                <option value="brand2">ACNE</option>
                <option value="brand3">GRÜNE ERDE</option>
            </select>
            <select name="status" style="flex: 1; padding: 5px; margin-right:10px;">
                <option value="active">Trạng thái</option>
                <option value="inactive">Ngưng hoạt động</option>
            </select>
        </div>
        <input type="submit" value="Tìm kiếm" style="background: #FE980F; border: none; border-radius: 0; color: #FFFFFF; display: block; font-family: 'Roboto', sans-serif; padding: 6px 25px;">
    </form>

    <!-- Kết quả tìm kiếm -->
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    <div class="row">
        @foreach($products as $product)
        <div style = "width:23%; height: auto;" class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        @foreach(json_decode($product->hinhanh) as $image)
                            <img src="{{ asset('upload/product/' . $image) }}" alt="">
                        @endforeach
                        <h2>{{ $product->price }}</h2>
                        <p>{{ $product->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ $product->price }}</h2>
                            <p>{{ $product->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào danh sách yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào so sánh</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Đường dẫn phân trang -->
    <div class="text-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
