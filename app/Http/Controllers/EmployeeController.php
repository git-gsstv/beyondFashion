<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $employee = new Employee();
        
        $turnos = ['Manhã', 'Tarde', 'Noite', 'Integral']; 
        
        return view('employees.create', compact('employee', 'turnos'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        Employee::create($request->validated());

        return redirect()->route('employees.index')->with('success', 'Funcionário criado com sucesso!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $turnos = ['Manhã', 'Tarde', 'Noite', 'Integral']; 
        
        return view('employees.edit', compact('employee', 'turnos'));
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('employees.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Funcionário excluído com sucesso!');
    }
}