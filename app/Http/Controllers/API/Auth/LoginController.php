<?php

namespace App\Http\Controllers\API\Auth;
use App\Http\Controllers\API\PhoneController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' =>$request->email,'password' =>$request->password]))
        {
            $token = $request->user()->createToken('mobil');
 
             return ['token' => $token->plainTextToken];


        }
        return response(['massege' => 'wrong email / password'],401) ;
    }
}
