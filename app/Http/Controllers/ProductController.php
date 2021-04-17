<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Master Product';
        $products = Product::all();
        $categories = Category::all();
        
        $data = [
            'title' => $title,
            'all_product' => $products->count(),
            'all_category' => $categories->count(),
        ];

        return view('products.index', $data);
    }

    public function create()
    {
        $title = 'Create Products';
        $categories = Category::all();
        $units = Unit::all();
        
        $data = [
            'title' => $title,
            'action' => 'create',
            'categories' => $categories,
            'units' => $units
        ];
        
        return view('products.form', $data);
    }
}
