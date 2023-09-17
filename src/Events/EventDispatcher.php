<?php namespace Reativ\Verb\Events;

class EventDispatcher {
    private array $observers = [];
    
    public function __construct() {
        $this->observers['*'] = [];
    }
    
    private function initEventGroup(string &$event = "*"): void {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = "*"): array {
        $this->initEventGroup($event);
        
        $group = $this->observers[$event];
        $all = $this->observers["*"];
        
        return array_merge($group, $all);
    }

    public function attach(Observer $observer, string $event = "*"): void {
        $this->initEventGroup($event);
        $this->observers[$event][] = $observer;
    }

    public function detach(Observer $observer, string $event = "*"): void {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }
    
    public function trigger(string $event, object $emitter, $data = null): void {
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($event, $emitter, $data);
        }
    }
}