<?php

namespace App\Http\Controllers\Api\Seller;

use App\Posting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostingsController extends Controller
{
        public function index(){
        $fruits = Posting::all();
        return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $fruits
        ]);
    }

    	public function store(Request $request) {
    		$image = $request->file('image')->store('uploads/image');
    		$posting = Posting::create([
    			'id_seller' => $request->id_seller,
    			'fruit_name' => $request->fruit_name,
    			'description' => $request->description,
    			'price' => $request->price,
    			'status' => $request->status,
    			'image' => $image
    		]);
    		  
    		 return response()->json([
            'message' => 'success',
            'status' => true,
            'data' => $posting
        ]);
    	}
}
