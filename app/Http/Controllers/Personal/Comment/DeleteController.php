<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comments;

class DeleteController extends Controller
{
    public function __invoke(Comments $comments)
    {
        $comments->delete();
        return redirect()->route('personal.comment.index');
    }
}
