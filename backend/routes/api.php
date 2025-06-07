<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

// 物件一覧取得
Route::get('/getProperties', [PropertyController::class, 'getProperties']);

// 物件更新
Route::put('/properties/{id}', [PropertyController::class, 'updateProperty']);