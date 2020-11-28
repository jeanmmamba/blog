<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detailPageController extends Controller
{
    public function index(){
        return view('front.details');
    }
}
