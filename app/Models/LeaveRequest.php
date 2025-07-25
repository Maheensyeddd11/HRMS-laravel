<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

  protected $fillable = [
    'employee_id',
    'leave_type',
    'from_date',
    'to_date',
    'reason',
    'status',
];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
