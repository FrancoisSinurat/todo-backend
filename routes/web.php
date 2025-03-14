<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::put('/tasks/{task}', [TaskController::class, 'update']);
