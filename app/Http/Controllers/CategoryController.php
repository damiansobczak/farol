<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
	public function validator($data)
	{
		return Validator::make($data, [
			"name" => "required|string|unique:categories,name",
			"image" => "nullable|image",
			"imageAlt" => "nullable|string"
		]);
	}
	public function index()
	{
		$categories = Category::select('id', 'image', 'name')->get();
		return view('admin.pages.category.index', compact('categories'));
	}
	public function create()
	{
		return view('admin.pages.category.form');
	}
	public function store(Request $req)
	{
		$validated = $this->validator($req->all())->validate();
		$category = Category::create($validated);
		return redirect()->route('admin.categories');
	}
	public function edit($categoryId)
	{
		$category = Category::findOrFail($categoryId);
		return view('admin.pages.category.form', compact('category'));
	}
	public function update(Request $req, $categoryId)
	{
		$category = Category::findOrFail($categoryId);
		$validated = $this->validator($req->all())->validate();
		$category->update($validated);
		return redirect()->route('admin.categories');
	}
}
