<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
            'birth_year' => ['required'],
            'birth_month' => ['required'],
            'birth_day' => ['required'],
        ], [
            'email.required' => 'この項目は必須です。',
            'password.required' => 'この項目は必須です。',
            'first_name.required' => 'この項目は必須です。',
            'last_name.required' => 'この項目は必須です。',
            'address.required' => 'この項目は必須です。',
            'birth_year.required' => 'この項目は必須です。',
            'birth_month.required' => 'この項目は必須です。',
            'birth_day.required' => 'この項目は必須です。',
        ]);
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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->profile()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'birth_year' => $data['birth_year'],
            'birth_month' => $data['birth_month'],
            'birth_day' => $data['birth_day'],
        ]);
        return $user;
    }
}
