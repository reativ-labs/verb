<?php namespace Reativ\Verb\Http\Exceptions;

class NotFoundException extends HttpException {

    public function __construct(string $description = null) {
        parent::__construct(404, 'Not Found', $description);
    }
}