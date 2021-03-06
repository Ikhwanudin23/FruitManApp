<?php

namespace App\Http\Controllers\Api\FruitCollector;

use App\FruitCollectors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthFruitCollectorController extends Controller
{
    public function __construct(){
        $this->middleware('guest:api-fruitCollectors');
    }

    public function register(Request $request){
    $rule = [
      'name' => 'required|min:3|max:100',
      'email' => 'required|email|unique:fruit_collectors'  
    ];

    $message = [
      'required' => 'tidak boleh kosong',
      'email.unique' => 'email sudah terdaftar',
      'name.min' => 'nama terlalu pendek'
    ];

    $this->validate($request, $rule, $message);
    
        $fruitCollector = FruitCollectors::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ,
            'api_token' => bcrypt($request->email),
        ]);

        return response()->json([
            'message' => 'register berhasil',
            'status' => true,
            'data' => $fruitCollector
        ]);
    }

    public function login(Request $request) {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::guard('fruitCollectors')->attempt($credential)){
            $user = FruitCollectors::find(Auth::guard('fruitCollectors')->user()->id);
            return response()->json([
                'message' => 'login berhasil',
                'status' => true,
                'data' => $user
            ]);
        }

        return response()->json([
            'message' => 'login gagal',
            'status' => false,
            'data' => (object) []
        ]);
    }
}
