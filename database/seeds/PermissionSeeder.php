<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student0 = Permission::firstOrCreate([
            'name' => 'view-student-index',
            'friendly_name' => "View student's index page",
            'description' => "Allow the user access the student's profile"
        ]);

        $student1 = Permission::firstOrCreate([
        	'name' => 'view-student-profile',
        	'friendly_name' => "View student's profile",
        	'description' => "Allow the user access the student's profile"
        ]);

        $student2 = Permission::firstOrCreate([
        	'name' => 'create-student-profile',
        	'friendly_name' => "View student's profile",
        	'description' => "Allow the user access the student's profile"
        ]);

        $student3 = Permission::firstOrCreate([
        	'name' => 'edit-student-profile',
        	'friendly_name' => "View student's profile",
        	'description' => "Allow the user access the student's profile"
        ]);

        $student4 = Permission::firstOrCreate([
        	'name' => 'delete-student-profile',
        	'friendly_name' => "View student's profile",
        	'description' => "Allow the user access the student's profile"
        ]);

        $student4 = Permission::firstOrCreate([
            'name' => 'view-student-booking',
            'friendly_name' => "View student's booking",
            'description' => "Allow the user access the student's booking"
        ]);

        $host0 = Permission::firstOrCreate([
            'name' => 'view-host-index',
            'friendly_name' => "View host's index page",
            'description' => "Allow the user access the host's profile"
        ]);

        $host1 = Permission::firstOrCreate([
        	'name' => 'view-host-profile',
        	'friendly_name' => "View host's profile",
        	'description' => "Allow the user access the host's profile"
        ]);

        $host2 = Permission::firstOrCreate([
            'name' => 'create-host-profile',
            'friendly_name' => "View host's profile",
            'description' => "Allow the user access the host's profile"
        ]);

        $host3 = Permission::firstOrCreate([
            'name' => 'edit-host-profile',
            'friendly_name' => "View host's profile",
            'description' => "Allow the user access the host's profile"
        ]);

        $host4 = Permission::firstOrCreate([
            'name' => 'delete-host-profile',
            'friendly_name' => "View host's profile",
            'description' => "Allow the user access the host's profile"
        ]);

        $home0 = Permission::firstOrCreate([
            'name' => 'view-home-index',
            'friendly_name' => "View home's index page",
            'description' => "Allow the user access the home's profile"
        ]);

        $home1 = Permission::firstOrCreate([
            'name' => 'view-home-profile',
            'friendly_name' => "View home's profile",
            'description' => "Allow the user access the home's profile"
        ]);

        $home2 = Permission::firstOrCreate([
            'name' => 'create-home-profile',
            'friendly_name' => "View home's profile",
            'description' => "Allow the user access the home's profile"
        ]);

        $home3 = Permission::firstOrCreate([
            'name' => 'edit-home-profile',
            'friendly_name' => "View home's profile",
            'description' => "Allow the user access the home's profile"
        ]);

        $home4 = Permission::firstOrCreate([
            'name' => 'delete-home-profile',
            'friendly_name' => "View home's profile",
            'description' => "Allow the user access the home's profile"
        ]);

        $admin0 = Permission::firstOrCreate([
            'name' => 'view-admin-index',
            'friendly_name' => "View administrator's index page",
            'description' => "Allow the user access the administrator's index page"
        ]);


        $partner0 = Permission::firstOrCreate([
            'name' => 'view-partner-index',
            'friendly_name' => "View parnter's index page",
            'description' => "Allow the user access the parnter's index page"
        ]);

        echo "Permissions successfuly created. ";

    }
}
