<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = "educations";
    protected $primaryKey = "edu_id";
    protected $fillable = [
        'edu_id', 
        'intern_detail_id', 
        'current_edu_level', 
        'current_edu_institution',
        'current_institution_location',
        'study_field', 
        'grad_period'
    ];

    public function internDetails()
    {
        return $this->belongsTo(InternDetail::class);
    }
}
