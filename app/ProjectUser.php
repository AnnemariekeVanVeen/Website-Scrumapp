<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Pivot model between projects and users
 * @property int id
 * @property int project_id
 * @property int user_id
 */
class ProjectUser extends Pivot
{
    //
}
