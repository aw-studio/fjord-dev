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
        $config = fjord()->config('test', Article::class);




        $config = Project::config();

        dd(collect($config->select('index'))->toJson());

        dd($config->topbar);
        $nav = (new Navigation);
        dump($nav->all());
    }
}
