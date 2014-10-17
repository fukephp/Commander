<?php namespace Faruk\Commander;

use Illuminate\Foundation\Application;

class ValidationCommandBus implements CommandBus {
    /**
     * @var DefaultCommandBus
     */
    private $commandBus;
    /**
     * @var Application
     */
    private $app;
    /**
     * @var BasicCommandTranslator
     */
    private $commandTranslator;

    /**
     * @param DefaultCommandBus $commandBus
     * @param Application $app
     * @param BasicCommandTranslator $commandTranslator
     */
    function __construct(DefaultCommandBus $commandBus, Application $app, BasicCommandTranslator $commandTranslator)
    {
        $this->commandBus = $commandBus;
        $this->app = $app;
        $this->commandTranslator = $commandTranslator;
    }

    /**
     * @param $command
     */
    public function execute($command)
    {
        // perform validation
        $validator = $this->commandTranslator->toValidator($command);
        // PostJobListingCommand => PostJobListingValidator

        if(class_exists($validator))
        {
            $this->app->make($validator)->validate($command);
        }

        $this->commandBus->execute($command);
    }
} 