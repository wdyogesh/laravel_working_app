<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Booking;
use App\Vacancy;
use App\Student;
use App\Feature;
use App\Host;
use App\House;
use Auth;

class HostController extends Controller
{

    protected function validator(array $data)
    {

        $validator = Validator::make($data,
            [
                'first_name' => 'required|string|max:190',
                'last_name' => 'required|string|max:190',
                'mobile_number' =>  'required|string|max:30',
                'occupation' => 'required|string|max:190',
                'gender' => 'required',
                'date_birth' => 'required|date',
                'country' => 'required|string|max:190',
                'hear_about_us' => 'required|string|max:190',
                'features_welcome' => 'required',
                'features_hobby_art' => 'required',
                'features_hobby_lifestyle' => 'required',
                'features_hobby_sports' => 'required',
            ],
            [
                'first_name.required' => 'Fist name required',
                'first_name.max' => 'First name field accepts 190 characters max',

                'last_name.required' => 'Last name required',
                'last_name.max' => 'Last name field accepts 190 characters max',

                'mobile_number.required' => 'Mobile number required',
                'mobile_number.max' => 'Mobile number field accepts 30 characters max',

                'occupation.required' => 'Occupation required',
                'occupation.max' => 'Occupation field accepts 190 characters max',

                'gender.required' => 'Gender required',

                'date_birth.required' => 'Date of birth required',

                'country.required' => 'Country required',
                'country.max' => 'Country field accepts 190 characters max',

                'hear_about_us.required' => '"How did you hear about us?"" field required',
                'hear_about_us.max' => 'Address field accepts 190 characters max',
            ]
        );

        $validator->sometimes('since_when', 'required|numeric', function ($input) {
            return $input->hosted_students_before == 1;
        });

        $validator->sometimes('features_smoking', 'required', function ($input) {
            return $input->can_students_smoke == 1;
        });

        $validator->sometimes('features_pet', 'required', function ($input) {
            return $input->have_pets == 1;
        });

        $validator->sometimes('features_diet', 'required', function ($input) {
            return $input->special_dietarian == 1;
        });

        return $validator;
    }

    public function index()
    {
        if(Gate::denies('view-host-index'))
        {
            return abort(403,'Nao autorizado');
        }

        $host = Host::where('user_id', Auth::user()->id)->first();

        return view('host/index', compact('host'));
    }

    public function show($id)
    {
        $host = Host::where('user_id',$id)->first();

        $features_welcomes = Feature::where('owner','family-other-info-welcomes')->get();
        $features_smoking = Feature::where('owner','family-other-info-smoking')->get();
        $features_pet = Feature::where('owner','family-other-info-pet')->get();
        $features_diet = Feature::where('owner','family-other-info-diet')->get();
        $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
        $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();
        $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();
        
        return view('host/show', compact('host', 'features_welcomes', 'features_smoking', 'features_pet', 'features_diet', 'features_hobby_art', 'features_hobby_lifestyle', 'features_hobby_sports'));
    }

    public function edit($id)
    {
        $host = Host::where('user_id',$id)->first();

        $features_welcomes = Feature::where('owner','family-other-info-welcomes')->get();
        $features_smoking = Feature::where('owner','family-other-info-smoking')->get();
        $features_pet = Feature::where('owner','family-other-info-pet')->get();
        $features_diet = Feature::where('owner','family-other-info-diet')->get();
        $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
        $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();
        $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();

        return view('host/edit', compact('host', 'features_welcomes', 'features_smoking', 'features_pet', 'features_diet', 'features_hobby_art', 'features_hobby_lifestyle', 'features_hobby_sports'));
    }

