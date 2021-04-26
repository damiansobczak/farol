<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Services\ManageStorageService;
use App\Services\GalleryService;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
	public function attributes()
	{
		return [
			"name" => "Nazwa",
			"image" => "Obrazek",
			"imageAlt" => "Opis obrazka",
			"categoryId" => "Kategoria",
			"featured" => "Promowanie",
			"description" => "Opis",
			"show" => "Aktywny",
			"avaibility" => "Dostępność",
			"collections" => "Dostępne kolekcje",
			"gallery" => "Galeria",
			"seoTitle" => "Tytuł seo",
			"seoDescription" => "Opis seo",
			"ogTitle" => "Tytuł og",
			"ogDesc" => "Opis og"
		];
	}

	public function validator(array $data)
	{
		return Validator::make($data, [
			"name" => "required|max:64",
			"image" => "file|mimes:jpg,jpeg,png|max:512",
			"imageAlt" => "nullable|max:255",
			"categoryId" => "required|exists:categories,id",
			"featured" => "nullable|boolean",
			"description" => "required",
			"show" => "nullable|boolean",
			"collections.*" => "nullable|exists:collections,id",
			"avaibility" => "nullable|boolean",
			"gallery.*" => "nullable|file|mimes:jpeg,jpg,png|max:256",
			"seoTitle" => "nullable|max:255",
			"seoDescription" => "nullable|max:600",
			"ogTitle" => "nullable|max:255",
			"ogDesc" => "nullable|max:600"
		], [], $this->attributes());
	}

	public function index()
	{
		$products = Product::select('id', 'image', 'imageAlt', 'name')->latest()->get();
		return view('admin.pages.products.index', compact('products'));
	}

	public function create()
	{
		$categories = Category::select('id', 'name')->get();
		$collections = Collection::select('id', 'name')->get();
		return view('admin.pages.products.form', compact('categories', 'collections'));
	}

	public function store(Request $req)
	{
		$validated = $this->validator($req->all())->validate();

		if (isset($validated['image'])) {
			$validated['image'] = ManageStorageService::store($req->file('image'), 'products');
		}

		if (isset($validated['gallery'])) {
			$validated['gallery'] = GalleryService::store($req->file('gallery'), 'products');
		}

		$product = Product::create($validated);

		if (isset($validated['collections'])) {
			$product->collections()->attach(Collection::findOrFail($validated['collections']));
		}

		return redirect()->route('admin.products')->with('success', 'Produkt został pomyślnie utworzony!');
	}

	public function edit(Int $productId)
	{
		$product = Product::with('collections')->findOrFail($productId);
		$categories = Category::select('id', 'name')->get();
		$collections = Collection::select('id', 'name')->get();
		return view('admin.pages.products.form', compact('product', 'categories', 'collections'));
	}

	public function update(Request $req, Int $productId)
	{
		$product = Product::findOrFail($productId);
		$validated = $this->validator($req->all())->validate();

		if (isset($validated['image'])) {
			$validated['image'] = ManageStorageService::update($req->file('image'), $product->image, 'products');
		}

		if (isset($validated['gallery'])) {
			$validated['gallery'] = GalleryService::update($req->file('gallery'), $product->gallery, 'products');
		}

		$product->update($validated);
		$product->collections()->detach();
		if (isset($validated['collections'])) {
			$product->collections()->attach(Collection::findOrFail($validated['collections']));
		}
		return redirect()->route('admin.products')->with('success', 'Produkt został pomyślnie zaktualizowany!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Int $productId)
	{
		$product = Product::findOrFail($productId);
		$product->collections()->detach();
		$product->delete();
		ManageStorageService::destroy($product->image);
		GalleryService::destroy($product->gallery);

		return redirect()->route('admin.products')->with('success', 'Produkt został pomyślnie usunięty!');
	}
}
