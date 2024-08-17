@extends("Frontend.layouts.app")

@section("content")
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>Filtered Products</h1>
    <div id="filtered-products">
        <div class="row" id="products-list">
            <!-- Các sản phẩm lọc được sẽ được hiển thị ở đây -->
        </div>
    </div>
@endsection
