<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // all product:
    public function product_list()
    {
        $product = Product::all();
        return response()->json([
            'product' => $product
        ]);
    }
    // product theo id:
    public function product_detail($id)
    {
        $product = Product::findOrFail($id); 
        return response()->json([
            'product' => $product
        ]);    
    }
    
    
}
