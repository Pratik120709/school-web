<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = ['subject_name', 'program_id','department_id', 'status'];
    
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function programDetails()
    {
        return $this->hasMany(ProgramDetail::class);
    }
}
