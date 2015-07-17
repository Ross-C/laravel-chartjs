<?php namespace Fx3costa\Laravelchartjs;

use Illuminate\Support\ServiceProvider;

class ChartjsServiceProvider extends ServiceProvider{

    /**
     * Array with colours configuration of the chartjs config file
     *
     * @var array
     */
    protected $colours = array();

    public function boot()
    {
        $this->publishes([__DIR__.'/config/chartjs.php' => config_path('chartjs.php')]);
        $this->loadViewsFrom(__DIR__.'/resources/views', 'chart');
        $this->colours = config('chartjs.colours');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('chartjs', function() {
            return new Chartjs($this->colours['bar']);
        });
    }
}