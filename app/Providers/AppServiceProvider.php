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

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('CONFIGURAÇÕES DA CONTA');
            $event->menu->add([
                    'text' => 'Perfil',
                    'url'  => 'usuario',
                    'icon' => 'user',
                ]);            
            
            if(Auth::user()->tipo == 1){                
                $event->menu->add('CADASTROS');
                $event->menu->add([
                        'text' => 'Instituições de Atendimento',
                        'url'  => 'admin/instituicoes-atendimento',
                        'icon' => 'medkit', 
                    ],
                    [
                       'text' => 'Usuários',
                        'url'  => 'admin/usuarios',
                        'icon' => 'user', 
                    ]);
            }
            $event->menu->add('OCORRÊNCIAS');
            $event->menu->add([
                                'text'       => 'Todas',
                                'url'  => 'ocorrencias',
                            ],
                            [
                                'text'       => 'Em aberto',
                                'icon_color' => 'red',
                                'url'  => 'ocorrencias/status/0',
                            ],
                            [
                                'text'       => 'Atendidas',
                                'icon_color' => 'blue',
                                'url'  => 'ocorrencias/status/1',
                            ],
                            [
                                'text'       => 'Finalizadas',
                                'icon_color' => 'green',
                                'url'  => 'ocorrencias/status/2'
                            ]
                    );
            
        });
        
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
