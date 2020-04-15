<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for a profile.
 * @property int id
 * @property int user_id
 * @property mixed programming_experience
 * @property mixed date_of_birth
 * @property mixed scrum_experience
 */
class Profile extends Model
{
    protected $dates = ['programming_experience', 'scrum_experience', 'date_of_birth'];

    /**
     * Return the user a profile belongs to.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
