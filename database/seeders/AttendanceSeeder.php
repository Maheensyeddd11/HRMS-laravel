<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();
        $statuses = ['present', 'absent', 'leave'];

        foreach (range(1, 100) as $i) {
            $employee = $employees->random();
            $date = now()->subDays(rand(0, 29))->format('Y-m-d');

            // Avoid duplicate records for same employee + date
            if (Attendance::where('employee_id', $employee->id)->where('date', $date)->exists()) {
                continue;
            }

            Attendance::create([
                'employee_id' => $employee->id,
                'date' => $date,
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
