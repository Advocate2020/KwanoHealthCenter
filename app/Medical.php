<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $guarded = [];

    public function plan()
    {
        return $this->hasMany(Plan::class);
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
