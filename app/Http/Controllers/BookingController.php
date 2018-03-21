<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Host;
use App\House;
use App\Partner;
use App\Feature;
use App\Student;
use App\Vacancy;
use Carbon\Carbon;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($partner_id)
  {
    $partner = Partner::find($partner_id);
    return view('booking/index', compact('partner'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $features_pet = Feature::where('owner','family-other-info-pet')->get();

    $features_diet = Feature::where('owner','family-other-info-diet')->get();

    $features_hobby_art = Feature::where('owner','family-other-info-hobby-art')->get();
    $features_hobby_lifestyle = Feature::where('owner','family-other-info-hobby-lifestyle')->get();
    $features_hobby_sports = Feature::where('owner','family-other-info-hobby-sports')->get();

    $partner_id = session('partner_id');
    return view('booking/create', compact('partner_id', 'features_pet', 'features_diet', 'features_hobby_art', 'features_hobby_lifestyle', 'features_hobby_sports'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //dd($checkboxes);

    $this->validate($request,[
        'city' => 'required',
        'school_name' => 'required',
        'school_address' => 'required',
        'checkin' => 'required',
        'length_stay' => 'required',
    ]);

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
        'student_id' => session('student_1_id'),
        'partner_id' => session('current_user_id'),
        'vacancy_id' => 1,
        'status' => 1,
        'host_type' => session('host_type'),
        'room_type' => session('room_type'),

        'arrival_date' => request('arrival_date'),
        'arrival_time' => request('arrival_time'),
        'flight_number' => request('flight_number'),
        'airport' => request('airport'),
        'airline_company' => request('airline_company'),

        'pickup' => request('pickup'),
        'return_trip' => request('return_trip')
    ]);

    $request->session()->forget('student_1_id');

    if ($request->session()->has('student_2_id')) 
    {
      $booking = Booking::firstOrCreate([
        'city' => request('city'),
        'country' => 'Australia',
        'school_name' => request('school_name'),
        'school_address' => request('school_address'),
        'checkin' => request('checkin'),
        'length_stay' => request('length_stay'),
        'checkout' => $departure_date,
        'student_id' => session('student_2_id'),
        'partner_id' => session('current_user_id'),
        'vacancy_id' => 1,
        'status' => 1,
        'host_type' => session('host_type'),
        'room_type' => session('room_type'),

        'arrival_date' => request('arrival_date'),
        'arrival_time' => request('arrival_time'),
        'flight_number' => request('flight_number'),
        'airport' => request('airport'),
        'airline_company' => request('airline_company'),

        'pickup' => request('pickup'),
        'return_trip' => request('return_trip')
      ]);

      $request->session()->forget('student_2_id');
    }
    $request->session()->forget('host_type');
    $request->session()->forget('room_type');
    return redirect()->route('homepage');
  }

  public function show($booking_id)
    {
        $booking = Booking::find($booking_id);

        return view('booking/show', compact('booking'));
    }

  public function edit($booking_id)
    {
        $booking = Booking::find($booking_id);

        return view('booking/edit', compact('booking'));
    }

  public function update(Request $request, $booking_id)
    {
        //dd('PartnerController@bookingUpdate');

        $this->validate($request,[
        'city' => 'required',
        'school_name' => 'required',
        'school_address' => 'required',
        'checkin' => 'required',
        'checkout' => 'required',
        ]);

        $booking = Booking::find($booking_id);
        $data = $request->all();
        $booking->update($data);

        if($data['pickup'] == 0)
        {
            $booking->return_trip = 0;
            $booking->save();
        }
        
        return view('booking/show', compact('booking', 'partner'));
    }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Booking  $booking
  * @return \Illuminate\Http\Response
  */
  public function destroy(Booking $booking)
  {
    //
  }

  /**
  * Match de student com host
  */
  public function match($booking_id)
  {
    $booking = Booking::find($booking_id);

    $student = Student::find($booking->student->id);

    //dd($booking, $student);

    $vacancies = Vacancy::whereHas('house', function($query) use($booking)
      {
        $query->where('city', $booking->city);
        //$query->where('country', $booking->country);
        $query->whereHas('user', function($query) use($booking)
        {
          $query->whereHas('host', function($query) use($booking)
          {
            $query->where('host_type', $booking->host_type);
          });
        });
      })->get();

    //dd($booking, $vacancies);

    return view('booking/match', compact('vacancies', 'booking', 'student'));
  }


  public function booking(Request $request, $booking_id, $vacancy_id)
  {
    $booking = Booking::find($booking_id);

    $booking->vacancy_id = $vacancy_id;
    $booking->status = 2;
    $booking->save();

    return redirect()->route('admin.booking');

  }
}
