<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;
use App\Models\AttributeType;
use App\Models\AttributeGroup;
use Illuminate\Support\Facades\Validator;
use App\Services\ManageStorageService;

class AttributesController extends Controller
{
	public function attributes()
	{
		return ['name' => 'Nazwa atrybutu',
				'image' => 'Obraz atrybutu',
				'imageAlt' => 'Opis obrazu atrybutu',
				'attributeType' => 'Typ atrybutu',
				'attributeGroup' => 'Grupa atrybutu',
				'cost' => 'Koszt atrybutu'
		];
	}
	public function validator(Array $data, Bool $edit)
	{
		return Validator::make($data, [
			'name' => $edit ? 'required|string' : 'required|string|unique:attributes,name',
			'image' => 'nullable|image',
			'imageAlt' => 'nullable|string',
			'attributeType' => 'required|exists:attribute_types,id',
			'attributeGroup' => 'nullable|exists:attribute_groups,id',
			'cost' => 'nullable|numeric'
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
		$attributeGroups = AttributeGroup::all();
		return view('admin.pages.attributes.form', compact('attributeTypes', 'attributeGroups'));
	}
	public function store(Request $req)
	{
		$validated = $this->validator($req->all(), false)->validate();
		$validated['image'] = ManageStorageService::store($req->file('image'), 'attributes');
		$attributeType = Attributes::create($validated);
		return redirect()->route('admin.attributes')->with('success', 'Atrybut został pomyślnie utworzony!');
	}
	public function edit(Int $attrId)
	{
		$attribute = Attributes::findOrFail($attrId);
		$attributeTypes = AttributeType::all();
		$attributeGroups = AttributeGroup::all();
		return view('admin.pages.attributes.form', compact(['attribute', 'attributeTypes', 'attributeGroups']));
	}
	public function update(Request $req, Int $attrId)
	{
		$attribute = Attributes::findOrFail($attrId);
		$oldImage = $attribute->image;
		$validated = $this->validator($req->all(), true)->validate();
		$validated['image'] = ManageStorageService::update($req->file('image'), $oldImage, 'attributes');
		$attribute->update($validated);
		return redirect()->route('admin.attributes')->with('success', 'Atrybut został pomyślnie zaktualizowany!');
	}
}
