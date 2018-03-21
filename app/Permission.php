<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name','friendly_name','description'];

    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }
}
