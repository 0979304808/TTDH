<?php

namespace App;

use App\Models\Comments\Comment;
use App\Models\Posts\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Roles\Role;
use App\Models\Permissions\Permission;

class User extends Authenticatable
{
    // active = 0 chưa kích hoạt không thể đăng nhập
    // active = 1 tài khoản người dùng
    // active = 2 tài khoản admin
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

    // Mutators
    public function setPassWordAttribute($password)
    {
        $this->attributes['password'] = bcrypt(($password));
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    // -------- end mutators ---------

    // Accessors
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
    // ------ end accessors ----------

    // Relationship
    public function Post()
    {
        return $this->hasMany(Post::class);
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivotValue('user_type', self::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withPivotValue('user_type', self::class);
    }

    public function comments()
    {
        return $this->hasOne(Comment::class);
    }

    // --------- end relationship --------

    public function getPermissionsViaRoles()
    {
        return $this->load('roles', 'roles.permissions')
            ->roles->flatMap(function ($role) {
                return $role->permissions;
            })->sort()->values();
    }

    // Scope
    public function scopeActive($query, $active)
    {
        return $query->whereActive($active);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name',$search)->orWhere('email',$search);
    }
    // --------- end scope ------------
}
