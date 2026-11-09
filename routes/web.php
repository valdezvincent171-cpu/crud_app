<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', fn () => redirect('/students'));
Route::resource('students', StudentController::class);