<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductPageController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  string  $slug
	 * @return \Illuminate\Http\Response
	 */
	public function show(string $slug)
	{
		$product = Cache::remember('pages.product.'.$slug, 60 * 60 * 24, function() use($slug) {
			return Product::where('slug', $slug)->with('collections', 'collections.materials', 'collections.materials.color')->firstOrFail();
		});
		return view('pages.product', compact('product'));
	}
}
