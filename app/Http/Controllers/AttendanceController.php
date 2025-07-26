<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date ?? now()->format('Y-m-d');

        $employees = Employee::with(['attendances' => function ($query) use ($date) {
            $query->whereDate('date', $date);
        }])->get();

        return view('attendance.index', [
        'employees' => $employees,
        'date' => $date,
        ]);
    }
  public function create(Request $request)
{
    $employees = Employee::all();
    $date = $request->date ?? now()->format('Y-m-d');

    return view('attendance.create', [
        'employees' => $employees,
        'date' => $date,
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,leave',
        ]);

        Attendance::updateOrCreate(
            [
                'employee_id' => $request->employee_id,
                'date' => $request->date,
            ],
            [
                'status' => $request->status,
            ]
        );

        return redirect()->route('attendance.index')->with('success', 'Attendance marked!');
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,leave',
        ]);

        $duplicate = Attendance::where('employee_id', $request->employee_id)
            ->where('date', $request->date)
            ->where('id', '!=', $attendance->id)
            ->first();

        if ($duplicate) {
            return redirect()->back()->withErrors(['date' => 'This employee already has an attendance record for this date.'])->withInput();
        }

        $attendance->update($request->only('employee_id', 'date', 'status'));

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully!');
    }
    
}
