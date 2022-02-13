<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $guarded = [];

    public function suburb()
    {
        return $this->hasOne(Suburb::class);
    }
    public function favourites()
    {
        return $this->hasMany(NurseFavouriteSuburb::class);
    }

    public function booking()
    {
        return $this->hasMany(TestBooking::class);
    }
    public function test()
    {
        return $this->hasMany(Test::class);
    }
}
