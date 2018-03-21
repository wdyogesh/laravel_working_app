<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

	protected $fillable = ['user_id', 
	'booking_id', 
	'gender', 
	'country', 
	'passport_number', 
	'address', 'phone_number', 
	'mobile_number', 
	'date_birth', 
	'english_level', 
	'about_student', 
	'emergency_first_name',
	'emergency_last_name',
	'emergency_email',
	'emergency_phone_number',
	'emergency_country',
	'emergency_relationship',
	'emergency_mobile_number',

	'objec_pets',
	'objec_kids',
    'medical_issue',
    'medical_issue_desc',
    'allergy',
    'allergy_desc',
    'dietary_request',
    'special_needs',
    'special_needs_desc',
    'smoke',
	'partner_code'];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function booking()
	{
		return $this->hasOne(Booking::class, 'student_id', 'user_id');
	}

	public function features()
	{
		return $this->belongsToMany(Feature::class);
	}

}