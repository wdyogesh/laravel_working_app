<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //Campos do banco de dados passado como mass
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'user_type', 'email_token', 'avatar_path', 'temp_password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    //Campos do banco de dados passados como hidden

    protected $hidden = [
        'password', 'remember_token',
    ];

    //Define the relationship between this class and others

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function host()
    {
        return $this->hasOne(Host::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function partner()
    {
        return $this->hasOne(Partner::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function house()
    {
        return $this->hasMany(House::class);
    }

    public function pBooking()
    {
        return $this->hasMany(Bookings::class, 'partner_id');
    }

    public function sBooking()
    {
        return $this->hasOne(Bookings::class, 'student_id');
    }
    ////////////////////////////////////////////////

    // Verify the user type
    public function isStudent()
    {
        return $this->existRole('student');
    }

    public function isHost()
    {
        return $this->existRole('host');
    }

    public function isAdmin()
    {
        return $this->existRole('admin');
    }

    public function isPartner()
    {
        return $this->existRole('partner');
    }

    public function isStaff()
    {
        return $this->existRole('staff');
    }

    public function existRole($role)
    {
        if (is_string($role))
        {
            //dd($this->roles());

            $role =  Role::where('category','=',$role)->firstOrFail();
            //dd($role->name);
        }

        return (boolean) $this->roles()->find($role->id);
    }

    public function hasRole($roles)
    {
        $userRoles = $this->roles;

        return $roles->intersect($userRoles)->count();
    }
}
