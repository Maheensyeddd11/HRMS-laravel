<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
  public function up(): void
{
    Schema::table('payrolls', function (Blueprint $table) {
        $table->date('pay_date')->after('net_salary')->nullable();
    });
}

public function down(): void
{
    Schema::table('payrolls', function (Blueprint $table) {
        $table->dropColumn('pay_date');
    });
}

};
