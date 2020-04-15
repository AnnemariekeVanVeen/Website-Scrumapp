<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model for a Retrospective comment.
 * @property int id
 * @property string comment
 * @property bool type
 * @property int retrospective_id
 * @property int user_id
 */
class RetrospectiveComment extends Model
{

    /**
     * Return the user that a retrospective comment belongs to.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
