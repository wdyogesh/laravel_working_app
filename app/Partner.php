<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['user_id','business_name','contact_person_name','website','type','business_registration_number','phone_number','country','address','is_active','partner_code'];
	
    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function booking()
	{
		return $this->hasMany(Booking::class);
	}

	public static function generateBarcodeNumber() 
	{
    	$number = mt_rand(100000, 999999); // better than rand()

	    // call the same function if the barcode exists already
	    if (Partner::barcodeNumberExists($number)) 
	    {
	        return generateBarcodeNumber();
    	}

	    // otherwise, it's valid and can be used
	    return $number;
	}

	public static function barcodeNumberExists($number) 
	{
	    // query the database and return a boolean
	    // for instance, it might look like this in Laravel
	    return Partner::where('partner_code', $number)->exists();
	}


}
