<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Suburb extends Model
{
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }
    public function dependent()
    {
        return $this->belongsTo(Dependent::class);
    }
    public function nurse()
    {
        return $this->hasMany(Nurse::class);
    }
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}
