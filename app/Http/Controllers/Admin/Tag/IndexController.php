<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags =  Category::all();
        return view('admin.tag.index', compact('tags'));
    }
}
