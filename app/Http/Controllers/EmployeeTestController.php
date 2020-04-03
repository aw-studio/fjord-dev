<?php

namespace App\Http\Controllers;

use AwStudio\EloquentJs\EloquentJsController;
use Illuminate\Http\Request;

class EmployeeTestController extends EloquentJsController
{
    protected $model = \App\Models\Employee::class;
}
