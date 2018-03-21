<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Admin;
use App\Host;
use App\Student;
use App\Partner;
use App\Role;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin/user/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('id', [2,3,4] )->get();

        return view('admin/user/create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required|string|max:190',
            'last_name' => 'required|string|max:190',
            'email' => 'required|string|email|max:190|unique:users',
            'mobile_number' =>  'required|string|max:30',
            'role' => 'required',
            'gender' => 'required',
            'date_birth' => 'required|date',
            //'country' => 'required|string|max:190',
            'password' => 'required|string|min:6',
            
        ]);

        //dd($request);

        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'verified' => 1,
            'active' => 1,
            'email_token' => base64_encode(request('email')),
            'avatar_path' => 'default.png',
        ]);

        $user->admin = Admin::create([
            'user_id' => $user->id,
            'mobile_number' => request('mobile_number'),
            'date_birth' => request('date_birth'),
            'gender' => request('gender'),
            'created_by' => Auth::user()->id,
        ]);

        $user->roles()
            ->attach(request('role'));

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if($user->isAdmin())
        {
            $admin = Admin::where('user_id',$id)->first();
            return redirect()->route('admin.show',compact('id'));
        }elseif($user->isHost()){
            $host = Host::where('user_id',$id)->first();
            return redirect()->route('admin.host.show',compact('id'));
        }elseif($user->isPartner()){
            $partner = Partner::where('user_id',$id)->first();
            return redirect()->route('admin.partner.show',compact('id'));
        }else{
            $student = Student::where('user_id',$id)->first();
            return redirect()->route('admin.student.show',compact('id'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function avatar($avatar)
    {
        $image = Storage::disk('avatar')->get($avatar);

        return new Response($image, 200);
    }
}
