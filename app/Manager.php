<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
