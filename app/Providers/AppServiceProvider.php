<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\paginator;
use Illuminate\Auth\Notifications\VerifyEmail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
   /*     VerifyEmail::$toMailCallback = function($notifiable,$verificationURL){
            return (new MailMessage)
                    ->subject('Verifique Correo')
                    ->greeting('Hola')
                    ->line('Haga click en el botón para verificar su correo.')
                    ->action('Verificar correo', url('/reset-password/'.$verificationURL))
                    ->line('Si no has creado una cuenta no hagas nada')
                    ->salutation('Gracias');
      };*/
    }
}
