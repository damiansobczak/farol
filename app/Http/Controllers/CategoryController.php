<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
	public function validator($data, $edit)
	{
		return Validator::make($data, [
			"name" => $edit ? "required|string" : "required|string|unique:categories,name",
			"image" => "nullable|image",
			"imageAlt" => "nullable|string"
		]);
	}
	public function index()
	{
		$categories = Category::select('id', 'image', 'imageAlt', 'name')->get();
		return view('admin.pages.category.index', compact('categories'));
	}
	public function create()
	{
		return view('admin.pages.category.form');
	}
	public function store(Request $req)
	{
		$validated = $this->validator($req->all(), false)->validate();
		if(isset($validated['image'])) {
			$file = $req->file('image')->store('categories');
			$validated['image'] = $file;
		}
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
		$oldImage = $category->image;
		$validated = $this->validator($req->all(), true)->validate();
		if(isset($validated['image'])) {
			$file = $req->file('image')->store('categories');
			$validated['image'] = $file;
			Storage::delete($oldImage);
		}
		$category->update($validated);
		return redirect()->route('admin.categories');
	}
}
