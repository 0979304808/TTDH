<?php

namespace App\Models\Roles;

use Laratrust\Models\LaratrustRole;
use App\Models\Permissions\Permission;
class Role extends LaratrustRole
{

    protected $guarded = [];

    /**
     * Relationships
     */
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function getPerList(){
        return $this->permissions->pluck('id')->toArray();
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
