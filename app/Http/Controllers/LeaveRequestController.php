<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
  public function index(Request $request)
{
    $query = LeaveRequest::with('employee')->latest();

    if ($request->has('status') && $request->status === 'pending') {
        $query->where('status', 'pending');
    }

    $leaves = $query->get();

    return view('leaves.index', compact('leaves'));
}


public function create()
{
    $employees = Employee::all();
    return view('leaves.create', compact('employees'));
}

public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'leave_type' => 'required',
        'from_date' => 'required|date',
        'to_date' => 'required|date|after_or_equal:from_date',
        'reason' => 'nullable|string',
    ]);

    LeaveRequest::create($request->all());

    return redirect()->route('leaves.index')->with('success', 'Leave requested successfully!');
}

public function edit(LeaveRequest $leave)
{
    $employees = Employee::all();
    return view('leaves.edit', compact('leave', 'employees'));
}

public function update(Request $request, LeaveRequest $leave)
{
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'leave_type' => 'required',
        'from_date' => 'required|date',
        'to_date' => 'required|date|after_or_equal:from_date',
        'reason' => 'nullable|string',
        'status' => 'required|in:pending,approved,rejected',
    ]);

    $leave->update($request->all());

    return redirect()->route('leaves.index')->with('success', 'Leave updated!');
}
}

