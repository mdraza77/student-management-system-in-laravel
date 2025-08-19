<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);

Route::get('/students/trashed', [StudentController::class, 'trash'])->name('students.trashed');

Route::post('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');

// Route to handle the permanent delete action
Route::delete('/students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.forceDelete');
