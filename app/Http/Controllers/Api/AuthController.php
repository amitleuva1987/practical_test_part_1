<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function authenticate(Request $request){
        $validator = Validator::make(request()->all(),[
            'email' => 'required|exists:users',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
                'status' => Response::HTTP_BAD_REQUEST,
            ],Response::HTTP_BAD_REQUEST);
        }

        $user = User::where('email',$request->email)->first();
        if(!Hash::check($request->password,$user->password)){
            return response()->json([
                'error' => 'Invalid Credentials',
            ]);
        }
        
        return response()->json([
            'token' => $user->createToken('test_app')->plainTextToken,
        ]);
    }
}
