<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternDetail extends Model
{
    use HasFactory;

    protected $table = "intern_details";
    protected $primaryKey = "intern_detail_id";
    // resume is null currently for faker

    protected $fillable = [
        'intern_detail_id', 'intern_id', 'time_to_start', 'time_to_end',
        'resume','text', 'states', 'status', 'time_to_update', 'time_to_post'
    ];

    public function interns()
    {
        return $this->belongsTo(Intern::class);
    }

    public function educations()
    {
        return $this->hasOne(Education::class);
    }
}
