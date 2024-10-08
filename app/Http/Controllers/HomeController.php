<?php
namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() {
        $product_featured = Products::where('is_available', 1)->get();
        return Inertia::render('Home')->with([
            'product_featured' => $product_featured,
        ]);
    }
    
}
