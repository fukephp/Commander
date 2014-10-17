<?php namespace Faruk\Commander;

interface CommandBus {
    /**
     * @param $command
     * @return mixed
     */
    public function execute($command);
}

?>