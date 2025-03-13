<?php

use DavidLobo\Decomposer\Controllers\DecomposerController;
use Fhsinchy\Inspire\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->middleware('api')
    ->group(function () {
        Route::get('decompose', DecomposerController::class)->name('api.decompose');
    });
