<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition(): array
    {
        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'date' => now()->subDays(rand(0, 29))->format('Y-m-d'),
            'status' => $this->faker->randomElement(['present', 'absent', 'leave']),
        ];
    }
}
