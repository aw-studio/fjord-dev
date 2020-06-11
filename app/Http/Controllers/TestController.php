<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Fjord\Support\Facades\Form;

class TestController extends Controller
{
    public function __invoke()
    {
        $comment = Comment::first();

        dd($comment->commentable);

        $query = $comment->commentable();
        //dd($comment->commentable);

        dd($query->getResultsByType(Project::class)->get());
    }
}
