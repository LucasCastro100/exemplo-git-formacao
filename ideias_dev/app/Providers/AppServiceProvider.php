<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('routes/caixeta.php'));
        $this->loadRoutesFrom(base_path('routes/games.php'));
        $this->loadRoutesFrom(base_path('routes/beercode.php'));
    }
}
