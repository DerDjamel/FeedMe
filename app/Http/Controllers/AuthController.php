<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
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
        
        if ( Auth::attempt($credentials, true) ){
            $request->session()->regenerate();
            return response()->json([
                'user' => new UserResource(Auth::user()),
            ], 200);
        }
        
        return response()->json([
            'error' => 'Unauthorized'
        ], 401);

    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            $this->username()   => 'required|email',
            'name'              => 'required|string',
            'password'          => 'required|string',
        ]);
      
        if ($validator->fails()){
            return response()->json( ['errors' => $validator->errors()], 422 );
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        
        if ( Auth::attempt($request->only($this->username(), 'password')) ){
            $request->session()->regenerate();
            return response()->json([
                'user' => new UserResource(Auth::user())
            ], 200);
        }
        
        
    }


    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return response()->json([ 'message' => 'logged out' ]);
    }


    public function username(){
        return 'email';
    }

    public function checkAuth(){
        return response()->json([ 'auth' => auth()->check() ]);
    }
}
