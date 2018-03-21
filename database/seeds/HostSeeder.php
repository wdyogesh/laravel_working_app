<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Host;
use App\House;
use App\Student;
use App\Vacancy;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $host = User::firstOrCreate([
            'first_name' => 'Tony',
            'last_name' => 'Stark',
        	'email' => 'tony@gmail.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('host@gmail.com'),
        	//'user_type' => 'host'
        ]);
        $host->roles()
            ->attach(2);

        $host->host = Host::firstOrCreate([
        	'user_id' => $host->id, 
        	'host_type' => 'homestay',
        	'mobile_number' => '965873215',
        	'occupation' => 'Rich',
        	'gender' => 'Male',
        	'date_birth' => '1968-01-05',
        	'country' => 'Australia',
        	'hear_about_us' => 'Google',
        	'hosted_students_before' => 1,
        	'since_when' => '2010',
        	'can_students_smoke' => 1,
        	'have_pets' => 1,
            'have_kids' => 0,
        	'special_dietarian' => 1,
        ]);
        $host->host->features()
                    ->attach([69,70]);
        
        $host->host->house = House::firstOrCreate([
            'user_id' => $host->id, 
            'title' => 'Awnsome house',
            'description' => 'A certificação de metodologias que nos auxiliam a lidar com a crescente influência da mídia.',
            'city' => 'Brisbane',
            'country' => 'Australia',
            'address' => 'Endereco X', 
            'address_complement' => '',
            'latitude' => -27.4696819,
            'longitude' => 153.0256503,
            'about_area' => 'É importante questionar o quanto o fenômeno da Internet estende o alcance.',
            'directions' => 'Neste sentido, o entendimento das metas propostas maximiza as possibilidades.'
        ]);

        $host->host->house->vacancy = Vacancy::firstOrCreate([
            'house_id' => $host->host->house->id,
            'title' => 'Awnsome room',
            'description' => 'Não obstante, a contínua expansão de nossa atividade oferece uma interessante oportunidade.',
            'bed_type' => 'single',
            'bathroom_type' => 'ensuite', 
            'is_available' => 1,
            'availability_from' => null,
            'availability_to' => null
        ]);

        //------------------------------------------------------------------------------------

        $host = User::firstOrCreate([
            'first_name' => 'Bill',
            'last_name' => 'Gates',
        	'email' => 'bill@gmail.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('bill@gmail.com'),
        	//'user_type' => 'host'
        ]);
        $host->roles()
            ->attach(2);

         $host->host = Host::firstOrCreate([
        	'user_id' => $host->id, 
        	'host_type' => 'homestay',
        	'mobile_number' => '982458753',
        	'occupation' => 'Empresario',
        	'gender' => 'Male',
        	'date_birth' => '1949-06-03',
        	'country' => 'Australia',
        	'hear_about_us' => 'Google',
        	'hosted_students_before' => 1,
        	'since_when' => '2009',
        	'can_students_smoke' => 0,
        	'have_pets' => 1,
            'have_kids' => 0,
        	'special_dietarian' => 1,
        ]);
        $host->host->features()
                    ->attach([69,70,71]);
        
        $host->host->house = House::firstOrCreate([
            'user_id' => $host->id, 
            'title' => 'Some house',
            'description' => 'O incentivo ao avanço tecnológico, assim como a mobilidade dos capitais internacionais.',
            'city' => 'Brisbane',
            'country' => 'Australia',
            'address' => 'Endereco Bill', 
            'address_complement' => '',
            'latitude' => -27.4696819,
            'longitude' => 153.0256503,
            'about_area' => 'Todas estas questões, devidamente ponderadas, levantam dúvidas.',
            'directions' => 'As experiências acumuladas demonstram a necessidade de renovação processual.'
        ]);

        $host->host->house->vacancy = Vacancy::firstOrCreate([
            'house_id' => $host->host->house->id,
            'title' => 'Bill room',
            'description' => 'É claro que a contínua expansão de nossa atividade estende o alcance.',
            'bed_type' => 'double',
            'bathroom_type' => 'ensuite', 
            'is_available' => 1,
            'availability_from' => null,
            'availability_to' => null
        ]);

        //------------------------------------------------------------------------------------

        $host = User::firstOrCreate([
            'first_name' => 'Elon',
            'last_name' => 'Musk',
        	'email' => 'elon@gmail.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('elon@gmail.com'),
        	//'user_type' => 'host'
        ]);
        $host->roles()
            ->attach(2);

         $host->host = Host::firstOrCreate([
        	'user_id' => $host->id, 
        	'host_type' => 'share-house',
        	'mobile_number' => '965426589',
        	'occupation' => 'Inoventier',
        	'gender' => 'Male',
        	'date_birth' => '1971-01-05',
        	'country' => 'Australia',
        	'hear_about_us' => 'Google',
        	'hosted_students_before' => 1,
        	'since_when' => '2012',
        	'can_students_smoke' => 1,
        	'have_pets' => 1,
            'have_kids' => 0,
        	'special_dietarian' => 1,
        ]);
        $host->host->features()
                    ->attach([71,72]);
        
        $host->host->house = House::firstOrCreate([
            'user_id' => $host->id, 
            'title' => 'Space house',
            'description' => 'É importante questionar o início da atividade geral de formação de atitudes.',
            'city' => 'Brisbane',
            'country' => 'Australia',
            'address' => 'Endereco R', 
            'address_complement' => '',
            'latitude' => -27.4696819,
            'longitude' => 153.0256503,
            'about_area' => 'O que temos que ter sempre em mente.',
            'directions' => 'Neste sentido.'
        ]);

        $host->host->house->vacancy = Vacancy::firstOrCreate([
            'house_id' => $host->host->house->id,
            'title' => 'Space room',
            'description' => 'Ainda assim, existem dúvidas a respeito de como o julgamento imparcial das eventualidades.',
            'bed_type' => 'double',
            'bathroom_type' => 'private', 
            'is_available' => 1,
            'availability_from' => null,
            'availability_to' => null
        ]);

        //------------------------------------------------------------------------------------

        $host = User::firstOrCreate([
            'first_name' => 'Scarlet',
            'last_name' => 'Johanson',
        	'email' => 'scarlet@gmail.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('scarlet@gmail.com'),
        	//'user_type' => 'host'
        ]);
        $host->roles()
            ->attach(2);

         $host->host = Host::firstOrCreate([
        	'user_id' => $host->id, 
        	'host_type' => 'homestay',
        	'mobile_number' => '965873215',
        	'occupation' => 'Atriz',
        	'gender' => 'Female',
        	'date_birth' => '1968-01-05',
        	'country' => 'Australia',
        	'hear_about_us' => 'Google',
        	'hosted_students_before' => 1,
        	'since_when' => '2010',
        	'can_students_smoke' => 1,
        	'have_pets' => 1,
            'have_kids' => 0,
        	'special_dietarian' => 1,
        ]);
        $host->host->features()
                    ->attach([69,71]);
        
        $host->host->house = House::firstOrCreate([
            'user_id' => $host->id, 
            'title' => 'Awnsome house',
            'description' => 'A certificação de metodologias que nos auxiliam a lidar com a mídia.',
            'city' => 'Brisbane',
            'country' => 'Australia',
            'address' => 'Endereco X', 
            'address_complement' => '',
            'latitude' => -27.4696819,
            'longitude' => 153.0256503,
            'about_area' => 'É importante questionar o quanto o fenômeno da Internet.',
            'directions' => 'Neste sentido, o entendimento das metas propostas maximiza as possibilidades.'
        ]);

        $host->host->house->vacancy = Vacancy::firstOrCreate([
            'house_id' => $host->host->house->id,
            'title' => 'Awnsome room',
            'description' => 'Não obstante, a contínua expansão de nossa atividade.',
            'bed_type' => 'double',
            'bathroom_type' => 'private', 
            'is_available' => 1,
            'availability_from' => null,
            'availability_to' => null
        ]);

        //------------------------------------------------------------------------------------

        $host = User::firstOrCreate([
            'first_name' => 'Neo',
            'last_name' => 'Morpheus',
        	'email' => 'neo@gmail.com',
        	'password' => bcrypt('123456'),
            'email_token' => base64_encode('neo@gmail.com'),
        	//'user_type' => 'host'
        ]);
        $host->roles()
            ->attach(2);

         $host->host = Host::firstOrCreate([
        	'user_id' => $host->id, 
        	'host_type' => 'share-house',
        	'mobile_number' => '9685632569',
        	'occupation' => 'Hacker',
        	'gender' => 'Male',
        	'date_birth' => '1974-01-05',
        	'country' => 'Australia',
        	'hear_about_us' => 'Google',
        	'hosted_students_before' => 1,
        	'since_when' => '2007',
        	'can_students_smoke' => 0,
        	'have_pets' => 0,
            'have_kids' => 0,
        	'special_dietarian' => 0,
        ]);
        
        $host->host->house = House::firstOrCreate([
            'user_id' => $host->id, 
            'title' => 'Awnsome house',
            'description' => 'É importante questionar.',
            'city' => 'Brisbane',
            'country' => 'Australia',
            'address' => 'Endereco M', 
            'address_complement' => 'Zeon',
            'latitude' => -27.4696819,
            'longitude' => 153.0256503,
            'about_area' => 'Pensando mais a longo prazo.',
            'directions' => 'O incentivo ao avanço tecnológico, assim como o início da atividade geral.'
        ]);

        $host->host->house->vacancy = Vacancy::firstOrCreate([
            'house_id' => $host->host->house->id,
            'title' => 'Awnsome room',
            'description' => 'A prática cotidiana prova que o desafiador cenário globalizado aponta para a melhoria.',
            'bed_type' => 'two-singles',
            'bathroom_type' => 'share', 
            'is_available' => 1,
            'availability_from' => null,
            'availability_to' => null
        ]);

        echo 'Host successfuly created.';

        //------------------------------------------------------------------------------------
    }
}
