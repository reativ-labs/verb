<?php namespace Reativ\Verb\Http\Exceptions;

class MethodNotAllowedException extends HttpException {

    public function __construct(string $description = null) {
        parent::__construct(405, 'Method Not Allowed', $description);
    }
}