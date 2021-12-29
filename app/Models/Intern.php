<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $table = "interns";
    protected $primaryKey = "intern_id";
    protected $fillable = [
        'intern_id', 'user_id','intern_name', 'department_id', 'intern_email', 'intern_phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payslips()
    {
        return $this->hasMany(Payslip::class);
    }

    public function applyLeaves()
    {
        return $this->hasMany(ApplyLeave::class);
    }

    public function jobApplications()
    {
        return $this->hasOne(JobApplication::class);
    }

    public function internDetails()
    {
        return $this->hasOne(InternDetail::class);
    }

    public function assignTasks()
    {
        return $this->hasMany(AssignTask::class);
    }

    public function submitTasks()
    {
        return $this->hasMany(submitTasks::class);
    }
}
