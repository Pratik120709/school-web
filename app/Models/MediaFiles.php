<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFiles extends Model
{
    use HasFactory;

    protected $table = 'media_files';

    protected $fillable = [
        'file',
       
    ];
}
