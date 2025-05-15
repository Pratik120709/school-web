<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionRequirement extends Model
{
    use HasFactory;
    protected $table = 'admission_requirements';

    protected $fillable = [
        'university_id',
        'program_id',
        'department_id',
        'subject_id',
        'gpa',
        'gre',
        'toefl',
        'ielts',
        'pte',
        'det',
        'pdf',
        'status',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function program()
    {
        return $this->belongsTo(ProgramDetail::class);
    }

    public function department()
    {
        return $this->belongsTo(ProgramDetail::class);
    }

    public function subject()
    {
        return $this->belongsTo(ProgramDetail::class);
    }
}
