<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::create('leave_requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained()->onDelete('cascade');
        $table->date('start_date'); 
        $table->date('end_date');   
        $table->string('reason');   
        $table->string('status')->default('pending'); 
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
