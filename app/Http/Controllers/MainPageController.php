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
		$featuredProducts = Product::select('id', 'slug', 'image', 'imageAlt', 'name', 'categoryId', 'show')->with('category')->where('featured', true)->where('show', true)->latest()->get();
		$posts = Post::select('id', 'title', 'description', 'image', 'imageAlt', 'slug')->latest()->where('show', true)->limit(3)->get();
		$sliders = Slider::select('id', 'title', 'description', 'actionLink', 'actionName', 'image', 'imageAlt', 'onlyImage', 'onlyImageLink')->latest()->get();
		return view('pages.main', compact('featuredProducts', 'posts', 'sliders'));
	}
	public static function categories()
	{
		return Category::select('id', 'image', 'imageAlt', 'name')->get();
	}
}
