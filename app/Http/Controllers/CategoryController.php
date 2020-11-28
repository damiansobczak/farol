<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{
		return view('admin.pages.category.index');
	}
	public function form()
	{
		return view('admin.pages.category.form');
	}
	public function store(Request $req)
	{
		$req->validate([
			"name" => "required|alpha|unique:categories,name",
			"image" => "nullable|image",
			"imageAlt" => "nullable|string"
		]);
		$newCategory = new Category();
		$newCategory->name = $req->name;
		$newCategory->image = $req->image;
		$newCategory->imageAlt = $req->imageAlt;
		$newCategory->save();
		return redirect()->route('admin.categories');
	}
}
