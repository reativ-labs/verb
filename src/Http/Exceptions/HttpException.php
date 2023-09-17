<?php namespace Reativ\Verb\Http\Exceptions;

use Exception;

abstract class HttpException extends Exception {

    private ?string $description;

    public function __construct(int $code, string $message, ?string $description) {
        parent::__construct($message, $code);

        $this->description = $description;

        header("HTTP/1.1 $code $message");
    }

    public function getDescription(): string {
        return $this->description;
    }
}