<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'university_id',
        'photo',
        'status',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
