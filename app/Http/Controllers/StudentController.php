<?php

namespace App\Http\Controllers;

use Auth;
use App\Student;
use App\Partner;
use App\User;
use App\Feature;
use App\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::denies('view-student-index'))
        {
            return abort(403);
        }
        return view('student/index');
    }

    public function show($id)
    {
        if(Gate::denies('view-student-profile'))
        {
            return abort(403);
        }

        $student = Student::where('user_id', $id)->first();
        $features_diet = Feature::where('owner','family-other-info-diet')->get();
        $features_pets = Feature::where('owner','family-other-info-pet')->get();
        $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
        $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();
        $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();

        return view('student/show', compact('student','features_diet', 'features_pets', 'features_hobby_art', 'features_hobby_sports', 'features_hobby_lifestyle'));
    }

    public function booking()
    {
        if(Gate::denies('view-student-booking'))
        {
            return abort(403);
        }

        $student = Student::where('user_id', Auth::user()->id)->first();
        //dd($student);
        $booking = Booking::where('student_id', $student->user_id)->first();
        //dd($booking);

        return view('student/booking', compact('booking'));
    }


    /**

     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'passport_number' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'date_birth' => 'required',
            'english_level' => 'required',
            'about_student' => 'required',

            
            'emergency_first_name' => 'required',
            'emergency_last_name' => 'required',
            'emergency_email' => 'required',
            'emergency_phone_number' => 'required',
            'emergency_country' => 'required',

            'objec_pets' => 'required',
            'objec_under_10' => 'required',
            'any_medical_issue' => 'required',
            'have_allergies' => 'required',
            'any_dietary_request' => 'required',
            'any_special_needs' => 'required',
            'smoke' => 'required',
        ]);

        //$user_id = session('user_id');
        $partner = Partner::where('user_id', session('user_id'))->first();
        $password = mt_rand(100000, 999999);

        $features_pet = $request->input('features_pet');
        $features_diet = $request->input('features_dietary_request');
        $features_hobby_art = $request->input('features_hobby_art');
        $features_hobby_lifestyle = $request->input('features_hobby_lifestyle');
        $features_hobby_sports = $request->input('features_hobby_sports');

        $set_features = [];
        
        if($request->like_pets)
        {
            foreach ($features_pet as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-pet']
                    ])->value('id');

                $set_features_pet[] = $feature_id;
            }
            $set_features = $set_features_pet;
        }

        if($request->any_dietary_request)
        {
            foreach ($features_diet as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-diet']
                    ])->value('id');

                $set_features_diet[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_diet);
        }

        if(!empty($features_hobby_art))
        {
            foreach ($features_hobby_art as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-hobby-art']
                    ])->value('id');

                $set_features_hobby_art[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_hobby_art);
        }

        if(!empty($features_hobby_lifestyle))
        {
            foreach ($features_hobby_lifestyle as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-hobby-lifestyle']
                    ])->value('id');

                $set_features_hobby_lifestyle[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_hobby_lifestyle);
        }

        if(!empty($features_hobby_sports))
        {
            foreach ($features_hobby_sports as $feature) {

                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-hobby-sports']
                    ])->value('id');

                $set_features_hobby_sports[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_hobby_sports);
        }

        //dd(request('any_dietary_request'));

        $user = User::firstOrCreate([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'temp_password' => $password,
            'password' => bcrypt($password),
            'email_token' => base64_encode(request('email')),
        ]);

        $user->student = Student::create([
            'user_id' => $user->id,
            'gender' => request('gender'),
            'country' => request('country'),
            'passport_number' => request('passport_number'),
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'mobile_number' => '',
            'date_birth' => request('date_birth'),
            'english_level' => request('english_level'),
            'about_student' => request('about_student'),

            'emergency_first_name' => request('emergency_first_name'),
            'emergency_last_name' => request('emergency_last_name'),
            'emergency_email' => request('emergency_email'),
            'emergency_phone_number' => request('emergency_phone_number'),
            'emergency_mobile_number' => '',
            'emergency_country' => request('emergency_country'),
            'emergency_relationship' => request('emergency_relationship'),

            'objec_pets' => request('objec_pets'),
            'objec_under_10' => request('objec_under_10'),
            'medical_issue' => request('any_medical_issue'),
            'medical_issue_desc' => request('medical_issue_desc'),
            'allergy' => request('have_allergies'),
            'allergy_desc' => request('allergy_desc'),
            'dietary_request' => request('any_dietary_request'),
            'special_needs' => request('any_special_needs'),
            'special_needs_desc' => request('special_needs_desc'),
            'smoke' => request('smoke'),

            'arrival_date' => '',
            'departure_date' => '',
            'flight_date' => '',
            'flight_time' => '',
            'flight_number' => '',
            'airport' => '',
            'airline_company' => '',
            'airport' => '',
            'partner_code' => $partner->partner_code,
        ]);

        
        $user->student->features()->sync($set_features);
        $user->roles()->attach(3);
        
        //dd(request('medical_issue_desc'), request('allergy_desc'));
        //dd($set_features);
        
        //dd(!session()->has('create_second_student'));
        if( (($request->input('room_type') == 'two-singles') or ($request->input('room_type') == 'couple')) and (!session()->has('create_second_student')))
        {
            session(['create_second_student' => 1]);
            session(['host_type' => request('host_type')]);
            session(['room_type' => request('room_type')]);
            session(['student_2_id' => $user->student->user_id]);
            return redirect()->route('partner.student.create');
        }

        session(['student_1_id' => $user->student->user_id]);

        if($request->input('room_type') == 'single')
        {
            session(['host_type' => request('host_type')]);
            session(['room_type' => request('room_type')]);
        }
        
        if( session()->has('create_second_student') )
        {
            session()->forget('create_second_student');
        }
        
        return redirect()->route('booking.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student_id)
    {
        $student = Student::where('user_id', $student_id)->first();

        $features_diet = Feature::where('owner','family-other-info-diet')->get();
        $features_pets = Feature::where('owner','family-other-info-pet')->get();
        $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
        $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();
        $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();

        return view('student/edit', compact('partner', 'student', 'features_diet', 'features_pets', 'features_hobby_art', 'features_hobby_sports', 'features_hobby_lifestyle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        //dd('PartnerController@studentUpdate');

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'passport_number' => 'required',
            'gender' => 'required',
            'date_birth' => 'required',
            'country' => 'required',
            'address' => 'required',
            'english_level' => 'required',
            'about_student' => 'required',

            'emergency_first_name' => 'required',
            'emergency_last_name' => 'required',
            'emergency_email' => 'required',
            'emergency_phone_number' => 'required',
            'emergency_country' => 'required',

            'objec_pets' => 'required',
            'objec_kids' => 'required',
            'medical_issue' => 'required',
            'allergy' => 'required',
            'dietary_request' => 'required',
            'special_needs' => 'required',
            'smoke' => 'required',
        ]);

        $student = Student::where('user_id', $student_id)->first();
        $data = $request->except(['first_name','last_name']);
        $student->update($data);

        $features_pet = $request->input('features_pet');
        $features_diet = $request->input('features_diet');
        $features_hobby_art = $request->input('features_hobby_art');
        $features_hobby_lifestyle = $request->input('features_hobby_lifestyle');
        $features_hobby_sports = $request->input('features_hobby_sports');

        //dd($request->objec_pets, $features_pet, $request->dietary_request, $features_diet);
        $set_features = [];
        
        if($request->objec_pets)
        {
            foreach ($features_pet as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-pet']
                    ])->value('id');

                $set_features_pet[] = $feature_id;
            }
            $set_features = $set_features_pet;
        }



        if($request->dietary_request)
        {
            foreach ($features_diet as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-diet']
                    ])->value('id');

                $set_features_diet[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_diet);
        }

        if(!empty($features_hobby_art))
        {
            foreach ($features_hobby_art as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-hobby-art']
                    ])->value('id');

                $set_features_hobby_art[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_hobby_art);
        }

        if(!empty($features_hobby_lifestyle))
        {
            foreach ($features_hobby_lifestyle as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-hobby-lifestyle']
                    ])->value('id');

                $set_features_hobby_lifestyle[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_hobby_lifestyle);
        }

        if(!empty($features_hobby_sports))
        {
            foreach ($features_hobby_sports as $feature) {

                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-hobby-sports']
                    ])->value('id');

                $set_features_hobby_sports[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_hobby_sports);
        }
        //dd($set_features);
        $student->features()->sync($set_features);

        $name = $request->only(['first_name', 'last_name']);
        $user = User::find($student->user_id);
        $user->first_name = $name['first_name'];
        $user->last_name = $name['last_name'];
        $user->save();


        if(Auth::user()->isAdmin())
        {
            return redirect()->route('admin.student.show', compact('student_id'));
        }elseif(Auth::user()->isPartner())
        {
            return redirect()->route('partner.student.show', compact('student_id'));
        }else{
            return redirect()->route('student.show', compact('student_id'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
