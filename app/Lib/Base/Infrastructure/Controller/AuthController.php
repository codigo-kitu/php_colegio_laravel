<?php

namespace App\Lib\Base\Infrastructure\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

use stdClass;
use App\Models\User;

class AuthController {
 
    public static string $ROUTE='/colegio_relaciones/base/login_api';
	
    public function registerCreate(Request $request) {        
        
        $request->validate([
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|email|max:255',
            'user.password' => 'required|string|min:4'
        ]);

        //$validator=Validator::make($request->all(),[

        /*
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        */

        $user = User::create([
            'name' => $request->input('user.name'),     // $request->name,
            'email' => $request->input('user.email'),   // $request->email,
            'password' => Hash::make($request->input('user.password'))
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'=>$user,
            'access_token'=>$token,
            'token_type'=>'Bearer'
        ]);
    }

    public function login2(Request $request) {
        return response()->json([1,2,3,4,5]);
    }

    public function login(Request $request) {

        /*
        if(!Auth::attempting($request->only('email','password'))) {
            
            return response()->json([
                ['message'=>'unauthorized'],401
            ]);
        }
        */

        $user = User::where('email',$request->input('user.email'))->firstOrFail(); // $request->email

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Hi '.$user->name,
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout() {

        auth()->user()->tokens()->delete();

        return ['message'=>'Success Logout'];
    }
}
