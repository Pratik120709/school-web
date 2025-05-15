<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    use HasFactory;
    protected $table = 'program_details';

    protected $fillable = [
        'university_id',
        'program_id',
        'department_id',
        'subject_id',
        'status',
    ];

// ProgramDetail.php (Model)
public function university()
{
    return $this->belongsTo(University::class, 'university_id');
}


    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
