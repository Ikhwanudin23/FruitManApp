<?php

namespace App\Http\Controllers;

use App\FruitCollectors;
use App\Seller;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index(){
        $fruitCollectors = count(FruitCollectors::all());
        $sellers = count(Seller::all());
        return view('pages.dashboard', compact(['fruitCollectors','sellers']));
    }

    public function show(){

    }
}
