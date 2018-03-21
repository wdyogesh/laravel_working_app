<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_id','mobile_number','date_birth','gender', 'created_by'
    ];

    public function user()
	{
		return $this->belongsTo(User::class);
	}
}
