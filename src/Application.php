<?php namespace Reativ\Verb;

use Reativ\Verb\Config\ConfigManager;
use Reativ\Verb\Http\Exceptions\HttpException;
use Reativ\Verb\Http\RequestMethod;
use Reativ\Verb\Router\Router;
use Reativ\Verb\Structure\Singleton;
use ReflectionClass;
use ValueError;

class Application extends Singleton {

    private string $path;
    private RequestMethod $method;
    private Router $router;

    private array $options = [
        'env' => 'DEV',
        'defaultPath' => '/',
        'configFile' => '../.env'
    ];

    protected function __construct(array $options = []) {
        $this->options = array_merge($this->options, ...$options);
        $this->init();
    }

    private function init(): void {
        ConfigManager::load($this->options['configFile']);

        $this->path = $_SERVER['PATH_INFO'] ?? $this->options['defaultPath'];
        $this->method = RequestMethod::from($_SERVER['REQUEST_METHOD']) ?? RequestMethod::GET;
        $this->router = new Router();
    }

    public function run(): void {
        try {
            $route = $this->router->getActiveRoute($this->path, $this->method);
    
            $params = $route->params($this->path);

            if (is_array($route->handler())) {
                $reflector = new ReflectionClass($route->handler()[0]);
                $instance = $reflector->newInstance();
                $method = $reflector->getMethod($route->handler()[1]);
                $response = $method->invokeArgs($instance, $params);
            } else {
                $response = call_user_func_array($route->handler(), $params);
            }


            echo $response;
        } catch (HttpException $e) {
            die($e->getMessage()); // TODO: Refactor to use global error handling
        }
    }

    public function __call(string $invokedMethod, array $args) {
        try {
            $httpMethod = RequestMethod::from(strtoupper($invokedMethod));    
            $this->router->addRoute($args[0], $httpMethod , $args[1]);
        } catch (ValueError $e) {
            die($e->getMessage()); // TODO: Refactor to use global error handling
        }
    }
}