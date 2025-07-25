<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;
use App\Models\Designation;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'department_id' => Department::inRandomOrder()->first()->id ?? 1,
            'designation_id' => Designation::inRandomOrder()->first()->id ?? 1,
            'join_date' => $this->faker->date(), // ✅ Add this line
        ];
    }
}
