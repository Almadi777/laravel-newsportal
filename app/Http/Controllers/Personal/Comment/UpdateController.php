<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comments;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Comments $comments)
    {
        $data = $request->validated();
        $comments->update($data);
        return redirect()->route('personal.comment.index');
    }
}
