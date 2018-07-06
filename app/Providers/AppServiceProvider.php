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
                    ],
                    [
                       'text' => 'Viaturas',
                        'url'  => 'admin/viaturas',
                        'icon' => 'ambulance', 
                ]);
            }
            $event->menu->add('ATENDIMENTO');
            $event->menu->add([
                        'text'       => 'Ocorrências',
                        'icon' => 'ambulance',
                        'submenu' => [
                            [
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
                                'icon_color' => 'green',
                                'url'  => 'ocorrencias/status/3',
                            ]
                        ]
                    ],
                    [
                        'text'       => 'Atendimentos',
                        'icon' => 'ambulance',
                        'submenu' => [
                            [
                                'text'       => 'Todos',
                                'url'  => 'atendimentos',
                            ],
                            [
                                'text'       => 'Pendentes',
                                'icon_color' => 'red',
                                'url'  => 'atendimentos/status/0',
                            ],
                            [
                                'text'       => 'Finalizados',
                                'icon_color' => 'green',
                                'url'  => 'atendimentos/status/1',
                            ],
                        ]
                    ]);
            
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
