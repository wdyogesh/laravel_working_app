<?php

use Illuminate\Database\Seeder;
use App\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// House Features
        $feature = Feature::firstOrCreate([
        	'name' => 'garden',
        	'friendly_name' => 'Garden',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'bikes',
        	'friendly_name' => 'Bikes',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'computer',
        	'friendly_name' => 'Computer',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'games_room',
        	'friendly_name' => 'Games Room',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'patio',
        	'friendly_name' => 'Patio',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'laundry',
        	'friendly_name' => 'Laundry',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'internet_access',
        	'friendly_name' => 'Internet Access',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'tv',
        	'friendly_name' => 'TV',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'swimming_pool',
        	'friendly_name' => 'Swimming Pool',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'wheelchair',
        	'friendly_name' => 'Wheelchair',
        	'owner' => 'house',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'air_conditioning',
        	'friendly_name' => 'Air Conditioning',
        	'owner' => 'house',
        	'description' => ''
        ]);

        //----------------------------------------------------------------

        // Area Amenities

        $feature = Feature::firstOrCreate([
        	'name' => 'tennis',
        	'friendly_name' => 'Tennis',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'park',
        	'friendly_name' => 'Park',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'gym',
        	'friendly_name' => 'Gym',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'golf',
        	'friendly_name' => 'Golf',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'swimming',
        	'friendly_name' => 'Swimming',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'health_club',
        	'friendly_name' => 'Health Club',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'train_station',
        	'friendly_name' => 'Train Station',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'medical_center',
        	'friendly_name' => 'Medical Center',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'bowling',
        	'friendly_name' => 'Bowling',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'beach',
        	'friendly_name' => 'Beach',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'cinema',
        	'friendly_name' => 'Cinema',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'library',
        	'friendly_name' => 'Library',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'museum',
        	'friendly_name' => 'Museum',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'fishing',
        	'friendly_name' => 'Fishing',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'bus_stop',
        	'friendly_name' => 'Bus Stop',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'shopping_centre',
        	'friendly_name' => 'Shopping Centre',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'amusement_park',
        	'friendly_name' => 'Amusement Park',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'horse_stables',
        	'friendly_name' => 'Horse Stables',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'water_sports',
        	'friendly_name' => 'Water Sports',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'sports_arena',
        	'friendly_name' => 'Sports Arena',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'restaurant',
        	'friendly_name' => 'Restaurant',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'hospital',
        	'friendly_name' => 'Hospital',
        	'owner' => 'local_area',
        	'description' => ''
        ]);

        //-----------------------------------------------------

        // Vacancy features


        $feature = Feature::firstOrCreate([
        	'name' => 'desk_lamp',
        	'friendly_name' => 'Desk and Lamp',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'air_conditioning',
        	'friendly_name' => 'Air Conditioning',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'beside_locker_nightstand',
        	'friendly_name' => 'Beside Locker / Nightstand',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'dresser_drawers',
        	'friendly_name' => 'Dresser / Drawers',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'carpet_moquette',
        	'friendly_name' => 'Carpet / Moquette',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'closet_wardrobe',
        	'friendly_name' => 'Closet / Wardrobe',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'wheelchair',
        	'friendly_name' => 'Wheelchair',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'radio',
        	'friendly_name' => 'Radio',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'tv',
        	'friendly_name' => 'TV',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'mirror',
        	'friendly_name' => 'Mirror',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'hairdryer',
        	'friendly_name' => 'Hairdryer',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'insect_screen',
        	'friendly_name' => 'Insect Screen',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'fan',
        	'friendly_name' => 'Fan',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
        	'name' => 'heater',
        	'friendly_name' => 'Heater',
        	'owner' => 'vacancy',
        	'description' => ''
        ]);

        //-----------------------------------------------------

        // Other Family Information

        // Other Family Information - Family Welcomes

        $feature = Feature::firstOrCreate([
            'name' => 'couples',
            'friendly_name' => 'Couples',
            'owner' => 'family-other-info-welcomes',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'males',
            'friendly_name' => 'Males',
            'owner' => 'family-other-info-welcomes',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'females',
            'friendly_name' => 'Females',
            'owner' => 'family-other-info-welcomes',
            'description' => ''
        ]);

        // Other Family Information - Smoking

        $feature = Feature::firstOrCreate([
            'name' => 'indoor',
            'friendly_name' => 'Indoor',
            'owner' => 'family-other-info-smoking',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'outdoor',
            'friendly_name' => 'Outdoor',
            'owner' => 'family-other-info-smoking',
            'description' => ''
        ]);

        // Other Family Information - Pets

        $feature = Feature::firstOrCreate([
            'name' => 'dog',
            'friendly_name' => 'Dog',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'cat',
            'friendly_name' => 'Cat',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'fish',
            'friendly_name' => 'Fish',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'hamster',
            'friendly_name' => 'Hamster',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'guinea-pig',
            'friendly_name' => 'Guinea Pig',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'gerbil',
            'friendly_name' => 'Gerbil',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'rabbit',
            'friendly_name' => 'Rabbit',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'canary',
            'friendly_name' => 'Canary',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'parrot',
            'friendly_name' => 'Parrot',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'turtle',
            'friendly_name' => 'Turtle',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'tortoise',
            'friendly_name' => 'Tortoise',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'lizard',
            'friendly_name' => 'Lizard',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'iguana',
            'friendly_name' => 'Iguana',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'snake',
            'friendly_name' => 'Snake',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'frog',
            'friendly_name' => 'Frog',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'other',
            'friendly_name' => 'Other',
            'owner' => 'family-other-info-pet',
            'description' => ''
        ]);

        // Other Family Information - Diet

        $feature = Feature::firstOrCreate([
            'name' => 'vegetarian',
            'friendly_name' => 'Vegetarian',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'vegan',
            'friendly_name' => 'Vegan',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'coeliac',
            'friendly_name' => 'Coeliac',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'kosher',
            'friendly_name' => 'Kosher',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'diabetic',
            'friendly_name' => 'Diabetic',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'lactose_intolerant',
            'friendly_name' => 'Lactose Intolerant',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'nut_allergies',
            'friendly_name' => 'Nut Allergies',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'halal',
            'friendly_name' => 'Halal',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'halal',
            'friendly_name' => 'Halal',
            'owner' => 'family-other-info-diet',
            'description' => ''
        ]);

        // Other Family Information - Hobbies Art

        $feature = Feature::firstOrCreate([
            'name' => 'dancing',
            'friendly_name' => 'Dancing',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'fashion-design',
            'friendly_name' => 'Fashion Design',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'interior-design',
            'friendly_name' => 'Interior Design',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'flower-arranging',
            'friendly_name' => 'Flower arranging',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'jewellery-making',
            'friendly_name' => 'Jewellery making',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'knitting-sewing',
            'friendly_name' => 'Knitting, sewing',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'learning-foreign-languages',
            'friendly_name' => 'Learning foreign languages',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'misic-gigs-festivals',
            'friendly_name' => 'Music, gigs, festivals',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'nature',
            'friendly_name' => 'Nature',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'opera',
            'friendly_name' => 'Opera',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'painting',
            'friendly_name' => 'Painting',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'photography',
            'friendly_name' => 'Photography',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'play-insturment',
            'friendly_name' => 'Playing a musical instrument',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'poetry',
            'friendly_name' => 'Poetry',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'pottery',
            'friendly_name' => 'Pottery',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'reading',
            'friendly_name' => 'Reading',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'theatre',
            'friendly_name' => 'Theatre',
            'owner' => 'family-other-info-hobby-art',
            'description' => ''
        ]);

        // Other Family Information - Hobbies Lifestyle

        $feature = Feature::firstOrCreate([
            'name' => 'blogging',
            'friendly_name' => 'Blogging',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'board-games',
            'friendly_name' => 'Board games',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'bungee-jumping',
            'friendly_name' => 'Bungee jumping',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'camping',
            'friendly_name' => 'Camping',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'chess',
            'friendly_name' => 'Chess',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'computer-games',
            'friendly_name' => 'Computer games',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'cooking',
            'friendly_name' => 'Cooking',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'diet-nutrition',
            'friendly_name' => 'Diet and nutrition',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'fishing',
            'friendly_name' => 'Fishing',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'fitness-gym',
            'friendly_name' => 'Fitness, gym',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'gardening',
            'friendly_name' => 'Gardening',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'go-karting',
            'friendly_name' => 'Go karting',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        

        $feature = Feature::firstOrCreate([
            'name' => 'hill-walking',
            'friendly_name' => 'Hill walking',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'horse-riding',
            'friendly_name' => 'Horse riding',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'playing-cards',
            'friendly_name' => 'Playing cards',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'riding-motorbikes',
            'friendly_name' => 'Riding motorbikes',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'watch-tv-series-movies',
            'friendly_name' => 'Watch TV, series and movies',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'travel',
            'friendly_name' => 'Travel',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'yoga',
            'friendly_name' => 'Yoga',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'cooking',
            'friendly_name' => 'Cooking',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);

        // Other Family Information - Hobbies Sports

        

        $feature = Feature::firstOrCreate([
            'name' => 'golf',
            'friendly_name' => 'Golf',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'tennis',
            'friendly_name' => 'Tennis',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'football',
            'friendly_name' => 'Football',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'cycling',
            'friendly_name' => 'Cycling',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'archery',
            'friendly_name' => 'Archery',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'running',
            'friendly_name' => 'Running',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'swimming',
            'friendly_name' => 'Swimming',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'handball',
            'friendly_name' => 'Handball',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'basketball',
            'friendly_name' => 'Basketball',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'skiing',
            'friendly_name' => 'Skiing',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'snow-boarding',
            'friendly_name' => 'Snow boarding',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'surfing',
            'friendly_name' => 'Surfing',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);


        $feature = Feature::firstOrCreate([
            'name' => 'sailing',
            'friendly_name' => 'Sailing',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'car-bike-racing',
            'friendly_name' => 'Car, bike racing',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'extreme-sports',
            'friendly_name' => 'Extreme sports',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'mountain-biking',
            'friendly_name' => 'Mountain biking',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'sky-diving',
            'friendly_name' => 'Sky Diving',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'mountain-climbing',
            'friendly_name' => 'Mountain climbing',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'baseball',
            'friendly_name' => 'Baseball',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'boating',
            'friendly_name' => 'Boating',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'parkour',
            'friendly_name' => 'Parkour',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'scuba-diving',
            'friendly_name' => 'Scuba Diving',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'surfing',
            'friendly_name' => 'Surfing',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'parkour',
            'friendly_name' => 'Parkour',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'snowboarding',
            'friendly_name' => 'Snowboarding',
            'owner' => 'family-other-info-hobby-sports',
            'description' => ''
        ]);

        $feature = Feature::firstOrCreate([
            'name' => 'hiking',
            'friendly_name' => 'Hiking',
            'owner' => 'family-other-info-hobby-lifestyle',
            'description' => ''
        ]);


        echo "Features successfuly created. ";

    }
}