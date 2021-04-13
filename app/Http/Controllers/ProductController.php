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
	public function validator(array $data, Bool $edit)
	{
		return Validator::make($data, [
			"name" => "required|max:64",
			"image" => "required|image",
			"imageAlt" => "nullable|max:255",
			"categoryId" => "required|exists:categories,id",
			"featured" => "nullable|boolean",
			"description" => "required",
			"show" => "nullable|boolean",
			"collections.*" => "nullable|exists:collections,id",
			"avaibility" => "nullable|boolean",
			"gallery.*" => "nullable|image",
			"seoTitle" => "nullable|max:255",
			"seoDescription" => "nullable|max:600",
			"ogTitle" => "nullable|max:255",
			"ogDesc" => "nullable|max:600"
		], [], $this->attributes());
	}
	public function index()
	{
		$products = Product::select('id', 'image', 'imageAlt', 'name')->get();
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
		$validated = $this->validator($req->all(), false)->validate();
		$validated['image'] = ManageStorageService::store($req->file('image'), 'products');
		$validated['gallery'] = GalleryService::store($req->file('gallery'), 'products');
		$product = Product::create($validated);
		$product->collections()->attach(Collection::find($validated['collections']));
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
		$oldImage = $product->image;
		$oldGallery = $product->gallery;
		$validated = $this->validator($req->all(), true)->validate();
		$validated['image'] = ManageStorageService::update($req->file('image'), $oldImage, 'products');
		$validated['gallery'] = GalleryService::update($req->file('gallery'), $oldGallery, 'products');
		$product->update($validated);
		$product->collections()->detach();
		$product->collections()->attach(Collection::find($validated['collections']));
		return redirect()->route('admin.products')->with('success', 'Produkt został pomyślnie zaktualizowany!');
	}
}
