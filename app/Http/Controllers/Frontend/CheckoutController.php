<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $cartItems = [];

        $totalCartPrice = 0;

        foreach ($cart as $item) {
            // Kiểm tra sản phẩm có tồn tại trong cơ sở dữ liệu không
            $product = Product::find($item['id']);
            if (!$product) {
                continue; // hoặc xử lý lỗi tại đây nếu cần
            }

            // Tiếp tục xử lý thông tin sản phẩm
            if (isset($product->hinhanh)) {
                $hinhanh = json_decode($product->hinhanh, true); // Giải mã JSON
            } else {
                $hinhanh = []; // Hoặc giá trị mặc định khác tương ứng với trường hợp không có hình ảnh
            }

            $totalItemPrice = $item['price'] * $item['qty'];
            $totalCartPrice += $totalItemPrice;

            $cartItems[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['qty'],
                'hinhanh' => $hinhanh,
                'totalItemPrice' => $totalItemPrice, // Tổng giá của từng sản phẩm trong giỏ hàng
            ];
        }
        // dd($cartItems);

        return view('Frontend.Checkout.checkout', compact('cartItems', 'totalCartPrice'));
    }
    public function submitOrder(Request $request)
    {
        // Kiểm tra đăng nhập người dùng
        if (!Auth::check()) {
            return redirect()->route('login_fe'); // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
        }
    
        try {
            // Lấy thông tin người dùng hiện tại và giỏ hàng từ session
            $user = Auth::user();
            $cartItems = session()->get('cart', []);
            $totalCartPrice = array_reduce($cartItems, function ($carry, $item) {
                return $carry + $item['price'] * $item['qty'];
            }, 0);
    
            // Chuẩn bị dữ liệu cho email thông báo
            $data = [
                'subject' => 'Xác nhận đơn hàng',
                'body' => 'Đây là chi tiết về đơn hàng gần đây của bạn:',
                'user' => $user,
                'cartItems' => $cartItems,
                'totalCartPrice' => '$' . number_format($totalCartPrice, 0),
            ];
    
            // Tạo HTML cho bảng giỏ hàng
            $cartHtml = '<table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="image">Hình ảnh</td>
                        <td class="description"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng cộng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>';
            foreach ($cartItems as $item) {
                $totalItemPrice = $item['price'] * $item['qty'];
                $cartHtml .= '<tr>
                                <td>' . $item['name'] . '</td>
                                <td><img src="' . $item['hinhanh'] . '" alt="Ảnh sản phẩm"></td>
                                <td></td>
                                <td>$' . $item['price'] . '</td>
                                <td>' . $item['qty'] . '</td>
                                <td>$' . $totalItemPrice . '</td>
                                <td></td>
                            </tr>';
            }
            $cartHtml .= '<tr>
                                <td colspan="4"></td>
                                <td><strong>Tổng cộng:</strong></td>
                                <td>$' . $totalCartPrice . '</td>
                            </tr>
                        </tbody>
                    </table>';
            // Thêm HTML của bảng giỏ hàng vào dữ liệu email
            $data['cartHtml'] = $cartHtml;
    
            // Gửi email thông báo đơn hàng
            Mail::to($user->email)->send(new MailNotify($data));
    
            // Xử lý lưu lịch sử đơn hàng
            $this->processOrder($user);
    
            // Xóa giỏ hàng sau khi đặt hàng thành công
            session()->forget('cart');
    
            // Trả về view "cart" với thông báo thành công
            return view('cart')->with('message', 'Order placed successfully! Check your email for order details.');
        } catch (\Exception $e) {
            // Nếu có lỗi, ghi log để phân tích và hiển thị thông báo lỗi cho người dùng
            \Log::error('Failed to place order: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to place order. Please try again later.');
        }
    }
    


    public function processOrder($user)
    {
        // Lấy thông tin giỏ hàng từ session
        $cartItems = session()->get('cart', []);
        $totalCartPrice = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item['price'] * $item['qty'];
        }, 0);

        // Lưu lịch sử đơn hàng vào cơ sở dữ liệu
        $history = new History();
        $history->email = $user->email;
        $history->phone = $user->phone;
        $history->name = $user->name;
        $history->id_user = $user->id;
        $history->price = $totalCartPrice;
        $history->save();
    }


    public function updateCartCheckout(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $action = $request->input('action', 'update'); // Mặc định action là 'update'
        $cart = session()->get('cart', []);
    
        $product = Product::find($productId);
    
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }
    
        switch ($action) {
            case 'increase':
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity']++;
                }
                break;
            case 'decrease':
                if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
                    $cart[$productId]['quantity']--;
                }
                break;
            case 'remove':
                unset($cart[$productId]);
                break;
            case 'update':
                if ($quantity == 0) {
                    unset($cart[$productId]);
                } elseif (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] = $quantity;
                }
                break;
            default:
                return response()->json(['status' => 'error', 'message' => 'Invalid action']);
        }
    
        // Lưu lại giỏ hàng vào session
        session()->put('cart', $cart);
    
        // Tính lại tổng giá trị của giỏ hàng
        $totalCartPrice = 0;
        foreach ($cart as $item) {
            $totalItemPrice = $item['price'] * $item['quantity'];
            $totalCartPrice += $totalItemPrice;
        }
    
        // Trả về response JSON với các thông tin cập nhật
        return response()->json([
            'status' => 'success',
            'id' => $productId, // Trả về id sản phẩm đã cập nhật
            'totalItemPrice' => isset($cart[$productId]) ? $cart[$productId]['quantity'] * $product->price : 0, // Tính lại giá trị sản phẩm đã cập nhật
            'totalPrice' => $totalCartPrice
        ]);
    }
    public function registerOrder(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $avatarName = $file->getClientOriginalName();
            $file->move(public_path('Frontend/upload/user/avatar'), $avatarName);
            $data['avatar'] = $avatarName; // Lưu tên tệp ảnh vào cơ sở dữ liệu
        }

        // Kiểm tra và mã hóa mật khẩu mới nếu có
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = new User($data);
        $user->level = 0;

        $user->save();

        // Gửi email thông báo sau khi đăng ký thành công
        Mail::to($user->email)->send(new MailNotify([
            'subject' => 'Xác nhận đăng ký',
            'body' => 'Cảm ơn bạn đã đăng ký tài khoản. Đây là email xác nhận từ chúng tôi.',
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'message' => $user->message,
            'id_country' => $user->id_country,
            'address' => $user->address,
            'level' => $user->level,
            'avatar' => $user->avatar, // Nếu có
        ]));

        return redirect()->route('checkout')->with('success', 'Đăng ký thành công!');
    }
}