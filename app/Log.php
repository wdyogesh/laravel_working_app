<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user_id','type','subject', 'content'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
