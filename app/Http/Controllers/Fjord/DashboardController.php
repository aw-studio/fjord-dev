<?php

namespace App\Http\Controllers\Fjord;

use Illuminate\Http\Request;
use AwStudio\Fjord\Fjord\Controllers\DashboardController as Controller;
use AwStudio\Fjord\Support\Facades\FjordRoute;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('fjord::app')->component('fj-dashboard');
    }
}
