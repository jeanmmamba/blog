<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        return view('admin.cathegory.list');
    }

    public function create(){
        return view('admin.cathegory.create');
    }

    public function edit(){
        return view('admin.cathegory.edit');
    }
}
