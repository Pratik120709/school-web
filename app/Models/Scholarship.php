<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $table = 'scholarships';

    protected $fillable = [
        'university_id',
        'scholarship_available',
        'scholarship_pdf',
        'status',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
