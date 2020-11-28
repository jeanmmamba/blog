<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\setting;
use App\category;
use App\user;
use App\post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = setting::all();
        foreach($settings as $key => $setting){
            if($key === 0) $system_name = $setting->value;
            elseif($key === 1) $favicon = $setting->value;
            elseif($key === 2) $front_logo = $setting->value;
            elseif($key === 3) $admin_logo = $setting->value;
        }

        $categories = category::where('status',1)->get();
        $authors = User::where('id','!=',1)->get();
        $most_viewed = post::with(['creator', 'comments'])->where('status',1)->orderBy('view_count','DESC')
        ->limit(5)->get();

        $shareData = array(
            'system_name'=>$system_name,
            'favicon'=>$favicon,
            'front_logo'=>$front_logo,
            'admin_logo'=>$admin_logo,
            'categories'=>$categories,
            'authors'=>$authors,
            'most_viewed'=>$most_viewed

        );
        view()->share('shareData',$shareData);
    }
}
