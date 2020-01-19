<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawPerson extends Model
{
    protected $table = 'draw_person';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function draw()
    {
        return $this->belongsToMany(DrawPersonDraw::class, 'draw_person_to_draw', 'draw_person_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drawResultFirst()
    {
        return $this->belongsTo(DrawResult::class, 'first_person_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drawResultSecond()
    {
        return $this->belongsTo(DrawResult::class, 'second_person_id');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
