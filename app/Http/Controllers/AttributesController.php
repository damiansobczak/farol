<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;
use App\Models\AttributeType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttributesController extends Controller
{
	public function validator($data)
	{
		return Validator::make($data, [
			'name' => 'required|string|unique:attribute_types,name',
			'image' => 'nullable|image',
			'imageAlt' => 'nullable|string',
			'attributeType' => 'required',
			'minValue' => 'nullable|numeric',
			'maxValue' => 'nullable|numeric'
		]);
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
		$validated = $this->validator($req->all())->validate();
		if(isset($validated['image'])) {
			$file = $req->file('image')->store('attributes');
			$validated['image'] = $file;
		}
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
		$validated = $this->validator($req->all())->validate();
		if(isset($validated['image'])) {
			$file = $req->file('image')->store('attributes');
			$validated['image'] = $file;
			Storage::delete($oldImage);
		}
		$attribute->update($validated);
		return redirect()->route('admin.attributes');
	}
}
