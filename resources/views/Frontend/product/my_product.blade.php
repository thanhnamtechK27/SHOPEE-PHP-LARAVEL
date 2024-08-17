@extends('Frontend.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            @if(!request()->is('my_product') && !request()->is('my_product/*'))
            <div class="col-sm-3">
                <!-- Nội dung sidebar -->
            </div>
            @endif
            <div class="col-sm-9">
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu" style="background-color: #ff8c00; border: 2px solid #ddd;">
                                <th class="id" style="font-weight: bold; font-size: 18px; padding: 10px; text-align: center;">ID</th>
                                <th class="name" style="font-weight: bold; font-size: 18px; padding: 10px; text-align: center;">Name</th>
                                <th class="image" style="font-weight: bold; font-size: 18px; padding: 10px; text-align: center;">Image</th>
                                <th class="price" style="font-weight: bold; font-size: 18px; padding: 10px; text-align: center;">Price</th>
                                <th class="total" style="font-weight: bold; font-size: 18px; padding: 10px; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="cart_description" style="font-size: 16px; padding: 10px; text-align: center;">
                                    <h4><a href="">{{ $product->id }}</a></h4>
                                </td>
                                <td class="cart_description" style="font-size: 16px; padding: 10px; text-align: center;">
                                    <h4><a href="">{{ $product->name }}</a></h4>
                                </td>
                                <td class="cart_product" style="padding: 10px; text-align: center;">
                                    @php
                                    $images = json_decode($product->hinhanh);
                                    if (!empty($images)) {
                                        $firstImage = $images[0]; // Lấy ảnh đầu tiên từ mảng
                                    } else {
                                        $firstImage = 'default.jpg'; // Đặt ảnh mặc định nếu không có ảnh
                                    }
                                    @endphp
                                    <a href=""><img style="width: 100px;" src="{{ asset('upload/product/' . $firstImage) }}" alt="Product Image"></a>
                                </td>
                                <td class="cart_price" style="font-size: 16px; padding: 10px; text-align: center;">
                                    <p>{{ $product->price }} $</p>
                                </td>
                                <td class="cart_total" style="padding: 10px; text-align: center;">
                                    <a href="{{ route('edit_product', ['id' => $product->id]) }}">Edit</a><br>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('add_product') }}">
                        <button style="background-color: red;" class="btn btn-success" type="button">Add Product</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
