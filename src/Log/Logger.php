<?php namespace Reativ\Verb\Log;

class Logger {

    public static function format(string $colorFormat = null, ...$args): void {
        foreach ($args as $arg) {
            if (is_object($arg) || is_array($arg) || is_resource($arg)) {
                $output = print_r($arg, true);
            } else {
                $output = (string) $arg;
            }

            if (!is_null($colorFormat)) {
                $output = sprintf($colorFormat, $output);
            }
            error_log($output, 4);
         }
    }
    
    public static function dump(...$args): void {
        ob_start();
        foreach ($args as $arg) {
            var_dump($arg);
        }
        error_log(ob_get_clean(), 4);
    }

    public static function log(...$args): void {
        self::format(null, implode(', ', $args));
    }

    public static function info(...$args): void {
        self::format(Color::GREEN, implode(', ', $args));
    }

    public static function warn(...$args): void {
        self::format(Color::YELLOW, implode(', ', $args));
    }
    
    public static function error(...$args): void {
        self::format(Color::RED, implode(', ', $args));
    }

    public static function request(): void {
        self::log($_SERVER);
    }
    
    public static function post(): void {
        self::log($_POST);
    }
    public static function get(): void {
        self::log($_GET);
    }
}
