<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
        $seller = Seller::all();
        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $seller
        ]);
    }
}
