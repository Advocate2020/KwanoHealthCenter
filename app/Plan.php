<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    public function medical()
    {
        return $this->belongsTo(Medical::class);
    }
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
    public function dependent()
    {
        return $this->hasMany(Dependent::class);
    }
}
