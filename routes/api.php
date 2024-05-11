<?php

use App\Http\Controllers\UrmsuserController;

Route::post('/Urmsusers', [UrmsuserController::class, 'store']);
Route::get('/Urmsusers', [UrmsuserController::class, 'index']);   // Read all
Route::get('/Urmsusers/{id}', [UrmsuserController::class, 'show']); // Read single
Route::put('/Urmsusers/{id}', [UrmsuserController::class, 'update']); // Update
Route::delete('/Urmsusers/{id}', [UrmsuserController::class, 'destroy']); // Delete

?>
