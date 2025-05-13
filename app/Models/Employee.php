<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $table = 'employees.employees';
     public $timestamps = false;
      protected $primaryKey = 'employee_id';
     protected $fillable = [
     'first_name',
     'last_name',
     'email',
     'hire_date',
     'job_title',
     'salary',
     'department_name',
];
}
