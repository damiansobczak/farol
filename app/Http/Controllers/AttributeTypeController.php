<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeType;
use Illuminate\Support\Facades\Validator;

class AttributeTypeController extends Controller
{
	public function validator($data)
	{
		return Validator::make($data, [
			'name' => 'required|string|unique:attribute_types,name',
			'isDimension' => 'boolean'
		]);
	}
	public function create()
	{
		return view('admin.pages.attributeType.form');
	}
	public function store(Request $req)
	{
		$validated = $this->validator($req->all())->validate();
		$attributeType = AttributeType::create($validated);
		return redirect()->route('admin.attributes');
	}
}
