<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistitemsController;
use App\Http\Controllers\ChecklistsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('jwt.auth')->group(function () {
    Route::get('checklist', [ChecklistsController::class, 'index']);
    Route::post('checklist', [ChecklistsController::class, 'saveChecklist']);
    Route::delete('checklist/{checklistId}', [ChecklistsController::class, 'deleteChecklist']);

    Route::get('checklist/{checklistId}/item', [ChecklistitemsController::class, 'index']);
    Route::post('checklist/{checklistId}/item', [ChecklistitemsController::class, 'saveItem']);
    Route::get('checklist/{checklistId}/item/{checklistitemId}', [ChecklistitemsController::class, 'getItem']);
    Route::put('checklist/{checklistId}/item/{checklistitemId}', [ChecklistitemsController::class, 'updateStatus']);
    Route::delete('checklist/{checklistId}/item/{checklistitemId}', [ChecklistitemsController::class, 'deleteItem']);
    Route::put('checklist/{checklistId}/rename/{checklistitemId}', [ChecklistitemsController::class, 'renameItem']);

});