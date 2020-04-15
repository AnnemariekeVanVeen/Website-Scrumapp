<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Model for a backlog item.
 * @property int id
 * @property int sprint_id
 * @property int project_id
 * @property string title
 * @property string description
 * @property string assigned_to
 * @property string state
 * @property int priority
 * @property string role
 * @property string activity
 * @property int story_points
 * @property string acceptation_criteria
 */
class BacklogItem extends Model
{
    /**
     * Return the related project of the backlog item.
     *
     * @return HasOne
     */
    public function project()
    {
        return $this->hasOne(Project::class);
    }

    /**
     * Return the sprint a backlog item belongs to.
     *
     * @return BelongsTo
     */
    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}
