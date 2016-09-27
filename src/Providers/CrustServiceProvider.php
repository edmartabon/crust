<?php

namespace Crust\Providers;

use Config;
use Illuminate\Support\ServiceProvider;

class CrustServiceProvider extends ServiceProvider
{

    /**
     * Get the main base path of packages;
     */
    private $root = __DIR__ . '/../';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publish();
        $this->loadView();
        $this->loadRoute();
        $this->loadMigration();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindHuman();
        $this->bindHumanContract();
    }

    public function publish()
    {
        $this->publishes([
            $this->root . 'Data/config' => $this->app->configPath(),
        ], 'crust');
    }

    /**
     * Bind crust interface to human
     *
     * @return void
     */
    private function bindHumanContract()
    {
        $this->app->bind(
            'Crust\Contracts\HumanInterface',
            'Crust\Human'
        );
    }
    
    private function bindHuman()
    {
        $this->app->bind('Human', function() {
            return new \Crust\Human;
        });
    }

    private function loadMigration()
    {
        $this->loadMigrationsFrom($this->root . 'Data/database/migration');
    }

    private function loadView()
    {
        $this->loadViewsFrom($this->root . 'Data/resources/view', 'crust');
    }

    /**
     * Load crust route module
     *
     * @return void
     */
    private function loadRoute()
    {
        if ($this->getConfig('crust.page')) {
            require $this->root . 'Data/routes/route.php';
        }
        require $this->root . 'Data/consoles/crustcommand.php';
    }

    private function getConfig($config)
    {
        if (!is_null($config = Config::get($config))) {
            return $config;
        }
        return false;
    }

}