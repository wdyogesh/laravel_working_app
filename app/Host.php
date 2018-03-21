<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{

	protected $fillable = [
        'user_id', 'host_type', 'mobile_number', 'occupation', 'gender', 'date_birth', 'country', 'hear_about_us',
        'hosted_students_before', 'since_when', 'can_students_smoke', 'have_pets', 'special_dietarian', 'status',
    ];
    
	public function home()
	{
		return $this->hasMany(Home::class);
	}


	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function booking()
	{
		return $this->hasMany(Booking::class);
	}

	public function family()
	{
		return $this->hasMany(FamilyMember::class);
	}

	public function features()
	{
		return $this->belongsToMany(Feature::class);
	}

	public function filter_features($feature)
	{
		return $this->belongsToMany(Feature::class)->wherePivotIn('id', $feature);
	}
}

