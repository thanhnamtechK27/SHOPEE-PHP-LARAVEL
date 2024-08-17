<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; 
use App\Http\Requests\ProductRequest;
use Session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        $cart = Session::get('cart', []); // Lấy dữ liệu giỏ hàng từ session

        return view('Frontend.cartFE.cart', compact('cart')); // Trả về view và truyền dữ liệu giỏ hàng vào view
    }
    public function add_to_cart(ProductRequest $request)
    {
        $productId = $request->id; // Đảm bảo rằng bạn đã đặt tên key phù hợp trong request của bạn
        // Tìm sản phẩm trong database
        $product = Product::find($productId);
        // Kiểm tra sản phẩm tồn tại
        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }
        // Thêm sản phẩm vào session giỏ hàng
        $cart = Session::get('cart', []);
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $product->id) {
                $item['qty']++;
                $found = true;
                break;
            }
        }
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
        if (!$found) {
            $cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'hinhanh' => json_decode($product->hinhanh)[0] ?? 'default.jpg',
                'qty' => 1,
            ];
        }
        // Lưu lại giỏ hàng vào session
        Session::put('cart', $cart);
        
        // Chuẩn bị thông báo thành công kèm thông tin sản phẩm
        $message = [
            'success' => 'Đã thêm sản phẩm vào giỏ hàng',
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price, 
                // Các thông tin sản phẩm khác nếu cần
            ]
        ];
        // Trả về response dạng JSON
        return response()->json($message);
    }
    public function update(Request $request, $id)
    {
        $qty = $request->input('qty');
        // Tìm sản phẩm theo ID
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm'], 404);
        }
        // Nếu qty là 0 thì xóa sản phẩm khỏi giỏ hàng
        if ($qty === 0) {
            // Xóa sản phẩm khỏi session giỏ hàng
            $cart = Session::get('cart', []);
            foreach ($cart as $index => $item) {
                if ($item['id'] == $id) {
                    unset($cart[$index]);
                    Session::put('cart', $cart);
                    return response()->json([
                        'success' => true,
                        'deleted' => true, // Gửi thông báo rằng sản phẩm đã được xóa
                    ]);
                }
            }
            return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
        }
        // Cập nhật số lượng sản phẩm
        $product->quantity = $qty;
        $product->save();
        // Tính toán lại tổng giá mới
        $newTotal = $product->price * $qty;
        // Cập nhật lại dữ liệu sản phẩm trong session
        $cart = Session::get('cart', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['qty'] = $qty;
                $item['total'] = $newTotal; // Cập nhật tổng giá mới nếu cần
                break;
            }
        }
        Session::put('cart', $cart);
        // Trả về JSON response
        return response()->json([
            'success' => true,
            'new_total' => $newTotal,
        ]);
    }
    public function delete($id)
    {
        // Xóa sản phẩm khỏi session giỏ hàng
        $cart = Session::get('cart', []);
        foreach ($cart as $index => $item) {
            if ($item['id'] == $id) {
                unset($cart[$index]);
                Session::put('cart', $cart);
                return response()->json([
                    'success' => true,
                    'deleted' => true,
                ]);
            }
        }
        
        return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
