<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopController extends Controller
{
    public function index()
    {
        // Fetching categories, products, and product count
        $categories = ProductCategory::all();
        $products = Products::with(['category'])->paginate(12);  // Paginate products
        $product_count = Products::count();  // Get total product count
        
        // Passing data to the Vue component via Inertia
        return Inertia::render('Shop/Index', [
            'categories' => $categories,
            'product_count' => $product_count,
            'products' => $products,
        ]);
    }

    public function show($id){
        $product = Products::with(['category'])->find($id);
        $categories = ProductCategory::all();
        return view('shop.show')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }
    
}
