<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class MainPageController extends Controller
{
	public function main()
	{
		$featuredProducts = Cache::remember('pages.main.products', 60 * 60 * 24, function () {
			return Product::select('id', 'slug', 'image', 'imageAlt', 'name', 'categoryId')->with('category')->where('featured', true)->get();
		});
		$posts = Cache::remember('pages.main.posts', 60 * 60 * 24, function () {
			return Post::select('id', 'title', 'description', 'image', 'imageAlt', 'slug')->latest()->where('show', true)->limit(3)->get();
		});

		return view('pages.main', compact('featuredProducts', 'posts'));
	}
	public static function categories()
	{
		return Cache::remember('pages.categories', 60 * 60 * 24, function () {
			return Category::select('id', 'image', 'imageAlt', 'name')->get();
		});
	}
}
