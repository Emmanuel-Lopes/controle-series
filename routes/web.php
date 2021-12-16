<?php

use App\Http\Controllers\SeriesController;

Route::get('/series', [SeriesController::class, 'index']) ->name('listar_series');

Route::get('/series/addnew', [SeriesController::class, 'newseries']) ->name('form_criar_serie');

Route::post('/series/addnew', [SeriesController::class, 'store']);

Route::delete('/series/remover/{id}', [SeriesController::class, 'delete']);