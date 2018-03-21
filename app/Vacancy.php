<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
	protected $fillable = ['house_id','title', 'description', 'bed_type', 'bathroom_type', 'availability_from', 'availability_to'];

    public function house()
    {
    	return $this->belongsTo(House::class);
    }

    public function booking()
    {
    	return $this->belongsToMany(Booking::class);
    }

    public function features()
    {
    	return $this->belongsToMany(Feature::class);
    }

}
