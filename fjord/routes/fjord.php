<?php

Route::get('/test', function () {
    dd(__('fjord//Users/helen/git/fjord-dev/fjord/resources/lang/::base.test'));
});

$route = Route::get('/', FjordApp\Controllers\DashboardController::class)->name('dashboard');
