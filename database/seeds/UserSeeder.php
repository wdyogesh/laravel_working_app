<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Host;
use App\House;
use App\Partner;
use App\Student;
use App\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = User::firstOrCreate([
        	'first_name' => 'Andre',
            'last_name' => 'Tanaka',
        	'email' => 'andre@saystay.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('andre@saystay.com'),
        	//'user_type' => 'admin'
        ]);
        $r1->roles()
            ->attach(1);

        $r1->admin = Admin::create([
            'user_id' => $r1->id,
            'mobile_number' => '0424583480',
            'date_birth' => '1992-06-22',
            'gender' => 'Male',
            'created_by' => $r1->id,
        ]);
//------------------------------------------------------------------------------
        $r1 = User::firstOrCreate([
            'first_name' => 'Tony',
            'last_name' => 'Stark',
        	'email' => 'tony@stark.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('host@gmail.com'),
        	//'user_type' => 'host'
        ]);
        $r1->roles()
            ->attach(4);

        $r1->partner = Partner::create([
            'user_id' => $r1->id, 
            'business_name' => 'SayStay',
            'website' => 'www.saystay.com',
            'type' => 'student_agency',
            'contact_person_name' => '',
            'business_registration_number' => '17160577999',
            'phone_number' => '1300 768 380',
            'country' => 'Australia',
            'address' => '5/141 Queen St, Brisbane City QLD 4000',
            'partner_code' => '100000',
            ]);
//------------------------------------------------------------------------------
    /*    $r1 = User::firstOrCreate([
            'first_name' => 'Bill',
            'last_name' => 'Gates',
        	'email' => 'bill@gates.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('bill@gmail.com'),
        	//'user_type' => 'student'
        ]);
        $r1->roles()
            ->attach(3);

        $r1->student = Student::create([
            'user_id' => $r1->id, 
            'gender' => 'male',
            'passport_number' => 'FP87597',
            'date_birth' => '1992-06-22',
            'mobile_number' => '04856935147',
            'phone_number' => '09578756',
            'country' => 'Brazil',
            'address' => '7/75 Berry Street',
            'english_level' => 'Basic',
            'about_student' => 'Alguma coisa sobre o estudante',
            'emergency_first_name' => 'Elon',
            'emergency_last_name' => 'Musk',
            'emergency_email' => 'elon@musk.com',
            'emergency_phone_number' => '0496325975',
            'emergency_country'=> 'EUA',
            'emergency_relationship' => 'friend',
            'emergency_mobile_number'=> '',
            'like_pets' => '1',
            'special_diet' => '0',
            'special_needs' => '0',
            'smoke' => '0',
            'arrival_date' => '2017-08-10',
            'departure_date' => '2017-10-10',
            'flight_date' => '2017-08-10',
            'flight_time' => '10:00pm',
            'flight_number' => 'FO98',
            'airport' => 'Brisbane Airport',
            'airline_company' => 'Quantas',
            'partner_code' => '100000',
            ]); */
//------------------------------------------------------------------------------
    
        echo "User successfuly created. ";
    }
}

