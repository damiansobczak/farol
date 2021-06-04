<?php

namespace App\Http\Controllers;

use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ManageStorageService;
use App\Services\GalleryService;

class RealisationController extends Controller
{
	/**
	 * Request validation function
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'title' => 'required|string|max:255',
			'description' => 'required|string|max:1000',
			'image' => 'nullable|file|mimes:jpg,jpeg,png|max:512',
			'imageAlt' => 'nullable|string|max:255',
			'video' => 'nullable|mimes:mp4|max:2048',
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

		if (isset($realisationValidated['image'])) {
			$realisationValidated['image'] = ManageStorageService::store($request->file('image'), 'realisations');
		}
		if (isset($realisationValidated['gallery'])) {
			$realisationValidated['gallery'] = GalleryService::store($request->file('gallery'), 'realisations');
		}
		if (isset($realisationValidated['video'])) {
			$realisationValidated['video'] = ManageStorageService::store($request->file('video'), 'realisations');
		}

		$realisation = Realisation::create($realisationValidated);
		return redirect()->route('admin.realisations')->with('success', 'Realizacja została pomyślnie utworzona!');
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
	public function update(Request $request, Int $id)
	{
		$realisation = Realisation::findOrFail($id);

		$oldImage = $realisation->image;
		$oldGallery = $realisation->gallery;
		$oldVideo = $realisation->video;

		$realisationValidated = $this->validator($request->all())->validate();

		if (isset($realisationValidated['image'])) {
			$realisationValidated['image'] = ManageStorageService::update($request->file('image'), $oldImage, 'realisations');
		}
		if (isset($realisationValidated['gallery'])) {
			$realisationValidated['gallery'] = GalleryService::update($request->file('gallery'), $oldGallery, 'realisations');
		}
		if (isset($realisationValidated['video'])) {
			$realisationValidated['video'] = ManageStorageService::update($request->file('video'), $oldVideo, 'realisations');
		}

		$realisation->update($realisationValidated);
		return redirect()->route('admin.realisations')->with('success', 'Realizacja została pomyślnie zaktualizowana!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Int $id)
	{
		$realisation = Realisation::findOrFail($id);
		$realisation->delete();
		ManageStorageService::destroy($realisation->image);
		ManageStorageService::destroy($realisation->video);
		GalleryService::destroy($realisation->gallery);
		return redirect()->route('admin.realisations')->with('success', 'Realizacja została pomyślnie usunięta!');
	}
}
