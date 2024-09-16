<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function checkcategory(){
        $categories = Category::all(); // Lấy tất cả các category từ database
        return view('admin.category.category',compact('categories'));
    }

    public function check_createcategory(){
        return view ('admin.category.create_category');   
    }

    public function create_category(Request $request){
        $category = new Category();
        $category->id = $request->id;
        $category->name = $request->name;

        // Save the category to database
        $category->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            return redirect()->back()->with('success', 'Category deleted successfully!');
        } else {
            return redirect()->back()->withErrors('Failed to delete category.');
        }
    }
    
}
