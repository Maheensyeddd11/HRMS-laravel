<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->foreignId('department_id')->constrained()->onDelete('cascade');
        $table->foreignId('designation_id')->constrained()->onDelete('cascade');
        $table->date('joining_date');
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();
    });
}


    
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
