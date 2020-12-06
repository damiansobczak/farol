<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;
use App\Models\AttributeType;

class AttributesController extends Controller
{
	public function index()
	{
		$attributes = Attributes::select('name', 'image', 'imageAlt', 'attributeType')->get();
		return view('admin.pages.attributes.index', compact('attributes'));
	}
	public function create()
	{
		$attributeTypes = AttributeType::latest()->get();
		return view('admin.pages.attributes.form', compact('attributeTypes'));
	}
	public function store()
	{
		# code...
	}
}
