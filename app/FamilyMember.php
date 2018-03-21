<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = ['first_name', 'last_name', 'host_id', 'gender', 'date_birth', 'relationship',];

    public function host()
	{
		return $this->belongsTo(Host::class);
	}
}
