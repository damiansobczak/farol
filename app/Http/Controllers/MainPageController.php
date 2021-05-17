<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use App\Models\Slider;
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
		$sliders = Cache::remember('pages.main.sliders', 60 * 60 * 24, function () {
			return Slider::select('id', 'title', 'description', 'actionLink', 'actionName', 'image', 'imageAlt', 'onlyImage', 'onlyImageLink')->get();
		});

		return view('pages.main', compact('featuredProducts', 'posts', 'sliders'));
	}
	public static function categories()
	{
		return Cache::remember('pages.categories', 60 * 60 * 24, function () {
			return Category::select('id', 'image', 'imageAlt', 'name')->get();
		});
	}
}
