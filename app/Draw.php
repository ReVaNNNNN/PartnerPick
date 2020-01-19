<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    const TYPE_PAIR = 'pair';

    protected $table = 'draw';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drawPersons()
    {
        return $this->belongsToMany(DrawPersonDraw::class, 'draw_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drawResult()
    {
        return $this->belongsToMany(DrawResult::class, 'draw_id');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
