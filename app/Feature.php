<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
	protected $fillable = ['name', 'friendly_name', 'owner', 'description'];

    public function houses()
    {
        return $this->belongsToMany(House::class);
    }

    public function vacancy()
    {
    	return $this->belongsToMany(Vacancy::class);
    }

    public function host()
    {
    	return $this->belongsToMany(Host::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
    
}
