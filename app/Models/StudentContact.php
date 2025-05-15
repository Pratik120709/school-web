<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentContact extends Model
{
    use HasFactory;
    protected $table = 'student_contacts';

    protected $fillable = [
        'university_id',
        'full_name',
        'email',
        'phone',
        'message',
        'program_id',
        'department_ids',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function program()
{
    return $this->belongsTo(Program::class, 'program_id');
}


public function getDepartmentNamesAttribute()
{
    if (!empty($this->department_ids)) {
        $departmentIds = explode(',', $this->department_ids);
    
        return Department::whereIn('id', $departmentIds)->pluck('name')->toArray();
    }
    return [];
}


}