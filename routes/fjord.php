<?php

$route = Route::get('/', \App\Http\Controllers\Fjord\DashboardController::class)->name('dashboard');

$route = Route::get('/example', \App\Http\Controllers\Fjord\ExampleController::class)->name('example');

Route::resource('/test/employees', \App\Http\Controllers\EmployeeTestController::class)->only([
    'store', 'update', 'destroy'
]);
