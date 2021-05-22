<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Services\ManageStorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            "name" => "required|max:200",
            "image" => "file|mimes:jpg,jpeg,png|max:128",
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('admin.pages.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.attributes.form');
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
            $validated['image'] = ManageStorageService::store($request->file('image'), 'attributes');
        }

        $attribute = Attribute::create($validated);
        return redirect()->route('admin.attributes')->with('success', 'Atrybut został pomyślnie utworzony!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pages.attributes.form', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('admin.pages.attributes.form', compact('attribute'));
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
        $attribute = Attribute::findOrFail($id);
        $validated = $this->validator($request->all())->validate();

        if (isset($validated['image'])) {
            $validated['image'] = ManageStorageService::update($request->file('image'), $attribute->image, 'attributes');
        }

        $attribute->update($validated);

        return redirect()->route('admin.attributes')->with('success', 'Atrybut został pomyślnie zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        if (isset($attribute->image)) {
            ManageStorageService::destroy($attribute->image);
        }

        return redirect()->route('admin.attributes')->with('success', 'Atrybut został pomyślnie usunięty!');
    }
}
