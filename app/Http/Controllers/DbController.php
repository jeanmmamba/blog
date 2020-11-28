<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee; 


class DbController extends Controller
{
    public function index(){
    $all=DB::table('employee')->orderby('name','asc')->offset('MMAMBA')->limit(3)->get();
    dd($all);
    }

    public function joining(){
        $al=DB::table('order')
        ->join('user','user.id','=','order.user_id')->select('user.name')->where('status',1)
        ->get();
        dd($al);
    }

    public function model(){
        $result=Employee::All();
        dd($result);
    }
}
