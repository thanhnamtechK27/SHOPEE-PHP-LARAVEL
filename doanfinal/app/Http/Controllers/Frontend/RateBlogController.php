<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;

class RateBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function rateAjax(Request $request) {
        // Xử lý dữ liệu gửi từ AJAX
        $rate = $request->input('rate');
        $id_blog = $request->input('id_blog');
        $id_user = $request->input('id_user');

        // dd($rate);
        // Lưu đánh giá vào cơ sở dữ liệu
        $rateModel = new Rate();
        $rateModel->rate = $rate;
        $rateModel->id_blog = $id_blog;
        $rateModel->id_user = $id_user;
        $rateModel->save();
        return response()->json(['success' => true]);
    }

    
}
