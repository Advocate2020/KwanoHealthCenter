<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NurseFavouriteSuburb extends Model
{
    protected $guarded = [];

    public function suburb()
    {
        return $this->hasMany(Suburb::class);
    }

    public function nurse()
    {
        return $this->belongsTo(Nurse::class);
    }
}
