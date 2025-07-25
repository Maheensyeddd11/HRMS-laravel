<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('payrolls', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained()->onDelete('cascade');
        $table->string('month'); // e.g. "July 2025"
        $table->decimal('basic_salary', 10, 2);
        $table->decimal('allowances', 10, 2)->default(0);
        $table->decimal('deductions', 10, 2)->default(0);
        $table->decimal('net_salary', 10, 2); // auto-calculated
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
