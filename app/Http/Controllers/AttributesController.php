<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;
use App\Models\AttributeType;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ManageImgStorageController;

class AttributesController extends Controller
{
	public function attributes()
	{
		return ['name' => 'Nazwa atrybutu',
				'image' => 'Obraz atrybutu',
				'imageAlt' => 'Opis obrazu atrybutu',
				'attributeType' => 'Typ atrybutu',
				'minValue' => 'Minimalna wartość atrybutu',
				'maxValue' => 'Maksymalna wartość atrybutu',
		];
	}
	public function validator($data, $edit)
	{
		return Validator::make($data, [
			'name' => $edit ? 'required|string' : 'required|string|unique:attributes,name',
			'image' => 'nullable|image',
			'imageAlt' => 'nullable|string',
			'attributeType' => 'required',
			'minValue' => 'nullable|numeric',
			'maxValue' => 'nullable|numeric'
		], [], $this->attributes());
	}
	public function index()
	{
		$attributes = Attributes::select('id', 'name', 'image', 'imageAlt', 'attributeType')->with('attrType')->get();
		return view('admin.pages.attributes.index', compact('attributes'));
	}
	public function create()
	{
		$attributeTypes = AttributeType::all();
		return view('admin.pages.attributes.form', compact('attributeTypes'));
	}
	public function store(Request $req)
	{
		$validated = $this->validator($req->all(), false)->validate();
		$validated['image'] = ManageImgStorageController::store($req->file('image'), 'attributes');
		$attributeType = Attributes::create($validated);
		return redirect()->route('admin.attributes');
	}
	public function edit($attrId)
	{
		$attribute = Attributes::findOrFail($attrId);
		$attributeTypes = AttributeType::all();
		return view('admin.pages.attributes.form', compact(['attribute', 'attributeTypes']));
	}
	public function update(Request $req, $attrId)
	{
		$attribute = Attributes::findOrFail($attrId);
		$oldImage = $attribute->image;
		$validated = $this->validator($req->all(), true)->validate();
		$validated['image'] = ManageImgStorageController::update($req->file('image'), $oldImage, 'attributes');
		$attribute->update($validated);
		return redirect()->route('admin.attributes');
	}
}
