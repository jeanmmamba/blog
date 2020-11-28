<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\setting;

class settingController extends Controller
{
    public function index(){
        $page_name = 'system setting';
        $setting = setting::find(1);
        $system_name = $setting->value;
        return view('admin.setting.update',compact('page_name','setting','system_name'));
    }

    public function update(request $request){
        $this->validate($request,[
            'name'=>'required'
        ]);

        $fav_setting = setting::find(2);
        if($request->file('favicon')){
            @unlink(public_path('/others/'.$fav_setting->value));
            $file = $request->file('favicon');
         $extension = $file->getClientOriginalExtension();
         $favicon= 'favicon.'.$extension;
         $file->move(public_path('/others'),$favicon);
         $fav_setting->value = $favicon;
         $fav_setting->save();
       }
       
       $admin_setting = setting::find(4);
       if($request->file('admin_logo')){
           @unlink(public_path('/others/'.$fav_setting->value));
           $file = $request->file('admin_logo');
        $extension = $file->getClientOriginalExtension();
        $admin_logo= 'admin_logo.'.$extension;
        $file->move(public_path('/others'),$admin_logo);
        $admin_setting->value = $admin_logo;
        $admin_setting->save();
      }
      
      $front_setting = setting::find(3);
      if($request->file('front_logo')){
          @unlink(public_path('/others/'.$fav_setting->value));
          $file = $request->file('front_logo');
       $extension = $file->getClientOriginalExtension();
       $front_logo= 'front_logo.'.$extension;
       $file->move(public_path('/others'),$front_logo);
       $front_setting->value = $front_logo;
       $front_setting->save();
     }

     $sys_setting = setting::find(1);
     $sys_setting->value = $request->name;
     $sys_setting->save();
     return redirect()->action('admin\settingController@index');       
    }
}
