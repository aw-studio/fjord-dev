<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use FjordApp\Config\Navigation;
use App\Models\Article;
use App\Models\Employee;

class TestController extends Controller
{
    public function __invoke()
    {

        $query = Employee::with('department')
            ->with('projects')
            ->withCount('projects');

        dd((new Employee())->department()->getRelated());


        $config = fjord()->config('navigation');
        dd($config->topbar);
        //$config = Project::config();

        dd(collect($config->get('form')));

        dd($config->topbar);
        $nav = (new Navigation);
        dump($nav->all());
    }
}
