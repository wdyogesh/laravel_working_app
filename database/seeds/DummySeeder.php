<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Host;
use App\House;
use App\Partner;
use App\Student;
use App\Vacancy;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = User::firstOrCreate([
            'first_name' => 'First name',
            'last_name' => 'Last name',
        	'email' => 'email@email.com',
        	'password' => bcrypt('123456'),
            'email_token' => '',
        	//'user_type' => 'host'
        ]);
        $r1->roles()
            ->attach(2);

        $r1->host = Host::firstOrCreate([
        	'user_id' => $r1->id, 
        	'host_type' => 'homestay',
            'mobile_number' => '',
            'occupation' => '',
            'gender' => '',
            'country' => '',
            'hear_about_us' => '',
            'since_when' => ''

        ]);

        //echo $r1;
        
        $r1->host->house = House::firstOrCreate([
            'user_id' => $r1->id,
            'title' => 'House title',
            'description' => 'House description',
            'city' => 'City',
            'address' => 'Address', 
            'country' => 'Country',
            'address_complement' => '',
            'latitude' => -27.4696819,
            'longitude' => 153.0256503,
            'about_area' => 'About the area',
            'directions' => 'Directions'
        ]);

        $r1->host->house->vacancy = Vacancy::firstOrCreate([
            'house_id' => 1,
            'title' => 'Vacancy title',
            'description' => 'House description',
            'bed_type' => 'single',
            'bathroom_type' => 'ensuite', 
            'is_available' => 1,
            'availability_from' => null,
            'availability_to' => null
        ]);

        echo 'Dummy successfuly created';
    }
}
