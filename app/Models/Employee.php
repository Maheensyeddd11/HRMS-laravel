<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

   protected $fillable = [
    'name',
    'email',
    'phone',
    'department_id',
    'designation_id',
    'join_date', // ✅ add this
];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    } 
    public function attendances()
{
    return $this->hasMany(Attendance::class);
}
public function leaveRequests()
{
    return $this->hasMany(LeaveRequest::class);
}
public function payrolls()
{
    return $this->hasMany(Payroll::class);
}



}

