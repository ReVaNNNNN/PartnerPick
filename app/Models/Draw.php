<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int id
 * @property string type
 */
class Draw extends Model
{
    const TYPE_PAIR = 'pair';

    const ALLOWED_TYPES = [
            'pair'
        ];

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

    /**
     * @param string $type
     * @throws \Exception
     */
    public function setType(string $type): void
    {
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new \Exception(sprintf('Unknown drawning type: %s', $type));
        }

        $this->type = $type;
    }
}
