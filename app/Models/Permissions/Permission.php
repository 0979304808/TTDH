<?php

namespace App\Models\Permissions;

use Laratrust\Models\LaratrustPermission;
use App\Models\Roles\Role;
class Permission extends LaratrustPermission
{
    protected $guarded = [];

    /**
     * Relationships
     */
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = str_slug($name);
    }

    public function getNameAttribute(){
        return $this->attributes['name'];
    }

    public function setDisplayNameAttribute($displayName){
        $this->attributes['display_name'] = strtolower($displayName);
    }

    public function getDisplayNameAttribute(){
        return ucwords($this->attributes['display_name']);
    }
    
    public function getDescriptionAttribute(){
        return ucfirst($this->attributes['description']);
    }
}
