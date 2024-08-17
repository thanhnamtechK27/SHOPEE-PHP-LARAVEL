<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function checkbrand(){
        $brands = Brand::all(); // Lấy tất cả các brand từ database
        return view('admin.brand.brand', compact('brands'));
    }
    

    public function check_createbrand(){
        return view ('admin.brand.create_brand');   
    }

    public function create_brand(Request $request){
        $brand = new Brand();
        $brand->id = $request->id;
        $brand->name = $request->name;

        // Save the brand to database
        $brand->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'brand created successfully!');
    }

    public function delete($id){
        $brand = Brand::findOrFail($id);
        if ($brand->delete()) {
            return redirect()->back()->with('success', 'brand deleted successfully!');
        } else {
            return redirect()->back()->withErrors('Failed to delete brand.');
        }
    }
    
}
