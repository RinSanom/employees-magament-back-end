<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  public function countEmployees(){
    $countEmployees = Employee::count();
    return response()->json($countEmployees);
} 
public function getAllEmployees() {
    $employees = Employee::all();
    return response()->json($employees);
}
public function addEmployee(Request $request)
{
    try {
        $employee = new Employee();
        $employee->employee_id ;
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->hire_date = $request->input('hire_date');
        $employee->job_title = $request->input('job_title');
        $employee->salary = $request->input('salary');
        $employee->department_name = $request->input('department_name');
        $employee->save();
        return response()->json(['message' => 'Employee added successfully']);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error occurred',
            'error' => $e->getMessage(),
        ], 500);
    }
}
public function deleteEmployee($id)
{
    try {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error occurred',
            'error' => $e->getMessage(),
        ], 500);
    }
}
public function search(Request $request)
{
    $keyword = $request->query('name');
    $employees = Employee::where('first_name', 'ILIKE', "%$keyword%")
        ->orWhere('last_name', 'ILIKE', "%$keyword%")
        ->get();
    return response()->json($employees);
}
public function updateEmployee(Request $request, $id)
{
    try {
        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->hire_date = $request->input('hire_date');
        $employee->job_title = $request->input('job_title');
        $employee->salary = $request->input('salary');
        $employee->department_name = $request->input('department_name');
        $employee->save();
        return response()->json(['message' => 'Employee updated successfully']);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error occurred',
            'error' => $e->getMessage(),
        ], 500);
    }
}
}
