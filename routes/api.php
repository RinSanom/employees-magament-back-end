<?php
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to the Employee Management API',
    ]);
});

Route::get('/employee-number', [EmployeeController::class, 'countEmployees']);
Route::get('/department-numer', [DepartmentController::class, 'departmentCount']);
Route::get('/employees', [EmployeeController::class, 'getAllEmployees']);
Route::get('/departments', [DepartmentController::class, 'getAllDepartments']);
Route::post('/add-employee', [EmployeeController::class, 'addEmployee']);
Route::delete('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee']);
Route::get('/employees/search', [EmployeeController::class, 'search']);
Route::get('/employees/{id}', [EmployeeController::class, 'getEmployeeById']);
Route::patch('/update-employee/{id}', [EmployeeController::class, 'updateEmployee']);

