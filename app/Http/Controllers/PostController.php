<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostSEO;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'image' => 'nullable|image|max:512',
            'imageAlt' => 'nullable|string|max:255',
            'show' => 'nullable|boolean',
            'seoTitle' => 'nullable|max:255',
            'seoDescription' => 'nullable|max:600',
            'ogTitle' => 'nullable|string|max:255',
            'ogDescription' => 'nullable|string|max:600'
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
        return view('admin.pages.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts.create');
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
            $file = $request->file('image')->store('posts');
            $postValidated['image'] = $file;
        }

        $post = Post::create($postValidated);

        $postValidated = Arr::add($postValidated, 'postId', $post->id);

        $postSeo = PostSEO::create($postValidated);

        session()->flash('success', 'Post został pomyślnie utworzony!');

        return redirect(route('admin.posts.edit', $post->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.pages.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.pages.posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $oldImage = $post->image;

        $postValidated = $this->validator($request->all())->validate();

        if (isset($postValidated['image'])) {
            $file = $request->file('image')->store('posts');
            $postValidated['image'] = $file;
            Storage::delete($oldImage);
        }

        $post->update($postValidated);

        $postSeo = PostSEO::where('postId', $id)->first();

        if ($postSeo) {
            $postSeo->update($postValidated);
        } else {
            $postValidated = Arr::add($postValidated, 'postId', $post->id);
            $postsSEO = PostSEO::create($postValidated);
        }

        return back()->with('success', 'Post został pomyślnie zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        if ($post->image) {
            Storage::delete($post->image);
        }

        return redirect(route('admin.posts'))->with('success', 'Post został pomyślnie usunięty!');
    }
}
