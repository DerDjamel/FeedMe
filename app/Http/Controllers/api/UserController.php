<?php

namespace App\Http\Controllers\api;

use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /* get the logged in user */
    public function getUser(Request $request){
        return new UserResource(Auth::user());
    }
}
