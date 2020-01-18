<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawResult extends Model
{
    public function draws()
    {
        return $this->hasMany(Draw::class, 'id');
    }

    public function firstPerson()
    {
        return $this->hasOne(DrawPerson::class, 'id');
    }

    public function secondPerson()
    {
        return $this->hasOne(DrawPerson::class, 'id');
    }
}
