<?php namespace Reativ\Verb\Config;

class ConfigManager {

    public static function load(string $file, bool $dotEnv = true): void {
        $config = $dotEnv 
            ? new DotEnvConfig() 
            : new FileConfig();

        $config->setConfigSource($file);
        $config->load();
    }

    public static function get(string $key) {
        return getenv($key);
    }
}
