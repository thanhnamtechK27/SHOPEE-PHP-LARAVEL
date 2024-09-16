@extends("Frontend.layouts.app")
@section("content")
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0; // tạo biến tổng tiền
                    @endphp
                    @foreach ($cart as $item)
                    <tr>
                        <td class="cart_product">
                            @if ($item['hinhanh'])
                            <img style="width:100px;" src="{{ asset('upload/product/' . $item['hinhanh']) }}" alt="{{ $item['name'] }}" />
                            @else
                            <img style="width:100px;" src="{{ asset('upload/product/default.jpg') }}" alt="{{ $item['name'] }}" />
                            @endif
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item['name'] }}</a></h4>
                            <p>Web ID: {{ $item['id'] }}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{ $item['price'] }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="#" data-id="{{ $item['id'] }}" data-url="{{ route('cart.update', ['id' => $item['id']]) }}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item['qty'] }}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="#" data-id="{{ $item['id'] }}" data-url="{{ route('cart.update', ['id' => $item['id']]) }}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{ $item['price'] * $item['qty'] }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="#" data-id="{{ $item['id'] }}" data-url="{{ route('cart.delete', ['id' => $item['id']]) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @php
                    $total += $item['price'] * $item['qty']; // Cộng dồn tổng tiền
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>${{ $total }}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection
@section("js")
<script>
	$(document).ready(function() {
    // Increase quantity
    $('.cart_quantity_up').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).data('url');
        var qtyInput = $(this).siblings('.cart_quantity_input');
        var currentQty = parseInt(qtyInput.val());

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: '{{ csrf_token() }}',
                qty: currentQty + 1
            },
            success: function(data) {
                if (data.success) {
                    qtyInput.val(currentQty + 1);
                    $(this).closest('tr').find('.cart_total_price').text('$' + data.new_total);
                }
            }.bind(this) // Ensure 'this' refers to the clicked element within success callback
        });
    });

    // Decrease quantity
    $('.cart_quantity_down').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).data('url');
        var qtyInput = $(this).siblings('.cart_quantity_input');
        var currentQty = parseInt(qtyInput.val());

        if (currentQty > 1) {
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: '{{ csrf_token() }}',
                    qty: currentQty - 1
                },
                success: function(data) {
                    if (data.success) {
                        qtyInput.val(currentQty - 1);
                        $(this).closest('tr').find('.cart_total_price').text('$' + data.new_total);
                    }
                }.bind(this) //đảm bảo trỏ tới sự kiện đã chọn@@
            });
        } else {
            // Nếu qty là 1, gửi yêu cầu xóa sản phẩm
            $.ajax({
                type: 'DELETE',
                url: '{{ route('cart.delete', ['id' => '__id__']) }}'.replace('__id__', id), // Thay thế id vào đường dẫn DELETE
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success && data.deleted) {
                        $(this).closest('tr').remove();
                    }
                }.bind(this) //đảm bảo trỏ tới sự kiện đã chọn@@
            });
        }
    });

    // Delete item
    $('.cart_quantity_delete').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).data('url');

        $.ajax({
            type: 'DELETE',
            url: url,
            data: {
                _token: '{{ csrf_token() }}'
            },
                success: function(data) {
                    if (data.success && data.deleted) {
                        $(this).closest('tr').remove();
                    }
                }.bind(this) 
            });
        });
    });
</script>
@endsection