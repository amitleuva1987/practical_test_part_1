<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $result = [
            'data' => $users,
            'message' => 'Success'
        ];
        return $result;  
      //  return UserResource::collection($users)->additional(['message' => 'Success']);
    }
}
