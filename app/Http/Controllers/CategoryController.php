<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::select('id', 'name')->get();
		return view('admin.pages.category.index', ['categories' => $categories]);
	}
	public function form($categoryId = NULL)
	{
		$categoryData = [];
		if(isset($categoryId))
			$categoryData = Category::find($categoryId)->first();
		return view('admin.pages.category.form', ['categoryData' => $categoryData, 'categoryId' => $categoryId]);
	}
	public function store(Request $req, $categoryId = NULL)
	{
		if(isset($categoryId))
		{
			$req->validate([
				"name" => "required|string",
				"image" => "nullable|image",
				"imageAlt" => "nullable|string"
			]);
			$category = Category::find($categoryId);
		}
		else
		{
			$req->validate([
				"name" => "required|string|unique:categories,name",
				"image" => "nullable|image",
				"imageAlt" => "nullable|string"
			]);
			$category = new Category();
		}
		$category->name = $req->name;
		$category->image = $req->image;
		$category->imageAlt = $req->imageAlt;
		$category->save();
		return redirect()->route('admin.categories');
	}
}
