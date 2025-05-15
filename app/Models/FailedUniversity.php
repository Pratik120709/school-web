<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedUniversity extends Model
{
    use HasFactory;
    
    protected $table = 'failed_universities';
    
    protected $fillable = ['university_name','remark'];
}
