<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['student_id', 
    'partner_id', 
    'vacancy_id', 
    'status',
    'host_type', 
    'room_type', 
    'city', 
    'country', 
    'school_name', 
    'school_address', 
    'checkin', 
    'length_stay', 
    'checkout', 
    
    'arrival_date',
    'arrival_time',
    'departure_date',
    'flight_date',
    'flight_time',
    'flight_number',
    'airport',
    'airline_company',
    
    'pickup',
    'return_trip',
    'same_address',
    'return_trip_address'];

    public function student()
    {
    	return $this->belongsTo(Student::class, 'student_id', 'user_id');
    }

    public function vacancy()
    {
    	return $this->belongsTo(Vacancy::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'user_id');
    }
}