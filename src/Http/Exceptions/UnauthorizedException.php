<?php namespace Reativ\Verb\Http\Exceptions;

class UnauthorizedException extends HttpException {

    public function __construct(string $description = null) {
        parent::__construct(401, 'Unauthorized', $description);
    }
}