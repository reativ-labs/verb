<?php namespace Reativ\Verb\Router;

use Reativ\Verb\Http\Exceptions\NotFoundException;
use Reativ\Verb\Http\RequestMethod;

class Router {
   private array $routes = [];

   public function addRoute(string $endpoint, RequestMethod $method, callable | array $handler): void {
      $this->routes[] = new Route($endpoint, $method, $handler);
   }
   
   public function getActiveRoute(string $uri, RequestMethod $method): Route {
      foreach ($this->routes as $route) {
         if ($route->method() === $method && preg_match($route->path(), $uri)) {
            return $route;
         }
      }

      throw new NotFoundException();
   }
}