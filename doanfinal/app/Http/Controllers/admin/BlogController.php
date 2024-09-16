<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function check_blog(){
        $blogs = Blog::all();
        // listblogs là tự đặt để qua bên view dùng foreach
        return view('admin.blog.blog', ['list_blogs' => $blogs]);
    }
    
    public function check_create_blog(){
        return view('admin.blog.create_blog');
    }
    public function create_blog(UpdateBlogRequest $request){
        // Kiểm tra xem người dùng đã tải lên hình ảnh mới hay không
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            
            // Lưu hình ảnh vào thư mục public/upload/user/avatar
            $file->move(public_path('upload/blog/avatar'), $filename);
        } else {
            $filename = null; // Gán giá trị null nếu không có hình ảnh được tải lên
        }
    
        $add = new Blog();
        $add->title = $request->title;
        $add->avatar = $filename; // Gán giá trị của avatar bằng $filename
        $add->description = $request->description;
        $add->content = $request->content;
    
        // Lưu bài blog vào cơ sở dữ liệu
        if($add->save()){
            return redirect()->back()->with('success', 'Tạo blog thành công!');
        } else {
            return redirect()->back()->with('error', ' Tạo blog thất bại!');
        }
    }
    public function delete_blog($id){
        $blog = Blog::findOrFail($id);
        if($blog->delete()){
            return redirect()->back()->with('success', 'Xóa blog thành công');
        }else{
            return redirect()->back()->with('error', 'Không xóa được, phát hiện lỗi');
        }
    }
    public function edit_blog($id)
    {
        $blog = Blog::find($id); // Tìm blog bằng ID của nó
        return view('admin.blog.edit_blog', compact('blog')); // Truyền blog tới view
        dd('$blog->id');
    }
    public function update_blog(UpdateBlogRequest $request, $id){
        $blog = Blog::findOrFail($id);
    
        $data = $request->all();
        // dd($blog->avatar);  
        $file = $request->avatar;
        
        if (!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        } else {
                return redirect()->back()->withErrors('Error file.');
            }
    
        if($blog->update($data)){
            return redirect()->back()->with('success', __('Edit Blog success.'));
        } else {
            return redirect()->back()->withErrors('Edit Blog error.');
        }
    }
    
    
    public function index()
    {
        //
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
