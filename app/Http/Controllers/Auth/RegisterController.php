<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use App\Models\Persons;

use DB;
use Exception;

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
            'firstname'  => ['required', 'string', 'max:255'],
            'middlename' => ['string', 'max:255', 'nullable'],
            'lastname'   => ['required', 'string', 'max:255'],
            'mobile_no'  => ['required', 'min:11', 'max:13', 'unique:users'],
            'birthdate'  => ['required', 'before:17 years ago'],
            'gender'     => ['required'],
            'username'   => ['required', 'string', 'max:255', 'unique:users'],
            'email'      => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
            'pin_code'   => ['required', 'min:6', 'max:6'],
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
        DB::beginTransaction();
        try {
            $person = Persons::create([
                'firstname'  => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname'   => $data['lastname'],
                'birthdate'  => $data['birthdate'],
                'gender'     => $data['gender']
            ]);

            $user = User::create([
                'person_id' => $person->id,
                'role_id'   => config('const.role_staff_id'),
                'username'  => $data['username'],
                'mobile_no' => $data['mobile_no'],
                'email'     => $data['email'],
                'password'  => Hash::make($data['password']),
                'pin_code'  => $data['pin_code'],
            ]);

            DB::commit();

            return $user;
        } catch(Exception $e) {
            \Log::error($e->getMessage());
            
            DB::rollback();

            return redirect()->back()->withErrors('errors', $e->getMessage());
        }
    }
}
