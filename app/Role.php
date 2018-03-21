<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['category','name','description'];

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }

    public function user()
    {
    	return $this->belongsToMany(User::class);
    }
}


