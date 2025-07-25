<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveRequest;

class LeaveRequestSeeder extends Seeder
{
    public function run(): void
    {
        LeaveRequest::factory(30)->create();
    }
}
