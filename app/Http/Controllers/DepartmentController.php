<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function departmentCount()
    {
        $departmentCount = Department::count();
        return response()->json($departmentCount);
    }
    public function getAllDepartments()
    {
        $departments = Department::all();
        return response()->json($departments);
    }
}
