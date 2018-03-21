<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Host;
use App\House;
use App\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {


        $validator = Validator::make($data,
            [
                'first_name' => 'required|string|max:190',
                'last_name' => 'required|string|max:190',
                'email' => 'required|string|email|max:190|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'user_type' => 'required',
                'g-recaptcha-response'=>'required|captcha',
            ],
            [
                'first_name.required' => 'Name required',
                'last_name.required' => 'Name required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'user_type.required' => 'User type is required',
                'password.required' => 'Password is required',
                'password.min' => 'Password needs to have at least 6 characters',
                'password.max' => 'Password maximum length is 20 characters',
                'g-recaptcha-response.required' => 'Captcha is required',
            ]
        );

        return $validator;

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => base64_encode($data['email']),
        ]);

        //dd($data);

        if($data['user_type'] == 'partner')
        {
            $roleID = 4;
            $user->host = Partner::create([
                'user_id' => $user->id,
                'business_name' => $data['business_name'],
                'contact_person_name' => '',
                'type' => $data['partner_type'],
                'country' => $data['country'],
                'address' => $data['address'],
                'phone_number' => $data['phone_number'],
                'business_registration_number' => $data['business_registration_number'],
                'website' => $data['website'],
                'partner_code' => Partner::generateBarcodeNumber(),

                ]);
        }elseif($data['user_type'] == 'host')
        {
            $roleID = 2;
            $user->host = Host::create(['user_id' => $user->id, 'host_type' => $data['host_type']]);
            if($data['host_type'] == 'homestay')
            {
                $user->host->house = House::create([
                    'host_id' => $user->host->id,
                    'host_type' => $data['host_type'],
                    'title' => '',
                    'description' => '',
                    'city' => '',
                    'address' => '', 
                    'address_complement' => '',
                    'country' => '',
                    'latitude' => -27.4696819,
                    'longitude' => 153.0256503,
                    'about_area' => '',
                    'directions' => ''
                ]);
            }
        }

        $user->roles()
            ->attach($roleID);

        return $user;
    }

    /**
    * Handle a registration request for the application.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));
        return view('auth/emailverification');

    }
    /**
    * Handle a registration request for the application.
    *
    * @param $token
    * @return \Illuminate\Http\Response
    */
    
    public function verify($token)
    {
        $user = User::where('email_token',$token)->first();
        $user->verified = 1;
        if($user->save())
        {
            return view('emails/emailconfirm',['user'=>$user]);
        }
    }
}
