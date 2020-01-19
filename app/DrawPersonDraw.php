<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawPersonDraw extends Model
{
    protected $table = 'draw_person_to_draw';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function person()
    {
        return $this->hasOne(DrawPerson::class, 'id', 'draw_person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function draws()
    {
        return $this->hasMany(Draw::class, 'id');
    }
}