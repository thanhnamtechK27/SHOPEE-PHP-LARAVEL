<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cmt;
use Illuminate\Support\Facades\Validator;
class CmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function cmt(CommentRequest $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return response()->json(['message' => 'Vui lòng đăng nhập để bình luận.'], 401);
        }
        
        // Lấy thông tin người dùng đang đăng nhập
        $user = Auth::user();
        
        // Lưu comment vào database
        $comment = new Cmt;
        $comment->cmt = $request->comment;
        $comment->id_blog = $request->id_blog;
        $comment->id_user = $user->id; // Lấy id_user từ người dùng đăng nhập
        $comment->level = $request->level;
        $comment->avatar = $user->avatar; // Sử dụng avatar của người dùng đăng nhập
        $comment->name = $user->name; // Sử dụng tên của người dùng đăng nhập
        $comment->thoi_gian = now();

        $comment->save();

        // Trả về kết quả
        return response()->json(['message' => 'Bình luận đã được gửi.'], 200);
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
  
}
