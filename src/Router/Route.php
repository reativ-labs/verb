<?php namespace Reativ\Verb\Router;

use Reativ\Verb\Http\RequestMethod;

class Route {

    private string $path;
    private RequestMethod $method;
    private array $data;
    private $handler;

    public function __construct(string $path, RequestMethod $method, callable | array $handler) {
        $this->path = $this->buildRoutePath($path);
        $this->method = $method;
        $this->handler = $handler;
    }

    private function buildRoutePath(string $path): string {
        $path = str_replace(['/', '-'], ['\/', '\-'], $path);
        $routeParametersRegex = "/:([a-zA-Z]+)/";
        $paramsWithParams = preg_replace($routeParametersRegex, "(?<$1>[a-z0-9\-_]+)", $path);
      
        $pathRegex = "/^$paramsWithParams$/";
    
        return $pathRegex;
    }

    public function path(): string {
        return $this->path;
    }
    
    public function method(): RequestMethod {
        return $this->method;
    }

    public function handler(): callable | array {
        return $this->handler;
    }

    public function params(string $uri): array {
        $pathMatches = [];
        preg_match($this->path(), $uri, $pathMatches);
        $this->data = array_filter($pathMatches, "is_string", ARRAY_FILTER_USE_KEY);

        return $this->data;
    }
}