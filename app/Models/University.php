<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $table = 'universities';

    protected $fillable = [
        'name',
        'slug',
        'website',
        'phone',
        'email',
        'country_id',
        'state_id',
        'address',
        'is_featured',
        'fees',
        'level',
        'ranking',
        'longitude',
        'latitude',
        'logo',
        'featured_image',
        'banner_image',
        'description',
        'status',
    ];
    
    public function programDetails()
    {
        return $this->hasMany(ProgramDetail::class, 'university_id');
    }
    public function scholarship()
    {
        return $this->hasOne(Scholarship::class);
    }

    public function tuitionFee()
    {
        return $this->hasOne(TuitionFee::class);
    }
public function admissionRequirements()
{
    return $this->hasMany(AdmissionRequirement::class);
}

public function galleries()
{
    return $this->hasMany(Gallery::class);
}
public function country()
{
    return $this->belongsTo(Country::class, 'country_id');
}
public function state()
{
    return $this->belongsTo(State::class, 'state_id');
}
}