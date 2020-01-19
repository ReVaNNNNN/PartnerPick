<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawResult extends Model
{
    protected $table = 'draw_result';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function draws()
    {
        return $this->hasMany(Draw::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function firstPerson()
    {
        return $this->hasOne(DrawPerson::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function secondPerson()
    {
        return $this->hasOne(DrawPerson::class, 'id');
    }
}
