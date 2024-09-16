@extends("Frontend.layouts.app");
@section("content")
<section>
		<div class="container">
			<div class="row">
			@if(!request()->is('add_product') && !request()->is('add_product/*'))
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
						<h2 class="title text-center">CREATE PRODUCT</h2>
						 <div class="signup-form"><!--sign up form-->
						<form method="post" action="{{ route('add_product_form')}}" enctype="multipart/form-data">
                        @if($errors->any())
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-check"></i> Thông báo!</h4>
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                                @csrf  
                                <input type="text" name="name" placeholder="Name" value="" />
                                <input type="text" name="price" placeholder="Price" value=""/>
								
                                <select class="form-control form-control-line" name="category">
									<option value="">Category</option>
									@foreach($categories as $category)
										<option value="{{ $category->name }}">{{ $category->name }}</option>
									@endforeach
								</select>
								<select class="form-control form-control-line" name="brand" >
									<option value="London" >Brand</option>
									@foreach ($brands as $brand)
									<option value="{{ $brand->name }}">{{ $brand -> name }}</option>
									@endforeach
								</select>
								<select class="form-control form-control-line" name="sale">
									<option value="0">New</option>
									<option value="1">Sale</option>
								</select>
								<div id="sale_price_input" style="display:none;">
									<input type="text" name="sale_price" placeholder="% giảm giá">
								</div>
                                <input type="text" name="company" placeholder="CompanyInfo" value=""/>
								<input type="file" id="files" name="hinhanh[]" multiple><br><br>
								<textarea name="detail" id="" placeholder="Detail"></textarea>
                                <input style="background-color:#FF6600; color: white; font-weight: bold;" type="submit" value="UPDATE" class="btn btn-default"></input>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section("js")
    <script>
        // Sử dụng jQuery để xử lý sự kiện thay đổi dropdown "Sale"
        $(document).ready(function() {
            $('select[name="sale"]').change(function() {
                var selectedOption = $(this).val(); // Lấy giá trị option đã chọn

                // Nếu lựa chọn là "1" (Giảm giá), hiển thị phần nhập giá giảm giá
                if (selectedOption === '1') {
                    $('#sale_price_input').show(); // Hiển thị phần tử
                } else {
                    $('#sale_price_input').hide(); // Ẩn phần tử
                }
            });
        });
    </script>
@endsection