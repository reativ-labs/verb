<?php namespace Reativ\Verb\Events;

interface Observer {

    public function notify(string $event, object $emitter, mixed $data = null);
}
