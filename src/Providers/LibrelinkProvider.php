<?php

namespace Knightcott\Librelink\Providers;

use Illuminate\Support\ServiceProvider;

class LibrelinkProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $env_path = app()->environmentFilePath();
        $config = file_get_contents($env_path);
        if (strpos($config, 'LIBRENMS_SERVER') === false) {
            file_put_contents($env_path, "\nLIBRENMS_SERVER=change_me\nLIBRENMS_API_TOKEN=change_me\n", FILE_APPEND);
        }

        $this->publishes([
            __DIR__.'/../config/librelink.php' => config_path('librelink.php'),
        ]);


    }

}