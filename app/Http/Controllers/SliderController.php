<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use App\Services\ManageStorageService;

class SliderController extends Controller
{
	/**
	 * Request validation function
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'title' => 'nullable|string|max:255',
			'description' => 'nullable|string|max:255',
			'actionName' => 'nullable|string|max:255',
			'actionLink' => 'nullable|string|max:255',
			'image' => 'nullable|file|mimes:jpg,jpeg,png|max:512',
			'imageAlt' => 'nullable|string|max:255',
			'onlyImage' => 'nullable|image|max:512',
			'onlyImageLink' => 'nullable|string|max:255'
		]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$sliders = Slider::latest()->get();
		return view('admin.pages.sliders.index', compact('sliders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.pages.sliders.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$sliderValidated = $this->validator($request->all())->validate();

		if (isset($validated['image'])) {
			$sliderValidated['image'] = ManageStorageService::store($request->file('image'), 'sliders');
		}

		if (isset($validated['image'])) {
			$sliderValidated['onlyImage'] = ManageStorageService::store($request->file('onlyImage'), 'sliders');
		}

		$slider = Slider::create($sliderValidated);
		return redirect()->route('admin.sliders.edit', $slider->id)->with('success', 'Baner został pomyślnie utworzony!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Int $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Int $id)
	{
		$slider = Slider::findOrFail($id);
		return view('admin.pages.sliders.form', compact('slider'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Int $id)
	{
		$slider = Slider::findOrFail($id);
		$sliderValidated = $this->validator($request->all())->validate();

		if (isset($validated['image'])) {
			$sliderValidated['image'] = ManageStorageService::update($request->file('image'), $slider->image ?? null, 'sliders');
		}

		if (isset($validated['onlyImage'])) {
			$sliderValidated['onlyImage'] = ManageStorageService::update($request->file('onlyImage'), $slider->onlyImage ?? null, 'sliders');
		}

		$slider->update($sliderValidated);
		return back()->with('success', 'Baner został pomyślnie zaktualizowany!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Int $id)
	{
		$slider = Slider::findOrFail($id);
		$slider->delete();
		ManageStorageService::destroy($slider->image ?? null);
		ManageStorageService::destroy($slider->onlyImage ?? null);
		return redirect()->route('admin.sliders')->with('success', 'Baner został pomyślnie usunięty!');
	}
}
