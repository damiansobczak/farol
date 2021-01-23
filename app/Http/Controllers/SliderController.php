<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ManageImgStorageController;

class SliderController extends Controller
{
	/**
	 * Request validation function
	 */
	protected function validator($data)
	{
		return Validator::make($data, [
			'title' => 'nullable|string|max:255',
			'description' => 'nullable|string|max:255',
			'actionName' => 'nullable|string|max:255',
			'actionLink' => 'nullable|string|max:255',
			'image' => 'nullable|image|max:512',
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

		$sliderValidated['image'] = ManageImgStorageController::store($request->file('image'), 'sliders');
		$sliderValidated['onlyImage'] = ManageImgStorageController::store($request->file('onlyImage'), 'sliders');

		$slider = Slider::create($sliderValidated);

		session()->flash('success', 'Baner został pomyślnie utworzony!');

		return redirect(route('admin.sliders.edit', $slider->id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
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
	public function update(Request $request, $id)
	{
		$slider = Slider::findOrFail($id);

		$oldImage = $slider->image;
		$oldOnlyImage = $slider->onlyImage;

		$sliderValidated = $this->validator($request->all())->validate();

		$sliderValidated['image'] = ManageImgStorageController::update($request->file('image'), $oldImage, 'sliders');
		$sliderValidated['onlyImage'] = ManageImgStorageController::update($request->file('onlyImage'), $oldOnlyImage, 'sliders');

		$slider->update($sliderValidated);

		return back()->with('success', 'Baner został pomyślnie zaktualizowany!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$slider = Slider::findOrFail($id);

		$slider->delete();

		ManageImgStorageController::destroy($slider->image);
		ManageImgStorageController::destroy($slider->onlyImage);

		return redirect(route('admin.sliders'))->with('success', 'Baner został pomyślnie usunięty!');
	}
}
