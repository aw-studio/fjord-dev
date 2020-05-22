<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fjord\Support\Facades\Form;

class PageController extends Controller
{
    public function home(Request $request)
    {
        return view('home')->with([
            'data' => Form::load('pages', 'home');
        ]);
    }
}
