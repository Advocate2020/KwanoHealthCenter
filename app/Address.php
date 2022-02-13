<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
