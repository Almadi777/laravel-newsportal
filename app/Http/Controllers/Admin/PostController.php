<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Service\PostService;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts =  Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('category', 'tags'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $category = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'category', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        $post->update($data);
        $post->tags()->sync($tagIds);
        return view('admin.post.show', compact('post'));
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        try {
            $tagIds = $data['tag_ids'];
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::create($data);
            $post->tags()->attach($tagIds);
        } catch (\Exception $exception) {
            abort(404);
        }
        return redirect()->route('admin.post.index');
    }
}
