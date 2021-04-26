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
		return [
			'name' => 'Nazwa kategorii',
			'image' => 'Obraz kategorii',
			'imageAlt' => 'Opis obrazu kategorii',
		];
	}

	public function validator(array $data)
	{
		return Validator::make($data, [
			"name" => "required|string",
			"image" => "nullable|file|mimes:jpeg,jpg,png|max:512",
			"imageAlt" => "nullable|string"
		], [], $this->attributes());
	}

	public function index()
	{
		$categories = Category::select('id', 'image', 'imageAlt', 'name')->latest()->get();
		return view('admin.pages.category.index', compact('categories'));
	}

	public function create()
	{
		return view('admin.pages.category.form');
	}

	public function store(Request $req)
	{
		$validated = $this->validator($req->all())->validate();

		if (isset($validated['image'])) {
			$validated['image'] = ManageStorageService::store($req->file('image'), 'categories');
		}

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

		$validated = $this->validator($req->all())->validate();

		if (isset($validated['image'])) {
			$validated['image'] = ManageStorageService::update($req->file('image'), $category->image ?? null, 'categories');
		}

		$category->update($validated);
		return redirect()->route('admin.categories')->with('success', 'Kategoria została pomyślnie zaktualizowana!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Int $categoryId)
	{
		$category = Category::findOrFail($categoryId);
		if ($category->products->count()) {
			return redirect()->route('admin.categories.edit', $categoryId)->with('error', 'Kategoria zawiera produkty. W pierwszej kolejności usuń obecną kategorię z wszystkich produktów które ją uzywają!');
		}
		$category->delete();
		ManageStorageService::destroy($category->image);

		return redirect()->route('admin.categories')->with('success', 'Kategoria została pomyślnie usunięta!');
	}
}
