<?php

namespace App\Http\Controllers\Api\Seller;

use App\Http\Controllers\Controller;
use App\Seller;
use Auth;
use Illuminate\Http\Request;

class AuthSellerController extends Controller
{
    public function register(Request $request){
        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ,
            'api_token' => bcrypt($request->email),
        ]);

        return response()->json([
            'message' => 'register berhasil',
            'status' => true,
            'data' => $seller
        ]);
    }

    public function login(Request $request) {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('seller')->attempt($credential)){
            $user = Seller::find(Auth::guard('seller')->user()->id);
            return response()->json([
                'message' => 'login berhasil',
                'status' => true,
                'data' => $user
            ]);
        }

        return response()->json([
            'message' => 'login gagal',
            'status' => false,
        ]);
    }
}
