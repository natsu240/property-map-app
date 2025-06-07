<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

// 物件一覧取得
Route::get('/getProperties', [PropertyController::class, 'getProperties']);
// 物件更新
Route::put('/property/{id}', [PropertyController::class, 'updateProperty']);
// 物件登録
Route::post('/createProperties', [PropertyController::class, 'createProperty']);
