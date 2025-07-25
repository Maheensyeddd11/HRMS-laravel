<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
 public function up(): void
{
    Schema::table('payrolls', function (Blueprint $table) {
        $table->integer('bonus')->after('basic_salary')->nullable();
    });
}

public function down(): void
{
    Schema::table('payrolls', function (Blueprint $table) {
        $table->dropColumn('bonus');
    });
}

};
