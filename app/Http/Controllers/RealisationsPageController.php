<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;

class RealisationsPageController extends Controller
{
    public function main()
    {
        $realisations = Realisation::latest()->get();
        return view('pages.realisations', compact('realisations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $realisation = Realisation::where('slug', $slug)->firstOrFail();
        return view('pages.realisation', compact('realisation'));
    }
}
