<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    public function main()
    {
        $categories = Cache::remember('pages.categories', 60 * 60 * 24, function () {
            return Category::with('product')->get();
        });

        return view('pages.products', compact('categories'));
    }
}
