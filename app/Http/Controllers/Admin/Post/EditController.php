<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $category = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'category', 'tags'));
    }
}
