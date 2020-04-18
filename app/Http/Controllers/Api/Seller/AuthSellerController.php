<?php

namespace App\Http\Controllers\Api\Seller;

use App\Http\Controllers\Controller;
use App\Seller;
use Auth;
use Illuminate\Http\Request;

class AuthSellerController extends Controller
{
    public function register(Request $request){
    $rule = [
      'name' => 'required|min:3|max:100',
      'email' => 'required|email|unique:sellers'  
    ];

    $message = [
      'required' => 'tidak boleh kosong',
      'email.unique' => 'email sudah terdaftar',
      'name.min' => 'nama terlalu pendek'
    ];

    $this->validate($request, $rule, $message);

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
