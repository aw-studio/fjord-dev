<?php

namespace App\Http\Controllers\Fjord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AwStudio\EloquentJs\EloquentJs;
use App\Models\Employee;

class ExampleController extends Controller
{
    public function __invoke(Request $request)
    {
        $employee = Employee::with('department')->first();
        $employees = Employee::limit(10)->with('department')->get();

        return view('fjord::app')
            ->withComponent('example')
            ->withProps([
                'title' => 'Component Title',
                'eloquent' => [
                    'employees' => with(new EloquentJs('test/employees', $employees))->toArray()
                ],
            ]);
    }
}
