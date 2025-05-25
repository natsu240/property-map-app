<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::get('/getProperties', [PropertyController::class, 'getProperties']);