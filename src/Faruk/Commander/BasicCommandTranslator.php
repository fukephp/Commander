<?php namespace Faruk\Commander;

use Whoops\Example\Exception;

class BasicCommandTranslator implements CommandTranslator{
    /**
     * @param $command
     * @return mixed
     * @throws Exception
     */
    public function toCommandHandler($command)
    {
        $handler = str_replace('Command', 'CommandHandler', get_class($command)); // PostJobListingCommandHandler

        if( !class_exists($handler) )
        {
            $message = "Command handler [$handler] dose not exist.";

            throw new Exception($message);
        }

        return $handler;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function toValidator($command)
    {
        return str_replace('Command', 'Validator', get_class($command));
    }


} 