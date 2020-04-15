<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model for a profile.
 * @property int id
 * @property string title
 * @property string description
 * @property mixed deadline
 * @property string git_link
 */
class Project extends Model
{
    protected $dates = [
        'deadline'
    ];

    /**
     * Return the backlog items that the project has.
     *
     * @return HasMany
     */
    public function backlog_items()
    {
        return $this->hasMany(BacklogItem::class);
    }

    /**
     * Return the users that a project belongs to, using the pivot table ProjectUser.
     *
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->using(ProjectUser::class);
    }

    /**
     * Return the retrospectives a project has.
     *
     * @return HasMany
     */
    public function retrospectives()
    {
        return $this->hasMany(Retrospective::class);
    }

    /**
     * Return the sprints a project has.
     *
     * @return HasMany
     */
    public function sprints()
    {
        return $this->hasMany(Sprint::class);
    }
}
