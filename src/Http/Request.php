<?php namespace Reativ\Verb\Http;

class Request {
    public function post(string $key, string $defaultValue = null): ?string {
        return $_POST[$key] ?? $defaultValue;
    }
    
    public function get(string $key, string $defaultValue = null): ?string {
        return $_GET[$key] ?? $defaultValue;
    }

    public function file(string $key): ?string {
        return $_FILES[$key] ?? null;
    }
}