<?php namespace Faruk\Commander;

use Illuminate\Foundation\Application;

class DefaultCommandBus implements CommandBus
{
    /**
     * @var CommandTranslator
     */
    protected $commandTranslator;

    /**
     * @var Application
     * */
    protected $app;

    /**
     * @param Application $app
     * @param CommandTranslator $commandTranslator
     */
    function __construct(Application $app, CommandTranslator $commandTranslator)
    {
        $this->commandTranslator = $commandTranslator;
        $this->app = $app;
    }

    public function execute($command)
    {
        // translate that object name into handler class
        $handler = $this->commandTranslator->toCommandHandler($command);
        // resolve out of ioc container, and call handle method
        return $this->app->make($handler)->handle($command);
    }
} 