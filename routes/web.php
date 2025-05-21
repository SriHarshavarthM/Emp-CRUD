<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Correct routing
Route::get('/add-emp', [EmployeeController::class, 'addemp']);
Route::post('/save-employee', [EmployeeController::class, 'save_employee'])->name('employee.store');
Route::get('/emplist', [EmployeeController::class, 'index']);
Route::get('/edit-emp/{id}', [EmployeeController::class, 'editemp']);
Route::get('/update-emp/{id}', [EmployeeController::class, 'update_employee']);
Route::get('/delete-emp/{id}',[EmployeeController::class, 'delete_employee']);


