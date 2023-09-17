<?php namespace Reativ\Verb\Config;

use Reativ\Verb\Http\Exceptions\InternalServerErrorException;

class FileConfig implements Config {

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

        $configs = require $this->path;
        foreach ($configs as $name => $value) {
            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}
