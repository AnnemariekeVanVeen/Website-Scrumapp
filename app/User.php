<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Model for a user.
 * @property int id
 * @property string name
 * @property string password
 * @property string email
 * @property bool is_admin
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return the profile a user has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Return the projects a user belongs to, using the pivot table ProjectUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class)->using(ProjectUser::class);
    }

    /**
     * Return the retrospectives a user belongs to, using the pivot table RetrospectiveUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function retrospective()
    {
        return $this->belongsToMany(Retrospective::class)->using(RetrospectiveUser::class);
    }
}
