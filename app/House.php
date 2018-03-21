<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['user_id','title','description', 'city', 'country', 'address','address_complement', 'latitude', 'longitude', 'about_area', 'directions'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function vacancy()
    {
        return $this->hasMany(Vacancy::class);
    }









}

