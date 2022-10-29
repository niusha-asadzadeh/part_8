<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $valid=$request->validate([
            'name'=>['required','string'],
            'password'=>['required','string']
        ]);

        $admin=Admin::where('name',$valid['name'])->first();

        if(!empty($admin) && Hash::check($valid['password'] , $admin->password)){
            return response()->json([
                'token'=> $admin->createToken('auth_token')->plainTextToken
            ]);

        }

        return response()->json([
            'code'=>2,
            'massage'=>'wrong',
        ],403);

    }
}
