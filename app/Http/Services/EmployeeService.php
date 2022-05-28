<?php

namespace App\Http\Services;

use App\Models\Employee;

class EmployeeService
{
    public static function createNewEmployee($data)
    {
        return Employee::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'telephone'     => $data['telephone'],
            'joined_date'   => $data['joined_date'],
            'working_route' => $data['working_route'],
            'reporting_to'  => auth()->id(),
        ]);
    }

    public static function updateEmployee(Employee $employee, $data): bool
    {
        return $employee->update([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'telephone'     => $data['telephone'],
            'joined_date'   => $data['joined_date'],
            'working_route' => $data['working_route'],
            'reporting_to'  => auth()->id(),
        ]);
    }

    public static function deleteEmployee(Employee $employee): ?bool
    {
        return $employee->delete();
    }
}
