<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\LeaveRequest;
use App\Models\Attendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $pendingLeaves = LeaveRequest::where('status', 'pending')->count();
        $todayAttendance = Attendance::whereDate('date', Carbon::today())->count();

        return view('dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'pendingLeaves',
            'todayAttendance'
        ));
    }
}
