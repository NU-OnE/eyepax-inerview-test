<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Services\EmployeeService;
use App\Http\Traits\WorkingRouteTrait;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    use WorkingRouteTrait;

    public function index()
    {
        $my_employees = Auth::user()->employees;
        return view('employee.index', compact('my_employees'));
    }

    public function create()
    {
        $working_routes = $this->getAllWorkingRoutes();
        return view('employee.create', compact('working_routes'));
    }

    public function store(EmployeeRequest $request)
    {
        EmployeeService::createNewEmployee($request->all());
        Session::flash('success', 'Successfully added!');
        return redirect(route('employees.index'));
    }

    public function show(Employee $employee)
    {
        return view('employee.partial.view', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $working_routes = $this->getAllWorkingRoutes();
        return view("employee.edit", compact('employee', 'working_routes'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        EmployeeService::updateEmployee($employee, $request->all());
        Session::flash('success', 'Successfully updated!');
        return redirect(route('employees.index'));
    }

    public function destroy(Employee $employee)
    {
        EmployeeService::deleteEmployee($employee);
        Session::flash('success', 'Successfully deleted!');
        return redirect(route('employees.index'));
    }
}
