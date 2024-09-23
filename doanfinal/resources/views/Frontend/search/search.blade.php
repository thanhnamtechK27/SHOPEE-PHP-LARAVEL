@extends("Frontend.layouts.app")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>
            <a href="{{ route('search_advanced') }}">
                <button style="background-color: #00CC99; color: white; border-color: white; border-radius: 55px; font-family: 'Arial', sans-serif; font-size: 16px; font-weight: bold; padding: 10px 20px;">
                    Search Advanced
                </button>
            </a>
        </h1>
        @if ($products->isEmpty())
            <p>Không tìm thấy sản phẩm nào chứa từ khóa:<strong style ="color: red; font-family: 'Arial', sans-serif; font-size: 16px; font-weight: bold;">" {{ $searchTerm }} "</strong></p>
        @else
            <p>Danh sách sản phẩm chứa từ khóa: <strong style ="color: red; font-family: 'Arial', sans-serif; font-size: 16px; font-weight: bold;">" {{ $searchTerm }} "</strong></p>
                <div class="row">
                    @foreach ($products as $product)
                        <div style = "width:23%;" class="col-md-4 mb-4">
                            <div class="productinfo text-center">
                                @if (!empty($product->hinhanh))
                                    <img style="width: 150px; height: auto;" src="{{ asset('upload/product/' . $product->hinhanh) }}" class="card-img-top" alt="{{ $product->name }}">
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
