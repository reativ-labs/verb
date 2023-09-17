<?php namespace Reativ\Verb\Http\Exceptions;

class ForbiddenException extends HttpException {

    public function __construct(string $description = null) {
        parent::__construct(403, 'Forbidden', $description);
    }
}