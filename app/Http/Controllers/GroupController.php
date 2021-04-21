<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Color;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function main()
    {
        $colors = Color::all();
        $collections = Collection::all();

        return view('admin.pages.groups.index', compact('collections', 'colors'));
    }
}
