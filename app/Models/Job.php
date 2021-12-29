<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = "jobs";
    protected $primaryKey='job_id';

    protected $fillable = [
        'job_id',
        'admin_id',
        'job_title',
        'job_desc',
        'job_department',
        'job_requirement',
        'job_type',
        'job_location',
        'salary',
        'start_date',
        'end_date'
    ];
}
