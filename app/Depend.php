<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depend extends Model
{
    protected $guarded = [];

    public function mainMember()
    {
        return $this->belongsTo(MainMember::class);
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class);
    }
    public function medical()
    {
        return $this->belongsTo(Medical::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
