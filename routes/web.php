<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployeePanelController;
use App\Models\Department;

Route::view('/reports/monthly', 'reports.monthly')->name('reports.monthly');
Route::view('/reports/annual', 'reports.annual')->name('reports.annual');
Route::view('/reports/logs', 'reports.logs')->name('reports.logs');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Employees
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // Attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/mark', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/attendance/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
    Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::delete('/attendance/{attendance}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');

   // Leaves
Route::get('/leaves', [LeaveRequestController::class, 'index'])->name('leaves.index');
Route::get('/leaves/create', [LeaveRequestController::class, 'create'])->name('leaves.create');
Route::post('/leaves', [LeaveRequestController::class, 'store'])->name('leaves.store');

Route::get('/leaves/{leave}/edit', [LeaveRequestController::class, 'edit'])->name('leaves.edit');
Route::put('/leaves/{leave}', [LeaveRequestController::class, 'update'])->name('leaves.update');

Route::put('/leaves/{leave}/status', [LeaveRequestController::class, 'updateStatus'])->name('leaves.updateStatus');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    // Designations
    Route::get('/designations', [DesignationController::class, 'index'])->name('designations.index');
    Route::get('/designations/create', [DesignationController::class, 'create'])->name('designations.create');
    Route::post('/designations', [DesignationController::class, 'store'])->name('designations.store');
    Route::get('/designations/{designation}/edit', [DesignationController::class, 'edit'])->name('designations.edit');
    Route::put('/designations/{designation}', [DesignationController::class, 'update'])->name('designations.update');
    Route::delete('/designations/{designation}', [DesignationController::class, 'destroy'])->name('designations.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Payrolls
Route::get('/payroll', [PayrollController::class, 'index'])->name('payrolls.index');
Route::get('/payroll/create', [PayrollController::class, 'create'])->name('payrolls.create');
Route::post('/payroll', [PayrollController::class, 'store'])->name('payrolls.store');
Route::get('/payroll/{payroll}', [PayrollController::class, 'show'])->name('payrolls.show'); 
Route::get('/payroll/{payroll}/edit', [PayrollController::class, 'edit'])->name('payrolls.edit');
Route::put('/payroll/{payroll}', [PayrollController::class, 'update'])->name('payrolls.update');
Route::delete('/payroll/{payroll}', [PayrollController::class, 'destroy'])->name('payrolls.destroy');




require __DIR__.'/auth.php';
