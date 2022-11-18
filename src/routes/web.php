<?php

use Fhsinchy\Inspire\Controllers\InspirationController;
use Illuminate\Support\Facades\Route;

Route::get('inspire', InspirationController::class)->name('pluginIndex');
Route::post('inspire', [InspirationController::class,'add']);