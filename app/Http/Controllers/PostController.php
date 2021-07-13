<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ManageStorageService;

class PostController extends Controller
{
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'title' => 'required|max:255',
			'description' => 'required|max:2000',
			'image' => 'nullable|file|mimes:jpg,jpeg,png|max:512',
			'imageAlt' => 'nullable|string|max:255',
			'show' => 'nullable|boolean',
			"gallery.*" => "nullable|file|mimes:jpeg,jpg,png|max:512"
		]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::latest()->paginate(10);
		return view('admin.pages.posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.pages.posts.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$postValidated = $this->validator($request->all())->validate();

		if (isset($postValidated['image'])) {
			$postValidated['image'] = ManageStorageService::store($request->file('image'), 'posts');
		}

		if (isset($postValidated['gallery'])) {
			$postValidated['gallery'] = GalleryService::store($request->file('gallery'), 'posts');
		}

		$post = Post::create($postValidated);
		return redirect()->route('admin.posts')->with('success', 'Post został pomyślnie utworzony!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Post $post)
	{
		return view('admin.pages.posts.form', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Int $id)
	{
		$post = Post::findOrFail($id);
		return view('admin.pages.posts.form', compact('post'));
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
		$post = Post::findOrFail($id);
		$postValidated = $this->validator($request->all())->validate();

		if (isset($postValidated['image'])) {
			$postValidated['image'] = ManageStorageService::update($request->file('image'), $post->image, 'posts');
		}

		if (isset($postValidated['gallery'])) {
			$postValidated['gallery'] = GalleryService::update($request->file('gallery'), $post->gallery, 'posts');
		}

		$post->update($postValidated);
		return redirect()->route('admin.posts')->with('success', 'Post został pomyślnie zaktualizowany!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Int $id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		ManageStorageService::destroy($post->image);
		GalleryService::destroy($post->gallery);
		return redirect()->route('admin.posts')->with('success', 'Post został pomyślnie usunięty!');
	}
}
