<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrawPerson extends Model
{
    protected $table = 'draw_person';

    /**
     * @return BelongsTo
     */
    public function draw(): BelongsTo
    {
        return $this->belongsTo(Draw::class);
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
