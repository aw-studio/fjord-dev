<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Fjord\Support\Facades\Form;

class TestController extends Controller
{
    public function __invoke()
    {
        $data = Form::load('pages', 'home');
        dd($data->image[0]->getFullUrl());
        dd($data->image[1]->getFullUrl());
        dd(Comment::where('id', 25)->first()->commentable()->getResults());
    }
}
