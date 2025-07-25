<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Employee;

class PayrollController extends Controller
{
        public function destroy(Payroll $payroll)
        {
            $payroll->delete();

            return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully.');
        }

        public function show(Payroll $payroll)
        {
            return view('payrolls.show', compact('payroll'));
        }

        public function index()
        {
            $payrolls = Payroll::with('employee')->latest()->get();
            return view('payrolls.index', compact('payrolls'));
        }

        public function create()
        {
            $employees = Employee::all();
            return view('payrolls.create', compact('employees'));
        }

        public function store(Request $request)
        {
            $validated = $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'month' => 'required|date_format:Y-m',
                'basic_salary' => 'required|numeric',
                'allowances' => 'nullable|numeric',
                'deductions' => 'nullable|numeric',
            ]);

            $netSalary = $validated['basic_salary'] + ($validated['allowances'] ?? 0) - ($validated['deductions'] ?? 0);

            Payroll::create([
                'employee_id' => $validated['employee_id'],
                'month' => $validated['month'], // ✅ THIS IS MISSING IN YOUR ERROR CASE
                'basic_salary' => $validated['basic_salary'],
                'allowances' => $validated['allowances'] ?? 0,
                'deductions' => $validated['deductions'] ?? 0,
                'net_salary' => $netSalary,
            ]);

            return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully!');
        }


        public function edit(Payroll $payroll)
        {
            $employees = Employee::all();
            return view('payrolls.edit', compact('payroll', 'employees'));
        }

        public function update(Request $request, Payroll $payroll)
        {
            $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'month' => 'required',
                'basic_salary' => 'required|numeric|min:0',
                'allowances' => 'nullable|numeric|min:0',
                'deductions' => 'nullable|numeric|min:0',
            ]);

            $net_salary = $request->basic_salary + $request->allowances - $request->deductions;

            $payroll->update([
                'employee_id' => $request->employee_id,
                'month' => $request->month,
                'basic_salary' => $request->basic_salary,
                'allowances' => $request->allowances,
                'deductions' => $request->deductions,
                'net_salary' => $net_salary,
            ]);

            return redirect()->route('payrolls.index')->with('success', 'Payroll updated!');
        }
}
