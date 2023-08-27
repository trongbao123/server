<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MatrixController;
use App\Http\Controllers\MatrixCellController;

Route::get('/matrices', [MatrixController::class, 'getMatrices']);
Route::get('/matrices/{id}', [MatrixController::class, 'getDetailsMatrix']);
Route::post('/matrices', [MatrixController::class, 'createMatrix']);
Route::put('/matrices/{id}', [MatrixController::class, 'updateMatrix']);
Route::delete('/matrices/{id}', [MatrixController::class, 'destroy']);

Route::get('/matrix-cells', [MatrixCellController::class, 'getMatricCell']);
Route::get('/matrix-cells/{id}', [MatrixCellController::class, 'getDetailsMactricCell']);
Route::post('/matrix-cells', [MatrixCellController::class, 'createMatricCell']);
Route::put('/matrix-cells/{id}', [MatrixCellController::class, 'updateMatricCell']);
Route::delete('/matrix-cells/{id}', [MatrixCellController::class, 'deleteMatricCell']);
