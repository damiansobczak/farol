<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ManageImgStorageController;

class RealisationController extends Controller
{
	/**
	 * Request validation function
	 */
	protected function validator($data)
	{
		return Validator::make($data, [
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'image' => 'required|image|mimes:jpeg,jpg,png|max:512',
			'video' => 'nullable|mimes:mp4|max:2048',
			'imageAlt' => 'nullable|string|max:255',
			'gallery.*' => 'nullable|mimes:jpeg,jpg,png|max:256',
			'seoTitle' => 'nullable|string|max:255',
			'seoDescription' => 'nullable|string|max:255',
			'ogTitle' => 'nullable|string|max:255',
			'ogDescription' => 'nullable|string|max:255'
		]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$realisations = Realisation::latest()->get();
		return view('admin.pages.realisations.index', compact('realisations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.pages.realisations.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$realisationValidated = $this->validator($request->all())->validate();
		$realisationValidated['image'] = ManageImgStorageController::store($request->file('image'), 'realisations');
		$realisationValidated['video'] = ManageImgStorageController::store($request->file('video'), 'realisations');

		if (isset($realisationValidated['gallery'])) {
			$paths = [];
			foreach ($realisationValidated['gallery'] as $key => $file) {
				$paths[$key] = ManageImgStorageController::store($file, 'realisations');
			}
			$paths = json_encode($paths);
			$realisationValidated['gallery'] = $paths;
		}

		$realisation = Realisation::create($realisationValidated);

		session()->flash('success', 'Realizacja została pomyślnie utworzona!');

		return redirect(route('admin.realisations.edit', $realisation->id));
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
		$realisation = Realisation::findOrFail($id);
		return view('admin.pages.realisations.form', compact('realisation'));
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
		$realisation = Realisation::findOrFail($id);

		$oldImage = $realisation->image;
		$oldVideo = $realisation->video;
		$oldGallery = $realisation->gallery;

		$realisationValidated = $this->validator($request->all())->validate();
		$realisationValidated['image'] = ManageImgStorageController::update($request->file('image'), $oldImage, 'realisations');
		$realisationValidated['video'] = ManageImgStorageController::update($request->file('video'), $oldVideo, 'realisations');
		if (isset($realisationValidated['gallery'])) {
			$paths = [];
			foreach ($realisationValidated['gallery'] as $key => $file) {
				$paths[$key] = ManageImgStorageController::store($file, 'realisations');
			}
			$paths = json_encode($paths);
			$realisationValidated['gallery'] = $paths;
			if($realisation->gallery) {
				foreach (json_decode($oldGallery) as $gImg) {
					ManageImgStorageController::destroy($gImg);
				}
			}
		}

		$realisation->update($realisationValidated);

		return back()->with('success', 'Realizacja została pomyślnie zaktualizowana!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$realisation = Realisation::findOrFail($id);
		$realisation->delete();
		ManageImgStorageController::destroy($realisation->image);
		ManageImgStorageController::destroy($realisation->video);
		if($realisation->gallery) {
			foreach (json_decode($realisation->gallery) as $gImg) {
				ManageImgStorageController::destroy($gImg);
			}
		}

		return redirect(route('admin.realisations'))->with('success', 'Realizacja została pomyślnie usunięta!');
	}
}
