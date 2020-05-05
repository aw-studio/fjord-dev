<?php

namespace App\Http\Controllers;

use Fjord\Support\Facades\Form;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.home')->with([
            'formFields' => Form::load('pages', 'home')
        ]);
    }
}
