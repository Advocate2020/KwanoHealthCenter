<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestBooking extends Model
{
    protected $guarded = [];

    public function nurse()
    {
        return $this->belongsTo(Nurse::class);
    }
}
