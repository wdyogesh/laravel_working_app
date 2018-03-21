<?php

namespace App\Http\Controllers;


use App\Admin;
use App\Booking;
use App\Student;
use App\Host;
use App\User;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;
use PDF;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        if(Gate::denies('view-admin-index'))
        {
            return abort(403,'Nao autorizado');
        }
        
        return view('admin/index');
    }

    /**
     * Display the admin profile.
     */
    public function show($admin_id)
    {
        $admin = Admin::find($admin_id);

        return view('admin/profile', compact('admin'));
    }

    /**
     * Create a new admin profile.
     */
    public function create(Request $request)
    {
        

        $this->validate($request,[
            'first_name' => 'required|string|max:190',
            'family_name' => 'required|string|max:190',
            'email' => 'required|string|email|max:190|unique:users',
            'mobile_number' => 'required|string|max:30',
            'occupation' => 'required|string|max:190',
            'gender' => 'required',
            'date_birth' => 'required|date',
            'country' => 'required',
        ]);

        $password = mt_rand(100000, 999999);

        $admin = User::firstOrCreate([
            'first_name' => request('title'),
            'family_name' => request('description'),
            'email' => request('email'),
            'temp_password' => $password,
            'password' => bcrypt($password),
            'email_token' => base64_encode(request('email')),
        ]);

        $admin->admin = Student::create([
            'user_id' => $admin->id,
            'mobile_number' => request('mobile_number'),
            'occupation' => request('occupation'),
            'gender' => request('gender'),
            'date_birth' => request('date_birth'),
            'country' => request('country'),
            'created_by' => Auth::user()->id
        ]);

        $admin->roles()->attach(5);

        return redirect()->route('admin.index');
    }

    /**
     * Show the form for editing the specified admin.
     */
    public function edit($id)
    {
        $admin = Admin::where('user_id',$id)->first();

        return view('admin/edit', compact('admin'));
    }

    /**
     * Update the specified admin in storage.
     */
    public function update(Request $request, $id)
    {
        $admin_data = $request->except(['first_name','last_name']);
        $user_data = $request->only(['first_name', 'last_name']);

        $admin = Admin::where('user_id',$id)->first();
        $admin->update($admin_data);

        $user = User::find($id);
        $user->first_name = $user_data['first_name'];
        $user->last_name = $user_data['last_name'];

        if($request->has('profile_picture'))
        {
            $avatar = Storage::disk('avatar')->putFile('/', $request->file('profile_picture'));
            $user->avatar_path = $avatar;
        }

        $user->save();

        return redirect()->route('admin.show', compact('id'));
    }

    public function booking()
    {
        $bookings = Booking::all();
        return view('admin/booking/bookings', compact('bookings'));
    }

    public function students()
    {
        $students = Student::all();
        return view('admin/students', compact('students'));
    }

    public function studentsEdit($student_id)
    {
        $student = Student::where('user_id', $student_id)->first();
        return view('admin/students', compact('student'));
    }

    public function pickups()
    {
        return view('admin/pickups');
    }

    public function hosts()
    {
        $hosts = Host::all();
        return view('admin/hosts', compact('hosts'));
    }

    public function partners()
    {
        $partners = Partner::all();
        return view('admin/partners', compact('partners'));
    }

    public function download($admin_id)
    {
        $admin = Admin::find($admin_id);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        set_time_limit(300);
        $pdf = PDF::loadView('admin/profile', compact('admin'));
        return $pdf->download('invoice.pdf');
    }


}
