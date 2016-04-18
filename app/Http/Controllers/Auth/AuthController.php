<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Models\Department;
use App\Models\Division;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'religion' => $data['religion'],
            'address' => $data['address'],
            'birth_date' => $data['birth_date'],
            'birth_place' => $data['birth_place'],
            'phone' => $data['phone'],
            'ktp_id' => $data['ktp_id'],
            'ktp_address' => $data['ktp_address'],
            'NPWP' => $data['NPWP'],
            'number_leave' => 12,
            'departments_id' => $data['departments_id'],
            'divisions_id' => $data['divisions_id'],
            'status' => 'Active',
            'photo' => 'photo.png',
            'type' => $data['type'],
            ]);
    }

    public function showRegistrationForm()
    {
        $departments = Department::all();
        $divisions = Division::all();

        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register',['divisions' => $divisions],['departments' => $departments]);
    }

}
