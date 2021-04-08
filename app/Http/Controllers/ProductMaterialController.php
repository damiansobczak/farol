<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Color;
use App\Models\Material;
use Illuminate\Http\Request;

class ProductMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        $colors = Color::all();
        $materials = Material::all();
        return view('admin.pages.materials.index', compact('collections', 'colors', 'materials'));
    }
}
