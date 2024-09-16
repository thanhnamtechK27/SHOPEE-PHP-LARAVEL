@extends("Frontend.layouts.app")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><a href="{{ route ('search_advanced') }}"><button style="background-color:#FE980F; color: white; border-color:white; border-radius: 15px;">SEARCH</button></a></h1>
            <h1>Sản phẩm tương tự</h1>
            <p>Danh sách sản phẩm chứa từ khóa: <strong>{{ $searchTerm }}</strong></p>
            @if ($products->isEmpty())
                <p>Không tìm thấy sản phẩm.</p>
            @else
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="productinfo text-center">
                                @if (!empty($product->hinhanh))
                                    <img src="{{ asset('upload/product/' . $product->hinhanh) }}" class="card-img-top" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('upload/product/default.jpg') }}" class="card-img-top" alt="{{ $product->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">${{ $product->price }}</p>
                                    <a href="{{ route('product_detail', ['id' => $product->id]) }}" class="btn btn-primary">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
