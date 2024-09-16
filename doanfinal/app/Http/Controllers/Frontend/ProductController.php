<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product; // Import model Product
use App\Http\Requests\ProductRequest; // Import ProductRequest
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// version 11
use Intervention\Image\Laravel\Facades\Image;

use Auth;

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm của người dùng.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_product()
    {
        $userId = Auth::id(); // Lấy ID của người dùng hiện tại
        if (!$userId) {
            return redirect()->route('login_fe')->with('error', 'Bạn cần đăng nhập để xem sản phẩm của mình.');
        }

        $products = Product::where('id_user', $userId)->get(); // Lọc sản phẩm theo id_user
        return view('Frontend.product.my_product', compact('products'));
    }

    /**
     * Hiển thị form thêm sản phẩm.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_product()
    {
        $categories = Category::all();
        $brands = Brand::all();
        // dd($brands);
        return view('Frontend.product.add_product', compact('categories', 'brands'));
    }
    public function edit_product($id)
    {
        $product = Product::findOrFail($id);
        // dd($product->hinhanh);
        return view('Frontend.product.edit_product', compact('product'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        // Lấy danh sách hình ảnh hiện tại, nếu có
        $nowImage = json_decode($product->hinhanh, true) ?? [];

        // Xóa các ảnh đã chọn và mảng hình ảnh hiện tại
        $deleteImages = $request->input('delete_images') ?? [];
        foreach ($deleteImages as $image) {
            // Tạo đường dẫn đầy đủ đến tập tin hình ảnh
            $linkImage = public_path('upload/product/' . $image);
            // Kiểm tra nếu tập tin tồn tại trước khi xóa
            if (file_exists($linkImage)) {
                unlink($linkImage); // Xóa tập tin
            }
            // Kiểm tra và xóa khỏi mảng hình ảnh hiện tại
            if (!empty($nowImage)) {
                if (($key = array_search($image, $nowImage)) !== false) {
                    unset($nowImage[$key]);
                }
            }
        }

        // Xử lý các hình ảnh mới nếu có
        $newImages = [];
        if ($request->hasFile('hinhanh')) {
            foreach ($request->file('hinhanh') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('upload/product'), $imageName);
                $newImages[] = $imageName;
            }
        }

        // Kết hợp các hình ảnh hiện tại và hình ảnh mới
        $updatedImages = array_merge($nowImage, $newImages);

        // Đảm bảo không quá 3 hình ảnh
        if (count($updatedImages) > 3) {
            return back()->withErrors(['image' => 'Tổng số hình ảnh không được vượt quá 3.']);
        }

        // Cập nhật các trường thông tin sản phẩm
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->brand = $request->input('brand');
        $product->sale = $request->input('sale');
        $product->company = $request->input('company');
        $product->detail = $request->input('detail');
        $product->hinhanh = json_encode($updatedImages);

        // Lưu lại thông tin sản phẩm
        $product->save();

        // Chuyển hướng về trang chi tiết sản phẩm hoặc danh sách sản phẩm
        return redirect()->route('my_product', ['id' => $product->id])->with('success', 'Cập nhật sản phẩm thành công');
    }

    
    /**
     * Xử lý upload và lưu hình ảnh sản phẩm.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_product_form(Request $request)
    {
        $data = [];
        if($request->hasfile('hinhanh'))
        {

            foreach($request->file('hinhanh') as $xx)
            {
                $image = Image::read($xx);

                $name = $xx->getClientOriginalName();
                $name_2 = "hinh50_".$xx->getClientOriginalName();
                $name_3 = "hinh200_".$xx->getClientOriginalName();

                //$image->move('upload/product/', $name);
                
                
                $path = public_path('upload/product/' . $name);
                $path2 = public_path('upload/product/' . $name_2);
                $path3 = public_path('upload/product/' . $name_3);

                $image->save($path);
                $image->resize(50, 70)->save($path2);
                $image->resize(200, 300)->save($path3);
                
                // lấy từng tên hình ảnh đưa vào mảng
                $data[] = $name;
            }

        }
        // dd($data);
        // Convert $data array to JSON
        $json_data = json_encode($data);
        // Save product to database
        $user_id = Auth::id();
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->brand = $request->input('brand');
        $product->sale = $request->input('sale');
        $product->company = $request->input('company');
        $product->hinhanh = $json_data; 
        $product->detail = $request->input('detail');
        $product->id_user = $user_id;
        $product->save();

        return back()->with('success', 'Thêm sản phẩm thành công.');
    }
    

    public function product_detail($id)
    {
        $product = Product::findOrFail($id); 
        return view("Frontend.product.product_detail", compact('product'));
    }
    
    public function search(Request $request)
    {
        $name = $request->input('name'); // Từ thanh tìm kiếm header hoặc từ tên sản phẩm được click
        $keyword = $request->input('keyword'); // Từ thanh tìm kiếm header

        // Kiểm tra nếu có keyword từ thanh tìm kiếm header thì sử dụng nó, nếu không thì sử dụng từ tên sản phẩm
        $searchTerm = $keyword ?: $name;

        // Lấy ID của người dùng đang đăng nhập
        $userId = auth()->id();

        // Query để lấy các sản phẩm của người dùng đang đăng nhập và có tên chứa $searchTerm
        $products = Product::where('id_user', $userId)
                            ->where('name', 'like', '%' . $searchTerm . '%')
                            ->get();

        // Xử lý tên tệp ảnh để loại bỏ các ký tự không cần thiết (nếu có)
        foreach ($products as $product) {
            // Chuyển đổi chuỗi JSON thành mảng tên file ảnh
            $images = json_decode($product->hinhanh, true);
            // Lấy ảnh đầu tiên trong mảng để hiển thị
            $product->hinhanh = reset($images);
        }

        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm
        return view('Frontend.search.search', compact('products', 'searchTerm'));
    }


    public function search_advanced(Request $request)
    {
        $query = Product::query();

        // Lấy ID của người dùng đang đăng nhập
        $userId = auth()->id();

        // Chỉ lấy các sản phẩm của người dùng đang đăng nhập
        $query->where('id_user', $userId);

        // Áp dụng các bộ lọc dựa trên các input từ form
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('price')) {
            $priceRange = explode('-', $request->input('price'));
            $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        }

        if ($request->filled('category') && $request->input('category') != 'category1') {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('brand') && $request->input('brand') != 'brand1') {
            $query->where('brand', $request->input('brand'));
        }

        if ($request->filled('status') && $request->input('status') != 'active') {
            $query->where('status', $request->input('status'));
        }

        // Phân trang kết quả
        $products = $query->paginate(10);

        return view('Frontend.search.search_advanced', compact('products'));
    }

    
    public function filterProducts(Request $request)
    {
        // Lấy ID của người dùng hiện tại
        $userId = Auth::id();
    
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!$userId) {
            return response()->json(['error' => 'Bạn cần đăng nhập để lọc sản phẩm.']);
        }
    
        // Lấy dữ liệu từ request
        $tooltipText = $request->input('tooltipText');
        
        // Kiểm tra và xử lý dữ liệu tooltipText
        if (is_array($tooltipText) && count($tooltipText) === 2) {
            $minPrice = $tooltipText[0];
            $maxPrice = $tooltipText[1];
            
            // Lọc sản phẩm của người dùng hiện tại và theo khoảng giá
            $products = Product::where('id_user', $userId)
                ->whereBetween('price', [$minPrice, $maxPrice])
                ->get();
            
            // Chuyển đổi các sản phẩm thành dạng dữ liệu JSON cho JavaScript
            $productsJson = $products->map(function($product) {
                return [
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => asset('upload/product/' . json_decode($product->hinhanh)[0])
                    // Thêm các thuộc tính khác của sản phẩm nếu cần
                ];
            });
            
            // Trả về dữ liệu JSON chứa các sản phẩm
            return response()->json(['data' => $productsJson]);
        } else {
            // Xử lý khi dữ liệu không hợp lệ
            $errorMessage = "Dữ liệu không hợp lệ để lọc sản phẩm.";
            
            // Lưu thông báo lỗi vào session để hiển thị trên view (nếu cần)
            $request->session()->flash('error', $errorMessage);
            
            // Trả về một phản hồi JSON rỗng hoặc thông báo lỗi nếu cần
            return response()->json(['error' => $errorMessage]);
        }
    }
    public function delete_product($id)
    {
        $product = Product::find($id);

        if($product){
            $product->delete();
            return redirect()->route('my_product')->with('sussces', 'Blog deleted successfully ');
        }
        else{
            return redirect()->route('my_product')->withErrors('ERORR', 'Blog deleted fail ! ');
        }
    }
}
