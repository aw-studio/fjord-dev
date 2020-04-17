<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Fjord\Config\Navigation;

class TestController extends Controller
{
    public function __invoke()
    {
        $config = fjord()->config('navigation');


        $config = Project::config();

        dd(collect($config->select('index'))->toJson());

        dd($config->topbar);
        $nav = (new Navigation);
        dump($nav->all());
    }
}
