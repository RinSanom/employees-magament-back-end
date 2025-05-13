<?php
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    try {
        $result = DB::select('SELECT 1');
        return response()->json(['message' => '✅ DB connected', 'result' => $result]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
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


