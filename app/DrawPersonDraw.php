<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawPersonDraw extends Model
{
    public function person()
    {
        return $this->hasOne(DrawPerson::class, 'id');
    }

    public function draws()
    {
        return $this->hasMany(Draw::class, 'id');
    }
}
