<?php

namespace App\Providers;

use App\category;
use App\Menu;
use App\StoreInfo;
use Illuminate\Support\ServiceProvider;
use App\Social;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $alllink = Social::find(1);
        View::share('social_link',$alllink);
        $storeinfo = StoreInfo::find(1);
        View::share('storeinfo',$storeinfo);

        $allCategory = category::all();
        View::share('category',$allCategory);

        $allmenu = Menu::select('menus.id','menus.catid','cat.name as cname')
        ->join('categories as cat','menus.id','=','cat.id')
        ->get();
        View::share('allmenu',$allmenu);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
