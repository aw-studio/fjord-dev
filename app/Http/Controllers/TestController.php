<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use FjordApp\Config\Navigation;
use App\Models\Article;
use App\Models\Employee;
use Fjord\Application\Translation\i18nGenerator;

class TestController extends Controller
{
    public function __invoke()
    {
        $component = component('fj-crud-index');

        $component->prop('test', 1);
        $component->slot('abc', component('fj-crud-index'));

        dd($component->toArray());
    }
}
