<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Fjord\Support\Facades\Form;

class TestController extends Controller
{
    public function __invoke()
    {

        $form = Form::load('fields', 'wysiwyg');

        return $form->text;
    }
}
