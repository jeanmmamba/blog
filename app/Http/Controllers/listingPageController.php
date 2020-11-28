<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listingPageController extends Controller
{
    public function index(){
        return view('front.listing');
    }
}
