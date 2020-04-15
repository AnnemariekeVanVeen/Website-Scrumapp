<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Pivot model between retrospectives and users
 * @property int id
 * @property int retrospective_id
 * @property int user_id
 */
class RetrospectiveUser extends Pivot
{
    //
}
