<?php namespace Reativ\Verb\Http\Exceptions;

class BadRequestException extends HttpException {

    public function __construct(string $description = null) {
        parent::__construct(400, 'Bad Request', $description);
    }
}