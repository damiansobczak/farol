<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ManageStorageService;

class CategoryController extends Controller
{
	public function attributes()
	{
		return ['name' => 'Nazwa kategorii',
				'image' => 'Obraz kategorii',
				'imageAlt' => 'Opis obrazu kategorii',
		];
	}
	public function validator(Array $data, Bool $edit)
	{
		return Validator::make($data, [
			"name" => $edit ? "required|string" : "required|string|unique:categories,name",
			"image" => "nullable|image",
			"imageAlt" => "nullable|string"
		], [], $this->attributes());
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
		$validated['image'] = ManageStorageService::store($req->file('image'), 'categories');
		$category = Category::create($validated);
		return redirect()->route('admin.categories')->with('success', 'Kategoria została pomyślnie utworzona!');
	}
	public function edit(Int $categoryId)
	{
		$category = Category::findOrFail($categoryId);
		return view('admin.pages.category.form', compact('category'));
	}
	public function update(Request $req, Int $categoryId)
	{
		$category = Category::findOrFail($categoryId);
		$oldImage = $category->image;
		$validated = $this->validator($req->all(), true)->validate();
		$validated['image'] = ManageStorageService::update($req->file('image'), $oldImage, 'categories');
		$category->update($validated);
		return redirect()->route('admin.categories')->with('success', 'Kategoria została pomyślnie zaktualizowana!');
	}
}