    public function update(Request $request, $host_id)
    {
        $this->validator($request->all())->validate();

        //dd($request);
        
        $data = $request->except(['first_name','last_name']);
        $name = $request->only(['first_name', 'last_name']);

        $host = Host::where('user_id',$host_id)->first();
        $host->update($data);

        $user = User::find($host_id);
        $user->first_name = $name['first_name'];
        $user->last_name = $name['last_name'];
        if($request->has('profile_picture'))
        {
            $avatar = Storage::disk('avatar')->putFile('/', $request->file('profile_picture'));
            $user->avatar_path = $avatar;
        }
        $user->save();

        //Set all features to the user
        $features_welcomes = $request->input('features_welcome');
        $features_smoking = $request->input('features_smoking');
        $features_pet = $request->input('features_pet');
        $features_diet = $request->input('features_diet');
        $features_hobby_art = $request->input('features_hobby_art');
        $features_hobby_lifestyle = $request->input('features_hobby_lifestyle');
        $features_hobby_sports = $request->input('features_hobby_sports');

        foreach ($features_welcomes as $feature) {
            $feature_id = Feature::where([
                ['name', $feature],
                ['owner', 'family-other-info-welcomes']
                ])->value('id');

            $set_features_welcomes[] = $feature_id;
        }

        $set_features = $set_features_welcomes;
        if($request->can_students_smoke)
        {
            foreach ($features_smoking as $features) {
                $feature_id = Feature::where([
                    ['name', $features],
                    ['owner', 'family-other-info-smoking']
                    ])->value('id');

                $set_features_smoking[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_smoking);
        }

        //dd($set_features_smoking);

        if($request->have_pets)
        {
            foreach ($features_pet as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-pet']
                    ])->value('id');

                $set_features_pet[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_pet);
        }

        if($request->special_dietarian)
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

        if($features_hobby_art)
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

        if($features_hobby_lifestyle)
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

        if($features_hobby_sports)
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

        $host->features()->sync($set_features);

        //

        if(Auth::user()->isAdmin())
        {
            return redirect()->route('admin.host.show', compact('host_id'));
        }else{
            return redirect()->route('host.show', compact('host_id'));
        }

        
    }
    /*
    public function other_info_show($id)
    {
        $features_welcomes = Feature::where('owner','family-other-info-welcomes')->get();
        $features_smoking = Feature::where('owner','family-other-info-smoking')->get();
        $features_pet = Feature::where('owner','family-other-info-pet')->get();
        $features_diet = Feature::where('owner','family-other-info-diet')->get();
        $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
        $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();
        $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();

        $host = Host::find($id);
        //$url = Storage::url(User::where('id',$host->user_id)->first()->avatar_path);

        return view('host/other_info/show',compact('host','features_welcomes','features_smoking','features_pet','features_diet',
            'features_hobby_art', 'features_hobby_lifestyle', 'features_hobby_sports'));
    }

    public function other_info_edit($id)
    {
        $features_welcomes = Feature::where('owner','family-other-info-welcomes')->get();
        $features_smoking = Feature::where('owner','family-other-info-smoking')->get();
        $features_pet = Feature::where('owner','family-other-info-pet')->get();
        $features_diet = Feature::where('owner','family-other-info-diet')->get();
        $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
        $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();
        $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();

        $host = Host::find($id);

        return view('host/other_info/edit',compact('host','features_welcomes','features_smoking','features_pet','features_diet',
            'features_hobby_art', 'features_hobby_lifestyle', 'features_hobby_sports'));
    }

    public function other_info_update(Request $request, $id)
    {
        $features_welcomes = $request->input('features_welcome');
        $features_smoking = $request->input('features_smoking');
        $features_pet = $request->input('features_pet');
        $features_diet = $request->input('features_diet');
        $features_hobby_art = $request->input('features_hobby_art');
        $features_hobby_lifestyle = $request->input('features_hobby_lifestyle');
        $features_hobby_sports = $request->input('features_hobby_sports');

        $this->validate($request,[
            'features_welcome' => 'required'
        ]);

        $host = $request->all();

        foreach ($features_welcomes as $feature) {
            $feature_id = Feature::where([
                ['name', $feature],
                ['owner', 'family-other-info-welcomes']
                ])->value('id');

            $set_features_welcomes[] = $feature_id;
        }

        $set_features = $set_features_welcomes;
        if($request->can_students_smoke)
        {
            foreach ($features_smoking as $features) {
                $feature_id = Feature::where([
                    ['name', $features],
                    ['owner', 'family-other-info-smoking']
                    ])->value('id');

                $set_features_smoking[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_smoking);
        }

        //dd($set_features_smoking);

        if($request->have_pets)
        {
            foreach ($features_pet as $feature) {
                $feature_id = Feature::where([
                    ['name', $feature],
                    ['owner', 'family-other-info-pet']
                    ])->value('id');

                $set_features_pet[] = $feature_id;
            }
            $set_features = array_merge($set_features,$set_features_pet);
        }

        if($request->special_dietarian)
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

        if($features_hobby_art)
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

        if($features_hobby_lifestyle)
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

        if($features_hobby_sports)
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

        //dd($host);

        Host::find($id)->update($host);

        Host::find($id)->features()->sync($set_features);

        return redirect()->route('other.info.show', $id);
    }

    */


    public function register_home_location()
    {
        return view('host/register/house-location');
    }

    public function register_room_setup()
    {
        return view('host/register/room-setup');
    }

    public function register_photos()
    {
        return view('host/register/photos');
    }

    public function register_other_info()
    {
        return view('host/register/other-info');
    }

    public function register_finish()
    {
        $host = Host::where('user_id', Auth::user()->id)->first();

        $host->profile_completed = 1;
        $host->save();
        return view('host/register/finish', compact('host'));
    }

    public function profile()
    {
        return view('host/profile');
    }

    public function bookingList()
    {
        $host = Host::where('user_id', Auth::user()->id)->first();
        $houses = House::where('user_id',Auth::user()->id)->get();

        foreach ($houses as $house) {
            $vacancy_id = Vacancy::where('house_id', $house->id)->value('id');
            $vacancies[] = $vacancy_id;
        }

        $bookings = Booking::whereIn('vacancy_id', $vacancies)->get();
        
        return view('host/bookingList', compact('bookings', 'host'));
    }  


}
