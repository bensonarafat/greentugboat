<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = "/account";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
    {

        return session()->get("back_url");
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "type" =>  ['required'],
            "nin" =>  ['required', 'unique:users'],
            "dob" =>  ['required'],
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

        try {
                    //store previous page as a session
        session()->put("back_url", $data['back_url']);
        $is_volunteer = false;
        $is_sponsor = false;
        $is_vendor = false;
        if(in_array("volunteer", $data['type'])) $is_volunteer = true;
        if(in_array("sponsor", $data['type'])) $is_sponsor = true;
        if(in_array("vendor", $data['type'])) $is_vendor = true;

        $_data = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            "mobile" => $data['mobile'],
            'password' => Hash::make($data['password']),
            'type' => "user",
            'role_id' => '8',
            "is_volunteer" => $is_volunteer,
            "is_sponsor" => $is_sponsor,
            "is_vendor" => $is_vendor,
            "nin" => $data['nin'],
            "dob" => $data['dob'],
            "is_account_completed" => 1,
        ];


        if($is_vendor){
            $vendor_data = [
                "company_name" => $data['company_name'],
                "company_rc" => $data['company_rc'],
                "position" => $data['position'],
                "company_address" => $data['company_address'],
                "bank" => $data['bank'],
                "account_name" => $data['account_name'],
                "account_number" => $data['account_number'],
                "bvn" => $data['bvn'],

            ];
            array_push($_data, $vendor_data);
        }
        return User::create($_data);
        } catch (Exception $e) {

            Log::info("Login error" . $e);
            die($e);
        }

    }
}
