<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'name' => ['required', 'regex:/^[a-zA-Z ]*$/', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','max:32', 'confirmed'],
            'phone' => ['required','regex:/^98[0-9]{8}$/','unique:users'],
            'address'=> ['required', 'string', 'max:255'],
        ],[
            'name.required'=>'Please Enter Your Name.',
            'name.regex'=>'Entered Name must be alphabets only.',
            'name.max'=>'Name cannot be more than 255 characters only.',
            'email.required'=>'Please Enter Your Email.',
            'email.email'=>'Email format not valid.',
            'password.required'=>'Password Field cannot be empty.',
            // 'password.confirmed'=>'Password Confirmation failed',
            'phone.required'=>'Please Enter Your Phone Number.',
            'phone.min'=>'Password must be at least 8 characters.',
            'phone.max'=>'Password cannot be more than 32 characters.',
            'phone.regex'=>'Invalid Phone Format.',
            'address.required'=>'Please Enter Your Address.'



        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
