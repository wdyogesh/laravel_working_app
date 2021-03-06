<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    
	protected $guarded = ['id'];

	public function host()
	{
		return $this->belongsTo(Host::class);
	}

}
