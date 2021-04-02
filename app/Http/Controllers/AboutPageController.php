<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class AboutPageController extends Controller
{
    public function main()
    {
        $categories = Cache::remember('pages.categories', 60 * 60 * 24, function () {
            return Category::select('id', 'image', 'imageAlt', 'name')->get();
        });
        return view('pages.about', compact('categories'));
    }
}
