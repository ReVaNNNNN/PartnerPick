<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
}
