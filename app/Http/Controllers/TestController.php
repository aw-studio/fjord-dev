<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Fjord\Config\Navigation;
use App\Models\Article;

class TestController extends Controller
{
    public function __invoke()
    {
        $config = fjord()->config('crud.comment');
        dd($config);
        //$config = Project::config();

        dd(collect($config->get('form')));

        dd($config->topbar);
        $nav = (new Navigation);
        dump($nav->all());
    }
}
