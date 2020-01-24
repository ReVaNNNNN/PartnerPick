<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Draw extends Model
{
    const TYPE_PAIR = 'pair';

    protected $table = 'draw';

    /**
     * @return HasMany
     */
    public function persons(): HasMany
    {
        return $this->hasMany(DrawPerson::class);
    }

    /**
     * @return HasOne
     */
    public function result(): HasOne
    {
        return $this->hasOne(DrawResult::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
