<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use App\Models\Rate;
use App\Models\Cmt;



class BlogFEController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function blog_detail($id)
     {
         $blog = Blog::findOrFail($id);
         $nextBlog = Blog::where('id','>', $id)->orderBy('id')->first();
         $prevBlog = Blog::where('id','<', $id)->orderBy('id', 'desc')->first();
         $OVR_Rate = $this->OVRRate($id); // Gọi phương thức tính trung bình cộng đánh giá
         $comments = Cmt::where('id_blog', $id)->get();
         return view("Frontend.blog.blog_detail", compact('blog', 'nextBlog', 'prevBlog', 'OVR_Rate', 'comments'));
     }

     
            
    public function blog_list()
    {
        $blogs = Blog::all();
        return response()->json([
            'blogs' => $blogs
        ]);
    }
     
        
    public function OVRRate($id)
    {
        $OVR_Rate = Rate::where('id_blog', $id)->avg('rate');
        $OVR_Rate = round($OVR_Rate, 1);
        return $OVR_Rate;
    }      
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
    public function update(Request $request, $id)
    {
        //
    }

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
