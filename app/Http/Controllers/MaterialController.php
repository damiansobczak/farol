<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Material;
use App\Services\ManageStorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    public function attributes()
    {
        return [
            "color_id" => "Kolor",
            "collection_id" => "Kolekcja",
            "image" => "Obrazek",
        ];
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            "name" => "required|max:200",
            "color_id" => "required|exists:colors,id",
            "collection_id" => "required|exists:collections,id",
            "attributes.*" => "nullable|exists:attributes,id",
            "image" => "file|mimes:jpg,jpeg,png|max:256",
        ], [], $this->attributes());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::latest()->paginate(20);
        return view('admin.pages.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = Collection::all();
        $colors = Color::all();
        $attributes = Attribute::all();
        return view('admin.pages.materials.form', compact('collections', 'colors', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validator($request->all())->validate();

        if (isset($validated['image'])) {
            $validated['image'] = ManageStorageService::store($request->file('image'), 'materials');
        }

        $material = Material::create($validated);

        if (isset($validated['attributes'])) {
            $material->attributes()->attach(Attribute::findOrFail($validated['attributes']));
        }

        return redirect()->route('admin.materials.edit', $material->id)->with('success', 'Materiał został pomyślnie utworzony!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collections = Collection::all();
        $colors = Color::all();
        $attributes = Attribute::all();
        return view('admin.pages.materials.form', compact('material', 'colors', 'collections', 'attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::findOrFail($id);

        $collections = Collection::all();
        $colors = Color::all();
        $attributes = Attribute::all();

        return view('admin.pages.materials.form', compact('material', 'colors', 'collections', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $validated = $this->validator($request->all())->validate();

        if (isset($validated['image'])) {
            $validated['image'] = ManageStorageService::update($request->file('image'), $material->image, 'materials');
        }

        if (isset($validated['attributes'])) {
            $material->attributes()->sync(Attribute::findOrFail($validated['attributes']));
        }

        $material->update($validated);

        return back()->with('success', 'Materiał został pomyślnie zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->attributes()->detach();
        $material->delete();

        if (isset($material->image)) {
            ManageStorageService::destroy($material->image);
        }

        return redirect()->route('admin.materials')->with('success', 'Materiał został pomyślnie usunięty!');
    }
}
