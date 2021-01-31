<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeGroup;
use Illuminate\Support\Facades\Validator;

class AttributeGroupController extends Controller
{
	public function validator($data)
	{
		return Validator::make($data, [
			'name' => 'required|string|unique:attribute_groups,name',
		]);
	}
	public function create()
	{
		return view('admin.pages.attributeGroup.form');
	}
	public function store(Request $req)
	{
		$validated = $this->validator($req->all())->validate();
		$attributeType = AttributeGroup::create($validated);
		return redirect()->route('admin.attributes');
	}
}
