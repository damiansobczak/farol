<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;

class AttributesController extends Controller
{
	public function index()
	{
		$attributes = Attributes::select('name', 'image', 'imageAlt', 'attributeType')->get();
		return view('admin.pages.attributes.index', compact('attributes'));
	}
	public function create()
	{
		# code...
	}
	public function store()
	{
		# code...
	}
}
