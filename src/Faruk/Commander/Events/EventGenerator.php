<?php namespace Faruk\Commander\Events;

trait EventGenerator {
    /**
     * @var array
     */
    protected $pendingEvents = [];

    /**
     * @param $event
     */
    public function raise($event)
    {
       $this->pendingEvents[] = $event;
    }

    /**
     * @return array
     */
    public function releseEvents()
    {
        $events = $this->pendingEvents;

        $this->pendingEvents = [];

        return $events;
    }

} 