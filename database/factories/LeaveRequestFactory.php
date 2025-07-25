<?php

namespace Database\Factories;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaveRequestFactory extends Factory
{
    protected $model = LeaveRequest::class;
    
public function definition(): array
{
    $from = $this->faker->dateTimeBetween('-1 month', 'now');
    $to = (clone $from)->modify('+'.rand(1, 5).' days');

    return [
        'employee_id' => \App\Models\Employee::inRandomOrder()->first()->id,
        'from_date' => $from->format('Y-m-d'),   // ✅ match DB column
        'to_date' => $to->format('Y-m-d'),       // ✅ match DB column
        'reason' => $this->faker->sentence,
        'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        'leave_type' => $this->faker->randomElement(['casual', 'sick', 'emergency']),
    ];
}


}
