<?php namespace Reativ\Verb\Config;

interface Config {

    public function setConfigSource(string $path): void;
    public function load(): void;
}