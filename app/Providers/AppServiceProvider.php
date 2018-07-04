<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events) {
        Schema::defaultStringLength(191);

//        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
//            if(Auth::user()->tipo == 1){
//                $event->menu->add('MAIN NAVIGATION');
//                $event->menu->add([
//                    'text' => 'Blog',
//                    'url' => 'admin/blog',
//                    'label' => Auth::user()->instituicao->viaturas->count()
//                ]);
//            }
//        });
        
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
