<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;

class MainController extends Controller
{
	public function main()
	{
		$featuredProducts = Product::select('id', 'image', 'imageAlt', 'name', 'categoryId', 'startingPrice')->with('productCategory')->where('featured', true)->get();
		$posts = Post::select('id', 'title', 'description', 'image', 'imageAlt')->latest()->where('show', true)->limit(3)->get();
		return view('pages.main', compact('featuredProducts', 'posts'));
	}
}
