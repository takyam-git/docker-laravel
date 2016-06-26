<?php

namespace App\Providers;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //DoctrineのクエリをDebugbarに出すようにする
        $debugStack = new \Doctrine\DBAL\Logging\DebugStack();
        \EntityManager::getConnection()->getConfiguration()->setSQLLogger($debugStack);
        \Debugbar::addCollector(new \DebugBar\Bridge\DoctrineCollector($debugStack));
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
