<?php namespace Reativ\Verb\Events\Attributes;

use Attribute;

#[Attribute]
class ListensTo {
    public string $event;

    public function __construct(string $event) {
        $this->event = $event;
    }
}
