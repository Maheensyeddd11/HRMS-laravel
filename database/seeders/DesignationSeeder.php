<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;
use App\Models\Department;

class DesignationSeeder extends Seeder
{
    public function run(): void
    {
        $departmentId = Department::first()->id;

        Designation::insert([
            ['name' => 'Manager', 'department_id' => $departmentId],
            ['name' => 'Developer', 'department_id' => $departmentId],
            ['name' => 'Designer', 'department_id' => $departmentId],
            ['name' => 'Analyst', 'department_id' => $departmentId],
        ]);
    }
}
