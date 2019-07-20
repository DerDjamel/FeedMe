<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            $this->username()   => 'required|email',
            'password'          => 'required|string',
        ]);
      
        if ($validator->fails()){
            return response()->json( ['errors' => $validator->errors()], 422 );
        }

        $credentials = $request->only($this->username(), 'password');
        
        if ( Auth::attempt($credentials) ){
            $request->session()->regenerate();
            return response()->json([
                'user' => new UserResource(Auth::user())
            ], 200);
        }
        
        return response()->json([
            'error' => 'Unauthorized'
        ], 401);

    }


    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return response()->json([ 'message' => 'logged out' ]);
    }


    public function username(){
        return 'email';
    }
}
