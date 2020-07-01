<?php

namespace App\Http\Controllers;

use Fjord\Support\Facades\Form;

class TestController extends Controller
{
    public function __invoke()
    {
        $list = Form::load('fields', 'list');
        dd($list->list()->getFlat());
    }
}
