<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionFee extends Model
{
    use HasFactory;

    protected $table = 'tuition_fees';

    protected $fillable = [
        'university_id',
        'amount',
        'payment_frequency',
        'program_id',
        'department_id',
        'subject_id',
        'status',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function program()
    {
        return $this->belongsTo(ProgramDetail::class, 'program_id');
    }
    
    public function department()
    {
        return $this->belongsTo(ProgramDetail::class, 'department_id');
    }
    
    public function subject()
    {
        return $this->belongsTo(ProgramDetail::class, 'subject_id');
    }
    

}
