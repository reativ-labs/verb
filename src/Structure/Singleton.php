<?php namespace Reativ\Verb\Structure;

use Exception;

class Singleton {

    private static array $instances = [];

    protected function __construct(array $args) {}

    protected function __clone() {}

    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }

    public static function getInstance(...$args): self {
        $subclass = static::class;

        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static($args);
        }
        
        return self::$instances[$subclass];
    }
}
