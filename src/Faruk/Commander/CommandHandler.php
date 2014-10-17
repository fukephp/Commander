<?php namespace Faruk\Commander;


interface CommandHandler {
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command);
} 