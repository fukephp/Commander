<?php namespace Faruk\Commander;

use Illuminate\Support\ServiceProvider;

class CommanderServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->registerCommandTranslator();
        $this->registerCommandBus();
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['commander'];
	}

    public function registerCommandBus()
    {
        $this->app->bindShared('Faruk\Commander\CommandBus', function () {
            return $this->app->make('Faruk\Commander\ValidationCommandBus');
        });
    }

    public function registerCommandTranslator()
    {
        $this->app->bind('Faruk\Commander\CommandTranslator', 'Faruk\Commander\BasicCommandTranslator');
    }

}
