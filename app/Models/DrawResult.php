<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property result
 */
class DrawResult extends Model
{
    protected $table = 'draw_result';

    /**
     * @return HasOne
     */
    public function draw(): HasOne
    {
        return $this->hasOne(Draw::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return
     */
    public function getResult()
    {
        return $this->result;
    }
}
