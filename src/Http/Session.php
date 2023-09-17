<?php namespace Reativ\Verb\Http;

class Session {

    public static function start(): void {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function get(string $key, mixed $defaultValue = null) {
        static::start();
        return isset($_SESSION[$key]) ? unserialize($_SESSION[$key]) : $defaultValue;
    }

    public static function has(string $key): bool {
        static::start();
        return isset($_SESSION[$key]);
    }
    
    public static function set(string $key, mixed $value): void {
        static::start();
        $_SESSION[$key] = serialize($value);
    }
    
    public static function remove(string $key): void {
        static::start();
        unset($_SESSION[$key]);
    }
    
    public static function id(string $id = null): string {
        if (!is_null($id) && session_id() !== $id) {
            session_destroy();
            session_id($id);
        }
        static::start();
        return session_id();
    }
    
    public static function destroy(): void {
        static::start();
        
        session_unset();
        session_destroy();
    }
}
