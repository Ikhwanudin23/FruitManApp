<?php

namespace App\Http\Controllers\Api;

use App\FruitCollectors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FruitCollectorsController extends Controller
{
    public function index(){
        $fruits = FruitCollectors::all();
        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $fruits
        ]);
    }
}
