<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['prefix' => 'task'],
    function () {
        Route::get('/', [TaskController::class, 'getTasks']);
        Route::post('/', [TaskController::class, 'createTask']);
        Route::put('/', [TaskController::class, 'updateTask']);
        Route::delete('/{id}', [TaskController::class, 'deleteTask']);
        Route::get('/search', [TaskController::class, 'searchTask']);
    }
);

