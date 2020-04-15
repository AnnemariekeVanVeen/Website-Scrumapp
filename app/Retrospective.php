<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Model for a retrospective.
 * @property int id
 * @property int project_id
 */
class Retrospective extends Model
{

    /**
     * Return the user a retrospective belongs to, using the pivot table RetrospectiveUser.
     *
     * @return BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany(User::class)->using(RetrospectiveUser::class);
    }
}
