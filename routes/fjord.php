<?php

use App\Fjord\Controllers\Crud\ProjectController;

$route = Route::get('/', \App\Http\Controllers\Fjord\DashboardController::class)->name('dashboard');

$route = Route::get('/example', \App\Http\Controllers\Fjord\ExampleController::class)->name('example');

Route::resource('/test/employees', \App\Http\Controllers\EmployeeTestController::class)->only([
    'store', 'update', 'destroy'
]);

Route::resource('crud/projects', ProjectController::class);
Route::post('crud/projects/index', [ProjectController::class, 'indexTable']);
