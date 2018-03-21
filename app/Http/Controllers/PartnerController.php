<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

use App\Partner;
use App\User;
use App\Student;
use App\Booking;
use App\Feature;
use Auth;


class PartnerController extends Controller
{
    protected function validator(array $data)
    {

        $validator = Validator::make($data,
            [
                'first_name' => 'required|string|max:190',
                'last_name' => 'required|string|max:190',
                'business_name' => 'required|string|max:190',
                'business_registration_number' => 'required',
                'website' => 'required|string|max:190',
                'phone_number' =>  'required|string|max:30',
                'country' => 'required|string|max:190',
                'address' => 'required|string|max:190',
            ],
            [
                'first_name.required' => 'Fist name required',
                'first_name.max' => 'First name field accepts 190 characters max',

                'last_name.required' => 'Last name required',
                'last_name.max' => 'Last name field accepts 190 characters max',

                'business_name.required' => 'Business name required',
                'business_name.max' => 'Business field accepts 190 characters max',

                'business_registration_number.required' => 'Business registration number is required',

                'website.required' => 'Website required',
                'website.max' => 'Website field accepts 190 characters max',

                'phone_number.required' => 'Phone number required',
                'phone_number.max' => 'Phone number field accepts 30 characters max',

                'country.required' => 'Country required',
                'country.max' => 'Country field accepts 190 characters max',

                'address.required' => 'Address required',
                'address.max' => 'Address field accepts 190 characters max',
            ]
        );

        return $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('view-partner-index'))
        {
            return abort(403,'Nao autorizado');
        }

        $partner = Partner::where('user_id', Auth::user()->id)->first();
        

        //dd($partner);

        return view('partner/index', compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($partner_id)
    {
        $partner = Partner::where('user_id',$partner_id)->first();
        //dd($partner);
        return view('partner/show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::where('user_id',$id)->first();
        return view('partner/edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('PartnerControler@Update');
        $this->validator($request->all())->validate();      

        $data = $request->except(['first_name','last_name']);
        $name = $request->only(['first_name', 'last_name']);

        //$avatar = $request->file('profile_picture')->store('profile_picture');
        //$avatar = Storage::disk('avatar')->putFile('/', $request->file('profile_picture'));
        //dd($avatar);
        $partner = Partner::where('user_id',$id)->first();
        //dd('aqui',$id, $data, $name, $partner);
        $partner->update($data);

        //dd($name['first_name']);
        //dd(User::find(Auth::user()->id));
        $user = User::find($partner->user_id);
        $user->first_name = $name['first_name'];
        $user->last_name = $name['last_name'];
       // $user->avatar_path = $avatar;
        $user->save();

        return redirect()->route('partner.show', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function studentList()
    {
        $partner = Partner::where('user_id', Auth::user()->id)->first();

        $students = Student::where('partner_code', $partner->partner_code)->get();



        return view('partner/student/list', compact('partner', 'students'));
    }

    public function studentCreate()
    {
        //$partner_id = session('partner_id');

        $partner = Partner::where('user_id', Auth::user()->id)->first();

        $features_pet = Feature::where('owner','family-other-info-pet')->get();
        $features_diet = Feature::where('owner','family-other-info-diet')->get();
        $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
        $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();
        $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();
        
        return view('partner/student/create', compact('partner', 'features_pet', 'features_diet', 'features_hobby_art', 'features_hobby_lifestyle', 'features_hobby_sports'));
    }

    public function bookingList()
    {
        $partner = Partner::where('user_id', Auth::user()->id)->first();

        $bookings = Booking::where('partner_id', $partner->user_id)->get();

       

        return view('partner/booking/list', compact('bookings', 'partner'));
    }

    

    public function bookingCreate($student_id)
    {
        $partner = Partner::where('user_id', Auth::user()->id)->first();

        $student = Student::where('user_id', $student_id)->first();

        return view('partner/booking/create', compact('student', 'partner'));
    }

    public function bookingStore(Request $request, $student_id)
    {

        $this->validate($request,[
            'city' => 'required',
            'school_name' => 'required',
            'school_address' => 'required',
            'checkin' => 'required',
            'length_stay' => 'required',
        ]);

        $partner = Partner::where('user_id', Auth::user()->id)->first();
        $student = Student::where('user_id', $student_id)->first();

        $checkin = new Carbon(request('checkin'));
        $length_stay_days = 7 * request('length_stay');
        $departure_date = $checkin->addDays($length_stay_days);

        $booking = Booking::firstOrCreate([
            'city' => request('city'),
            'country' => 'Australia',
            'school_name' => request('school_name'),
            'school_address' => request('school_address'),
            'checkin' => request('checkin'),
            'length_stay' => request('length_stay'),
            'checkout' => $departure_date,
            'student_id' => $student->id,
            'partner_id' => $partner->id,
            'vacancy_id' => 1,
            'status' => 1,
            'host_type' => request('host_type'),
            'room_type' => request('room_type'),

            'arrival_date' => request('arrival_date'),
            'arrival_time' => request('arrival_time'),
            'flight_number' => request('flight_number'),
            'airport' => request('airport'),
            'airline_company' => request('airline_company'),

            'pickup' => request('pickup'),
            'return_trip' => request('return_trip')
        ]);

        return redirect()->route('partner.student.list');
    }

    

    
}
