<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke()
    {
        return view('admin.categories.create');
    }
}
