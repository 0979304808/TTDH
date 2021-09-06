<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roles\Role;
use App\Models\Permissions\Permission;
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function setPassWordAttribute($password)
    {
        $this->attributes['password'] = bcrypt(($password));
    }

    public function setUsername($username)
    {
        $this->username = strtolower($username);
    }

    public function getUsername()
    {
        return ucwords($this->username);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivotValue('user_type', self::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withPivotValue('user_type', self::class);
    }

    public function getPermissionsViaRoles(){
        return $this->load('roles', 'roles.permissions')
            ->roles->flatMap(function ($role) {
                return $role->permissions;
            })->sort()->values();
    }
}
