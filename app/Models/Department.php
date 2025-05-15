<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    
    protected $fillable = ['name','program_id', 'status'];

    public function programDetails()
    {
        return $this->hasMany(ProgramDetail::class);
    }
}
