<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('nome')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $employee = new Employee();
        $shifts = ['Manhã', 'Tarde', 'Noite'];
        return view('employees.create', compact('employee', 'shifts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:150',
            'cargo' => 'required|string|max:100',
            'turno' => 'required|in:Manhã,Tarde,Noite',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Funcionário(a) criado(a) com sucesso!');
    }

    public function edit(Employee $employee)
    {
        $shifts = ['Manhã', 'Tarde', 'Noite'];
        return view('employees.edit', compact('employee', 'shifts'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:150',
            'cargo' => 'required|string|max:100',
            'turno' => 'required|in:Manhã,Tarde,Noite',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Funcionário(a) atualizado(a) com sucesso!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Funcionário(a) removido(a) com sucesso!');
    }
}