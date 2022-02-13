<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainMember extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medical()
    {
        return $this->belongsTo(Medical::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class);
    }

    public function dependent()
    {
        return $this->hasMany(Dependent::class);
    }
}
