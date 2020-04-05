<?php

namespace App\Http\Controllers\Fjord;

use Illuminate\Http\Request;
use Fjord\Fjord\Controllers\DashboardController as Controller;
use Fjord\Support\Facades\FjordRoute;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('fjord::app')->component('fj-dashboard');
    }
}
