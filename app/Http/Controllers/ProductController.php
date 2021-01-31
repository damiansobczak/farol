<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\AttributeType;
use Illuminate\Http\Request;
use App\Services\ManageStorageService;
use App\Services\GalleryService;
use App\Services\PriceListService;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
	public function attributes()
	{
		return ["name" => "Nazwa",
				"image" => "Obrazek",
				"imageAlt" => "Opis obrazka",
				"categoryId" => "Kategoria",
				"priceList" => "Cennik produktu",
				"attributeTypes" => "Atrybuty produktu",
				"featured" => "Promowanie",
				"description" => "Opis",
				"show" => "Aktywny",
				"avaibility" => "Dostępność",
				"gallery" => "Galeria",
				"seoTitle" => "Tytuł seo",
				"seoDescription" => "Opis seo",
				"ogTitle" => "Tytuł og",
				"ogDesc" => "Opis og"
		];
	}
	public function validator(Array $data, Bool $edit)
	{
		return Validator::make($data, [
				"name" => "required|max:64",
				"image" => "required|image",
				"imageAlt" => "nullable|max:255",
				"categoryId" => "required|exists:categories,id",
				"priceList" => "required|mimes:csv,txt",
				"attributeTypes.*" => "required|exists:attribute_types,id",
				"featured" => "nullable|boolean",
				"description" => "required",
				"show" => "nullable|boolean",
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
		$attributeType = AttributeType::select('id', 'name')->get();
		return view('admin.pages.products.form', compact('categories', 'attributeType'));
	}
	public function store(Request $req)
	{
		$validated = $this->validator($req->all(), false)->validate();
		$validated['image'] = ManageStorageService::store($req->file('image'), 'products');
		$validated['gallery'] = GalleryService::store($req->file('gallery'), 'products');
		$validated['priceList'] = PriceListService::processFile($req->file('priceList'));
		$product = Product::create($validated);
		return redirect()->route('admin.products')->with('success', 'Produkt został pomyślnie utworzony!');
	}
	public function edit(Int $productId)
	{
		$product = Product::findOrFail($productId);
		$categories = Category::select('id', 'name')->get();
		$attributeType = AttributeType::select('id', 'name')->get();
		return view('admin.pages.products.form', compact('product', 'categories', 'attributeType'));
	}
	public function update(Request $req, Int $productId)
	{
		$product = Product::findOrFail($productId);
		$oldImage = $product->image;
		$oldGallery = $product->gallery;
		$validated = $this->validator($req->all(), true)->validate();
		$validated['image'] = ManageStorageService::update($req->file('image'), $oldImage, 'products');
		$validated['gallery'] = GalleryService::update($req->file('gallery'), $oldGallery, 'products');
		$validated['priceList'] = PriceListService::processFile($req->file('priceList'));
		$product->update($validated);
		return redirect()->route('admin.products')->with('success', 'Produkt został pomyślnie zaktualizowany!');
	}
}
