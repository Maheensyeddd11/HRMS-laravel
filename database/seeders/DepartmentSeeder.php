<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
   
    \App\Models\Department::insert([
        ['name' => 'HR'],
        ['name' => 'Finance'],
        ['name' => 'IT'],
        ['name' => 'Marketing'],
        ['name' => 'Operations'],
        ['name' => 'Sales'],
        ['name' => 'Customer Support'],
        ['name' => 'Research and Development'],
        ['name' => 'Legal'],
        ['name' => 'Procurement'],
        ['name' => 'Administration'],
        ['name' => 'Engineering'],
        ['name' => 'Quality Assurance'],
        ['name' => 'Logistics'],
        ['name' => 'Design'],
        ['name' => 'Training'],
        ['name' => 'Security'],
        ['name' => 'Product Management'],
    ]);
}


}
