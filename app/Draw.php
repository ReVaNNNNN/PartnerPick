<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    public function drawPersons()
    {
        return $this->belongsToMany(DrawPersonDraw::class, 'draw_id');
    }

    public function drawResult()
    {
        return $this->belongsToMany(DrawResult::class, 'draw_id');
    }

}
