<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate([
        	'name' => 'Administrator',
        	'category' => 'admin',
        	'description' => 'Full access'
        ]);
        $role->permissions()
            ->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]);

        $role = Role::firstOrCreate([
        	'name' => 'Host',
        	'category' => 'host',
        	'description' => 'Can access host areas.'
        ]);
        $role->permissions()
            ->attach([2,7,8,9,10,11,12,13,14,15,16]);

        $role = Role::firstOrCreate([
        	'name' => 'Student',
        	'category' => 'student',
        	'description' => 'Can access student areas.'
        ]);
        $role->permissions()
            ->attach([1,2,3,4,5,6,11,12,13,14]);

        $role = Role::firstOrCreate([
            'name' => 'Partner',
            'category' => 'partner',
            'description' => 'Can access partner areas.'
        ]);
        $role->permissions()
            ->attach([2,12,13,14,15,17,18]);

        $role = Role::firstOrCreate([
            'name' => 'Staff',
            'category' => 'staff',
            'description' => 'Full access but cannot create others staffs.'
        ]);
        $role->permissions()
            ->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18]);

        echo "Roles successfuly created. ";
    }
}
