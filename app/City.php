<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function suburb()
    {
        return $this->hasMany(Suburb::class);
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
