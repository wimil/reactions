<?php
namespace Wimil\Reactions;

use Illuminate\Support\ServiceProvider as BaseProvider;

class Provider extends BaseProvider
{

    public function boot()
    {
        //publicar configraciion
        $this->publishes([
            __DIR__ . '/../config/reactions.php' => config_path('reactions.php'),
        ], 'config');

        //publicar migraciones
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__ . '/../migrations/create_reactions_table.php' => database_path("migrations/{$timestamp}_create_reactions_table.php"),
        ], 'migrations');

    }

    public function register()
    {
        //combinar configuracion de usuario y packete
        $this->mergeConfigFrom(
            __DIR__ . '/../config/reactions.php',
            'reactions'
        );
    }
}
