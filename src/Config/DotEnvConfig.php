<?php namespace Reativ\Verb\Config;

use Reativ\Verb\Http\Exceptions\InternalServerErrorException;

// use InvalidArgumentException;
// use RuntimeException;

class DotEnvConfig implements Config {

    protected string $path;

    public function setConfigSource(string $path): void {
        if(!file_exists($path)) {
            throw new InternalServerErrorException(sprintf('%s does not exist', $path));
        }
        $this->path = $path;
    }

    public function load() :void {
        if (!is_readable($this->path)) {
            throw new InternalServerErrorException(sprintf('%s file is not readable', $this->path));
        }

        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            [$name, $value] = array_map(fn(string $value) => trim($value), explode('=', $line, 2));

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}
