<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        if($validator->fails()){
            $response =   [
                "status" => false,
                "validate" => true,
                "message" => $validator->errors()
            ];
            response()->json($response);
        }

        $email = trim($request->email);
        $password = trim($request->password);

        $count = User::where("email", $email)->count();
        if($count == 0){
            $response = [
                "status" => false,
                "message" => "Email not found",
            ];
        }else{
            $user = User::where('email', $email)->first();
            //Check Password
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                Auth::user();
                $response = [
                    "status" => true,
                    "message" => "Login",
                ];
            }else{
                $response = [
                    "status" => false,
                    "message" => "Password incorrect",
                ];
            }
        }


        return response()->json($response);
    }
}
