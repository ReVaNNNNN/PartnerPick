<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawPerson extends Model
{
    public function draw()
    {
        return $this->belongsTo(DrawPersonDraw::class, 'draw_person_id');
    }

    public function drawResultFirst()
    {
        return $this->belongsTo(DrawResult::class, 'first_person_id');
    }

    public function drawResultSecond()
    {
        return $this->belongsTo(DrawResult::class, 'second_person_id');
    }
}
