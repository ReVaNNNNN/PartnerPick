<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string name
 * @property int draw_id
 */
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

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $drawId
     */
    public function setDrawId(int $drawId): void
    {
        $this->draw_id = $drawId;
    }
}
