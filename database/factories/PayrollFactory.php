<?php

namespace Database\Factories;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class PayrollFactory extends Factory
{
    protected $model = Payroll::class;

    public function definition(): array
    {
        $employee = Employee::inRandomOrder()->first();

        // Safety check: if no employees exist, skip
        if (!$employee) {
            throw new \Exception("No employees found. Seed employees first before running payroll factory.");
        }

        $basic = $this->faker->numberBetween(30000, 80000);
        $bonus = $this->faker->numberBetween(1000, 10000);
        $deductions = $this->faker->numberBetween(500, 5000);

        return [
            'employee_id' => $employee->id,
            'basic_salary' => $basic,
            'bonus' => $bonus,
            'deductions' => $deductions,
            'net_salary' => ($basic + $bonus - $deductions),
            'pay_date' => $this->faker->date(),
             'month' => $this->faker->monthName,
        ];
    }
}
