<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    public function register(Request $request){


        $register = $request->input();

    $user = User::create($register);

    $token = $user->createToken('AuthApp')->plainTextToken;

    return [
    'success' => true,
    'result' => ['token'=>$token],
    'message' => 'user creates successfully'
    ];

    }


    public function login(Request $request){

    $user = User::where('email',$request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)){
      return ['error'=>'please check user name password 11'];
    }

$token = $user->createToken('AuthApp')->plainTextToken;
return [

  'success' => true,
    'result' => ['token'=>$token],
    'message' => 'user logedin successfully'
];


    }

}
