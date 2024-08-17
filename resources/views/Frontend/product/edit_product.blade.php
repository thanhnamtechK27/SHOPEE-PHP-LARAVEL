@extends('Frontend.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            @if(!request()->is('edit_product') && !request()->is('edit_product/*'))
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Account</h2>
                    <div class="panel-group category-products" id="accordian">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Account</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">My product</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">EDIT PRODUCT</h2>
                    <div class="signup-form"><!--sign up form-->
                    <form method="post" action="{{ route('update_product', ['id' => $product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Tên sản phẩm" value="{{ $product->name }}" />
                        <input type="text" name="price" placeholder="Giá sản phẩm" value="{{ $product->price }}"/>
                        <select class="form-control form-control-line" name="category">
                            <option value="{{ $product->category }}">{{ $product->category }}</option>
                        </select>
                        <select class="form-control form-control-line" name="brand" >
                            <option value="{{ $product->brand }}">{{ $product->brand }}</option>
                        </select>
                        <input type="text" name="sale"  value="{{ $product->sale }} %"/>
                        <div id="sale_price_input" style="display:{{ $product->sale == 1 ? 'block' : 'none' }};">
                            <input type="text" name="sale_price" placeholder="% giảm giá" value="{{ $product->sale_price }}">
                        </div>
                        <input type="text" name="company" value="{{ $product->company }}"/>
                        <textarea name="detail" id="detail" placeholder="Chi tiết sản phẩm">{{ $product->detail }}</textarea>
                        <input type="file" id="files" name="image[]" multiple><br><br>
                      <!-- Kiểm tra nếu có hình ảnh thì hiển thị hình ảnh và checkbox -->
                      <div style="display: flex; flex-wrap: wrap;">
                      @if ($product->hinhanh)
                            @foreach (json_decode($product->hinhanh, true) as $image)
                                <div style="margin-right: 10px;">
                                    <img style="width: 100px; height: auto;" src="{{ asset('upload/product/' . $image) }}" alt="Hình ảnh sản phẩm">
                                    <input style="width:20px;" type="checkbox" name="delete_images[]" value="{{ $image }}"> 
                                </div>
                            @endforeach
                        @endif
                    </div>
                        <input type="submit" style="background-color:#FF6600; color: white; font-weight: bold;" value="CẬP NHẬT" class="btn btn-default">
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
