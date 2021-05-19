<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function main()
    {
        $categories = Category::with('products')->get();
        return view('pages.products', compact('categories'));
    }
}
