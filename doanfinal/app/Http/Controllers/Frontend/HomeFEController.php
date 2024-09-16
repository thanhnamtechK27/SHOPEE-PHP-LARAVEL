<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeFEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home_fe()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại

        if ($user) {
            // Nếu người dùng đã đăng nhập, lấy sản phẩm của người dùng
            $products = Product::where('id_user', $user->id)->orderBy('created_at', 'desc')->take(6)->get();
        } else {
            // Nếu chưa đăng nhập, không lấy sản phẩm hoặc có thể hiển thị thông báo
            $products = [];
        }

        return view("Frontend.homeFE.homeFE", compact('products'));
    }

    // Các phương thức còn lại vẫn giữ nguyên, nếu cần có thể bỏ qua hoặc thêm vào theo yêu cầu của bạn
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
