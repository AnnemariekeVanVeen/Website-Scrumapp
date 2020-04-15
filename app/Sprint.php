<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model for a sprint.
 * @property int id
 * @property int iteration
 * @property mixed sprint_start
 * @property mixed sprint_end
 * @property int project_id
 */
class Sprint extends Model
{
    protected $dates = ['sprint_start', 'sprint_end'];

    /**
     * Return the backlog items a sprint has.
     *
     * @return HasMany
     */
    public function backlog_items()
    {
        return $this->hasMany(BacklogItem::class);
    }
}
