<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

// 物件一覧取得
Route::get('/properties', [PropertyController::class, 'getProperties']);
// 物件更新
Route::put('/properties/{id}', [PropertyController::class, 'updateProperty']);
// 物件登録
Route::post('/properties', [PropertyController::class, 'createProperty']);
// 物件削除
Route::delete('/properties/{id}', [PropertyController::class, 'deleteProperty']);
